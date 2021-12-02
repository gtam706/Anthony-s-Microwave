<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<h1 style="text-align:center">Anthony's Microwave</h1>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Anthony'sMicrowave";
            
    $db = new mysqli($servername, $username, $password, $dbname);

    $id = $_GET['item_id'];
                
    $result = $db -> query("SELECT * FROM products WHERE item_id = $id");

    //display item informations
    $row = $result -> fetch_assoc();
    $item_url = '/images/'.$row['image'];
    $item_url = str_replace(" ", "%20", $item_url);
    echo "<div><img src=.$item_url.>";
    echo '<header>'.$row['name'].'</header>';
    
    //link to sellers user page
    $seller_id = $row['seller'];
    $seller_page = "user_page.php?user_id=".$seller_id;
    $user = $db -> query("SELECT name FROM users WHERE user_id=$seller_id");
    $user = $user -> fetch_assoc();
    echo "<p><a href = $seller_page>".$user['name']."</a></p>";

    echo '<p>'.$row['description'].'</p>';
    echo '<p>'.$row['price'].'</p> <div>';

    //message seller
    $message = "/anthony'smicrowave/message.php";
    echo '<form action='.$message.' method="post" enctype="multipart/form-data">';
    echo '<input type="hidden" id="recipient" name="recipient" value="'.$row['seller'].'"/>';
    echo '<input type="hidden" id="sender" name="sender" value="'.$_SESSION['user'].'"/>';
?>
</html>