<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";
$mess_table = "messages";
$users_table = "users";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

