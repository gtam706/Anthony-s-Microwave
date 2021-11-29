<!DOCTYPE html>
<html>
<h1 style="text-align:center">Anthony's Microwave</h1>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Anthony'sMicrowave";
            
    $db = new mysqli($servername, $username, $password, $dbname);

    $id = $_GET['item_id'];
                
    $result = $db -> query("SELECT * FROM products WHERE item_id = $id");

    $row = $result -> fetch_assoc();
    $url = '/images/'.$row['image'];
    $url = str_replace(" ", "%20", $url);
    echo "<div><img src=.$url.>";
    echo '<header>' .$row['name']. '</header>';
    echo '<p>' .$row['description']. '</p>';
    echo '<p>' .$row['price'].  '</p> <div>';

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
