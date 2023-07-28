<?php
include './Partials/header.php';
if (isset($_GET['id'])) {
    $id     = $_GET['id'];
    $query  = "select * from dish where did='$id'";
    $result = mysqli_query($conn, $query);
    $dish   = mysqli_fetch_assoc($result);
}

?>
<?php
    $food_name     = $dish['dname'];
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
<section class="buy">
    <div class="box-container">
        <div class="image">
            <img src="./upload/<?= $dish['dpicture'] ?>" alt="">
        </div>
        <div class="details" style="display:grid;">
            <h1><?= $dish['dname'] ?></h1>
            <p><?= $dish['description'] ?></p>
            <?php if (mysqli_num_rows($review_result) > 0) { ?>
                <?php if ($average == 1) { ?>
                    <div class="stars">
                        <span style="font-size: 1.7rem;color: #A1CCD1;font-weight:bold;">Rating - </span>
                        <i class="fas fa-star check"></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <small>review - Very Poor 🤢🤢</small>
                    </div>
                    <?php } ?>

                    <?php if ($average == 2) { ?>
                        <div class="stars">
                            <span style="font-size: 1.7rem;color: #A1CCD1;font-weight:bold;">Rating - </span>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>
                        <small>review - Poor 😥😥</small>
                    <?php } ?>

                    <?php if ($average == 3) { ?>
                        <div class="stars">
                            <span style="font-size: 1.7rem;color: #A1CCD1;font-weight:bold;">Rating - </span>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>
                        <small>review - Average 🙂🙂</small>
                    <?php } ?>

                    <?php if ($average == 4) { ?>
                        <div class="stars">
                            <span style="font-size: 1.7rem;color: #A1CCD1;font-weight:bold;">Rating - </span> 
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star "></i>
                        </div>
                        <small>review - Good 🍕🍕</small>
                    <?php } ?>

                    <?php if ($average == 5) { ?>
                        <div class="stars">
                            <span style="font-size: 1.7rem;color: #A1CCD1;font-weight:bold;">Rating - </span>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                        </div>
                        <small>review - Excellent 😋😋</small>
                    <?php } ?>
            <?php } ?>
            <div class="quantity" style="display:flex; align-items:center; gap:1rem;">
                <p>quantity</p>
                <a class="minus" style="font-size:1.5rem; background:#EF6262;padding:0 .5rem;"> <i class="uil uil-minus"></i> </a>
                <input type="text" id="quan" value="1" name="quan" style="width: 40px;text-align: center;padding:.3rem .5rem;">
                <a style="font-size:1.5rem;background:#EF6262;padding:0 .5rem;" class="plus"> <i class="uil uil-plus"></i> </a>
            </div>
            <p style="color:#EF6262; fon-size:1.5rem">price - ₹ <span class="price"><?= $dish['dprice'] ?></span>/-</p>
            <p style="color:#FF9EAA; fon-size:1.4rem" ><span class="measure"><?= substr($dish['quantity'],0,1) ?></span> <?= substr($dish['quantity'], 2, strlen($dish['quantity'])) ?></p>
            <h3 style="font-size:1.7rem;color:#ccc; padding:.5rem 0; border-bottom:.1rem solid rgb(0, 0, 0, .3)"><?= $dish['type'] ?></h3>
            <small style="font-size:1.6rem;color:#fff; padding:.5rem 0; border-bottom:.1rem solid rgb(0, 0, 0, .3)"><span style="color:cornflowerblue">ingredients -</span> <?= $dish['ingredients'] ?></small>
            <div style="padding:.5rem 0;">
                <?php 
                if (isset($_SESSION['user-id'])) { ?>
                    <a class="btn" id="open_order" style="width:fit-content;">Order</a>
                <?php } else { ?>
                    <a class="btn" onclick="alert('you must have to log in to place order')" style="width:fit-content;">Order</a>;
                <?php } ?>
            </div>
            
        </div>
    </div>

    
    <div class="review_product">
    <?php if (mysqli_num_rows($review_result) > 0) { ?>
        <h2>rated by our valuable customers - </h2>        
        <div class="review_slide">
        <?php while ($review = mysqli_fetch_assoc($review_result)) { ?>
            <div class="user ">
                <img src="<?= ROOT_URL . 'upload/' . $review['picture'] ?>" alt=" ">
                <div class="user-info ">
                    <h3><?= $review['cname'] ?></h3>
                    <?php
                    $rating = $review['rnumber'];

                    ?>
                    <?php if ($rating == 1) { ?>
                        <div class="stars">
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>
                        <small>Very Poor 🤢🤢</small>
                    <?php } ?>

                    <?php if ($rating == 2) { ?>
                        <div class="stars">
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>
                        <small>Poor 😥😥</small>
                    <?php } ?>

                    <?php if ($rating == 3) { ?>
                        <div class="stars">
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>
                        <small>Average 🙂🙂</small>
                    <?php } ?>

                    <?php if ($rating == 4) { ?>
                        <div class="stars">
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star "></i>
                        </div>
                        <small>Good 🍕🍕</small>
                    <?php } ?>

                    <?php if ($rating == 5) { ?>
                        <div class="stars">
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                            <i class="fas fa-star check"></i>
                        </div>
                        <small>Excellent 😋😋</small>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>

    
</section>

<!-- order section starts -->
<section class="order"style="background-color: rgba(0, 0, 0, 0.5);">

<?php if(isset($_SESSION['user-id'])) {
        $user_id = $_SESSION['user-id'];?>
<?php } ?>
    <form action="./order-logic.php" method="post">
        <div class="inputbox ">
            <div class="input ">
                <span>your name</span>
                <input type="hidden" name="uid" value="<?= $user_id ?>">
                <input type="hidden" name="did" value="<?= $dish['did'] ?>">
                <input type="text" name="uname" placeholder="enter your name" required>
            </div>
            <div class="input ">
                <span>your email</span>
                <input type="email" name="unumber" placeholder="enter your email" required>
            </div>
        </div>

        <div class="inputbox ">
            <div class="input ">
                <span>food name</span>
                <input type="text" disabled value="<?= $dish['dname'] ?>">
                <input type="hidden" name="udname" value="<?= $dish['dname'] ?>">
            </div>

            <div class="input ">
                <span>price</span>
                <input type="text" disabled name="fprice" value="<?= $dish['dprice']?>">
                <input type="hidden" name="price_food" value="<?= $dish['dprice']?>">
            </div>
        </div>

        <div class="inputbox ">
            <div class="input ">
                <span>quantity</span>
                <input type="number" disabled name="fquan" value="<?= substr($dish['quantity'], 0, 1) ?>">
                <input type="hidden" name="quan_food" value="<?= substr($dish['quantity'], 0, 1) ?>">
            </div>

            <div class="input ">
                <span>Type</span>
                <input type="text" disabled value="<?= $dish['type'] ?>">
                <input type="hidden" name="food_type" value="<?= $dish['type'] ?>">
            </div>
        </div>
        <div class="inputbox ">
            <div class="input ">
                <span>payment mode</span>
                <select name="payment_mode" required>
                    <option value="">select an option</option>
                    <option value="cash-on-delivery">cash on delivery</option>
                    <option value="upi">upi</option>
                </select>
            </div>

            <div class="input">
                <span>pincode</span>
                <input type="text"  name="pincode" value="" placeholder="enter pin code..." required>
            </div>
        </div>
        <div class="inputbox" style="justify-content:center;flex-wrap:nowrap;">
            <div class="input " style="width:100%;">
                <span>your address</span>
                <textarea name="address" id=" " cols="30 " placeholder="enter your address " rows="10" required ></textarea>
            </div>
        </div>

        <div class="inputbox" style="display:flex;justify-content:center;gap:2rem;">
            <button type="submit" name="uosubmit" class="btn">order</button>
            <a class="btn" id="close_order">close</a>         
        </div>


    </form>

</section>
<!-- order section ends -->

<section class="form_section">
    <?php

    ?>
        <div class="container form_container">
            <h2>Rate this Food</h2>
            <form action="./review-logic.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="foodname" value="<?= $dish['dname'] ?>">
                    <input type="text"  name="rate" value=""  placeholder="rate food from 1 to 5....">
                    <textarea rows="10" name="review" cols="" placeholder="write review about that food...."></textarea>
                    <div class="submit">
                        <button type="submit" name="rate_submit" class="btn">submit</button>
                    </div>
            </form>
        </div>
</section>
<script>

    const open_order = document.querySelector('#open_order');
    const close_order = document.querySelector('#close_order');
    const order = document.querySelector('.order');

    open_order.addEventListener('click', ()=>{
        order.classList.add('open');
    });

    close_order.addEventListener('click', ()=>{
        order.classList.remove('open');
    });

    const increase = document.querySelector('.plus');
    const decrease = document.querySelector('.minus');
    let quantity = document.getElementsByName('quan')[0];
    let food_price =document.getElementsByName('price_food')[0];
    let food_quan = document.getElementsByName('quan_food')[0];

    let fprice =document.getElementsByName('fprice')[0];
    let fquan = document.getElementsByName('fquan')[0];
    let currentValue = parseInt(quantity.value);
    increase.addEventListener('click', ()=>{
        currentValue+=1;
        quantity.value = currentValue;

        updatePrice();
        foodQuantity();
    } )

    decrease.addEventListener('click', ()=>{
        if(currentValue>1){
            currentValue-=1;
            quantity.value=currentValue;

            updatePrice();
            foodQuantity();
        }
    })

    let price = document.querySelector('.price');
    let pricePerUnit = price.textContent;

    let measurement = document.querySelector('.measure');
    let measurementPerUnit = parseInt(measurement.textContent);

    function updatePrice() {
        totalprice = currentValue * pricePerUnit;
        price.textContent = totalprice;
        food_price.value=totalprice;
        fprice.value=totalprice
    }
    


    function foodQuantity() {
        let totalQuantity = measurementPerUnit * currentValue;
        measurement.textContent = totalQuantity;
        food_quan.value=totalQuantity;
        fquan.value = totalQuantity;
    }
</script>
<?php include './Partials/footer.php' ?>