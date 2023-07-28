<?php
    include 'partials/header.php';
    $query = "SELECT * from category";
    $result = mysqli_query($conn, $query);
?>


<section class="dashboard" style="width: 100vw;">
    <?php if(isset($_SESSION['category-add-success'])) { ?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['category-add-success'];
                    unset($_SESSION['category-add-success'])
                        ?>
                </p>
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['edit-category'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['edit-category'];
                    unset($_SESSION['edit-category'])
                        ?>
                </p>
        </div>
    <?php } elseif(isset($_SESSION['edit-category-success'])){?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['edit-category-success'];
                    unset($_SESSION['edit-category-success'])
                        ?>
                </p>
        </div>
    <?php } ?>

    <?php if(isset($_SESSION['delete-category'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['delete-category'];
                    unset($_SESSION['delete-category'])
                        ?>
                </p>
        </div>
    <?php } elseif(isset($_SESSION['delete-category-success'])){?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['delete-category-success'];
                    unset($_SESSION['delete-category-success'])
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
                    <a href="./manage-category.php"  class="active">
                        <i class="uil uil-list-ul"></i>
                        <h5>manage categories</h5>
                    </a>
                </li>
            </ul>
        </aside>

        <main>
            <h2>Manage Categories</h2>

            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($category = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><?php echo $category['ctitle'] ?></td>
                        <td><a href="<?php echo ROOT_URL ?>admin/edit-category.php?cid=<?= $category['cid'] ?>" class="sam"><i class="uil uil-edit-alt"></i></a></td>
                        <td><a href="<?php echo ROOT_URL ?>admin/delete-category.php?cid=<?= $category['cid'] ?>" class="sam danger"><i class="uil uil-trash-alt"></i></a></td>
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