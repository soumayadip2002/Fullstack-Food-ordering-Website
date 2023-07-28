<?php 
    include 'partials/header.php';
    if(isset($_GET['cid'])){
        $id = $_GET['cid'];
        $get_query = "SELECT * from category where cid='$id'";
        $get_result = mysqli_query($conn, $get_query);
        $get_categories = mysqli_fetch_assoc($get_result);
        $description = strip_tags($get_categories['cdescription']);
    }
?>

<section class="form_section">
    <?php if(isset($_SESSION['edit-category'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['edit-category'];
                    unset($_SESSION['edit-category'])
                        ?>
                </p>
        </div>
    <?php } ?>
    <div class="container form_container">
        <h2>Edit category</h2>
        <form action="./edit-category-logic.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $get_categories['cid'] ?>">
            <input type="text" name="title" value="<?= $get_categories['ctitle'] ?>" placeholder="enter category name...">
            <textarea rows="10" name="cdesc" cols="" placeholder="write something special about it..."><?= $description ?></textarea>

            <div class="submit">
                <button type="submit" name="submit" class="btn">edit</button>
            </div>
        </form>
    </div>
</section>
<?php 
    include 'partials/footer.php';
?>

