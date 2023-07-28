<?php
    include 'Partials/header.php';
    if(isset($_GET['submit']) && $_GET['search']){
        $search = $_GET['search'];
        $search_query = "select * from dish where dname  like '%$search%'";
        $search_result = mysqli_query($conn, $search_query);
    }
    else{
        header('location: ' . ROOT_URL);
    }
?>

<!-- dishes sections starts -->

<section class="dishes" id="dishes" style="margin-top:6rem;">
    
    <?php if(mysqli_num_rows($search_result)>0) {?>
        <h3 class="sub-heading" style="padding:2rem;"> <?= "search item for $search" ?> </h3>
    <div class="box-container">
        <?php while($popular = mysqli_fetch_assoc($search_result)) { ?>
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
                    <?= "No food item found for $search" ?>
                </p>
        </div>
    <?php } ?>
</section>
<!-- dishes sections ends -->



<?php
    include 'Partials/footer.php';
?>