<?php
require 'config/database.php';


if (isset($_POST['cart_submit'])) {
    $uid = $_POST['uid'];
    $uname = $_POST['uname'];
    $unumber = $_POST['unumber'];
    $payment = $_POST['payment'];
    $pincode = $_POST['pincode'];
    $address = $_POST['address'];
    $address = mysqli_real_escape_string($conn, $address);

    $insert_order_query = "INSERT INTO orders (user_id,name,number,payment_mode,pincode,address) VALUES ('$uid', '$uname', '$unumber', '$payment', '$pincode', '$address')";
    $insert_order_result = mysqli_query($conn, $insert_order_query);

    if ($insert_order_result) {
        $order_id = mysqli_insert_id($conn);
        if (isset($_SESSION['cart_items'])) {
            $cart_items = $_SESSION['cart_items'];
            foreach ($cart_items as $cart_item) {
                $user_id = $cart_item['uid'];
                $food_id = $cart_item['did'];
                $price_food = $cart_item['subtotal'];
                $quan_food = $cart_item['quantity'];
                $insert_item_query = "INSERT INTO order_items (user_id, order_id,food_id,quantity,price) VALUES ('$user_id','$order_id','$food_id','$quan_food','$price_food')";
                $insert_item_result = mysqli_query($conn, $insert_item_query);

                if(!mysqli_errno($conn)){
                    $_SESSION['order-placed-success'] = "Your order successfully placed 😋😋";
                }
                else{
                    $_SESSION['order-placed'] = "Your order couldn't place 😥😥";
                }
            }
        }

        $delete_query = "delete from cart where uid='$uid'";
        $delete_result = mysqli_query($conn, $delete_query);
        unset($_SESSION['cart_items']);
    }
} 

header('location: ' . ROOT_URL . 'order.php');
exit();
?>
