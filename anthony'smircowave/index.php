<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg">
<h1 class="anthonybox">Anthony's Microwave</h1>
<!-- Implements the graybox classes in external CSS -->
<p class="grayboxLinks" style="text-align: center;"><a href="/listings_test.html">Create listing</a></p>
<p class="grayboxLinks" style="text-align: center;"><a href="/user_test.html">Create user</a></p>
<p class="grayboxLinks" style="text-align: center;"><a href="/pass_test.html">Change password</a></p>
<h1 style="text-align:center; font-size: 60px">Listings</h1>
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
                echo "<td>";
                //Divider styling for the cells
                echo "<div class='cellDiv'>";'</div>';
                echo "<a href = $item_page>
                      <img src=.$item_url class='images'>";
                //Inline styling for the product and seller name
                echo "<header style='text-align: center; font-size: 40px'>" .$row['name']. '</header>';
                echo "<p style = 'text-align: center; font-size: 25px;'><a href = $seller_page>".$user['name']."</a></p>";
                //Styling for the description under the images
                echo '<p class="imagestxt">' .$row['description']. '</p>';
                // echo "<p style='font-size: 20px;
                // text-align: left;
                // height: 15px;
                // width: 50px;
                // padding: 5px;
                // border: 10px;
                // margin: 50px; '>";
                //Decided to keep price on the right, to be more visible
                echo '<p style = "font-size: 45px; color: white; text-align:right;">' ,"$".$row['price'].  '</p>';
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
</body>
</html>
