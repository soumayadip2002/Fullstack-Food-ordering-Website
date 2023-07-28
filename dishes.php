<?php 
    include './Partials/header.php';
?>
    <!-- dishes sections starts -->

<section class="dishes" id="dishes" style="margin-top:6rem;padding: 2rem 5%;">

    
    <h1 class="heading"> All dishes </h1>
    <?php if(isset($_SESSION['add-review'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['add-review'];
                    unset($_SESSION['add-review'])
                        ?>
                </p>
        </div>
    <?php } elseif(isset($_SESSION['add-review-success'])) {?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['add-review-success'];
                    unset($_SESSION['add-review-success'])
                        ?>
                </p>
        </div>
    <?php } ?>
    <?php

        $category_query = "select * from category";
        $category_result = mysqli_query($conn, $category_query);

        while($category = mysqli_fetch_assoc($category_result)){
            $cid = $category['cid'];
            
            $count_query = "select count(*) as dish_count from dish where dcategory='$cid'";
            $count_result = mysqli_query($conn, $count_query);
            $dish_count = mysqli_fetch_assoc($count_result)['dish_count'];

        if($dish_count > 0){
    ?>
        

    <h3 class="sub-heading"> <?= $category['ctitle']  ?> </h3>
    <div class="box-container" style="margin-top:2rem;">
        <?php
            $popular_query = "select * from dish where dcategory='$cid'";
            $popular_result = mysqli_query($conn, $popular_query);
        ?>
        <?php while($popular = mysqli_fetch_assoc($popular_result)) { ?>
        <div class="box">
            <a href="<?= ROOT_URL ?>favourite.php?did=<?= $popular['did']?> " class="fas fa-heart"></a>
            <a href="<?= ROOT_URL ?>cart-logic.php?did=<?= $popular['did']?>" class="fas fa-shopping-cart"></a>
            <img src="<?= ROOT_URL . 'upload/' . $popular['dpicture'] ?>" alt="">
            <h3 style="text-align-last:left;"><?= $popular['dname'] ?></h3>
            <?php
                $food_name     = $popular['dname'];
                $review_query  = "select * from rating where pname='$food_name' order by rnumber desc limit 8";
                $review_result = mysqli_query($conn, $review_query);

                $average_result = mysqli_query($conn, $review_query);
                $total_rows = mysqli_num_rows($average_result);
                $average    = 0;
                while ($review_rateing = mysqli_fetch_assoc($average_result)) {
                    $average += $review_rateing['rnumber'];
                }

                if ($total_rows > 0)
                    $average = $average / $total_rows;
                else
                    $average = 0;

                $average = (int) $average;

            ?>
            <?php if ($average == 1) { ?>
                    <div class="stars">
                        <i class="fas fa-star check"></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                    </div>
                    <?php } ?>

                    <?php if ($average == 2) { ?>
                        <div class="stars">
                            
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>
                    <?php } ?>

                    <?php if ($average == 3) { ?>
                        <div class="stars">
                            
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>
                    <?php } ?>

                    <?php if ($average == 4) { ?>
                        <div class="stars">
                             
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star "></i>
                        </div>
                    <?php } ?>

                    <?php if ($average == 5) { ?>
                        <div class="stars">
                            
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                        </div>
                    <?php } ?>
            <div style="display:grid;text-align-last:left;">
                <span>₹ <?= $popular['dprice'] ?>/- (<?= $popular['quantity'] ?>)</span>
                <a href="<?= ROOT_URL ?>Buy.php?id=<?= $popular['did'] ?>" style="width:fit-content" class="btn">order</a>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <?php } ?>
</section>
<!-- dishes sections ends -->

<script>
    const alertmessage = document.querySelector('.alert_message');

    setTimeout(() => {
        alertmessage.remove();
    }, 3000);
</script>
<?php 
    include './Partials/footer.php' 
?>