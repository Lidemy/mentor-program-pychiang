## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。
1.`<nav>`：可以放導覽連結的索引列。
2.`<strong>`：強調重點文字用的，會把文字加粗（以前好像看過現在偏向不用 <bold>，因為 <bold> 本身無意義，在搜尋時瀏覽器並不知道是重要文字，所以現在比較偏向使用 <strong>）。
3.`<img>`：放置圖片的標籤，需加入圖片來源連結。

## 請問什麼是盒模型（box modal）
在 HTML 中，所有元素都可被視為一個盒子，盒子裡由內而外含有：實際內容 (content)，內邊距 (padding)，邊界 (border)，以及外邊距 (margin)。

## 請問 display: inline, block 跟 inline-block 的差別是什麼？
1.inline：可以與其他元素並排，無法設定寬度與高度，也無法有上、下 margin。
2.block：會佔滿一整行的寬度，無法與其他元素並排，可以設定寬度與高度。
3.inline-block：跟inline一樣可以與其他元素並排，也跟 block 一樣可以設定寬度與高度。

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？
1.static：是預設值，會自動排列下來（預設是由上到下、由右到左排版），不會被定位，也就是不受 top, left, right, bottom 屬性影響位置。（例如left: 20px，但是 margin-left: 20px 會移動）。
2.relative：也會自動排列下來，但可以被定位，可以用 top, left, right, bottom 的屬性來偏移原本的常規位置，不會影響其他元素的位置。
3.absolute：可以絕對定位，定位在一個固定的位置，但上層的 position 屬性不能為 static。
4.fixed：會固定在視窗中的特定位置，即使轉動滾軸也是固定在同一位置。
