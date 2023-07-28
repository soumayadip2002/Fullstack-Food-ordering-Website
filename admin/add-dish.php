<?php
    include 'partials/header.php';
    $category_query = "SELECT * from category";
    $category_result = mysqli_query($conn, $category_query);
    $dname = $_SESSION['add-dish-data']['dname'] ?? null;
    $dprice = $_SESSION['add-dish-data']['dprice'] ?? null;
    $dquantity = $_SESSION['add-dish-data']['dquantity'] ?? null;
    $description =$_SESSION['add-dish-data']['cdesc'] ?? null;
    $type = $_SESSION['add-dish-data']['type'] ?? null;
    $ingredients = $_SESSION['add-dish-data']['ingredients'] ?? null;
    $ingredients = mysqli_real_escape_string($conn, $ingredients);
    $description = mysqli_real_escape_string($conn, $description);

    unset($_SESSION['add-dish-data']);
?>

<section class="form_section">
    <?php if(isset($_SESSION['add-dish'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['add-dish'];
                    unset($_SESSION['add-dish'])
                        ?>
                </p>
        </div>
    <?php } ?>
    <div class="container form_container">
        <h2>Add Dish</h2>
        <form action="./add-dish-logic.php" method="post" enctype="multipart/form-data">
            <input type="text" name="dname" value="<?= $dname ?>" placeholder="enter dish name...">
            <input type="number" name="dprice" value="<?= $dprice ?>" placeholder="enter dish price....">
            <input type="text" name="dquantity" value="<?= $dquantity ?>" placeholder="enter quantity of dish....">
            <select name="dcategory">
                <option selected disabled>select category</option>
                <?php while($category = mysqli_fetch_assoc($category_result)) {?>
                    <option value="<?= $category['cid'] ?>"><?= $category['ctitle'] ?></option>
                <?php } ?>
            </select>
            <select name="type" value=<?= $ingredients ?>>
                <option selected disabled>select type</option>
                <option value="veg">Veg</option>
                <option value="non-veg">Non-Veg</option>
            </select>
            <textarea rows="5" name="ingredients" cols="" placeholder="write ingredients of it..."><?= $ingredients ?></textarea>
            <textarea rows="10" name="cdesc" cols="" placeholder="write something special about it..."><?= $description ?></textarea>
            <div class="form_control inline">
                <label><input type="checkbox" name="is_featured" value="1"   onclick="clickCheckBox(this)" class="mycheckbox">  Featured</label>
                <label><input type="checkbox" name="is_popular" value="1"  onclick="clickCheckBox(this)" class="mycheckbox">  Popular</label>
                <label><input type="checkbox" name="is_today_special" value="1"  onclick="clickCheckBox(this)" class="mycheckbox">  Today's Special</label>
            </div>

            

            <div class="form_control">
                <label for="thumbnail">add thumbnail</label>
                <input type="file" name="thumbnail" value="">
            </div>

            <div class="submit">
                <button type="submit" name="submit" class="btn">Add</button>
            </div>
        </form>
    </div>
</section>
<?php
include 'partials/footer.php';

?>