<?php
/****INCLUDE DB CONNECTION****/
global $conn;
require('config/config.php');
$base_url="http://" . $_SERVER['SERVER_NAME'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_POST["user_id"];

    $sql="select username,email,password,birth_date,phone_number,url
          from tbl_users where id='".$user_id."' ";
    $result=mysqli_query($conn,$sql);

    $html='';
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $html.='<p> User name : '.$row['username'].'</p>';
        $html.='<p> Email :'.$row['email'].'</p>';
        $html.='<p>Password : '.$row['password'].'</p>';
        $html.='<p>Birth Date :'.$row['birth_date'].'</p>';
        $html.='<p>Phone Number : '.$row['phone_number'].'</p>';
        $html.='<p>URL : '.$row['url'].'</p>';
    }

    echo json_encode(array('HTML'=>$html,'STATUS'=>'OK'));
}

?>