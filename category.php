<?php
    include 'Partials/header.php';
    if(isset($_GET['cid'])){
        $cid = $_GET['cid'];
        $query = "select * from category where cid='$cid'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==1){
            $category = mysqli_fetch_assoc($result);
            $category_query = "select * from dish where dcategory='$cid'";
            $category_result = mysqli_query($conn, $category_query);
        }

    }
?>
<section class="dishes" id="dishes" style="margin-top:6rem;">
<h3 class="sub-heading"> <?= $category['ctitle'] ?> </h3>
    <?php if(mysqli_num_rows($category_result)>0) {?>
    <div class="box-container">
        <?php while($popular = mysqli_fetch_assoc($category_result)) { ?>
            <?php
                $food_name = $popular['dname'];
                $review_query_rating  = "select * from rating where pname='$food_name'";
                $average_result = mysqli_query($conn, $review_query_rating);
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
            
        <div class="box">
            <a href="<?= ROOT_URL ?>favourite.php?did=<?= $popular['did'] ?>" class="fas fa-heart"></a>
            <a href="<?= ROOT_URL ?>cart-logic.php?did=<?= $popular['did'] ?>" class="fas fa-shopping-cart"></a>
            <img src="<?= ROOT_URL . 'upload/' . $popular['dpicture'] ?>" alt="">
            <h3 style="text-align-last:left;"><?= $popular['dname'] ?></h3>

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
                            <i class="fas fa-star"></i>
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
                <a href="<?= ROOT_URL ?>Buy.php?id=<?=$popular['did']?>" style="width:fit-content" class="btn">order</a>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } else{ ?>
        <div class="alert error container">
                <p>
                    There is no current item for this category
                </p>
        </div>
    <?php } ?>
</section>
<!-- dishes sections ends -->

<?php include 'Partials/footer.php' ?>