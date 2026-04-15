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


<header class="header" style="background-color: yellow !important;">

        <section class="flex">
            
            <a href="index.php" class="logo"><img src="./img/logo3.png"></a>

            <nav class="navbar">
                <a href="index.php">Trang chủ</a>
                <a href="about.php">Giới thiệu</a>
                <a href="menu.php">Sản phẩm</a>
                <a href="orders.php">Đơn hàng</a>
                <a href="contact.php">Liên hệ</a>
            </nav>

            <div class="icons">
                <?php
                    $count_user_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                    $count_user_cart_items->execute([$user_id]);
                    $total_user_cart_items = $count_user_cart_items->rowCount();
                ?>

                <a href="search.php"><i class="fas fa-search"></i></a>
                <a href="cart.php"><i class="fas fa-shopping-cart"><span>(<?= $total_user_cart_items; ?>)</span></i></a>
                <div id="user-btn" class="fas fa-user"></div>
                <div id="menu-btn" class="fas fa-bars"></div>
            </div>
            

            <div class="profile">
            <?php
                $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                $select_profile->execute([$user_id]);
                if($select_profile->rowCount() > 0){
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
                <p class="name"><?= $fetch_profile['name'];?></p>
                <div class="flex1">
                    <a href="profile.php" class="view-btn">Trang cá nhân</a>
                    <a href="./components/user_logout.php" onclick="return confirm('Đăng xuất?');" class="delete-btn">Đăng xuất</a>
                </div>
            <?php
                }
                else{
            ?>
                <p class="name"> GUU xin chào !</p>
                <a href="login.php" class="view-btn">Đăng nhập</a>
                <a href="register.php" class="delete-btn">Đăng ký</a>
            <?php
                }
            ?>
                

            </div>
        </section>
    </header>
    