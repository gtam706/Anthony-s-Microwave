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
        $x = 0;
        echo '<table>';
        echo '<tr>';

            $row = $result -> fetch_assoc();
            $url = '/images/'.$row['image'];
            $url = str_replace(" ", "%20", $url);
            echo "<br><img src=.$url.>";
            echo '<header>' .$row['name']. '</header>';
            echo '<p>' .$row['description']. '</p>';
            echo '<p>' .$row['price'].  '</p>';
            echo '</td>';

        echo '</table>';
?>
</html>