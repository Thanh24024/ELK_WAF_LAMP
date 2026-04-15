<?php

    include '../components/connect.php';
    session_start();
   

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:admin_login.php');
    };
    include '../components/admin_header.php';
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_message = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
        $delete_message->execute([$delete_id]);
        header('location:messages.php');
     }
     if(isset($_GET['view'])){
      $view_id = $_GET['view'];
      
      $update_status = $conn->prepare("UPDATE `messages` SET is_read = 1 WHERE id = ?");
      $update_status->execute([$view_id]);
      
      $select_message = $conn->prepare("SELECT * FROM `messages` ORDER BY is_read ASC");
      $select_message->execute();



      if($select_message->rowCount() > 0){
         // Fetch message details
         $message = $select_message->fetch(PDO::FETCH_ASSOC);
 
         // Start HTML
         echo '<div class="message-details">';
         
         // Display message details
         echo '<h2>Thông tin tin nhắn</h2>';
         echo '<p><strong>Tên người dùng:</strong> ' . $message['name'] . '</p>';
         echo '<p><strong>Số điện thoại:</strong> ' . $message['number'] . '</p>';
         echo '<p><strong>Email:</strong> ' . $message['email'] . '</p>';
         echo '<p><strong>Nội dung tin nhắn:</strong> ' . $message['message'] . '</p>';
         echo '<p><strong>Thời gian gửi:</strong> ' . $message['send_time'] . '</p>';
 
         // Check message status and display accordingly
         // if ($message['is_read'] == 1) {
         //     echo '<p class="message-status read">Đã xem</p>';
         // } else {
         //     echo '<p class="message-status new">Tin nhắn mới !!!</p>';
         // }
 
         // Display delete and back buttons
         echo '<a href="messages.php?delete=' . $message['id'] . '" class="delete-btn" onclick="return confirmDelete();">Xóa</a>';
         echo '<a href="messages.php" class="view-btn">Quay lại</a>';
 
         // End HTML
         echo '</div>';
     } else {
         // If no matching message, redirect to messages.php
         header('location:messages.php');
     }
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
    <link rel="icon" href="../img/logo2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin_style.css?v= <?php echo time(); ?>">
</head>
<body>
    <?php  ?>

    <section class="messages">  

   <h1 class="heading">Tin nhắn</h1>

   <div class="box-container">

   <?php
      $select_messages = $conn->prepare("SELECT * FROM `messages` ORDER BY send_time DESC");
      $select_messages->execute();
      if($select_messages->rowCount() > 0){
         while($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> Từ người dùng : <span><?= $fetch_messages['name']; ?></span> </p>
      <p> Số điện thoại : <span><?= $fetch_messages['number']; ?></span> </p>
      <p> Email : <span><?= $fetch_messages['email']; ?></span> </p>
         <?php if ($fetch_messages['is_read'] == 1): ?>
         <p style="font-size: 28px; font-weight: bold; color: green;"> Đã xem </p>
      <?php else: ?>
         <p style="font-size: 28px; font-weight: bold; color: red;"> Tin nhắn mới !!! </p>
      <?php endif; ?>
    <!-- <p> Tin nhắn : <span><?= $fetch_messages['message']; ?></span> </p> -->
      <a href="messages.php?delete=<?= $fetch_messages['id']; ?>" class="delete-btn" onclick="return confirm('delete this message?');">Xóa</a>
      <a href="messages.php?view=<?= $fetch_messages['id']; ?>" class="view-btn">Xem</a>

   </div>
   <?php
         }
      }else{
         echo '<p class="empty">Bạn không có tin nhắn nào </p>';
      }
   ?>

   </div>

</section>



      <script src="../js/script.js"></script>
</body>
</html>