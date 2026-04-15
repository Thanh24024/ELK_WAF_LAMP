<?php
    include './components/connect.php';

    session_start();

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id='';
    };

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $number = $_POST['number'];
        $number = filter_var($number, FILTER_SANITIZE_STRING);
        $msg = $_POST['message'];
        $msg = filter_var($msg, FILTER_SANITIZE_STRING);

        $select_message = $conn->prepare("SELECT * FROM `messages` WHERE `name` = ? AND `email` = ? AND `number` = ? AND `message` = ?");
        $select_message->execute([$name, $email, $number, $msg]);
        
        if($select_message->rowCount() > 0){
            $message[] = 'Điều này đã được gửi đi trước đó roi bạn ưi';
        }else{           
            $insert_message = $conn->prepare("INSERT INTO `messages` (`user_id`, `name`, `email`, `number`, `message`, `send_time`, `is_read`) VALUES ('1', ?, ?, ?, ?, NOW(), 0)");
            $insert_message->execute([$user_id, $name, $email, $number, $msg]);
            $message[] = 'Điều bạn cần nói đã được gửi đi thành công rồi nhaa ';
        }
    }
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta pass="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="icon" href="./img/logo2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="./css/style.css?v= <?php echo time(); ?>">
</head>
<body>

    <?php include './components/user_header.php'; ?>

    <div class="heading">
        <h3>liên hệ với chúng tôi</h3>
        <p>liên hệ/ <a href="index.php">trang chủ</a></p>
    </div>

    <section class="contact"> 

        <div class="row">
            <div class="image">
                <img src="./img/contact-img.svg">
            </div>

            <form action="" method="post">
                <h3>Hãy để lại ý kiến của bạn !</h3>
                <input type="text" required placeholder="Bạn tên gì vayy" maxlength="50" name="name" class="box">
                <input type="email" required placeholder="Email của bạn ở dayy" maxlength="50" name="email" class="box">
                <input type="number" required placeholder="Nhập số điện thoại nào" maxlength="10" min="0" max="9999999999" name="number" class="box">
                <textarea name="message" class="box" required maxlength="500" placeholder="Nội dung" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="Gửi tin nhắn" name="submit" class="submit">
            </form>
        </div>

    </section>



    <?php include './components/footer.php'; ?>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="./js/script.js?v= <?php echo time(); ?>"></script>
</body>
</html>