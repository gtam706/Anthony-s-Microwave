<?php
session_start();
?>

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

    $id = $_GET['user_id'];
    
    if ($id != $_SESSION['user']){
        //form to create review
        $review_form = "/anthony'smicrowave/create_review.php";
        echo '<form action='.$review_form.' method="post" enctype="multipart/form-data">';
        echo '<label for="review"> Review:</label>';
        echo '<input type="text" id="review" name="review"><br><br>';
        echo '<input type="hidden" id="reviewer" name="reviewer" value="'.$_SESSION['user'].'"/>';
        echo '<input type="hidden" id="reviewee" name="reviewee" value="'.$id.'"/>';
        echo '<input type="submit" value="Submit"></form>';
    } else { ?>
        <p class="grayboxLinks" style="text-align: center;"><a href="/anthony'smicrowave/listings_test.html">Create Listing</a></p>
    <?php }

    //display all item listings created by user
    $item = $db -> query("SELECT * FROM products WHERE seller = $id");
    $x = 0;
    while($row = $item -> fetch_assoc()){
        $url = '/images/'.$row['image'];
        $url = str_replace(" ", "%20", $url);
        $item_page = "item_page.php?item_id=".$row['item_id'];
        echo "<a href = $item_page>
                <img src=.$url>";
        echo '<header>' .$row['name']. '</header><a>';
        echo '<p>' .$row['description']. '</p>';
        echo '<p>' .$row['price'].  '</p>';
    }

    echo "<div>";
    echo "<header> Reviews </header>";

    //display all reviews of user
    $review = $db -> query("SELECT * FROM reviews WHERE reviewee = $id");
    while($row = $review -> fetch_assoc()){
        $reviewer = $row['reviewer'];
        $reviewer_page = "user_page.php?user_id=".$reviewer;
        $user = $db -> query("SELECT name FROM users WHERE user_id=$reviewer");
        $user = $user -> fetch_assoc();
        echo "<a href = $reviewer_page>";
        echo "<header>".$user['name']."</header></a>";
        echo "<p>".$row['review']."</p><br>";
    }
    echo "</div>";
?>
</html>