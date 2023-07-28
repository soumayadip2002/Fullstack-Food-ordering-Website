<?php
    require 'config/database.php';

    if(isset($_SESSION['user-id']) && isset($_POST['rate_submit'])){
        $user_id = $_SESSION['user-id'];
        $foodname = $_POST['foodname'];
        $rating = $_POST['rate'];
        $rating = (int) $rating;
        $review = $_POST['review'];
        $review = mysqli_real_escape_string($conn, $review);


        if(!$rating)
            $_SESSION['add-review'] = "Please provide rating";
        elseif(!$review){
            $_SESSION['add-review'] = "Please write something about food..";
        }
        elseif($rating<0)
            $_SESSION['add-review'] = "Rating value should be greater than 0";
        elseif($rating>5)
            $_SESSION['add-review'] = "Rating value should be less than 5";

        if(!isset($_SESSION['add-review'])){
            $user_query = "select * from users where uid='$user_id'";
            $user_result = mysqli_query($conn, $user_query);
            $users = mysqli_fetch_assoc($user_result);
            $customername = $users['fname'] . " " . $users['lname'];
            $cpicture = $users['avatar'];
            $query = "insert into rating (rnumber, cname, cdescription, pname, picture) values ('$rating', '$customername', '$review', '$foodname', '$cpicture')";
            $result = mysqli_query($conn, $query);

            if(!mysqli_errno($conn)){
                $_SESSION['add-review-success'] = "Thank you for your kind response ❤❤!! Enjoy healthy food";

            }
            else{
                $_SESSION['add-review'] = "Sorry review couldn't post";
            }
        }
    }

    header('location: ' . ROOT_URL . 'dishes.php');
    die();

?>