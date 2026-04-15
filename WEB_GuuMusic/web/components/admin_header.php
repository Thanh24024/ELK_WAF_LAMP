<?php
    if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
        }
    }
?>

<header class="header">
    
    <section class="flex">
    
        <a href="../admin/dashboard.php" class="logo">Admin<span>Panel</span> </a>

        <nav class="navbar">
            <a href="../admin/trangchu.php">Trang chủ</a>
            <a href="../admin/products.php">QL sản phẩm</a>
            <a href="../admin/placed_orders.php">Đơn hàng</a>
            <a href="../admin/admin_account.php">Admin</a>
            <a href="../admin/users_accounts.php">QL người dùng</a>
            <a href="../admin/messages.php">Tin nhắn</a>
        </nav>
        

        <div class="icons">
            <div id="user-btn" class="fas fa-user"><a href="../admin/update_profile.php"></a></div>
        </div>

        <div class="profile">

            <?php
                $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE `id` = ?");
                $select_profile->execute([$admin_id]);
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>

            <p><?= $fetch_profile['name']; ?></p>
            <a href="../admin/update_profile.php" class="btn">Cập nhật</a>
            <div class="flex-btn">
                <a href="../admin/admin_login.php" class="option-btn">Đăng nhập</a>
                <a href="../admin/register_admin.php"  onclick="return confirm('Tài khoản admin khác sẽ được tạo ?');"  class="option-btn">Đăng kí</a>
            </div>            
            <a href="../components/admin_logout.php" onclick="return confirm('Đăng xuất khỏi admin ?');" class="delete-btn">Đăng xuất</a>\

        </div>

    </section>

</header>