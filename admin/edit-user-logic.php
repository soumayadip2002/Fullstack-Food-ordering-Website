<?php  
    require 'config/database.php';

    if(isset($_POST['user_submit'])){
        $id = $_POST['uid'];
        $previous_avatar_name = $_POST['previous_avatar_name'];
        $user_firstname = $_POST['fname'];
        $user_lastname  = $_POST['lname'];
        $user_name  = $_POST['uname'];
        $user_email = $_POST['uemail'];
        $avatar    = $_FILES['avatar'];
        $role = $_POST['user_role'];

        if (!$user_firstname || !$user_lastname || !$user_name ||  !$user_email){
            $_SESSION['edit-user'] = "Invalid Input Please check Your input";
        }
        
        else{
            if($avatar['name']){
                $previous_avatar_path = '../upload/' . $previous_avatar_name;

                if($previous_avatar_path){
                    unlink($previous_avatar_path);
                }

                $avatar_name = $avatar['name'];
                $avatar_temp = $avatar['tmp_name'];
                $avatar_destination = '../upload/' . $avatar_name;

                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatar_name);
                $extension = end($extension);

                if(in_array($extension, $allowed_files))
                    move_uploaded_file($avatar_temp, $avatar_destination);
                else
                    $_SESSION['edit-user'] = "File should be png, jpg, jpeg format";
            }
        }

        if(isset($_SESSION['edit-user'])){
            header('location: ' . ROOT_URL . 'admin/edit-user.php');
            die();
        }
        else{
            $avatar_to_insert = $avatar_name ?? $previous_avatar_name;
            $update_query = "UPDATE users set fname='$user_firstname', lname='$user_lastname', uname='$user_name', email='$user_email', avatar='$avatar_to_insert', is_admin='$role' where uid=$id limit 1";
            $result = mysqli_query($conn, $update_query);

            if(!mysqli_errno($conn)){
                $_SESSION['edit-user-success'] = "User $user_firstname $user_lastname is successfully edited";
            }
            else{
                $_SESSION['edit-user'] = "Failed to update user";
            }
        }
    }

    header('location: ' . ROOT_URL . 'admin/manage-user.php');
    die();


?>