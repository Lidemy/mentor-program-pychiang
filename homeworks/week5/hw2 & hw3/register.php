<?php
    require_once('conn.php');

    $duplicate_flag = false;
    $fail_flag = false;

    // 按送出鍵後，且所有欄位都有填寫
    if(empty($_POST['username'])==false && empty($_POST['password'])==false && empty($_POST['nickname'])==false) {
        // 找資料庫
        $register_sql = "SELECT * FROM $users_table";
        $register_result = $conn->query($register_sql);
        $register_row = $register_result->fetch_assoc();

        // 檢查是否有一樣的帳號存在
        if($register_row['username'] == $_POST['username']) {
            $duplicate_flag = true;
        } else {
            // 如果沒有重複帳號，寫入新資料
            $newuser_sql = "INSERT INTO $users_table(username, password, nickname) VALUES('$_POST[username]', '$_POST[password]', '$_POST[nickname]')";

            // 檢查註冊是否成功
            if($conn->query($newuser_sql)) {
                header('Location: ./login.php');
            } else {
                die("Error: $newuser_sql <br> $conn->error");
            }
        } $conn->close(); 
    }
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>Peggy's Forum Register Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="container">
        <div class="mess__title">會員註冊</div>
        <form action="./register.php" method="POST" accept-charset="utf-8">
            帳號：<input name="username" type="text" required>
            密碼：<input name="password" type="password" required>
            暱稱：<input name="nickname" type="text" required>
            <input class="submit" type="submit" name="submit" value="註冊">
        </form> 

        <?php if($duplicate_flag){ ?>
            <div class="alert">
                此帳號已經註冊過！
            </div>
        <?php }?>

        <?php if($fail_flag){ ?>
            <div class="alert">
                註冊失敗！
            </div>
        <?php }?>       
    </div>
    
</body>
</html>