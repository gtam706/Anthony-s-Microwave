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

    $id = $_GET['item_id'];
                
    $result = $db -> query("SELECT * FROM products WHERE item_id = $id");

    //display item informations
    $row = $result -> fetch_assoc();
    $url = '/images/'.$row['image'];
    $url = str_replace(" ", "%20", $url);
    //Inline styling for the whole block, making gray background
    echo "<div style= 'display: block;
    border: 2.5px solid grey;
    background-color: #a1a1a1;
    height: 845px;
    width: auto;
    // Uncomment if you want a different layout, stuff on right, picture on left
    // display: flex;
    // justify-content: center;
    '>";
    //Inline styling for the image, just to center it
    echo "<img src=.$url. class = 'div images'>";
   
    echo "<header style='text-align: center; font-size: 40px'>".$row['name'].'</header>';
    echo '<p style = "text-align: center; font-size: 25px;">'.$row['description'].'</p>';
    echo '<p style = "font-size: 45px; color: white; text-align:center;">',"$".$row['price'].'</p> <div>';

    //form to create review
    $review_form = "/anthony'smicrowave/create_review.php";
    echo '<form action='.$review_form.' method="post" enctype="multipart/form-data">';
    echo '<label for="review"> Review:</label>';
    echo '<input type="text" id="review" name="review"><br><br>';
    echo '<label for="reviewer ">reviewer:</label>';
    echo '<input type="number" id="reviewer" name="reviewer"><br><br>';
    echo '<input type="hidden" id="reviewee" name="reviewee" value="'.$row['seller'].'"/>';
    echo '<input type="submit" value="Submit"></form>';
?>
</html>
