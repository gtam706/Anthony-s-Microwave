<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<h1 class="anthonybox">Anthony's Microwave</h1>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Anthony'sMicrowave";
            
    $db = new mysqli($servername, $username, $password, $dbname);

    $id = $_GET['user_id'];
    

    //display all item listings created by user
    $item = $db -> query("SELECT * FROM products WHERE seller = $id");
    $x = 0;
    while($row = $item -> fetch_assoc()){
        $url = '/images/'.$row['image'];
        $url = str_replace(" ", "%20", $url);
        $item_page = "item_page.php?item_id=".$row['item_id'];
        echo "<div style= 'display: block;
        border: 2.5px solid grey;
        background-color: #a1a1a1;
        height: 845px;
        width: auto;
        '>";
        echo "<a href = $item_page>
                <img src=.$url class = 'div images'>";
        echo "<header style='text-align: center; font-size: 40px;'>" .$row['name']. '</header><a>';
        echo '<p style="text-align: center; font-size: 25px;">' .$row['description']. '</p>';
        echo '<p style = "font-size: 45px; color: white; text-align:center;">' ,"$".$row['price'].  '</p>';
    }

    echo "<div>";
    //Not much styling for now
    echo "<header style='margin: 100px; text-align:center; font-size:30px'> Reviews </header>";

    //display all reviews of user
    $review = $db -> query("SELECT * FROM reviews WHERE reviewee = $id");
    while($row = $review -> fetch_assoc()){
        $reviewer = $row['reviewer'];
        $reviewer_page = "user_page.php?user_id=".$reviewer;
        $user = $db -> query("SELECT name FROM users WHERE user_id=$reviewer");
        $user = $user -> fetch_assoc();
        echo "<a href = $reviewer_page>";
        echo "<header>".$user['name']."</header></a>";
        echo "<p>".$row['review']."</p><br>";
    }
    echo "</div>";
?>
</html>
