<?php

    include '../components/connect.php';

    session_start();

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:admin_login.php');
    };

    if(isset($_POST['update_payment'])){

        $order_id = $_POST['order_id'];
        $payment_status = $_POST['payment_status'];
        $update_status = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
        $update_status->execute([$payment_status, $order_id]);
        $message[] = 'Trang thái thanh toán đã được cập nhật!';
     
     }
     
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
        $delete_order->execute([$delete_id]);
        header('location:placed_orders.php');
    }
     
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="icon" href="../img/logo2.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
    <?php include '../components/admin_header.php'; ?>

    <section class="placed-orders">

   <h1 class="heading">placed orders</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders` ORDER BY placed_on DESC;");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> user id : <span><?= $fetch_orders['user_id']; ?></span> </p>
      <p> Ngày đặt hàng : <span><?= $fetch_orders['placed_on']; ?></span> </p>
      <p> Tên : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> Email : <span><?= $fetch_orders['email']; ?></span> </p>
      <p> Số điện thoại : <span><?= $fetch_orders['number']; ?></span> </p>
      <p> Địa chỉ : <span><?= $fetch_orders['address']; ?></span> </p>
      <p> Tổng sản phẩm : <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> Tổng tiền : <span><?= number_format($fetch_orders['total_price'], 0, ',', '.') ?><sup>₫</sup></p>
      <p> Phương thức thanh toán : <span><?= $fetch_orders['method']; ?></span> </p>
      <form action="" method="POST">
         <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
            <select name="payment_status" class="drop-down">
               <?php if ($fetch_orders['payment_status'] === 'pending'): ?>
                  <option value="pending" selected>Chưa xác nhận</option>
                  <option value="completed">Xác nhận</option>
               <?php elseif ($fetch_orders['payment_status'] === 'completed'): ?>
                  <option value="pending">Chưa xác nhận</option>
                  <option value="completed" selected>Đã xác nhận</option>
               <?php endif; ?>
            </select>
         <div class="flex-btn">
            <input type="submit" value="Cập nhật" class="btn" name="update_payment">
            <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('Xóa đơn hàng này chứ?');">Xóa</a>
         </div>
      </form>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">Chưa có đơn hàng nào :(( !</p>';
   }
   ?>

   </div>

</section>


        <script src="../js/script.js"></script>
</body>
</html>