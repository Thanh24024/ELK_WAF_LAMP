<?php

   include './components/connect.php';

   session_start();

   if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];
   }else{
      $user_id = '';
   };

   if(isset($_POST['submit'])){

      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);
      $pass = $_POST['pass'];
      $pass = filter_var($pass, FILTER_SANITIZE_STRING);

      $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND `password` = ?");
      $select_user->execute([$email, $pass]);
      
      $errors = array();

      if($select_user->rowCount() > 0){
         $row = $select_user->fetch(PDO::FETCH_ASSOC);
         $_SESSION['user_id'] = $row['id'];
         header('location:index.php');
      }else{
         $errors['login'] = 'Email hoặc mật khẩu không đúng';
      }

   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css?v= <?php echo time(); ?>">
    <link rel="icon" href="./img/logo2.png">
    <title>Đăng nhập</title>
    <style>
        body {
            background-color: aliceblue;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container h3 {
            margin-left: 80px;
            margin-bottom: 20px; 
        }
    </style>
</head>
<body>

<section class="form-container">
    <div>
        <img src="./img/login.jpg" alt="Login Image"> 
    </div>

    <form action="" method="post">
        <h3>Đăng nhập</h3>
        <input type="email" name="email" required placeholder="Nhập email của bạn" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="password" name="pass" required placeholder="Nhập mật khẩu " class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
        <span class="error-message" id="error-login"><?php echo isset($errors['login']) ? $errors['login'] : '' ?></span>
        <input type="submit" value="Đăng nhập" name="submit">
        <p>Chưa có tài khoản ? <a href="register.php">Đăng kí ngay</a></p>
    </form>
</section>

</body>
</html>
