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
                $url = '/images/'.$row['image'];
                $url = str_replace(" ", "%20", $url);
                echo "<td><img src=.$url.>";
                echo '<header>' .$row['name']. '</header>';
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
