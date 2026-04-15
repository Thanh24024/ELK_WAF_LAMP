<?php

    include '../components/connect.php';

    session_start();

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:admin_login.php');
    };

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $pass = $_POST['pass'];
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        $cpass = $_POST['cpass'];
        $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

        $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE `name` = ? AND `password` = ?");
        $select_admin->execute([$name, $pass]);

        if($select_admin->rowCount() > 0){
            $message[] = 'Tài khoản đăng kí rồi mà khong nhớ shao! Ngốc quá!';
        }else{
            if($cpass != $pass){
                $message[] = 'Xác nhận mật khẩu sai kìa -.- ';
            }else{
                $insert_admin = $conn->prepare("INSERT INTO `admin`(`name`,`password`) VALUES(?,?)");
            }
        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo2.png">

    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

    <section class="form-container">

        <form action="" method="post">

            <h3>Đăng kí đi chần chờ chi</h3>
            <p>default username = <span>admin</span> & password = <span>123</span></p>
            <input type="text" name="name" maxlength="20" required placeholder="Tên đăng nhập" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="pass" maxlength="20" required placeholder="Mật khẩu" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name=cpass" maxlength="20" required placeholder="Xác nhận mật khẩu" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="submit" value="Đăng kí thêm admin" name="submit" class="btn">

        </form>

    </section>

</body>
</html>
