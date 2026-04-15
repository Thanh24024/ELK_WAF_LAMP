<?php
    include './components/connect.php';


    session_start();

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id='';
        header('location:index.php');
    }

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $number = $_POST['number'];
        $number = filter_var($number, FILTER_SANITIZE_STRING);
  
        if(!empty($name)){
            $update_name = $conn->prepare("UPDATE `users` SET  `name` = ? WHERE `id` = ?");
            $update_name->execute([$name, $user_id]);
            $message[] = 'Tên người dùng đã cập nhật';
        }

        if(!empty($email)){ 
            $select_email = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
            $select_email->execute([$email]);
            if($select_email->rowCount()  > 0){
                $message[] = 'email đã được sử dụng';
            }else{
                $update_email = $conn->prepare("UPDATE `users` SET `email` = ? WHERE `id` = ?");
                $update_email->execute([$email, $user_id]);
                $message[] = 'email đã được cập nhật';
            }
        }

        if(!empty($number)){ 
            $select_number = $conn->prepare("SELECT * FROM `users` WHERE `number` = ?");
            $select_number->execute([$number]);
            if($select_number->rowCount()  > 0){
                $message[] = 'number đã được sử dụng';
            }else{
                $update_email = $conn->prepare("UPDATE `users` SET `number` = ? WHERE `id` = ?");
                $update_email->execute([$number, $user_id]);
                $message[] = 'Số điện thoại đã được cập nhật';
            }
        }

        $empty_pass = '';
        
        $select_prev_pass = $conn->prepare("SELECT * FROM `users` WHERE `id` = ?");
        $select_prev_pass->execute([$user_id]);
        $fetch_prev_pass = $select_prev_pass->fetch(PDO::FETCH_ASSOC);
        $prev_pass = $fetch_prev_pass['password'];

        $old_pass = $_POST['old_pass'];
        $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
        $new_pass = $_POST['new_pass'];
        $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
        $confirm_pass = $_POST['confirm_pass'];
        $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);


        if($old_pass != $empty_pass){
            if($old_pass != $prev_pass){
                $message[] = 'Mật khẩu cũ không đúng';
            }elseif($new_pass != $confirm_pass){
                $message[] = 'Nhập lại mật khẩu không khớp';
            }else{
                if($new_pass != $empty_pass){
                    $update_pass = $conn ->prepare("UPDATE `users` SET `password` = ? WHERE `id` = ?");
                    $update_pass->execute([$confirm_pass,$user_id]);
                    $message[] = 'password đã được cập nhật';

                }else{
                    $message[] = 'Nhập mật khẩu mới';
                }
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="./img/logo2.png">
    <link rel="stylesheet" href="./css/style.css?v= <?php echo time(); ?>">
</head>
<body>
    <?php include './components/user_header.php'; ?>

    <section class="form-update"> 

        <form action="" method="post">
            <h3>Cập nhật thông tin</h3>
            <input type="text" name="name" placeholder="<?= $fetch_profile['name']; ?>" maxlength="50" class="box">
            <input type="email" name="email" placeholder="<?= $fetch_profile['email']; ?>" maxlength="50" class="box">
            <input type="number" name="number" placeholder="<?= $fetch_profile['number']; ?>" max="9999999999" min="0" maxlength="10" class="box">
            <input type="password" name="old_pass" placeholder="Nhập mật khẩu cũ" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g ,'')" >
            <input type="password" name="new_pass" placeholder="Nhập mật khẩu mới" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g ,'')">
            <input type="password" name="confirm_pass" placeholder="Xác nhận mật khẩu mới" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g ,'')">
            <input type="submit" value="Cập nhật" name="submit" id="" class="btn">

        </form>

    </section>


    <?php include './components/footer.php'; ?>

    <script src="./js/script.js"></script>
</body>
</html>
