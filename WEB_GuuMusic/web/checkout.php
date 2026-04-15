<?php
include './components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
} else {
    $user_id= '';
    header('location:login.php');
}

if(isset($_POST['submit'])){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $method = filter_var($_POST['method'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);

    $cart_items = [];
    $total_price = 0;
    $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE `user_id` = ?");
    $select_cart->execute([$user_id]);

    if($select_cart->rowCount() > 0){
        while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
            $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '.$fetch_cart['quantity'].')';
            $total_price += ($fetch_cart['price'] * $fetch_cart['quantity']);
        }
    }

    if($address == ''){
        $message[] = 'Vui lòng nhập địa chỉ của bạn';
    } else {
        $insert_order = $conn->prepare("INSERT INTO `orders`(`user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `received_on`, `payment_status`) VALUES (?,?,?,?,?,?,?,?,NOW(), DATE_ADD(NOW(), INTERVAL 3 DAY), 'pending')");
        $insert_order->execute([$user_id, $name, $number, $email, $method, $address, implode(', ', $cart_items), $total_price]);
        
        $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE `user_id` = ?");
        $delete_cart->execute([$user_id]);
        
        $message[] = 'Đã tạo đơn hàng';
        
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="./img/logo2.png">
    <link rel="stylesheet" href="./css/style.css?v= <?php echo time(); ?>">
</head>
<body>
    <?php include './components/user_header.php'; ?>

    <div class="heading">
        <h3>Thanh toán</h3>
        <p><a href="index.php">Trang chủ</a> <span> / Thanh toán</span></p>
    </div>

    <section class="checkout">

        <form action="" method="post">

            <div class="cart-items">
                <h3>Các mặt hàng trong giỏ</h3>
                <?php
                $grand_total = 0;
                $cart_items = [];
                $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE `user_id` = ?");
                $select_cart->execute([$user_id]);

                if($select_cart->rowCount() > 0){
                    while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
                        $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '.$fetch_cart['quantity'].')';
                        $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
                    }
                }
                ?>

                <?php if(!empty($cart_items)): ?>
                    <?php foreach($cart_items as $item): ?>
                        <p>
                            <span class="name"><?= $item; ?></span>
                        </p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="empty">Chưa có sản phẩm trong giỏ hàng</p>
                <?php endif; ?>

                <div class="grand-total">
                    <div class="name">Tổng tiền: </div>
                    <span class="price"><?= $grand_total; ?>đ</span>
                </div>
                <a href="cart.php" class="btn">Xem giỏ hàng</a>

            </div>

            <input type="hidden" name="total_products" value="<?= implode(', ', $cart_items); ?>">
            <input type="hidden" name="total_price" value="<?= $grand_total; ?>">
            <input type="hidden" name="name" value="<?= $fetch_profile['name']; ?>">
            <input type="hidden" name="email" value="<?= $fetch_profile['email']; ?>">
            <input type="hidden" name="number" value="<?= $fetch_profile['number']; ?>">
            <input type="hidden" name="address" value="<?= $fetch_profile['address']; ?>">

            <div class="user-info">
                <h3>Thông tin người dùng</h3>
                <p><i class="fas fa-user"><span><?= $fetch_profile['name']; ?></span></i></p>
                <p><i class="fas fa-envelope"><span><?= $fetch_profile['email']; ?></span></i></p>
                <p><i class="fas fa-phone"><span><?= $fetch_profile['number']; ?></span></i></p>
                <a href="update_profile.php" class="btn" style="margin-bottom: 1rem; background-color:#FFFF46; font-size: 2em;">Cập nhật thông tin</a>
                <p>
                    <i class="fas fa-map-marker-alt"></i>
                    <span>
                        <?php if($fetch_profile['address'] == ''): ?>
                            Vui lòng nhập địa chỉ của bạn!
                        <?php else: ?>
                            <?= $fetch_profile['address']; ?>
                        <?php endif; ?>
                    </span>
                </p>
                <a href="update_address.php" class="btn" style="margin-bottom: 1rem; background-color:aquamarine; font-size: 2em;">Cập nhật địa chỉ</a>

                <select name="method" class="select-box" id="" required>
                    <option value="" disabled selected>Phương thức thanh toán--</option>
                    <option value="thanh toan khi nhan hang"> Thanh toán khi nhận hàng</option>
                    <option value="credit card">Credit card</option>
                    <option value="banking">Chuyển khoản ngân hàng</option>
                </select>
                <input type="submit" class="delete-btn <?php if($fetch_profile['address'] == ''){echo 'disabled';} ?>" value="Đặt hàng" name="submit" style="background-color: var(--red); width: 100%; color: var(--white);">
            </div>

        </form>

    </section>

    <?php include './components/footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html>
