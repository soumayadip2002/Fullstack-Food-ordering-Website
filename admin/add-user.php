<?php
    include 'partials/header.php';
    $firstname = $_SESSION['add-user-data']['$firstname'] ?? null;
    $lastname  = $_SESSION['add-user-data']['$lastname'] ?? null;
    $username  = $_SESSION['add-user-data']['$username'] ?? null;
    $useremail = $_SESSION['add-user-data']['$useremail'] ?? null;
    $upassword = $_SESSION['add-user-data']['$upassword'] ?? null;
    $cpassword = $_SESSION['add-user-data']['$cpassword'] ?? null;
    $role = $_SESSION['add-user-data']['$role']??null;

unset($_SESSION['add-user-data']);

?>

<section class="form_section">
    <div class="container form_container">
        <?php if(isset($_SESSION['add-user'])) { ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['add-user'];
                    unset($_SESSION['add-user'])
                        ?>
                </p>
            </div>
        <?php } ?>
        <h2>Add User</h2>
        <form action="./add-user-logic.php" method="post" enctype="multipart/form-data">
        <input type="text" name="fname" value="<?=$firstname?>" placeholder="enter first name....">
                <input type="text" name="lname" value="<?=$lastname?>" placeholder="enter last name....">
                <input type="text" name="uname" value="<?=$username?>" placeholder="enter user name....">
                <input type="email" name="uemail" value="<?=$useremail?>" placeholder="enter email....">
                <input type="password" name="upassword" value="<?=$upassword?>" placeholder="enter password....">
                <input type="password" name="cpassword" value="<?=$cpassword?>" placeholder="confirm password....">
                <select name="user_role" value="value="<?=$role?>"">
                    <option value="0">user</option>
                    <option value="1">admin</option>
                </select>
                <input type="file" name="avatar">
                <div class="submit">
                    <button type="submit" name="usubmit" class="btn">Add</button>
                </div>
        </form>
    </div>
</section>
<?php
include 'partials/footer.php';

?>