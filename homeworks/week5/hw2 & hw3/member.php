<?php
    require_once('conn.php');
    
    if(!isset($_COOKIE['user_id'])) {
        header('Location: ./login.php');
    }
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>Peggy's Forum Memeber Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="mess__title">會員資料</div>
        <?php
            // 找出 cookie 裡的 user_id 跟 資料庫的 user_id 相同的資料
            $user_id = $_COOKIE['user_id'];
            $user_sql = "SELECT * FROM $users_table WHERE $user_id = $users_table.id";
            $user_result = $conn->query($user_sql);

            if($user_result->num_rows > 0) {
                while($user_row = $user_result->fetch_assoc()) {
        ?>
        <div class="message">
            <div class="form__input">帳號：<?= $user_row['username'] ?></div>
            <div class="form__input">暱稱：<?= $user_row['nickname'] ?></div>
            <a class="linktext" href="./index.php">前往留言板</a>
            <a class="linktext" href="./logout.php">登出</a>
        </div>
        
        <?php
                }
            }
        ?>

    </div>
    
</body>
</html>