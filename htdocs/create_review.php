<?php
    //connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Anthony'sMicrowave";

    $db = new mysqli($servername, $username, $password, $dbname);

    if ($db -> connect_error){
        die("Connection failed: " . $db->connect_error);
    }

    $upload_ok = 1;

    //check if valid review
    $review = $_POST['review'];
    if (is_string($review)){
        $review = str_replace("'", "''", $review);
    } else {
        $upload_ok = 0;
    }

    //temporary test function
    //TO DO: implement function to automatically pull user id
    $reviewer = $_POST['reviewer'];
    if (!is_int($reviewer)){
        $upload_ok = 0;
    }

    //temporary test function
    //TO DO: implement function to automatically pull seller id
    $reviewee = $_POST['reviewee'];
    if (!is_int($reviewee)){
        $upload_ok = 0;
    }

    //if upload is ok, add to database
    if ($upload_ok == 1){
        $sql = "INSERT INTO products VALUES 
        ('$reviewer', '$reviewee', '$review)";
        
    }


?>
