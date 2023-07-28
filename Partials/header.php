<?php
require './config/database.php';
if (isset($_SESSION['user-id'])) {
    $user_id = $_SESSION['user-id'];
    $query   = "SELECT avatar from users where uid='$user_id'";
    $result  = mysqli_query($conn, $query);
    $avatar  = mysqli_fetch_assoc($result);
}


function isPageActive($page)
{
    $current_page = $_SERVER['PHP_SELF'];
    return strpos($current_page, $page) !== false ? 'activepage' : '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Shop</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <link rel="icon" href="<?= ROOT_URL . 'upload/' . 'logo.jpg' ?>">

</head>

<body>
    <!-- header section starts -->
    <header>
        <a href="#" class="logo"><i class="fas fa-utensils"></i>Food</a>

        <nav class="navbar">
            <a href="<?= ROOT_URL ?>" class="<?= isPageActive('/index.php') ?>">home</a>
            <a href="<?= ROOT_URL ?>about.php"  class="<?= isPageActive('/about.php') ? 'activepage':'' ?>" >about</a>
            <a href="<?= ROOT_URL ?>dishes.php"  class="<?= isPageActive('/dishes.php') ? 'activepage':'' ?>">dishes</a>
            <a href="<?= ROOT_URL ?>all-reviews.php"  class="<?= isPageActive('/all-reviews.php') ? 'activepage':'' ?>">reviews</a>
            <a href="<?= ROOT_URL ?>order.php"  class="<?= isPageActive('/order.php') ? 'activepage':'' ?>">order</a>
        </nav>

        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"  style="border-radius: 50%; border:none;line-height: 4.5rem;"></i>
            <i class="fas fa-search" id="search-icon" style="border-radius: 50%; border:none;line-height: 4.5rem;"></i>
            <li><a href="<?= ROOT_URL ?>favourite_items.php" style="border-radius: 50%; border:none;line-height: 4.5rem;" class="fas fa-heart"></a></li>
            <li> <a href="<?= ROOT_URL ?>cart.php" style="border-radius: 50%; border:none;line-height: 4.5rem;" class="fas fa-shopping-cart"></a></li>
            <?php if (isset($_SESSION['user-id'])) { ?>
                <li class="nav_profile">
                    <div class="avatar">
                        <img src="<?= ROOT_URL . 'upload/' . $avatar['avatar'] ?>" alt="">
                    </div>

                    <ul>
                        <?php if (isset($_SESSION['user-admin'])) { ?>
                            <li><a href="admin/">dashboard</a></li>
                        <?php } ?>
                        <li><a href="logout.php" onclick="window.location.reload(true);">logout</a></li>
                    </ul>
                </li>
            <?php } else { ?>
                <a href="<?= ROOT_URL ?>signin.php" class="fas fa-user" style="border-radius: 50%; border:none;line-height: 4.5rem;"></a>
            <?php } ?>
        </div>
    </header>
    <!-- header section ends -->

    <!-- search form starts -->

    <form action="<?= ROOT_URL ?>search.php" id="search-form" method="get">
        <input type="search" placeholder="Search by food name......" name="search" id="search-box">
        <button type="submit" name="submit" class="btn">search</button>
        <i class="fas fa-times" id="close"></i>
    </form>
    <!-- search form ends -->