<?php
    include './components/connect.php';

    session_start();

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id='';
    };

    include './components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="icon" href="./img/logo2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="./css/style.css?v= <?php echo time(); ?>">
</head>
<body>
    <?php include './components/user_header.php'; ?>

    <div class="heading"> 
        <h3>Nhạc cụ của chúng toii</h3>
        <p>sản phẩm / <a href="index.php">trang chủ</a></p>
    </div>
    
    <section class="products">

        <div class="box-container">

            <?php
                $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY RAND()");
                $select_products->execute();
                if($select_products->rowCount() > 0){
                    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
            ?>
            <form action="" method="post" class="box">

                        <input type="hidden" name="pid" value="<?= $fetch_products['id'];?>">
                        <input type="hidden" name="name" value="<?= $fetch_products['name'];?>">
                        <input type="hidden" name="price" value="<?= $fetch_products['price']?>">
                        <input type="hidden" name="image" value="<?= $fetch_products['image']?>">

                        <a href="quick_view.php?pid=<?= $fetch_products['id'];?>" class="fas fa-eye"></a>
                        <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                        <img src="./upload_img/<?= $fetch_products['image'];?>" alt="">
                        <a href="category.php?category=<?= $fetch_products['category'];?>" class="cat"><?= $fetch_products['category'];?></a>
                        <div class="name"><?= $fetch_products['name']?></div>

                        <div class="flex">
                            <div class="price"><?= number_format($fetch_products['price'], 0, ',', '.') ?><sup>₫</sup></div>
                            <input type="number" class="qty" name="qty" min="1" max="99" value="1" maxlength="2">
                        </div>
            </form>

            <?php
                    }
                }else{
                    echo '<p class="empty">Phải thêm sản phẩm trước bạn hieu khongg</p>';
                }
            ?>
            
        </div>
         
        

   </section>
    
    <?php include './components/footer.php'; ?>

    
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>