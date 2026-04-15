<?php
    include './components/connect.php';

    session_start();

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id='';
        header('location:index.php');
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="icon" href="./img/logo2.png">
    <link rel="stylesheet" href="./css/style.css?v= <?php echo time(); ?>">
</head>     
<body>
    <?php include './components/user_header.php'; ?>

    <section class="user-profile">

        <div class="box">
            <img src="./img/user-icon.png" alt="">
            <p><i class="fas fa-user"><span><?= $fetch_profile['name'];?></span></i></p>
            <p><i class="fas fa-envelope"><span><?= $fetch_profile['email'];?></span></i></p>
            <p><i class="fas fa-phone"><span><?= $fetch_profile['number'];?></span></i></p>
            <a href="update_profile.php" class="btn" style="margin-bottom: 1rem; background-color:#FFFF46; font-size: 2em;"> Cập nhật thông tin</a>
            <p>
                <i class="fas fa-map-marker-alt"></i>
                <span>
                    <?php if($fetch_profile['address'] == ''){
                                echo 'Vui lòng nhập địa chỉ của bạn!';
                            }else{
                                echo $fetch_profile['address'];
                            }
                    ?>
                </span>
            </p>
            <a href="update_address.php" class="btn" style="margin-bottom: 1rem; background-color:aquamarine; font-size: 2em;">Cập nhật địa chỉ</a>
        </div>     

    </section>






    <?php include './components/footer.php'; ?>


        <script src="./js/script.js"></script>
</body>
</html>