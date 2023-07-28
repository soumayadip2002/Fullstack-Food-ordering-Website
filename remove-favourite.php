<?php

    require 'config/database.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "delete from favourite where did='$id'";
        $result = mysqli_query($conn, $query);

        if(!mysqli_error($conn)){
            $_SESSION['remove-fav-success'] = "item removed successfully!!";

        }
        else{
            $_SESSION['remove-fav'] = "item couldn't remove!!";
        }
    }

    header('location: ' . ROOT_URL . 'favourite_items.php');
    die();

?>