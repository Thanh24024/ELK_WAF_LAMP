<?php
    $servername = "192.168.240.158";   
    $port = "3306";
    $database = "mydb";   // trùng với docker-compose
    $username = "user";   // trùng docker-compose
    $password = "password";
    $conn = null;
    $dsn = "mysql:host=$servername;port=$port;dbname=$database;charset=utf8";
    
        try {
            if (is_null($conn)) {
                $conn = new PDO($dsn, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 //echo "Ket noi thanh cong<br>";               
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo $error_message;
        }
?>
