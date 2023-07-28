<?php
require './config/database.php';

if (isset($_POST['submit'])) {
    $username  = $_POST['uname'];
    $upassword = $_POST['password'];


    if (!$username)
        $_SESSION['signin'] = "please provide username";
    elseif (!$upassword)
        $_SESSION['signin'] = "please provide password";
    else {
        $fetch_data   = "SELECT * from users where uname='$username'";
        $fetch_result = mysqli_query($conn, $fetch_data);

        if (mysqli_num_rows($fetch_result) == 1) {
            $user_record = mysqli_fetch_assoc($fetch_result);
            $db_password = $user_record['password'];

            if (password_verify($upassword, $db_password)) {
                $_SESSION['user-id'] = $user_record['uid'];

                if ($user_record['is_admin'] == 1) {
                    $_SESSION['user-admin'] = true;
                }
                header('location: ' . ROOT_URL);
            } else {
                $_SESSION['signin'] = "please check your input";
            }

        } else {
            $_SESSION['signin'] = "user not found";
        }

    }

    if (isset($_SESSION['signin'])) {
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signin.php');
        die();
    }
} else {
    header('location: ' . ROOT_URL . 'signin.php');
    die();
}


?>