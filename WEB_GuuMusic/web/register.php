<?php

include './components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $pass = ($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = ($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? OR number  = ?");
   $select_user->execute([$email, $number]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   $errors = array();

   if($select_user->rowCount() > 0){
      $errors['register'] = 'Email hoặc số điện thoại đã tồn tại';
   }else{
      if(strlen($name) > 30){
         $errors['name'] = 'Tên không được quá 30 kí tự';
      }else{
         if(substr($email, -10) !== "@gmail.com"){
            $errors['email'] = 'Mail không đúng';
         }else{
            if(strlen($pass) < 6){
               $errors['pass'] = 'Mật khẩu quá ngắn';
            }elseif(!preg_match("/[A-Z]/", $pass)){
               $errors['pass'] = 'Mật khẩu phải có ít nhất 1 kí tự viết hoa';
            }elseif(!preg_match("/[a-z]/", $pass)){
               $errors['pass'] = 'Mật khẩu phải có ít nhất 1 kí tự thường';
            }elseif(!preg_match("/[0-9]/", $pass)){
               $errors['pass'] = "Mật khẩu phải có ít nhất 1 chữ số";
            }else{
               if($cpass !== $pass){
                  $errors['cpass'] = 'Nhập lại mật khẩu không khớp';
               }else{
                  $insert_user = $conn->prepare("INSERT INTO `users`(name, email, number, password) VALUES(?,?,?,?)");
                  $insert_user->execute([$name, $email, $number, $cpass]);
                  $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
                  $select_user->execute([$email, $pass]);
                  $row = $select_user->fetch(PDO::FETCH_ASSOC);
                  if($select_user->rowCount() > 0){
                     $_SESSION['user_id'] = $row['id'];
                     header('location:index.php');
                  }
               }
            }
         }
      }
   }
}
   // if($select_user->rowCount() > 0){
   //    $message[] = 'email or number already exists!';
   // }else{
   //    if($pass != $cpass){
   //       $message[] = 'confirm password not matched!';
   //    }else{
   //       $insert_user = $conn->prepare("INSERT INTO `users`(name, email, number, password) VALUES(?,?,?,?)");
   //       $insert_user->execute([$name, $email, $number, $cpass]);
   //       $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   //       $select_user->execute([$email, $pass]);
   //       $row = $select_user->fetch(PDO::FETCH_ASSOC);
   //       if($select_user->rowCount() > 0){
   //          $_SESSION['user_id'] = $row['id'];
   //          header('location:home.php');
   //       }
   //    }
   // }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css?v= <?php echo time(); ?>">
    <link rel="icon" href="./img/logo2.png">
    <title>Đăng kí</title>
    <style>
        body {
            background-color: aliceblue;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container h3 {
            margin-left: 100px;
            margin-top: -70px;
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
        <h3>Đăng kí</h3>

        <input type="text" name="name" required placeholder="Nhập họ tên" maxlength="50" class="box">
        <span class="error-message" id="name-error"><?php echo isset($errors['name']) ? $errors['name'] : '' ?></span>
        <input type="email" name="email" required placeholder="Nhập email của bạn" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
        <span class="error-message" id="email-error"><?php echo isset($errors['email']) ? $errors['email'] : '' ?></span>
        <input type="number" name="number" required placeholder="Nhập số điện thoại" max="9999999999" min="0" maxlength="10" class="box">
        <span class="error-message" id="number-error"><?php echo isset($errors['number']) ? $errors['number'] : '' ?></span>
        <input type="password" name="pass" required placeholder="Nhập mật khẩu" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g ,'')">
        <span class="error-message" id="pass-error"><?php echo isset($errors['pass']) ? $errors['pass'] : '' ?></span>
        <input type="password" name="cpass" required placeholder="Nhập lại mật khẩu" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g ,'')">
        <span class="error-message" id="error-cpass"><?php echo isset($errors['cpass']) ? $errors['cpass'] : '' ?></span>

        <span class="error-message" id="error-register"><?php echo isset($errors['register']) ? $errors['register']: ''?></span>
        <input type="submit" value="Đăng kí" name="submit">
        <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
    </form>
</section>

        <script src="./js/script.js"></script>

</body>
</html>