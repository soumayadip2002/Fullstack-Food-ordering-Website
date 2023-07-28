<?php 
    require 'config/database.php';

    if($_GET['uid']){
        $id = $_GET['uid'];

        $query = "SELECT * from users where uid=$id";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)==1){
            $avatar_name = $user['avatar'];

            $avatar_path = '../upload/' . $avatar_name;

            if($avatar_path){
                unlink($avatar_path);
            }
        }

        $delete_fname = $user['fname'];
        $delete_lname = $user['lname'];

        $delete_query = "DELETE from users where uid=$id";
        $delete_result = mysqli_query($conn, $delete_query);

        if(!mysqli_errno($conn)){
            $_SESSION['delete-user-success'] = "user $delete_fname $delete_lname successfully deleted ";
        }
        else{
            $_SESSION['delete-user-error'] = "Failed to delete user $delete_fname $delete_lname";
        }
    }

    header('location: ' . ROOT_URL . 'admin/manage-user.php');

?>