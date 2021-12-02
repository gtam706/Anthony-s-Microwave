<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<h1 class="anthonybox">Anthony's Microwave</h1>
<!-- Implements the graybox classes in external CSS -->
<?php
//if user is not logged in, displays options to log in or create a new account
if (!isset($_SESSION['user'])){ ?>
    <p class="grayboxLinks" style="text-align: center;"><a href="/anthony'smicrowave/user_test.html">Create user</a></p>
    <p class="grayboxLinks" style="text-align: center;"><a href="/anthony'smicrowave/login.html">Login</a></p>
<?php } else { 
    //if user is logged in, displays option to go to own user page,
    //create listing, change password, and log out
    $class = '"grayboxLinks"';
    $style = '"text-align: center;"';
    $link = "user_page.php?user_id=".$_SESSION['user'];
    echo "<p class=".$class." style=".$style."><a href=".$link.">User Page</a></p>";
    ?>
    <p class="grayboxLinks" style="text-align: center;"><a href="/anthony'smicrowave/listings_test.html">Create listing</a></p>
    <p class="grayboxLinks" style="text-align: center;"><a href="/anthony'smicrowave/pass_test.html">Change password</a></p>
    <p class="grayboxLinks" style="text-align: center;"><a href="/anthony'smicrowave/logout.php">Log Out</a></p>
<?php } ?>

<!-- <p class="grayboxLinks" style="text-align: center;"><a href="/pass_test.html">User Page</a></p> -->
<h1 style="text-align:center">Listings</h1>
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
                echo "<td><a href = $item_page><img src=.$item_url width = '200'>";
                echo "<header style='text-align: left; font-size: 40px'>" .$row['name']. '</header>';
                echo "<p><a href = $seller_page>".$user['name']."</a></p>";
                echo '<p>' .$row['description']. '</p>';
                echo '<p>  $' .$row['price'].  '</p>';
                echo '<br>';
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
