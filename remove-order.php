<?php

    require 'config/database.php';

    if(isset($_GET['oid'])){

        $oid = $_GET['oid'];
        $query = "delete from food_order where oid='$oid'";
        $result = mysqli_query($conn, $query);
        if(!mysqli_errno($conn)){
            $_SESSION['remove-order-success'] = "Your order canceled Successfully 😢😢";
        }
        else{
            $_SESSION['remove-order'] = "Your order couldn't canceled  😢😢";
        }
    }

    header('location: ' . ROOT_URL . 'order.php');
    die();
?>