<?php

    require 'config/database.php';

    if(isset($_GET['cart_id'])){
        $id = $_GET['cart_id'];

        $query = "delete from cart where cart_id='$id'";
        $result = mysqli_query($conn, $query);

        if(!mysqli_error($conn)){
            $_SESSION['remove-cart-success'] = "item removed successfully!!";

        }
        else{
            $_SESSION['remove-cart'] = "item couldn't remove!!";
        }
    }

    unset($_SESSION['cart_items']);
    header('location: ' . ROOT_URL . 'cart.php');
    die();

?>