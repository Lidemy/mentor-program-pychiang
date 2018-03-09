<?php
    require_once ('conn.php');

    $error_flag = false;
    $notfound_flag = false;

    // 先找資料庫
    $login_sql = "SELECT * FROM $users_table";
    $login_result = $conn->query($login_sql);

    // 如果有資料，檢查密碼是否符合
    if($login_result->num_rows > 0) {
        while($login_row = $login_result->fetch_assoc()) {
            // 檢查使用者有沒有輸入資料
            if(empty($_POST['username'])==false && empty($_POST['password'])==false){
                // 預防攻擊
                $name = mysqli_real_escape_string($conn, $_POST['username']);
                $pw = mysqli_real_escape_string($conn, $_POST['password']);

                // 有輸入資料的話，檢查輸入帳號是否與資料庫符合
                if($name == $login_row['username']) {
                    if($pw == $login_row['password']) {
                        $user_id = $login_row['id'];

                        //設定 cookie 時效 24 小時
                        setcookie('user_id', $user_id, time()+3600*24);
                        
                        header('Location: ./member.php');
                    } else {
                        // 如果密碼不符合，繼續顯示網頁內容
                        $error_flag = true;
                    }

                } else {
                    // 如果沒有找到資料，繼續顯示網頁內容
                    $notfound_flag = true;
                }
            } else {
                // 如果使用者沒輸入資料，繼續顯示網頁
            }
        }

    }  
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>Peggy's Forum Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="mess__title">登入</div>
        <form action="./login.php" method="POST" accept-charset="utf-8">
            帳號：<input name="username" type="text" required>
            密碼：<input name="password" type="password" required>
            <input class="submit" type="submit" name="submit" value="登入">
        </form>

        <?php if($error_flag) { ?>
            <div class="alert">
                密碼錯誤！
            </div>
        <?php } ?>

        <?php if($notfound_flag) { ?>
            <div class="alert">
                未找到本使用者，請重新確認！
            </div>
        <?php } ?>
    </div>
    
</body>
</html>