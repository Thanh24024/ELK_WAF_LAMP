<?php

    include '../components/connect.php';

    session_start();

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:admin_login.php');
    }

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_admin = $conn->prepare("DELETE FROM `admin` WHERE id = ?");
        $delete_admin->execute([$delete_id]);
        header('location:admin_accounts.php');
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

    <section class="accounts">

        <h1 class="heading">các tài khoản admin</h1>

        <div class="box-container">

        <div class="box">
            <p>Đăng kí admin mới</p>
            <a href="register_admin.php" class="option-btn">Đăng kí</a>
        </div>

        <?php
            $select_account = $conn->prepare("SELECT * FROM `admin`");
            $select_account->execute();
            if($select_account->rowCount() > 0){
                while($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)){  
        ?>
        <div class="box">
            <p> ID : <span><?= $fetch_accounts['id']; ?></span> </p>
            <p> Tên : <span><?= $fetch_accounts['name']; ?></span> </p>
            <div class="flex-btn">
                <a href="admin_accounts.php?delete=<?= $fetch_accounts['id']; ?>" class="delete-btn" onclick="return confirm('Xóa tài khoản này thật shao?');">Xóa</a>
                <?php
                    if($fetch_accounts['id'] == $admin_id){
                    echo '<a href="update_profile.php" class="option-btn">Cập nhật</a>';
                    }
                ?>
            </div>
        </div>
        <?php
            }
        }else{
            echo '<p class="empty">Chưa có sẵn tài khoản nào cả</p>';
        }
        ?>

        </div>

    </section>




    <script src="../js/script.js"></script>
</body>
</html>