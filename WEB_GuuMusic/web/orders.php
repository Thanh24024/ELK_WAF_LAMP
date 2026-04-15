<?php
    include './components/connect.php';


    session_start();

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id='';
        header('location:login.php');
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="./img/logo2.png">
    <link rel="stylesheet" href="./css/style.css?v= <?php echo time(); ?>">
<body>
    <?php include './components/user_header.php'; ?>

    <section class="orders">

        <div class="box-container">

            <?php
                $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE `user_id` = ? ORDER BY `placed_on` DESC");
                $select_orders->execute([$user_id]);
                if($select_orders->rowCount() > 0){
                    while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
                        
            ?>
            
            <div class="box">
                <p>Tên khách hàng : <span><?= $fetch_orders['name']; ?></span></p>
                <!-- <p>Email : <span><?= $fetch_orders['email']; ?></span></p> -->
                <p>Số điện thoại : <span><?= $fetch_orders['number']; ?></span></p>
                <p>Địa chỉ : <span><?= $fetch_orders['address']; ?></span></p>
                <p>Được đặt: <span style="background-color: #DDDDDD; color:blue;"><?= date('d-m-Y', strtotime($fetch_orders['placed_on'])); ?></span></p>
                <p>Dự kiến nhận hàng: <span style="background-color: #DDDDDD; color:red;"><?= date('d-m-Y', strtotime($fetch_orders['received_on'])); ?></span></p>
                <p>Phương thức thanh toán : <span><?= $fetch_orders['method']; ?></span></p>
                <p>Đơn hàng của bạn : <span><?= $fetch_orders['total_products']; ?></span></p>
                <p>Tổng số tiền : <span style="color: #FF9933; font-weight: bold;"><?= number_format($fetch_orders['total_price'], 0, ',', '.') ?><sup>đ</sup></span></p>

                <p>Cửa hàng xác nhận: <span style="color: <?= ($fetch_orders['payment_status'] == 'pending') ? 'red' : 'green'; ?>"><?= $fetch_orders['payment_status'] == 'pending' ? 'Chưa xác nhận' : 'Đã xác nhận'; ?></span></p>
            </div>
            

            <?php
                    }
                }else{
                    echo '<p class="empty">Bạn không có đơn hàng nào đâu</p>';
                }    
            ?>

        </div>

    </section>



    <?php include './components/footer.php'; ?>


        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="js/script.js"></script>
</body>
</html>