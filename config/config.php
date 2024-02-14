<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$database="db_gbg_group";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>