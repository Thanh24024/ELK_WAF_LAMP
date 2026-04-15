<?php
    include './components/connect.php';


    session_start();

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id='';
    }


    if(isset($_POST['submit'])){

        $address = $_POST['flat'].', '.$_POST['building'].', '.$_POST['area'].', '.$_POST['town'].', '.$_POST['city'].', '.$_POST['state'].', '.$_POST['country'].' - '.$_POST['pin_code'] ;
        $address = filter_var($address, FILTER_SANITIZE_STRING);

        $update_address = $conn->prepare("UPDATE `users` SET `address` = ? WHERE `id` = ?");
        $update_address->execute([$address,$user_id]);

        $message[] = 'Địa chỉ đã được cập nhật';
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Address</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="./img/logo2.png">
    <link rel="stylesheet" href="./css/style.css?v= <?php echo time(); ?>">
</head>
<body>
    <?php include './components/user_header.php'; ?>


    <section class="form-update" style="height: 800px;">

        <form action="" method="post">

            <h3>Địa chỉ của bạn</h3>
            <input type="text" name="flat" maxlength="50" required placeholder="Số nhà" class="box">
            <input type="text" name="building" maxlength="50" required placeholder="Số đường" class="box">
            <input type="text" name="area" maxlength="50" required placeholder="Xóm/Thôn/Khu dân cư" class="box">
            <input type="text" name="town" maxlength="50" required placeholder="Xã/Phường" class="box">
            <input type="text" name="city" maxlength="50" required placeholder="Huyện" class="box">
            <input type="text" name="state" maxlength="50" required placeholder="Tỉnh thành" class="box">
            <input type="text" name="country" maxlength="50" required placeholder="Quốc qua" class="box">
            <input type="number" name="pin_code" maxlength="6" min="0" max="999999"  required placeholder="Nhập mã PIN" class="box">
            <input type="submit" value="Lưu thông tin" name="submit" class="btn">

        </form>

    </section>


    <?php include './components/footer.php'; ?>

        <script src="./js/script.js"></script>
</body>
</html>