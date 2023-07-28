<?php
    include './Partials/header.php';

?>

<!-- home section starts -->
<section class="home" id="home">
    <?php
        $feature_query = "select * from dish where is_featured=1";
        $feature_result = mysqli_query($conn, $feature_query);
    ?>
    <div class="swiper home-slider">
        
        <div class="swiper-wrapper wrapper">
        <?php while($feature=mysqli_fetch_assoc($feature_result)) {?>
            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3><?= $feature['dname'] ?></h3>
                    <p><?= $feature['description'] ?>
                    </p>
                    <a href="<?= ROOT_URL ?>Buy.php?id=<?=$feature['did']?>" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="<?= ROOT_URL . 'upload/' . $feature['dpicture'] ?>" alt="">
                </div>
            </div>
            <?php } ?>
        </div>
        
        <div class="swiper-pagination"></div>
    </div>
</section>
<!-- home section ends -->

<!-- about section starts -->
<section class="about " id="about">
    <h3 class="sub-heading "> about us </h3>
    <h1 class="heading "> why choose us? </h1>

    <div class="row ">
        <div class="image ">
            <img src="./upload/biriyani.png " alt=" ">
        </div>


        <div class="content ">
            <h3>best food in the country</h3>
            
            <p>Welcome to our food ordering website, your ultimate destination for a delightful culinary experience. Indulge in a diverse array of mouthwatering cuisines, carefully curated to tantalize your taste buds. With a user-friendly interface, ordering your favorite dishes has never been easier. Whether you crave the comforting flavors of traditional dishes or the exciting twists of modern cuisine, we have something for everyone. Join us on this gastronomic journey, and let our top-notch services and delectable offerings make your dining experience truly unforgettable.</p>
            <a href="<?= ROOT_URL ?>about.php" class="btn ">learn more</a>
        </div>
    </div>
</section>

<!-- about section ends -->

<!-- menu section starts -->

<section class="menu " id="menu">
    <h3 class="sub-heading "> our menu </h3>
    <h1 class="heading "> today's special</h1>
    <?php 
        $select_dish = "select * from dish where is_today=1 limit 3";
        $select_dish_result = mysqli_query($conn, $select_dish);
    ?>
    <div class="box-container ">
        <?php while($special = mysqli_fetch_assoc($select_dish_result)) { ?>
        <div class="box">
            <div class="image ">
                <img src="<?= ROOT_URL . 'upload/' . $special['dpicture'] ?>" alt=" ">
                <a href="<?= ROOT_URL ?>favourite.php?did=<?= $special['did']?> " class="fas fa-heart "></a>
                <a href="<?= ROOT_URL ?>cart-logic.php?did=<?= $special['did']?> " class="fas fa-shopping-cart"></a>
            </div>

            <div class="content ">
            <?php
                $food_name = $special['dname'];
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
                <h3><?php echo $special['dname'] ?></h3>
                <p style="text-align:justify;hyphens: auto;"><?php echo $special['description'] ?></p>
                <span class="price ">₹ <?php echo $special['dprice'] ?>/- (<?= $special['quantity'] ?>)</span>
                <a  href="<?= ROOT_URL ?>Buy.php?id=<?=$special['did']?>" class="btn ">Order</a>

            </div>
        </div>
        <?php  } ?>
    </div>
    <div class="read_more">
           <a href="<?= ROOT_URL ?>special_dish.php">see more <i class="uil uil-arrow-right"></i></a>
    </div>
</section>

<!-- menu section ends -->

<!-- dishes sections starts -->

<section class="dishes" id="dishes">

    <h3 class="sub-heading"> our dishes </h3>
    <h1 class="heading"> popular dishes </h1>
    <?php
        $popular_query = "select * from dish where is_popular=1 limit 8";
        $popular_result = mysqli_query($conn, $popular_query);
        
    ?>
    <div class="box-container">
        <?php while($popular = mysqli_fetch_assoc($popular_result)) { ?>
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
    <div class="read_more">
           <a href="<?= ROOT_URL ?>popular_dish.php">see more <i class="uil uil-arrow-right"></i></a>
    </div>
</section>
<!-- dishes sections ends -->



<section class="review " id="review">
    <h3 class="sub-heading "> customer's review </h3>
    <h1 class="heading "> what they say </h1>

    <?php
        $review_query = "select * from rating where rnumber>=4  GROUP BY cname  limit 8";
        $review_result = mysqli_query($conn, $review_query);
    ?>
    <div class="swiper review-slider ">
        <div class="swiper-wrapper ">
            <?php  while($review = mysqli_fetch_assoc($review_result)) { ?>
            <div class="swiper-slide slide ">
                <i class="fas fa-quote-right "></i>
                <div class="user ">
                    <img src="<?= ROOT_URL . 'upload/' . $review['picture'] ?>" alt=" ">
                    <div class="user-info ">
                        <h3><?= $review['cname'] ?></h3>
                    <?php $reviewer = $review['rnumber'] ?>
                    <?php if ($reviewer == 1) { ?>
                    <div class="stars">
                        
                        <i class="fas fa-star check"></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                    </div>
                    <?php } ?>

                    <?php if ($reviewer == 2) { ?>
                        <div class="stars">
                            
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>
                    <?php } ?>

                    <?php if ($reviewer == 3) { ?>
                        <div class="stars">
                            
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                    <?php } ?>

                    <?php if ($reviewer == 4) { ?>
                        <div class="stars">
                             
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star "></i>
                        </div>
                    <?php } ?>

                    <?php if ($reviewer == 5) { ?>
                        <div class="stars">
                            
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <p><?= substr($review['cdescription'],0, 150) ?>...</p>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="read_more">
           <a href="<?= ROOT_URL ?>all-reviews.php">see more <i class="uil uil-arrow-right"></i></a>
    </div>
</section>
<!-- Review Section ends -->


<section class="category">
    <h2>categories</h2>
    <?php
        $category_query = "SELECT * from category";
        $category_result = mysqli_query($conn, $category_query);
    ?>
    <div class="container cat">
        <?php while($category = mysqli_fetch_assoc($category_result)) { ?>
            <a href="<?= ROOT_URL ?>category.php?cid=<?= $category['cid'] ?>" class="btn"><?= $category['ctitle'] ?></a>
        <?php } ?>
    </div>
</section>

<?php
include './Partials/footer.php';
?>
