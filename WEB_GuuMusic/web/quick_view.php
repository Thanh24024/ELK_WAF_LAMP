<?php
    include './components/connect.php';


    session_start();

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    }


    include './components/add_cart.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quickview</title>
    <link rel="icon" href="./img/logo2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-Hw09E+AYLJRcJL3l5b/6iGqZ4R4d09/PFET72M5fqL+DDbNQb8pIdzl5VzQ9A2YY" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css?v= <?php echo time(); ?>">
</head>
<body>
    <?php include './components/user_header.php'; ?>

    <section class="quick-view">

    <?php
    $pid = $_GET['pid'];
    $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
    $select_products->execute([$pid]);
    if ($select_products->rowCount() > 0) {
        while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <form action="" method="post" class="box">

                <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                <input type="hidden" name="price" value="<?= $fetch_products['price'] ?>">
                <input type="hidden" name="image" value="<?= $fetch_products['image'] ?>">

                <div class="pro-img">
                    <img src="./upload_img/<?= $fetch_products['image']; ?>" alt="">
                </div>

                <div class="pro-infor">
                    <h2><?= $fetch_products['name']; ?></h2>
                    <p><?= $fetch_products['describe']; ?></p>
                    <h1><?=  number_format($fetch_products['price'], 0, ',', '.') ?><sup>đ</sup></h1>
                    <?php
                        $quantity_in_stock = $fetch_products['quantity'];
                        ?>
                        <input type="number" name="qty" class="qty" min="1" max="<?= $quantity_in_stock ?>" value="1" maxlength="3">
                    <p style="margin-top: 20px;">Số lượng trong kho: <?= $quantity_in_stock; ?></p>
                
                    <button type="submit" name="add_to_cart" class="cart-btn">
                        <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                    </button>                
                </div>
            </form>

            <?php
        }
    } else {
        echo '<p class="empty">Phải thêm sản phẩm trước bạn hiểu không?</p>';
    }
    ?>

    </section>


    <?php include './components/footer.php'; ?>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>