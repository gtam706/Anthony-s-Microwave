<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Anthony'sMicrowave";
            
    $db = new mysqli($servername, $username, $password, $dbname);
                
    $result = $db -> query("SELECT * FROM products");

    //loop through all values in table and print to page
    while ($row = $result -> fetch_assoc()){
        //Size of image is set to 20px of screen, and kept at the right
        echo '<br><img src ="' .$row['image']. ' alt = ' .$row['item_id']. '">';
        //echo '<br><img src ="' .$row['image']. ' alt = ' .$row['item_id']. ' height= '.20%.' width= '.20%.'">';
        echo "<img style ='height: 20px; width: 20px; float: right;'>";
        
        //The name of the product is on the top left, in big font, independent of window
        //echo '<header>' .$row['name']. '</header>';
        echo "<header style='font-size: 40px; float: left;'> .$row['name']. </header>";
        
        //The description of the product, encapsulated in a class
        echo '<p class="graybox">' .$row['description']. '</p>';
        
        //Price, kept at left
        echo '<p style="font-size: 40px; float: left;">' .$row['price'].  '</p>';
    }

?>
</html>
