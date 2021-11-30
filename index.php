<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
<h1 class="anthonybox">Anthony's Microwave</h1>
<!-- Implements the graybox classes in external CSS -->
<p class="grayboxLinks" style="text-align: center;"><a href="/listings_test.html">Create listing</a></p>
<p class="grayboxLinks" style="text-align: center;"><a href="/user_test.html">Create user</a></p>
<p class="grayboxLinks" style="text-align: center;"><a href="/pass_test.html">Change password</a></p>
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
                //Resize the images at 40x40 px
                echo "<td><img src=.$url class='images'>";
                //echo "<td><img src=.$url height = 350px width = 350px>";
                echo "<header style='text-align: center; font-size: 40px'>" .$row['name']. '</header>';
                echo "<p class='imagestxt'>" .$row['description']. '</p>';
                echo "<p style='font-size: 20px;
                text-align: left;
                height: 15px;
                width: 50px;
                padding: 5px;
                border: 10px;
                margin: 50px;'>" .$row['price'].  '</p>';
                echo '<br>';
                echo '</td>';
            }
            else{
                echo '</tr>';
                echo '<br>';
                echo '<tr>';
                $x=0;
            }
        }
        echo '</table>';
?>
</html>
