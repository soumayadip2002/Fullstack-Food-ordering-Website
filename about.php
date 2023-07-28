<?php include 'Partials/header.php' ?>


<section class="about_page">
    <div class="box-container">
        <div class="part1">
            <h1>About us</h1>
            <h2>who are we?</h2>
        </div>
    </div>

    <div class="container part2">
        <div class="image">
            <img src="./upload/chef-cooking.webp" alt="">
        </div>
        <div class="content">
            <h3>our history</h3>
            <p>In a bustling city, a group of passionate food enthusiasts came together to create a revolutionary food ordering website. 
                With dedication and innovation, they connected food lovers with their favorite restaurants effortlessly. 
                As the platform grew, it expanded its offerings, catering to diverse taste buds. Today, the website thrives, 
                spreading its wings to new cities, serving up culinary delights, one order at a time. Our history is built on love 
                for food and the joy it brings to every meal. Join us on this delectable journey as we continue to savor the flavors 
                of delicious experiences together.Through user-friendly interfaces and advanced technology, we've simplified the food
                ordering process, making it a seamless and delightful experience for all.</p>
        </div>
    </div>

    <div class="container part3" style="padding-bottom:5rem;">
        <h2>why choose us</h2>
        <div class="image">
            <div>
                <img src="./upload/freshfood.jpg" alt="">
                <h4>fresh food</h4>
            </div>
            <div>
                <img src="./upload/fast-delivery.jpg" alt="">
                <h4>fast delivery</h4>
            </div>
            <div>
                <img src="./upload/quality.jpg" alt="">
                <h4>quality measurment</h4>
            </div>
            <div>
                <img src="./upload/service.jpg" alt="">
                <h4>24/7 service</h4>
            </div>
            
        </div>
    </div>

</section>

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

<?php include 'Partials/footer.php' ?>