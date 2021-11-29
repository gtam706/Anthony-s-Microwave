<!DOCTYPE html>
<html>
<h1 style="text-align:center">Anthony's Microwave</h1>
<p><a href="/listings_test.html">Create listing</a></p>
<p><a href="/user_test.html">Create user</a></p>
<p><a href="/pass_test.html">Change password</a></p>
<h1 style="text-align:center">Listings</h1>
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
                echo "<br><img src=.$url>";
                echo '<header>' .$row['name']. '</header>';
                echo '<p>' .$row['description']. '</p>';
                echo '<p>' .$row['price'].  '</p>';
                echo '</td>';
            }
            else{
                echo '</tr>';
                echo '<tr>';
            }
        }
        echo '</table>';
?>
</html>
