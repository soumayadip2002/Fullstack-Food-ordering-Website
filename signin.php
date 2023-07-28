<?php
    require './config/constants.php';
    $user_name = $_SESSION['signin']['username'] ?? null;
    $upssword = $_SESSION['signin']['upassword']??null;

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
        <div class="signin_container">
            <h1>Sign in</h1>
            <?php if (isset($_SESSION['signup-success'])) { ?>
                <div class="alert_message success">
                    <p>
                        <?= $_SESSION['signup-success'];
                        unset($_SESSION['signup-success'])
                            ?>
                    </p>

                </div>
            <?php } elseif(isset($_SESSION['signin'])) {?>
                <div class="alert_message error">
                    <p>
                        <?= $_SESSION['signin'];
                        unset($_SESSION['signin'])
                            ?>
                    </p>

                </div>
            <?php } ?>

            <form action="signin-logic.php" method="post">
                <input type="text" name="uname" value="<?=$user_name  ?>" placeholder="enter name...">
                <input type="password" name="password" value="<?=$upssword  ?>" placeholder="enter password....">

                <div class="submit">
                    <button type="submit" name="submit" class="btn">sign in</button>

                    <h3>don't have an account ? <a href="<?php echo ROOT_URL ?>./signup.php">Register</a> </h3>
                </div>
            </form>
        </div>

    </section>
</body>

</html>