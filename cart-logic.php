<?php
require 'config/database.php';

if (isset($_SESSION['user-id']) && isset($_GET['did'])) {
    $id  = $_GET['did'];
    $uid = $_SESSION['user-id'];

    $select_query  = "select * from dish where did='$id'";
    $select_result = mysqli_query($conn, $select_query);
    $exist_dish    = mysqli_fetch_assoc($select_result);
    $dname = $exist_dish['dname'];
    $dprice = $exist_dish['dprice'];
    $dimage = $exist_dish['dpicture'];
    $dquantity = substr($exist_dish['quantity'],0,1);

    $cart_query = "select * from cart where name='$dname'";
    $cart_result = mysqli_query($conn, $cart_query);

    if (mysqli_num_rows($cart_result)==1) {
        $_SESSION['add-success'] = "You have already added this item";
    } else {
        $query  = "insert into cart (uid,did, name, price, image, quantity) values ('$uid', '$id', '$dname','$dprice', '$dimage', '$dquantity')";
        $result = mysqli_query($conn, $query);

        if (!mysqli_error($conn)) {
            $_SESSION['add-cart-success'] = "Successfully added to cart";
        } else {
            $_SESSION['add-cart'] = "Couldn't add to cart";
        }
    }

}

header('location: ' . ROOT_URL . 'cart.php');
die();
?>
