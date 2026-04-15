<?php

    include '../components/connect.php';

    session_start();

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:admin_login.php');
    };

    if(isset($_POST['add_product'])){
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $price = $_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_STRING);
        $category = $_POST['category'];
        $category = filter_var($category, FILTER_SANITIZE_STRING);
        
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../upload_img/'.$image;

        $quantity = $_POST['quantity'];
        $quantity = filter_var($quantity, FILTER_SANITIZE_STRING);
        $describle = $_POST['describle'];
        $describle = filter_var($describle, FILTER_SANITIZE_STRING);

        $select_products = $conn->prepare("SELECT * FROM `products` WHERE `name` = ?");
        $select_products->execute([$name]);

        if($select_products->rowCount() > 0){
            $message[] = 'Tên này đặt rồi thím oiii!';
        }else{
            if($image_size > 2000000){
                $message[] = 'size ảnh bé thoi được không?????';
            }else{
                move_uploaded_file($image_tmp_name, $image_folder);

                $insert_product = $conn->prepare("INSERT INTO `products`(`name`, `category`, `price`, `image`, `quantity`, `describe`) VALUES(?, ?, ?, ?, ?, ?)");
                $insert_product->execute([$name, $category, $price, $image, $quantity, $describle]);



                $message[] = 'Đã thêm sản phẩm rồi đó fen';
            }
        }
    }


    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE `id` = ?");
        $delete_product_image->execute([$delete_id]);
        $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
        unlink('../upload_img/'.$fetch_delete_image['image']);
        $delete_product = $conn->prepare("DELETE FROM `products` WHERE `id` = ?");
        $delete_product->execute([$delete_id]);
        $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
        header('location:products.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo2.png">

    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

    <?php include '../components/admin_header.php' ?>
    
    <section class="add-products"> 

        <form action="" method="post" enctype="multipart/form-data"> 

            <h3>Thêm sản phẩm</h3>
            <input type="text" required placeholder="Tên sản phẩm" name="name" maxlength="100" class="box">
            <input type="number" min="0" max="999999999" required placeholder="Giá tiền" name="price" onkeypress="if(this.value.length == 10) return false; " class="box">
            <select name="category" class="box" required>
                <option value="" disabled selected>Chọn loại sản phẩm</option>
                <option value="violin">violin</option>
                <option value="guitar">guitar</option>
                <option value="piano">piano</option>
                <option value="cajon">cajon</option>
                <option value="drum">drum</option>
                <option value="effect">effect</option>
                <option value="amplifier">amplifier</option>
                <option value="mic">mic</option>
                <option value="organ">organ</option>
                <option value="saxophone">saxophone </option>
                <option value="ukulele">ukulele</option>
                <option value="khac">khac</option>
            </select>
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp"  required>
            <input type="number" min="0" max="999999999" required placeholder="Số lượng" name="quantity" onkeypress="if(this.value.length == 10) return false; " class="box">
            <input type="text" required placeholder="Mô tả" name="describle" maxlength="500" class="box">
            <input type="submit" value="add product" name="add_product" class="btn">
        </form>

    </section>


    <section class="show-products" style="padding-top: 0;">

        <div class="box-container">

            <?php
                $show_products = $conn->prepare("SELECT * FROM `products` ");
                $show_products->execute();
                if($show_products->rowCount() > 0){
                    while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){
            ?>

            <div class="box">
                <img src="../upload_img/<?= $fetch_products['image']; ?> ">
                <div class="flex">
                    <div class="price"><?= $fetch_products['price']; ?><span>đ</span><span>-</span></div>
                </div>
                <div class="name"><?= $fetch_products['name'];?></div>
                <div class="quantity">Số lượng trong kho: <?= $fetch_products['quantity']; ?></div>
                <div class="describle"><?= $fetch_products['describe']; ?></div>
                <div class="flex-btn">
                    <a href="update_product.php?id=<?php echo $fetch_products['id']; ?>" class="option-btn">sửa</a>
                    <a href="products.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('Có chắc là xóa rồi khong hối hận khong?');">xóa</a>
                    
                </div>
            </div>
                        
            <?php
                    }
                }else{
                    echo '<p class="empty">Chưa có sản phẩm nào được thêm</p>';
                }
 
            ?>
        
        </div>
    
    </section>

    <script src="../js/script.js"></script>
</body>
</html>