<?php
 include 'Partials/header.php';
?>

<section style="margin-top:6rem">
<?php if(!isset($_SESSION['user-id'])) {?>
<?php if(isset($_SESSION['fav'])) {?>
    <div class="alert_message error container">
            <p>
                <?= $_SESSION['fav'];
                unset($_SESSION['fav'])
                    ?>
            </p>
    </div>
<?php } ?>
<?php } ?>
<h2 style="color:#ccc; font-size:3rem;padding:1rem;">Your favourite items</h2>
    <?php if(isset($_SESSION['add-favourite'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['add-favourite'];
                    unset($_SESSION['add-favourite'])
                        ?>
                </p>
        </div>
    <?php } elseif(isset($_SESSION['add-favourite-success'])) {?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['add-favourite-success'];
                    unset($_SESSION['add-favourite-success'])
                        ?>
                </p>
        </div>
    <?php } ?>

    <?php if(isset($_SESSION['remove-fav'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['remove-fav'];
                    unset($_SESSION['remove-fav'])
                        ?>
                </p>
        </div>
    <?php } elseif(isset($_SESSION['remove-fav-success'])) {?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['remove-fav-success'];
                    unset($_SESSION['remove-fav-success'])
                        ?>
                </p>
        </div>
    <?php } ?>

    <?php
        if(isset($_SESSION['user-id'])){
            $uid = $_SESSION['user-id'];

            $query = "select * from favourite where uid='$uid'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)>0){
                $dish_result = [];
                while($favourite  = mysqli_fetch_assoc($result)){
                    $dish_id = $favourite['did'];
                    $dish_query = "select * from dish where did='$dish_id'";
                    $dish_result[] = mysqli_query($conn, $dish_query);
                }

            }
        }
        else{
            $_SESSION['fav'] = "You must have to login";
            die();
        }
    ?>

    <?php if(!empty($dish_result)){?>
        <div class="fav-container">
            <?php foreach($dish_result as $dish_set) {
                while($dish = mysqli_fetch_assoc($dish_set))  {?>
               <div class="fav_slide">
                    <img src="<?= ROOT_URL . 'upload/'. $dish['dpicture'] ?>" alt="">
                    <h3 style="color:coral"><?= $dish['dname'] ?></h3>
                    <h3>price - ₹ <?= $dish['dprice'] ?>/-</h3>
                    <h4>Type - <?= $dish['type'] ?></h4>
                    <p>quantity - <?= $dish['quantity'] ?></p>
                    <div style="display:flex;gap:1rem;">
                        <a href="<?= ROOT_URL ?>Buy.php?id=<?= $dish['did'] ?>" class="btn">order</a>
                        <a href="<?= ROOT_URL ?>remove-favourite.php?id=<?= $dish['did']?>" class="btn">remove</a>
                        
                    </div>
               </div>
            <?php } 
            } ?>
        </div>
    <?php } else{ ?>
        <h1 style="color:white; font-size:5rem;text-align:center;">No item added to favourite</h1>
    <?php } ?>
</section>
<?php
 include 'Partials/footer.php';
?>
