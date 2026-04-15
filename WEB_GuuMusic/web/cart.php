<?php
    include './components/connect.php'; 


    session_start();

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id='';
        header('location:login.php');
    };

    if(isset($_POST['update_qty'])){

        $cart_id = $_POST['cart_id'];
        $cart_id = filter_var($cart_id, FILTER_SANITIZE_STRING);
        $qty = $_POST['qty'];
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);
        $update_qty = $conn->prepare("UPDATE `cart` SET `quantity` = ? WHERE `id` = ? ");
        $update_qty->execute([$qty, $cart_id]);
        

    }

    if(isset($_POST['delete'])){
        $cart_id = $_POST['cart_id'];
        $cart_id = filter_var($cart_id, FILTER_SANITIZE_STRING);

        $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE `id` = ? ");
        $delete_cart->execute([$cart_id]);

    }

    if(isset($_POST['delete_all'])){

        $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE `user_id` = ? ");
        $delete_cart->execute([ $user_id]);

    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng </title>
    <link rel="icon" href="./img/logo2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css?v= <?php echo time(); ?>">
</head>
<body>
    <?php include './components/user_header.php'; ?>

    <div class="heading">
        <h3>Giỏ hàng mua sắm</h3>
        <p>Giỏ hàng / <a href="index.php">Trang chủ</a></p>
    </div>
    
    <section class="carts">

        <h1 class="title">Giỏ hàng của bạn</h1>

        <div class="box-container">

            <?php
                $grand_total = 0;
                $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE `user_id` = ?");
                $select_cart->execute([$user_id]);
                if($select_cart->rowCount() >0){
                    while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){

            ?>

            <form action="" method="post" class="box">

                    <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
                    <a href="quick_view.php?pid=<?= $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
                    <button type="submit" name="delete" class="fas fa-times"  onclick="return confirm('Xóa khỏi giỏ hàng ?');"></button>
                    <img src="./upload_img/<?= $fetch_cart['image']; ?>">

                    <div class="name"><?= $fetch_cart['name']; ?></div>
                        
                    <div class="flex">
                        <div class="price"><?= number_format($fetch_cart['price'], 0, ',', '.') ?><sup>₫</sup></div>
                        <input type="number"  name="qty" class="qty" value="<?= $fetch_cart['quantity']; ?>" min="1" max="99" maxlength="2">
                        <button type="submit" name="update_qty" class="fas fa-edit"></button>
                    </div>

                    <div class="sub-total">
                        Tổng tiền : <span><?= number_format($sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']), 0, ',', '.') ?><sup>₫</sup></span>
                    </div>
            </form>

            <?php
                $grand_total += $sub_total;
                    }
                    }else{
                        echo '<p class="empty">Giỏ hàng rỗng</p>';
                    }
                
            ?>
                
        </div>
        
            <div class="cart-total">
                <p class="grand-total">Tất cả giỏ hàng :</p> <h1 style="font-size: 110%; border: 2px solid red; border-radius: 10px; padding: 10px; "><?= number_format($grand_total, 0, ',', '.') ?><sup>đ</sup></h1>
                <a href="checkout.php" class="btn-checkout <?= ($grand_total > 1)?'':'disabled' ?> " >Thanh toán</a>
            </div>

        <div class="more-btn">
            <form action="" method="post">
                <button type="submit" class="deleteall-btn <?= ($grand_total > 0 )?'':'disabled';?> " name="delete_all" onclick="return confirm('Xóa sản phẩm này shaoo?');" >Xóa tất cả</button>    
            </form>
            <a href="menu.php" class="menu-btn">Tiếp tục mua sắm</a>     
        </div>

    </section>

    <?php include './components/footer.php'; ?>


        <script src="js/script.js"></script>
</body>
</html>