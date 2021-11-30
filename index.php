<!DOCTYPE html>
<html>
<h1 style="text-align:center">Anthony's Microwave</h1>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Anthony'sMicrowave";
                
        $db = new mysqli($servername, $username, $password, $dbname);
                    
        $result = $db -> query("SELECT * FROM products");
        $x = 0;
        echo '<table>';
        echo '<tr>';
        while($row = $result -> fetch_assoc()){
            if($x < 3){
                $x++;
                $item_url = '/images/'.$row['image'];
                $item_url = str_replace(" ", "%20", $item_url);
                $item_page = "item_page.php?item_id=".$row['item_id'];
                $seller_id = $row['seller'];
                $seller_page = "user_page.php?user_id=".$seller_id;
                $user = $db -> query("SELECT name FROM users WHERE user_id=$seller_id");
                $user = $user -> fetch_assoc();
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

