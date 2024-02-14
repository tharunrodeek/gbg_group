<?php
/****INCLUDE DB CONNECTION****/
global $conn;
require('config/config.php');
$base_url="http://" . $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$url_explode=explode("save.php",$base_url);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $date_of_birth = $_POST["date_of_birth"];
    $phone_number = $_POST["phone_number"];
    $site_url = $_POST["site_url"];

    $sql="INSERT INTO tbl_users 
               (username,email,`password`,birth_date,phone_number,url,created_on)
          VALUES ('".$username."','".$password."','".$email."','".$date_of_birth."','".$phone_number."'
               ,'".$site_url."','".date('Y-m-d H:i:s')."')";

    if (mysqli_query($conn,$sql)) {
          header('Location: '.$url_explode[0].'/index.php?status=1');
    } else {
          header('Location: '.$url_explode[0].'/index.php?status=0');
    }
}

?>