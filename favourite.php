<?php
require 'config/database.php';
if (isset($_SESSION['user-id']) && isset($_GET['did'])) {
    $id  = $_GET['did'];
    $uid = $_SESSION['user-id'];
    $select_query  = "select * from favourite where did='$id' and uid='$uid'";
    $select_result = mysqli_query($conn, $select_query);

    if(mysqli_num_rows($select_result)==1){
        $exist_dish = mysqli_fetch_assoc($select_result);
        $exist = $exist_dish['did'];
        if ($exist == $id) {
            $_SESSION['add-favourite'] = "You have already added this item";
        } 
    }
    else {
        $query  = "insert into favourite (uid, did) values ('$uid', '$id')";
        $result = mysqli_query($conn, $query);
        if (!mysqli_error($conn)) {
            $_SESSION['add-favourite-success'] = "Successfully added to favourite";
        } else {
            $_SESSION['add-favourite'] = "Couldn't add to favourite";
        }
    }

}
header('location: ' . ROOT_URL . 'favourite_items.php');
die();
?>
