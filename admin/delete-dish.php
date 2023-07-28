<?php
    require 'config/database.php';
    if(isset($_GET['did'])){
        $id = $_GET['did'];

        $query = "select * from dish where did='$id'";
        $result = mysqli_query($conn, $query);
        $dish = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)==1){
            $thumb_name = $dish['dpicture'];
            $thumb_path = '../upload/' . $thumb_name;

            if($thumb_name){
                unlink($thumb_path);
            }
        }

        $delete_query = "delete from dish where did='$id'";
        $delete_result = mysqli_query($conn, $delete_query);

        if(!mysqli_errno($conn)){
            $_SESSION['delete-dish-success'] = "Dish {$dish['dname']} is successfully deleted 😶😶";
        }
        else{
            $_SESSION['delete-dish'] = "Dish {$dish['dname']} is couldn't deleted 😥😥";
        }
    }

    header('location: ' . ROOT_URL . 'admin/index.php');
    
?>