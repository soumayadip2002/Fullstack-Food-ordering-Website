<?php
    include 'partials/header.php';
    if(isset($_GET['uid'])){
        $id = $_GET['uid'];
        $query = "SELECT * from users where uid='$id'";
        $result = mysqli_query($conn, $query);

        $user = mysqli_fetch_assoc($result);
    }

?>

<section class="form_section">
    <div class="container form_container">
        <h2>Edit User</h2>
        <form action="./edit-user-logic.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="uid" value="<?= $user['uid']?>">
                <input type="hidden" name="previous_avatar_name" value="<?= $user['avatar']?>">
                <input type="text" name="fname" value="<?= $user['fname']?>" placeholder="first name....">
                <input type="text" name="lname" value="<?= $user['lname']?>"  placeholder="last name....">
                <input type="text" name="uname" value="<?= $user['uname']?>" placeholder="user name....">
                <input type="email" name="uemail" value="<?= $user['email']?>" placeholder="email....">
                <select name="user_role">
                    <?php if(($user['is_admin'])==1) { ?>
                        <option value="1">admin</option>
                        <option value="0">user</option>
                    <?php } else { ?>
                        <option value="0">user</option>
                        <option value="1">admin</option>
                    <?php } ?>

                </select>
                <input type="file" name="avatar">
                <div class="submit">
                    <button type="submit" name="user_submit" class="btn">Edit</button>
                </div>
        </form>
    </div>
</section>
<?php
include 'partials/footer.php';

?>