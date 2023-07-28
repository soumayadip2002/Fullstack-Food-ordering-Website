<?php 
    include './Partials/header.php';
?>
    <!-- dishes sections starts -->

<section class="dishes" id="dishes" style="margin-top:6rem;padding: 2rem 5%;">

    
    <h1 class="heading"> Today's Special </h1>
    <div class="box-container" style="margin-top:2rem;">
        <?php
            $popular_query = "select * from dish where is_today=1";
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
            <p style="text-align:justify;hyphens: auto; color:#ccc;font-size:1.5rem;border-bottom:.1rem solid rgb(0, 0, 0, .3);padding:0.5rem 0;"><?= substr($popular['description'], 0, 50) ?>...<a href="<?= ROOT_URL ?>Buy.php?id=<?= $popular['did'] ?>" style="color:#FF52A2;font-size:1.5rem">read more</a></p>
                <span>₹ <?= $popular['dprice'] ?>/-</span>
                <a href="<?= ROOT_URL ?>Buy.php?id=<?= $popular['did'] ?>" style="width:fit-content" class="btn">order</a>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<!-- dishes sections ends -->

<?php 
    include './Partials/footer.php' 
?>