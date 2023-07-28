<?php
require './config/constants.php';

$firstname = $_SESSION['signup-data']['$firstname'] ?? null;
$lastname  = $_SESSION['signup-data']['$lastname'] ?? null;
$username  = $_SESSION['signup-data']['$username'] ?? null;
$useremail = $_SESSION['signup-data']['$useremail'] ?? null;
$upassword = $_SESSION['signup-data']['$upassword'] ?? null;
$cpassword = $_SESSION['signup-data']['$cpassword'] ?? null;

unset($_SESSION['signup-data']);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>sign in</title>
    <link rel="stylesheet" href="./CSS/signin.css">

</head>

<body>
    <section class="signin">
        <div class="container signin_container">
            <h1>Sign Up</h1>
            <?php if (isset($_SESSION['signup'])) { ?>
                <div class="alert_message error">
                    <p>
                    <?= $_SESSION['signup'];
                    unset($_SESSION['signup'])
                        ?>
                    </p>

                </div>
            <?php } ?>
            <form action="signup-logic.php" method="post" enctype="multipart/form-data">
                <input type="text" name="fname" value="<?= $firstname ?>" placeholder="enter first name....">
                <input type="text" name="lname" value="<?= $lastname ?>" placeholder="enter last name....">
                <input type="text" name="uname" value="<?= $username ?>" placeholder="enter user name....">
                <input type="email" name="uemail" value="<?= $useremail ?>" placeholder="enter email....">
                <input type="password" name="upassword" value="<?= $upassword ?>" placeholder="enter password....">
                <input type="password" name="cpassword" value="<?= $cpassword ?>" placeholder="confirm password....">

                <input type="file" name="avatar">
                <div class="submit">
                    <button type="submit" name="usubmit" class="btn">Sign Up</button>

                    <h3>Already have an account ? <a href="<?php echo ROOT_URL ?>./signin.php">Sign in</a> </h3>
                </div>
            </form>
        </div>
    </section>
</body>

</html>