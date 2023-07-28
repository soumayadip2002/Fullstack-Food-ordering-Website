<?php 
    include 'partials/header.php';
    $title = $_SESSION['category-add-data']['$title'] ?? null;
    $description = $_SESSION['category-add-data']['$description'] ?? null;

?>

<section class="form_section">
    <div class="container form_container">
        <?php if(isset($_SESSION['category-add'])) {?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['category-add'];
                    unset($_SESSION['category-add'])
                    ?>
                </p>
            </div>
        <?php } ?>
        <h2>Add category</h2>
        <form action="./add-category-logic.php" method="post" enctype="multipart/form-data">
            <input type="text" name="ctitle" value="<?= $title ?>" placeholder="enter category name...">
            <textarea rows="10" name="cdesc" value="<?= $description ?>" cols="" placeholder="write something special about it..."></textarea>

            <div class="submit">
                <button type="submit" name="submit" class="btn">Add</button>
            </div>
        </form>
    </div>
</section>
<?php 
    include 'partials/footer.php';

?>