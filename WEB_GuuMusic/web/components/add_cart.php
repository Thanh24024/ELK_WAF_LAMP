<?php

    if(isset($_POST['add_to_cart'])){

        if($user_id == ''){
            header('location:../View/login.php');
            
        }else{
            $pid = $_POST['pid'];
            $pid = filter_var($pid, FILTER_SANITIZE_STRING);
            $name = $_POST['name'];
            $name = filter_var($name, FILTER_SANITIZE_STRING);
            $price = $_POST['price'];
            $price = filter_var($price, FILTER_SANITIZE_STRING);
            $image = $_POST['image'];
            $image = filter_var($image, FILTER_SANITIZE_STRING);
            $quantity = isset($_POST['qty']) && $_POST['qty'] > 0 ? $_POST['qty'] : 1;


            $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE `user_id` = ? AND `name` = ?");
            $check_cart_numbers->execute([$user_id, $name]);

            if ($check_cart_numbers->rowCount() > 0) {
                $message[] = 'Sản phẩm đã có ở giỏ hàng';
            } else {
                $insert_cart = $conn->prepare("INSERT INTO `cart`(`user_id`, `pid`, `name`, `price`, `image`, `quantity`) VALUES(?,?,?,?,?,?)");
                $insert_cart->execute([$user_id, $pid, $name, $price, $image, $quantity]);
                $message[] = 'Đã thêm vào giỏ hàng';
            }
        }
    

        }

    

?>