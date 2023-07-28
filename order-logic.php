<?php

    require 'config/database.php';
    if(isset($_SESSION['user-id']) && isset($_POST['uosubmit'])){
        $uid = $_SESSION['user-id'];
        $did = $_POST['did'];
        $name = $_POST['uname'];
        $number = $_POST['unumber'];
        $food_name = $_POST['udname'];
        $food_price = $_POST['price_food'];
        $food_quantity = $_POST['quan_food'];
        $food_type=$_POST['food_type'];
        $payment = $_POST['payment_mode'];
        $pincode = $_POST['pincode'];
        $address = $_POST['address'];
        $address = mysqli_real_escape_string($conn, $address);

        if(!isset($_POST['payment']) || empty($payment)){
            $_SESSION['order-placed'] = "select payment";
        }
    }

    if(isset($_SESSION['order-placed'])){
        header('location: ' . ROOT_URL . 'Buy.php');
        die();
    }
    else{
        $order_query = "insert into orders (user_id,name,number,payment_mode,pincode,address) values('$uid', '$name', '$number', '$payment','$pincode', '$address')";
        $order_result = mysqli_query($conn, $order_query);

        if($order_result){
            $order_id = mysqli_insert_id($conn);
            $insert_query = "insert into order_items (user_id, order_id,food_id,quantity,price) values ('$uid','$order_id', '$did', '$food_quantity', '$food_price')";
            $insert_result = mysqli_query($conn, $insert_query);

            if(!mysqli_errno($conn)){
                $_SESSION['order-placed-success'] = "Your order successfully placed 😋😋";
            }
            else{
                $_SESSION['order-placed'] = "Your order couldn't place 😥😥";
            }
        }
        header('location: ' . ROOT_URL . 'order.php');
        die();
    }

?>