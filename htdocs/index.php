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
                  
        //create table of all listings in database
        $result = $db -> query("SELECT * FROM products");
        $x = 0;
        echo '<table>';
        echo '<tr>';
        while($row = $result -> fetch_assoc()){
            //create rows of 3
            if($x < 3){
                $x++;
                //get url for image
                $item_url = '/images/'.$row['image'];
                $item_url = str_replace(" ", "%20", $item_url);
                //get url for unique item page
                $item_page = "item_page.php?item_id=".$row['item_id'];
                //get information of seller
                $seller_id = $row['seller'];
                $seller_page = "user_page.php?user_id=".$seller_id;
                $user = $db -> query("SELECT name FROM users WHERE user_id=$seller_id");
                $user = $user -> fetch_assoc();
                //display information
                echo "<td><a href = $item_page>
                      <img src=.$item_url>";
                echo '<header>' .$row['name']. '</header></a>';
                echo "<p><a href = $seller_page>".$user['name']."</a></p>";
                echo '<p>' .$row['description']. '</p>';
                echo '<p>' .$row['price'].  '</p>';
                echo '</td>';
            }
            else{
                echo '</tr>';
                echo '<tr>';
                $x = 0;
            }
        }
        echo '</table>';
?>
</html>
