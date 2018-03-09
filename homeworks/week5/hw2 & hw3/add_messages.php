<?php
require_once('conn.php');

// 留言編寫區
// 取得 cookie 的 user_id
$user_id = $_COOKIE['user_id'];
$message = addslashes($_POST['message']);
$parent_id = $_POST['parent_id'];

$add_sql = "INSERT INTO $mess_table(user_id, message, parent_id) VALUES('$user_id', '$message', '$parent_id')";

if($conn->query($add_sql)) {
    header('Location: ./index.php');
} else {
    die("Error: $add_sql <br> $conn->error");
}
$conn->close();