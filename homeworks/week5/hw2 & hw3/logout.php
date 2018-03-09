<!DOCTYPE html>
<?php
    //清除 cookie，把時效設定在一小時前
    setcookie("user_id", "", time() - 3600);
?>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>Peggy's Forum Logout Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="mess__title">你已成功登出</div>
        <div class="message">
            <a class="linktext" href="./index.php">回到留言板</a>
            <a class="linktext" href="./login.php">重新登入</a>
        </div>
        
    </div>
    
</body>
</html>