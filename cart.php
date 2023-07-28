<?php
include 'Partials/header.php';
$total = 0;
?>

<?php
if (isset($_POST['edit_cart'])) {
    $id       = $_POST['id'];
    $quantity = $_POST['quantity'];
    $query    = "update cart set quantity='$quantity' where cart_id='$id'";
    $result   = mysqli_query($conn, $query);

    if (!mysqli_errno($conn)) {
        header('location: ' . ROOT_URL . 'cart.php');
        die();
    }
}

if (isset($_GET['delete_all'])) {
    $delete_query  = "delete from cart";
    $delete_result = mysqli_query($conn, $delete_query);
}

?>

<section class="dashboard" style="margin-top:6rem">
    <?php if (isset($_SESSION['order_error'])) { ?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['order_error'];
                    unset($_SESSION['order_error'])
                        ?>
                </p>
        </div>

    <?php } ?>
    <?php if (isset($_SESSION['add-cart'])) { ?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['add-cart'];
                    unset($_SESSION['add-cart'])
                        ?>
                </p>
        </div>
    <?php } elseif (isset($_SESSION['add-cart-success'])) { ?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['add-cart-success'];
                    unset($_SESSION['add-cart-success'])
                        ?>
                </p>
        </div>
    <?php } ?>

    <?php if (isset($_SESSION['remove-cart'])) { ?>
        <div class="alert_message error container">
                <p>
                    <?= $_SESSION['remove-cart'];
                    unset($_SESSION['remove-cart'])
                        ?>
                </p>
        </div>
    <?php } elseif (isset($_SESSION['remove-cart-success'])) { ?>
        <div class="alert_message success container">
                <p>
                    <?= $_SESSION['remove-cart-success'];
                    unset($_SESSION['remove-cart-success'])
                        ?>
                </p>
        </div>
    <?php } ?>
    <?php
    if (isset($_SESSION['user-id'])) {
        $uid = $_SESSION['user-id'];

        $query  = "select * from cart where uid='$uid' order by cart_id desc";
        $result = mysqli_query($conn, $query);
    } else {
        $_SESSION['order_error'] = "You must have to login";
        die();
    }
    ?>
        <div class="dashboard_container" style="grid-template-columns:1fr;">
        <main>
            <h2>added items</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Picture</th>
                        <th>quantity</th>
                        <th>edit</th>
                        <th>Price</th>
                        <th>remove</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (mysqli_num_rows($result) > 0) { 
                        $cart_items = array(); ?>
                        <?php while ($order = mysqli_fetch_assoc($result)) { 
                            $sub_total = number_format($order['price'] * $order['quantity']);
                            $cart_items[] = array(
                            'uid'=>$_SESSION['user-id'],
                            'did'=>$order['did'],
                            'quantity' => $order['quantity'],
                            'subtotal' => $sub_total
                        );
                            
                            ?>
                            <tr>
                                <td ><?= $order['name'] ?></td>
                                <td><img src="<?= ROOT_URL . 'upload/' . $order['image'] ?>" alt="" style="height:10rem;"></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?= $order['cart_id'] ?>">
                                        <input type="number" name="quantity" value="<?= $order['quantity'] ?>" style="width:5rem;padding:.8rem;">
                                        <td><button type="submit" name="edit_cart" class="sam" style="font-size:1.5rem;background:#00c476;color:black;padding:.6rem 1.5rem;cursor:pointer;">update</a></td>
                                    </form>
                                </td>
                                <td>₹ <?php echo $sub_total ?></td>
                        
                                <td><a href="<?= ROOT_URL ?>remove-cart.php?cart_id=<?= $order['cart_id'] ?>" class="sam danger"style="font-size:1.5rem;background:#f1325e;color:black;padding:.6rem 1.5rem;">remove</td>
                            </tr>
                            <?php
                            $total += $sub_total; ?>
                        <?php }  ?>
                <?php $_SESSION['cart_items'] = $cart_items;
            } else { ?>
                        <h1 style="color:white; font-size:3rem;text-align:center;">No item has been added yet</h1>
                <?php } ?>

                <tr>
                    <td><a href="<?= ROOT_URL ?>dishes.php" class="btn" style="margin:0;">continue shooping</a></td>
                    <td colspan="3"><h1 style="color:#91C8E4;padding:.7rem 1rem;font-size:1.7rem">grand total - </h1></td>
                    <td>₹ <?= $total ?> /-</td>
                    <td><a href="<?= ROOT_URL ?>cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?')" class="sam danger"style="font-size:1.5rem;background:#f1325e;color:black;padding:.6rem 1.5rem;">delete all</td></td>
                </tr>
                </tbody>
            </table>
        </main>
    </div>


    
    <div style="display:grid;place-items:center;">
        <a id="open_order" class="btn <?= ($total>1)?'':'disabled' ?>">place order</a>
    </div>

    <?php
        if(isset($_SESSION['cart_items'])){
            $cart_items_find = $_SESSION['cart_items'];

            foreach($cart_items_find as $cart_item){
                echo $cart_item['quantity'];
                echo " ";
                echo $cart_item['subtotal'];
            }
        }
    ?>
</section>


<!-- order section starts -->

<section class="order" style="background-color: rgba(0, 0, 0, 0.5);">
    <form action="./cart-order-logic.php" method="post">
        <div class="inputbox ">
            <div class="input ">
                <span>your name</span>
                <input type="hidden" name="uid" value="<?= $uid ?>">
                <input type="text" name="uname" placeholder="enter your name" required>
            </div>
            <div class="input ">
                <span>your email</span>
                <input type="tel" name="unumber" placeholder="enter your email" required>
            </div>
        </div>
        <div class="inputbox ">
            <div class="input ">
                <span>payment mode</span>
                <select name="payment" required>
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
            <button type="submit" name="cart_submit" class="btn">order</button>
            <a class="btn" id="close_order">close</a>         
        </div>
    </form>

</section>

<script>
    const open = document.querySelector('#open_order');
    const close = document.querySelector('#close_order');
    const order_form = document.querySelector('.order');

    open.addEventListener('click', ()=>{
        order_form.classList.add('open');
    });

    close.addEventListener('click', ()=>{
        order_form.classList.remove('open');
    });

</script>
<?php
include 'Partials/footer.php';
?>

