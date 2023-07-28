<?php
require './config/database.php';

if (isset($_POST['usubmit'])) {
    $firstname = $_POST['fname'];
    $lastname  = $_POST['lname'];
    $username  = $_POST['uname'];
    $useremail = $_POST['uemail'];
    $upassword = $_POST['upassword'];
    $cpassword = $_POST['cpassword'];
    $avatar    = $_FILES['avatar'];


    if (!$firstname)
        $_SESSION['signup'] = "please enter first name";
    elseif (!$lastname)
        $_SESSION['signup'] = "please enter lastname";
    elseif (!$username)
        $_SESSION['signup'] = "please enter username";
    elseif (!$useremail)
        $_SESSION['signup'] = "please enter email";
    elseif (strlen($upassword) < 8 || strlen($cpassword) < 8)
        $_SESSION['signup'] = "password should be match";
    elseif (!$avatar['name'])
        $_SESSION['signup'] = "please add avatar";
    else {
        if ($upassword !== $cpassword) {
            $_SESSION['signup'] = "password do not match";
        } else {
            $hashed_password = password_hash($upassword, PASSWORD_DEFAULT);

            $user_check = "select * from users where uname = '$username' or email='$useremail'";
            $result     = mysqli_query($conn, $user_check);

            if (mysqli_num_rows($result) > 0)
                $_SESSION['signup'] = "username or email already exist";
            else {
                $avatar_name        = $avatar['name'];
                $avatar_temp        = $avatar['tmp_name'];
                $avatar_destination = 'upload/' . $avatar_name;
                $allowed_files      = ['png', 'jpg', 'jpeg'];
                $extension          = explode('.', $avatar_name);
                $extension          = end($extension);

                if (in_array($extension, $allowed_files))
                    move_uploaded_file($avatar_temp, $avatar_destination);
                else
                    $_SESSION['signup'] = "File Should be jpg png or jpeg";
            }

        }
    }
    if (isset($_SESSION['signup'])) {
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    } else {
        $insert_query = "INSERT into users (fname, lname, uname, email, password, avatar, is_admin) values ('$firstname', '$lastname', '$username', '$useremail','$hashed_password', '$avatar_name', 0)";

        $insert_result = mysqli_query($conn, $insert_query);

        if (!mysqli_errno($conn)) {
            $_SESSION['signup-success'] = "Registration Successful";
            header('location: ' . ROOT_URL . 'signin.php');
            die();
        }
    }

}

else{
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}



?>