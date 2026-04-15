<?php

    include '../components/connect.php';

    session_start();

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:admin_login.php');
     }
     
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="../img/logo2.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin_style.css?v= <?php echo time(); ?>">
</head>
<body>
    <?php include '../components/admin_header.php'; ?><br><br>
    <!-- <?php include('test2.php') ?> -->
     <section class="dashboard">

        <h1 class="heading">dashboard</h1>

        <div class="box-container">

            <!-- <div class="box">
                <h3>Welcome!</h3>
                <p><?= $fetch_profile['name']; ?></p>
                <a href="update_profile.php" class="btn">Cập nhật thông tin</a>
            </div>

            <div class="box">
                <?php
                    $select_users = $conn->prepare("SELECT * FROM `users` ");
                    $select_users->execute();
                    $numbers_of_users = $select_users->rowCount();
                ?>
                <h3><?= $numbers_of_users?></h3>
                <p>User</p>
                <a href="users_accounts.php" class="btn">Xem users</a>
            </div>
            
            

            <div class="box">
                <?php
                    $select_products = $conn->prepare("SELECT * FROM `products` ");
                    $select_products->execute();
                    $numbers_of_products = $select_products->rowCount();
                ?>
                <h3><?= $numbers_of_products ?></h3>
                <p>Products Added</p>
                <a href="products.php" class="btn">Add products</a>
            </div> -->

            <div class="box">
                <?php   
                    $select_admins = $conn->prepare("SELECT * FROM `admin`");
                    $select_admins->execute();
                    $numbers_of_admins= $select_admins->rowCount();
                ?>
                <h3><?= $numbers_of_admins?></h3>
                <p>admin</p>
                <a href="admin_account.php" class="btn">Xem admin</a>
            </div>


            <div class="box">
                <?php
                    $total_pendings = 0;
                    $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE `payment_status` = ?");
                    $select_pendings->execute(['pending']); 
                    while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
                        $total_pendings += $fetch_pendings['total_price'];
                    }
                ?>
                <h3><?= number_format($total_pendings) ?><span>đ</span><span>/-</span></h3>
                <p>Đơn hàng chưa xử lý</p>
                <a href="placed_orders1.php" class="btn">Xem đơn hàng</a>
            </div>
            

            <div class="box">
                <?php
                    $total_completes = 0;
                    $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE `payment_status` = ?");
                    $select_completes->execute(['completed']);
                    while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
                        $total_completes += $fetch_completes['total_price'];
                    }
                ?>
                <h3><?= number_format($total_completes) ?><span>đ</span><span>/-</span></h3>
                <p>Đơn hàng đã xử lý</p>
                <a href="placed_orders2.php" class="btn">Xem đơn hàng</a>
            </div>

            <div class="box">
                <?php
                    $select_orders = $conn->prepare("SELECT * FROM `orders`");
                    $select_orders->execute();
                    $numbers_of_orders = $select_orders->rowCount();
                ?>
                <h3><?= $numbers_of_orders; ?></h3>
                <p>Tổng đơn hàng</p>
                <a href="placed_orders.php" class="btn">Xem đơn hàng</a>
            </div>
            <div class="box">
                <?php
                    $select_messages = $conn->prepare("SELECT * FROM `messages`");
                    $select_messages->execute();
                    $numbers_of_messages = $select_messages->rowCount();
                ?>
                <h3><?= $numbers_of_messages; ?></h3>
                <p>Tin nhắn </p>
                <a href="messages.php" class="btn">Xem tin nhắn</a>
            </div>
           
            <div class="box">
                <p>Thống kê</p>
                <a href="test.php" class="btn">Vào đây mà chốt đơn</a>
            </div>
            <div class="box">
                <p>Thống kê</p>
                <a href="test1.php" class="btn">Khách mới quẹo lựa hehe</a>
            </div>
            <div class="box">
                <p>Thống kê</p>
                <a href="test2.php" class="btn">Top bán chạy</a>
            </div>

            
                
            
        </div>
     </section>
     
    <script src="../js/script.js"></script>
</body>
</html>