<?php
    include 'partials/header.php';
    $current_admin = $_SESSION['user-id'];
    $query = "SELECT * from users where not uid='$current_admin'";
    $users  = mysqli_query($conn, $query);
?>


<section class="dashboard" style="width: 100vw;">

    <?php if (isset($_SESSION['add-user-success'])) { ?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['add-user-success'];
                    unset($_SESSION['add-user-success'])
                        ?>
                </p>
            </div>
    <?php } ?>

    <?php if (isset($_SESSION['edit-user-success'])) { ?>
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success'])
                    ?>
            </p>
        </div>
    <?php } elseif (isset($_SESSION['edit-user'])) { ?>
        <div class="alert_message error">
            <p>
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user'])
                    ?>
            </p>
        </div>
    <?php } ?>

    <?php if(isset($_SESSION['delete-user-success'])) { ?>
        <div class="alert_message success container">
            <p>
                <?= $_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success'])
                    ?>
            </p>
        </div>
    <?php } elseif(isset($_SESSION['delete-user-error'])) {?>
        <div class="alert_message error">
            <p>
                <?= $_SESSION['delete-user-error'];
                unset($_SESSION['delete-user-error'])
                    ?>
            </p>
        </div>
    <?php } ?>
    <div class="container dashboard_container">
        <button  class="side_bar" id="show_side"><i class="fa-solid fa-angle-right"></i></button>
        <button  class="side_bar" id="hide_side"><i class="fa-solid fa-angle-left"></i></button>
        <aside>
            <ul>
                <li>
                    <a href="./add-dish.php">
                        <i class="uil uil-pizza-slice"></i>
                        <h5>add dish</h5>
                    </a>
                </li>

                <li>
                    <a href="./index.php">
                        <i class="uil uil-restaurant"></i>
                        <h5>manage dishes</h5>
                    </a>
                </li>

                <li>
                    <a href="./add-user.php">
                        <i class="uil uil-user"></i>
                        <h5>add user</h5>
                    </a>
                </li>

                <li>
                    <a href="./manage-user.php" class="active">
                        <i class="uil uil-users-alt"></i>
                        <h5>manage users</h5>
                    </a>
                </li>

                <li>
                    <a href="./add-category.php">
                        <i class="uil uil-edit"></i>
                        <h5>add category</h5>
                    </a>
                </li>

                <li>
                    <a href="./manage-category.php">
                        <i class="uil uil-list-ul"></i>
                        <h5>manage categories</h5>
                    </a>
                </li>
            </ul>
        </aside>

        <main>
            <h2>Manage Users</h2>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>photo</th>
                        <th>username</th>
                        <th>Admin</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                    </tr>
                </thead>

                <tbody>
                <?php while ($user = mysqli_fetch_assoc($users)) { ?>
                    <tr>
                        <td><?php echo $user['fname'] . "\n" . $user['lname'] ?></td>
                        <td><img src="<?= ROOT_URL . 'upload/'. $user['avatar'] ?>" alt="" style="height:7rem;"></td>
                        <td><?= $user['uname'] ?></td>
                        <?php if (($user['is_admin']) == 1) { ?>
                            <td>Yes</td>
                        <?php } else { ?>
                            <td>No</td>
                        <?php } ?>
                        <td><a href="<?php echo ROOT_URL ?>admin/edit-user.php?uid=<?= $user['uid'] ?>" class="sam"><i class="uil uil-edit-alt"></i></a></td>
                        <td><a href="<?php echo ROOT_URL ?>admin/delete-user.php?uid=<?= $user['uid'] ?>" class="sam danger"><i class="uil uil-trash-alt"></i></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</section>




<?php
include 'partials/footer.php';
?>