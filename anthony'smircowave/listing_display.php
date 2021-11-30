<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Anthony'sMicrowave";
            
    $db = new mysqli($servername, $username, $password, $dbname);
                
    $result = $db -> query("SELECT * FROM products");

    //loop through all values in table and print to page
    while ($row = $result -> fetch_assoc()){
        echo '<br><img src ="' .$row['image']. ' alt = ' .$row['item_id']. '">';
        echo '<header>' .$row['name']. '</header>';
        echo '<p>' .$row['description']. '</p>';
        echo '<p>' .$row['price'].  '</p>';
    }

?>