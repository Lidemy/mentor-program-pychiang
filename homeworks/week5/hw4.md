## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼
VARCHAR 可以設定只需要幾個字元，比較節省空間。TEXT 則是固定要有 65535 (2 的 16 次方減 1) 字元的空間。

## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？
HTTP cookie 是伺服器送到使用者的瀏覽器上的小檔案。瀏覽器會儲存起來並在下次送 request 給同一個伺服器拿來使用，通常用來判斷兩個 request 是否來自同一個瀏覽器，像是會員登入、個人化設定、追蹤使用者習慣等等都是使用 cookie 的目的。

當接收到 HTTP request 的時候，伺服器可以在 response 的 header 裡設定 `set-cookie`也可以設定 cookie 的有效時間。cookie 被儲存在瀏覽器裡，然後當 cookie 跟 request 一起送到同一個伺服器時，會被放在 Cookie HTTP header。

## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？
1. 密碼沒有編碼，駭客入侵資料庫就會密碼外洩。
2. 把會員資料存放在客戶端瀏覽器的 cookie 裡是不安全的，應該存放在伺服器端的 session 裡。

