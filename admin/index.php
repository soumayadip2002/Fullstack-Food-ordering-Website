<?php
    include 'partials/header.php';
    $dish_query = "SELECT * from dish";
    $dish_result = mysqli_query($conn, $dish_query);

?>


<section class="dashboard">
    <?php if(isset($_SESSION['user-admin'])) {?>
    <?php if(isset($_SESSION['add-dish-success'])) {?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['add-dish-success'];
                    unset($_SESSION['add-dish-success'])
                        ?>
                </p>
        </div>
    <?php } ?>

    <?php if(isset($_SESSION['edit-dish'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['edit-dish'];
                    unset($_SESSION['edit-dish'])
                        ?>
                </p>
        </div>
    <?php } elseif(isset($_SESSION['edit-dish-success'])) {?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['edit-dish-success'];
                    unset($_SESSION['edit-dish-success'])
                        ?>
                </p>
        </div>
    <?php } ?>

    <?php if(isset($_SESSION['delete-dish'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['delete-dish'];
                    unset($_SESSION['delete-dish'])
                        ?>
                </p>
        </div>
    <?php } elseif(isset($_SESSION['delete-dish-success'])) {?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['delete-dish-success'];
                    unset($_SESSION['delete-dish-success'])
                        ?>
                </p>
        </div>
    <?php } ?>
    <div class="dashboard_container">
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
                    <a href="./index.php" class="active">
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
                    <a href="./manage-user.php">
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
            <h2>Manage Dishes</h2>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>category</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php  while($dish = mysqli_fetch_assoc($dish_result)) { ?>
                        <?php 
                            $cid = $dish['dcategory'];
                            $query = "select * from category where cid='$cid'";
                            $result = mysqli_query($conn, $query);
                            $category = mysqli_fetch_assoc($result);
                        
                        ?>
                    <tr>
                        <td><?php echo $dish['dname'] ?></td>
                        <td><?php echo $category['ctitle']  ?></td>
                        <td><?php echo $dish['dprice'] ?></td>
                        <td><a href="<?= ROOT_URL ?>admin/edit-dish.php?did=<?= $dish['did'] ?>" class="sam"><i class="uil uil-edit-alt"></i></a></td>
                        <td><a href="<?= ROOT_URL ?>admin/delete-dish.php?did=<?= $dish['did'] ?>" class="sam danger"><i class="uil uil-trash-alt"></i></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>

    <?php } ?>
</section>




<?php 
    include 'partials/footer.php';
?>