<?php
 include 'Partials/header.php';
?>

<section class="dashboard" style="margin-top:6rem">
<?php if(!isset($_SESSION['user-id'])) {?>
<?php if(isset($_SESSION['order'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['order'];
                    unset($_SESSION['order'])
                        ?>
                </p>
        </div>
<?php } ?>
<?php } ?>
    <?php if(isset($_SESSION['add-order'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['add-order'];
                    unset($_SESSION['add-order'])
                        ?>
                </p>
        </div>
    <?php } elseif(isset($_SESSION['add-order-success'])) {?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['add-order-success'];
                    unset($_SESSION['add-order-success'])
                        ?>
                </p>
        </div>
    <?php } ?>

    <?php if(isset($_SESSION['remove-order'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['remove-order'];
                    unset($_SESSION['remove-order'])
                        ?>
                </p>
        </div>
    <?php } elseif(isset($_SESSION['remove-order-success'])) {?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['remove-order-success'];
                    unset($_SESSION['remove-order-success'])
                        ?>
                </p>
        </div>
    <?php } ?>

    <?php if(isset($_SESSION['order-placed'])) {?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['order-placed'];
                    unset($_SESSION['order-placed']);
                        ?>
                </p>
        </div>
    <?php } elseif(isset($_SESSION['order-placed-success'])) {?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['order-placed-success'];
                    unset($_SESSION['order-placed-success']);
                        ?>
                </p>
        </div>
    <?php } ?>
    <?php
        if(isset($_SESSION['user-id'])){
            $uid = $_SESSION['user-id'];

            $query = "select * from order_items where user_id='$uid' order by order_id desc";
            $result = mysqli_query($conn, $query);

        }
        else{
            $_SESSION['order'] = "You must have to login";
            exit();
        }
    ?>

    <?php if(mysqli_num_rows($result)>0){?>
        <div class="dashboard_container" style="grid-template-columns:1fr;">
        <main>
            <h2>Ordered History</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Picture</th>
                        <th>Price</th>
                        <th>quantity</th>
                        <th>Type</th>
                        <th>time</th>
                        <th>payment_mode</th>
                    </tr>
                </thead>

                <tbody>
                    <?php  while($order = mysqli_fetch_assoc($result)) { 
                            $did = $order['food_id'];
                            $dish_select = "select * from dish where did='$did'";
                            $dish_result = mysqli_query($conn, $dish_select);
                            $dish_data = mysqli_fetch_assoc($dish_result);
                            $details_query = "select * from orders where id='{$order['order_id']}'";
                            $details_result = mysqli_query($conn, $details_query);
                            $details = mysqli_fetch_assoc($details_result);
                        ?>
                    <tr>
                        <td ><?= $dish_data['dname'] ?></td>
                        <td><img src="<?= ROOT_URL . 'upload/' . $dish_data['dpicture']?>" alt="" style="height:10rem;"></td>
                        <td>₹ <?php echo $order['price'] ?> /-</td>
                        <td><?= $order['quantity'] ?></td>
                        <td><?= $dish_data['type'] ?></td>
                        <td><?= $order['created_at'] ?></td>
                        <td><?= $details['payment_mode'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
    <?php } else{ ?>
        <h1 style="color:white; font-size:5rem;text-align:center;">No item has been ordered yet</h1>
    <?php } ?>

    
</section>


<?php
 include 'Partials/footer.php';
?>

