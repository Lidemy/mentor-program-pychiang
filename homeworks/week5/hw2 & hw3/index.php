<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>Peggy's Forum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- 導覽列 -->
    <div class="navbar">
        <div class="icon">留言板</div>
        <ul>
            <li><a href="./register.php">註冊</a></li>
            <li><a href="./logout.php">登出</a></li>
            <li><a href="./login.php">登入</a></li>
        </ul>
    </div>
    <div class="container">
        <!-- 主留言編寫區 -->
        <div class="mess__title">我要留言</div>
        <!-- 是會員才顯示留言區 -->
        <div class="message">
            <?php
                require_once ('conn.php');

                // 檢查是否有登入
                if(isset($_COOKIE['user_id'])) {
                    // 找出 cookie 裡的 user_id 跟 資料庫的 user_id 相同的資料
                    $user_id = $_COOKIE['user_id'];
                    $user_sql = "SELECT * FROM $users_table WHERE $user_id = $users_table.id";
                    $user_result = $conn->query($user_sql);
                    
                    if($user_result->num_rows > 0) {
                        while($user_row = $user_result->fetch_assoc()) {
            ?>
            <form class="mess__box" action="./add_messages.php" method="post" accept-charset="utf-8">
                <div class="form__nickname" name="nickname"><?= $user_row['nickname']; ?></div>
                <textarea class="form__input" name="message" cols="45" rows="3" placeholder="留言"></textarea>
                <input type="hidden" name="parent_id" value="0">
                <input class="submit" type="submit" name="submit" value="留言">
            </form>
            <?php
                        }
                    }
            
                } else {
            ?>
                <!-- 如果沒有登入，顯示提醒 -->
                <div class="detail">請註冊並且登入後才能留言</div>
            <?php
                // 確認 cookie 的括號
                }
            ?>
        </div>

        <div class="mess__title">留言列表</div>
        <div class="message">
            <?php
                // JOIN 結合兩個表格，取出使用者暱稱
                // 留言時間排序，較新在上
                $mess_sql = "SELECT $mess_table.id, $mess_table.message, $mess_table.created_at, $users_table.nickname 
                            FROM $mess_table JOIN $users_table 
                            WHERE parent_id= 0 AND $mess_table.user_id = $users_table.id 
                            ORDER BY $mess_table.created_at DESC";
                $mess_result = $conn->query($mess_sql);

                if($mess_result->num_rows > 0) {
                    while($row = $mess_result->fetch_assoc()) {
            ?>
            <!-- 主留言顯示區 -->
            <div class="mess__display">
                <div class="mess__nickname" name="nickname"><?= $row['nickname']; ?></div>
                <div class="mess__time" name="created_at"><?= $row['created_at']; ?></div>
                <div class="mess__content" name="message"><?= $row['message']; ?></div>
            </div>

            <?php
                // JOIN 結合兩個表格，取出使用者暱稱
                // 留言時間排序，較新在上
                $submess_sql = "SELECT $mess_table.id, $mess_table.message, $mess_table.created_at, $users_table.nickname 
                                FROM $mess_table JOIN $users_table 
                                WHERE parent_id= '$row[id]' AND $mess_table.user_id = $users_table.id  
                                ORDER BY $mess_table.created_at DESC";
                $submess_result = $conn->query($submess_sql);

                if($submess_result->num_rows > 0) {
                    while($sub_row = $submess_result->fetch_assoc()) {
            ?>
            <!-- 子留言顯示區 -->
            <div class="submessage">
                <div class="mess__nickname" name="nickname"><?= $sub_row['nickname']; ?></div>
                <div class="mess__time" name="created_at"><?= $sub_row['created_at']; ?></div>
                <div class="mess__content" name="message"><?= $sub_row['message']; ?></div>
            </div>
            <?php
                // 子留言顯示區的括號
                    }
                }
            ?>
            
            <?php
                // 檢查是否有登入
                if(isset($_COOKIE['user_id'])) {
                    // 找出 cookie 裡的 user_id 跟 資料庫的 user_id 相同的資料
                    $user_id = $_COOKIE['user_id'];
                    $user_sql = "SELECT * FROM $users_table WHERE $user_id = $users_table.id";
                    $user_result = $conn->query($user_sql);
                    
                    if($user_result->num_rows > 0) {
                        while($user_row = $user_result->fetch_assoc()) {
            ?>
            <!-- 子留言編寫區 -->
            <!-- 是會員才顯示回覆區 -->
            <form class="submess__box" action="./add_messages.php" method="post" accept-charset="utf-8">
                <div class="form__nickname" name="nickname"><?= $user_row['nickname']; ?></div>
                <textarea class="form__input" name="message" cols="45" rows="3" placeholder="回覆"></textarea>
                <input type="hidden" name="parent_id" value="<?= $row['id']; ?>">
                <input class="submit" type="submit" name="submit" value="回覆">
            </form>
            <?php
                        }
                    }
                } else {
            ?>
                <!-- 如果沒有登入，顯示提醒 -->
                <div class="detail">請註冊並且登入後才能回覆</div>
            <?php
                // 確認 cookie 的括號
                } 
            ?>

            <?php
                // 主留言顯示區的括號
                    }
                }
            ?>
        </div>
        
        <div class="footer">
            <ul>
                <li>[1]</li>
            </ul>
        </div>
    </div>
</body>
</html>