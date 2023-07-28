<?php 
    include 'Partials/header.php';
?>

<section class="all_review " id="review">
    <h3 class="sub-heading "> customer's review </h3>
    <h1 class="heading "> what they say </h1>

    <?php
        $review_query = "select * from rating group by cname";
        $review_result = mysqli_query($conn, $review_query);
    ?>
    <div class="all_review-container">
            <?php  while($review = mysqli_fetch_assoc($review_result)) { ?>
            <div class="all_review_slide">
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
                        </div>
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

                    <small><?= $review['pname'] ?></small>
                    </div>
                    
                </div>

                <p><?= $review['cdescription']?></p>
            </div>
            <?php } ?>
    </div>
</section>


<?php
    include 'Partials/footer.php';
?>