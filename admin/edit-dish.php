<?php
    include 'partials/header.php';
    $category_query = "SELECT * from category";
    $category_result = mysqli_query($conn, $category_query);

    if(isset($_GET['did'])){
        $id = $_GET['did'];
        $query = "select * from dish where did='$id'";
        $result = mysqli_query($conn, $query);
        $dish = mysqli_fetch_assoc($result);

    }

?>

<section class="form_section">
    <?php if(isset($_SESSION['edit-dish'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['edit-dish'];
                    unset($_SESSION['edit-dish'])
                        ?>
                </p>
        </div>
    <?php } ?>
    <div class="container form_container">
        <h2>Update Dish</h2>
        <form action="./edit-dish-logic.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="did" value="<?= $dish['did'] ?>">
            <input type="hidden" name="previous_pic" value="<?= $dish['dpicture'] ?>">
            <input type="text" name="dname" value="<?= $dish['dname'] ?>" placeholder="enter dish name...">
            <input type="number" name="dprice" value="<?= $dish['dprice'] ?>" placeholder="enter dish price....">
            <input type="text" name="dquantity" value="<?= $dish['quantity'] ?>" placeholder="enter quantity of dish....">
            <select name="dcategory">
                <?php while($category = mysqli_fetch_assoc($category_result)) {?>
                    <option value="<?= $category['cid'] ?>"><?= $category['ctitle'] ?></option>
                <?php } ?>
            </select>
            <select name="type" value=<?= $dish['type'] ?>>
                <option selected disabled>select type</option>
                <option>Veg</option>
                <option>Non-Veg</option>
            </select>
            <textarea rows="5" name="ingredients" cols="" placeholder="write ingredients of it..."><?= $dish['ingredients'] ?></textarea>
            <textarea rows="10" name="cdesc" cols="" placeholder="write something special about it..."><?= $dish['description'] ?></textarea>
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
                <button type="submit" name="submit" class="btn">update</button>
            </div>
        </form>
    </div>
</section>
<?php
include 'partials/footer.php';

?>