<?php

    include '../components/connect.php';

    session_start();

    $admin_id = $_SESSION['admin_id'];

    // bao nhiêu người dùng mới
    if(!isset($admin_id)){
        header('location:admin_login.php');
     }
     $threeDaysAgo = date('Y-m-d', strtotime('-3 days'));

     $query = "SELECT COUNT(*) as newUsersCount FROM users WHERE create_date >= '$threeDaysAgo'";
     $result = $conn->query($query);
     
     if ($result) {
         $row = $result->fetch(PDO::FETCH_ASSOC);
         $newUsersCount = $row['newUsersCount'];
     } else {
         $newUsersCount = 0;
     }
     // đơn chưa xác nahanj
     $select_pending_orders = $conn->prepare("SELECT COUNT(*) as total_pending_orders FROM `orders` WHERE `payment_status` = 'pending'");
    $select_pending_orders->execute();
    $fetch_pending_orders = $select_pending_orders->fetch(PDO::FETCH_ASSOC);
    $total_pending_orders = $fetch_pending_orders['total_pending_orders'];

    // sản phẩm bán chạy 
    $limit = 1;
    $select_products_query = "
        SELECT 
            SUBSTRING_INDEX(SUBSTRING_INDEX(total_products, '(', 1), ' x ', 1) AS product_name,
            SUM(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(total_products, ' x ', -1), ')', 1) AS SIGNED)) AS total_quantity
        FROM 
            orders
        GROUP BY 
            product_name
        ORDER BY 
            total_quantity DESC
        LIMIT $limit
    ";
    $result = $conn->query($select_products_query);
    if ($result) {
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $productName = $row['product_name'];
            $totalQuantity = $row['total_quantity'];

        //     echo "Sản phẩm được mua nhiều nhất là: $productName, Tổng số lượng: $totalQuantity";
        // } else {
        //     echo "Không có sản phẩm nào được mua";
        }
    } else {
        echo "Lỗi truy vấn";
    }
    // số tin chưa đọc
    $count_unread_messages = $conn->query("SELECT COUNT(*) FROM `messages` WHERE is_read = 0")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo2.png">

    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-Hw09E+AYLJRcJL3l5b/6iGqZ4R4d09/PFET72M5fqL+DDbNQb8pIdzl5VzQ9A2YY" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="../css/admin_style.css?v= <?php echo time(); ?>"> -->
</head>
<style>
     body, html {
        margin: 0;
        padding: 0;
        height: 100%;
    }
    
    nav {
        width: 230px;
        height: 100vh; 
        position: fixed;
        top: 0;
        left: 0;
        background-color: yellow;
        padding: 5px;
    }

    .admin-navbar {
        background-color: yellow;
        padding: 5px;
    }

    .admin-navbar ul {
        margin-top: 40px;
        list-style: none;
        display: flex;
        flex-direction: column;
    }

    .admin-navbar li {
        margin-bottom: 45px;
        
    }

    .admin-navbar a {
        color: black;
        text-decoration: none;
        font-weight: bold;
        font-size: 15px;
    }

    .admin-navbar li:hover {
        color: #2962ff;
    }

    .admin-navbar i {
        width: 30px;
        font-size: 2em;
        margin-right: 10px;
    }

    .submenu {
        display: none;
        padding-left: 20px;
    }

    .submenu a {
        font-size: 14px;
        color: #333;
        margin-bottom: 10px;
    }
    .thongke-item .fa-angle-down {
        font-size: 1.5em;
        transition: transform 0.3s; 
        color: black;
        margin-left: 35px;
    }

    .thongke-item.open .fa-angle-down {
        transform: rotate(180deg); 
    }
    .admin-navbar ul li img{
      height: 50px;
      width: 200px;
      margin-bottom: -20px;
      margin-left: -30px;
    }
    .content {
        margin-left: 250px;
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .mix {
        margin-left: 20px;
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 1100px;
    }

    .notification-section,
    .chart-section,
    .element-section {
        background-color: #f0f0f0;
        margin: 10px;
        padding: 20px;
        flex: 1;
    }
    .chart-section {
        flex: 2;
        height: 500px;
    }
    .element-section {
        flex: 2;
        height: 760px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .element {
        background-color: #f0f0f0;
        padding: 20px;
        text-align: center;
        list-style-type: none;
    }
    .element p {
        color: black; 
        text-decoration: none; 
    }

    .element img {
        width: 200px;
        height: auto;
        margin-bottom: 10px;
    }
    h2 {
        margin-top: -10px;
        font-size: 250%;
        color: #3498db;
    }

    p {
        text-decoration: none;
        margin-top: -10px;
        font-size: 18px; 
        margin-bottom: 30px; 
    }

    .highlight {
        background-color: #f39c12; 
        color: #ffffff;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block;
    }
</style>
<body>

<nav class="admin-navbar">
    <ul>
        <li><img src="../img/logo3.png"></li>
        <li><a href="trangchu.php"><i class="fas fa-chart-line"></i> Dashboard</a></li>
        <li><a href="users_accounts.php"><i class="fas fa-users"></i> Quản lý Users</a></li>
        <li><a href="products.php"><i class="fas fa-box"></i> Quản lý Sản phẩm</a></li>
        <li><a href="admin_account.php"><i class="fas fa-user-cog"></i> Quản lý Admin</a></li>
        <li><a href="placed_orders.php"><i class="fas fa-shopping-cart"></i> Đơn hàng</a></li>
        <li><a href="messages.php"><i class="fas fa-envelope"></i> Tin nhắn</a></li>
        <li class="thongke-item"><a href="#"><i class="fas fa-chart-bar"></i> Thống kê</a><i class="fas fa-angle-down"></i>
            <ul class="submenu">
                <li><a href="thongke1.php">Top bán chạy</a></li>
                <li><a href="thongke2.php">Đơn hàng chưa xác nhận</a></li>
                <li><a href="thongke3.php">Số khách hàng mới</a></li>
            </ul>
        </li>
    </ul>
</nav>

    <section class="content">
      <div class= "mix">
        <div class="notification-section">
            <h2>Thông báo</h2>
            <p>Số người dùng mới trong 3 ngày qua: <span class="highlight"><?php echo $newUsersCount; ?></span></p>
            <p>Số đơn chưa xác nhận: <span class="highlight"><?php echo $total_pending_orders; ?></span></p>
            <p>Sản phẩm bán chạy nhất: <?php echo $productName; ?> với số lượng: <span class="highlight"><?php echo $totalQuantity; ?></span></p>
            <p style="margin-bottom: 10px;">Số tin nhắn chưa đọc: <span class="highlight"><?php echo $count_unread_messages; ?></span></p>
        </div>

        <div class="chart-section">
            <?php include('thongke3.php') ?>
        </div>

      </div>
      
      <div class="element-section">
          <ul>
              <li style="list-style-type: none;"><h2>Thành phần trang web</h2></li>
              <li class="element">
                    <a href="https://www.canva.com/design/DAF1Vv7Ry4E/0hyxlE1nMOC5aaEeLCts-w/edit" style="text-decoration: none; font-weight:bold;">
                        <img src="../img/logo3.png" alt="Logo">
                        <p>Thiết kế logo</p>
                    </a>
                </li>
                <li class="element">
                    <a href="https://dash.elfsight.com/widget/3b609f04-3bd4-44cc-8b71-56b0eb486db6" style="text-decoration: none; font-weight:bold;">
                        <img src="../img/widget.png" alt="Widget Image">
                        <p>Mô tả widget</p>
                    </a>
                </li>
                <li class="element">
                    <a href="../img" style="text-decoration: none; font-weight:bold;">
                        <img src="../img/image.jpg" alt="Hình ảnh">
                        <p>Tất cả hình ảnh</p>
                    </a>
                </li>
          </ul>
      </div>
    </section>
    
<script>
    var thongkeItem = document.querySelector('.thongke-item');
var submenu = thongkeItem.querySelector('.submenu');

thongkeItem.addEventListener('click', function (event) {
  event.preventDefault(); 
  submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block'; 
  thongkeItem.classList.toggle('open'); 
});

submenu.addEventListener('click', function (event) {
  var clickedLink = event.target.closest('a');
  if (clickedLink) {
    window.location.href = clickedLink.href;
  }
});

document.addEventListener('DOMContentLoaded', function () {
  submenu.style.display = 'none';
});

</script>

</body>
</html>
