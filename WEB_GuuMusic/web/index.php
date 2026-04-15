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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta pass="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="./img/logo2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="./css/style.css?v= <?php echo time(); ?>">

</head>
<body>
    <?php include './components/user_header.php'; ?>
<section class="home">
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="swiper home-slider">

    <div class="swiper-wrapper">

        <div class="swiper-slide slide">
            <div class="content">
                <span>ORDER ONLINE</span>
                <h3>Piano nè mọi ngừi</h3>
                <a href="menu.php" class="see-btn">Xem sản phẩm</a>
            </div>
            <div class="image">
                <img src="./img/sale4.png" alt="">
            </div>
        </div> 

        <div class="swiper-slide slide">
            <div class="content">
                <span>ORDER ONLINE</span>
                <h3>Guitar xinh xẻo</h3>
                <a href="menu.php" class="see-btn">Xem sản phẩm</a>
            </div>
            <div class="image">
                <img src="./img/sale2.png" alt="">
            </div>
        </div>

        <div class="swiper-slide slide">
            <div class="content">
                <span>ORDER ONLINE</span>
                <h3>Ukelele đẹp vai~</h3>
                <a href="menu.php" class="see-btn">Xem sản phẩm</a>
            </div>
            <div class="image">
                <img src="./img/sale3.png" alt="">
            </div> 
        </div>

    </div>

    <div class="swiper-pagination"></div>
</div>    
</section>

<nav class="home-category">
    <ul>
        <li class="has-submenu">
                <li>
                    <a href="category.php?category=violin">
                        <img src="./img/violin.jpg" alt="Category 1">
                        <span class="category-name">Violin</span>
                    </a>
                </li>
                <li>
                    <a href="category.php?category=guitar">
                        <img src="./img/guitar.jpg" alt="Category 1">
                        <span class="category-name">Guitar</span>
                    </a>
                </li>
                <li>
                    <a href="category.php?category=piano">
                        <img src="./img/piano.jpg" alt="Category 1">
                        <span class="category-name">Piano</span>
                    </a>
                </li>
                <li>
                    <a href="category.php?category=cajon">
                        <img src="./img/cajon.jpg" alt="Category 1">
                        <span class="category-name">Cajon</span>
                    </a>
                </li>
                <li>
                    <a href="category.php?category=drum">
                        <img src="./img/drum.jpg" alt="Category 1">
                        <span class="category-name">Drum</span>
                    </a>
                </li>
                <li>
                    <a href="category.php?category=effect">
                        <img src="./img/boss.jpg" alt="Category 1">
                        <span class="category-name">Effect</span>
                    </a>
                </li>
                <li>
                    <a href="category.php?category=amplifier" style="margin-left: 220px;" >
                        <img src="./img/amplifier.jpg" alt="Category 1">
                        <span class="category-name">Amplifier</span>
                    </a>
                </li><br>
                <li>
                    <a href="category.php?category=mic_loa">
                        <img src="./img/mic.jpg" >
                        <span class="category-name">Mic-Loa</span>
                    </a>
                </li>
                <li>
                    <a href="category.php?category=organ">
                        <img src="./img/organ.jpeg" alt="Category 1">
                        <span class="category-name">Organ</span>
                    </a>
                </li>
                <li>
                    <a href="category.php?category=saxophone">
                        <img src="./img/aboutsaxophone.jpg" alt="Category 1">
                        <span class="category-name">Saxophone</span>
                    </a>
                </li>
                <li>
                    <a href="category.php?category=ukelele">
                        <img src="./img/ukelele.jpg" alt="Category 1">
                        <span class="category-name">Ukelele</span>
                    </a>
                </li>
                <li>
                    <a href="category.php?category=khac">
                        <img src="./img/khac.jpg" alt="Category 1">
                        <span class="category-name">Khác</span>
                    </a>
                </li>
        </li>
    </ul>
</nav>

<div id="carousel-wrapper">
  <div id="menu1">
      <div id="current-option">
        <span id="current-option-text1" data-previous-text="" data-next-text=""></span>
        <span id="current-option-text2" data-previous-text="" data-next-text=""></span>
      </div>
      <button id="previous-option"></button>
      <button id="next-option"></button>
  </div>
  <div id="image"></div>
</div>

   <section class="products"> 

        <div class="title"><h1>Sản phẩm nổi bật</h1></div> 

        <div class="box-container">

            <?php
                $selected_ids = array(17, 53, 109, 41, 111, 42, 48, 47, 32, 58, 60, 70, 74, 81, 92, 103);
                $ids_string = implode(',', $selected_ids);
                $select_products = $conn->prepare("SELECT * FROM `products` WHERE `id` IN ($ids_string) ORDER BY 
                    CASE `id`
                        WHEN 17 THEN 1
                        WHEN 53 THEN 2
                        WHEN 109 THEN 3
                        WHEN 41 THEN 4
                        WHEN 111 THEN 5
                        WHEN 42 THEN 6
                        WHEN 48 THEN 7
                        WHEN 47 THEN 8
                        WHEN 32 THEN 9
                        WHEN 58 THEN 10
                        WHEN 60 THEN 11
                        WHEN 70 THEN 12
                        WHEN 74 THEN 13
                        WHEN 81 THEN 14
                        WHEN 92 THEN 15
                        WHEN 103 THEN 16
                    END
                ");
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
                            <div class="price"><h2><?= number_format($fetch_products['price'], 0, ',', '.') ?><sup>₫</sup></h2></div>
                            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                        </div>
            </form>

            <?php
                    }
                }else{
                    echo '<p class="empty">Phải thêm sản phẩm trước bạn hieu khongg</p>';
                }
            ?>
        <div class="more-btn">
            <a href="menu.php" class="glow-on-hover">XEM TẤT CẢ</a>

        </div>
        </div>
         
        

   </section>

    <?php include './components/footer.php'; ?>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="./js/script.js?v= <?php echo time(); ?>"></script>
</body>
</html>

