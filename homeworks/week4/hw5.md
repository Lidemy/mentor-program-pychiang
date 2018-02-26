1. 什麼是 DOM？
DOM (Document Object Model) 是 HTML 跟 XML 的程式界面，它將 HTML 的標籤看成節點 (node)。DOM 是瀏覽器提供的，可以讓程式語言（不侷限於 JavaScript，只是目前 JavaScript 是主流）來操縱 HTML 的結構 (structure)、樣式 (style)、或內容 (content)。

2. 什麼是 Ajax？
Ajax (Asynchronous JavaScript and XML) 透過瀏覽器提供的 API，讓網頁可以不更新頁面就與伺服器溝通，減少每次更新頁面浪費的時間，提高使用者體驗。
Ajax 最重要的是「非同步」執行的概念，利用 Ajax 技術，瀏覽器不需要等待 API response 回來才執行其他程式碼。但程式碼是由上往下執行的，要如何在不等待 API response 的情況下，還能回頭執行我們要 API 資料做的事情？所以就必須利用 callback function（回呼函式），在做「非同步」的時候，會先略過需要等待 API 資料才能執行的函式（會放在 callback function 中），先執行後面的程式碼，然後等到 API 資料回來後才執行 callback function。

3. HTTP method 有哪幾個？有什麼不一樣？
- `GET`: 最常見的 method，從伺服器端拿資料（例如：看網頁）。
- `POST`: 最常見的 method，從客戶端送資料去伺服器端（例如：登入）。
- `PATCH`: 更改部分的資料。
- `PUT`: 把整個資料都換新的。
- `DELETE`: 刪除資料。
- `OPTIONS`: 看伺服器支援哪些 method。
- `HEAD`: 跟 `GET` 一樣，差別在於 `HEAD` 的 response 沒有 body。
- `CONNECT`: 開啟客戶端與所請求資源的之間的雙向溝通的通道，可以用來建立 tunnel。

4. `GET` 跟 `POST` 有哪些區別，可以試著舉幾個例子嗎？

`GET`
- 在網址後面加上參數 （例如：`?a=1&b=2&C=3`）。
- 會自動做 URL encoding（例如：`=` 會 encode 成 `%3D`）。
- 因為是網址，所以有長度限制。
- 因為是網址，所以不會放敏感資訊。

`POST`
- 把參數放在 request body 裡面。
- 適合拿來放敏感資訊，從網址上看不出來。

5. 什麼是 RESTful API？
RESTful API 是一種設計風格，這種風格使 API 設計具有整體一致性，易於維護、擴展，並且充份利用 HTTP 協定的特點。（參考：[簡明RESTful API設計要點](https://tw.twincl.com/programming/*641y)）
例如寫 API interface 的時候利用 HTTP 動詞來寫：
- 列出資源 `GET/posts`
- 新增資源 `POST/posts`
- 得到資源 `GET/posts/:id`
- 修改資源 `PUT/posts/:id`
- 刪除資源 `DELETE/posts/:id`

6. JSON 是什麼？
JSON (JavaScript Object Notation)，是一種資料格式，常用於撰寫 API 裡面的交換資料，做為前、後端的溝通工具。用大括號 `{}` 包起來後，每筆資料都有 key 跟 value，且每筆資料用逗號分開，其中 key 要用雙引號包起來。

7. JSONP 是什麼？
JSONP (JSON with Padding) 利用 `<script>` 可以跨網域的特性，在 HTML 裡引入 API URL 到 `<script>` 裡，然後定義 callback function 的參數，在 JavaScript 檔案裡用 callback function 呼叫出 JSONP 的資料。但只能用 `GET` method。

8. 要如何存取跨網域的 API？
（複製貼上之前的筆記 XD）
要解決跨網域限制有兩個方法：

- JSONP (JSON with Padding):
原理是 `<script>` 標籤可以跨網域，在 HTML 裡面有幾個標籤不受到跨網域的限制，`<script>` 是其中一個。

可以在 HTML 裡引入 API URL 到 `<script>` 裡，然後定義 callback function 的參數，在 JavaScript 檔案裡用 callback function 呼叫出 JSONP 的資料。或是直接在 JavaScript 檔案裡引入 API URL 再利用 callback function 也可以。但是一般不建議使用 JSONP，因為如果引入 `<script>` 的網站遭駭客入侵，自身的網站也會受到影響。

- CORS (cross-origin resource sharing):
在 Response Header 中 Access-Control-Allow-Origin 可以看到 API 資料是否有開放跨網域存取。

跨網域存取分成：
a. 簡單請求：只允許 `GET`、`HEAD`、`POST` 這三個方法。

b. 先導請求 (Preflight Request)：先以 HTTP 的 `OPTIONS` 方法送出 request 到另一個網域，確定 Access-Control-Allow-Origin 沒問題後，才送出真正的 response 到此網域中。所以會發生送出一個 request 但有兩個 response，先導請求是瀏覽器驗證是否有開放跨網域存取的方法。如果想要避免先導請求多產生出來的 response，可以取消自訂義的標頭（例如 setRequestHeader）就可以解決了。

不過，要是遠端伺服器沒有開放跨網域存取，不管用什麼方法瀏覽器都沒辦法存取資料的。