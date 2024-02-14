<?php
/****INCLUDE DB CONNECTION****/
global $conn;
require('config/config.php');
$base_url="http://" . $_SERVER['SERVER_NAME'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_POST["user_id"];


    $sql="UPDATE tbl_users set status=0 where id='".$user_id."' ";

    if (mysqli_query($conn,$sql)) {
        echo json_encode(array('STATUS'=>'OK'));
    } else {
        echo json_encode(array('STATUS'=>'FAIL'));
    }
}

?>