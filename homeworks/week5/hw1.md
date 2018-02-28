資料庫名稱：forum

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
| mess_id | integer | 主留言 ID (primary A_I) |
| message | text | 主留言內容 |
| subject | varchar(64) | 主留言標題 |
| mess_time | datetime | 主留言時間 |
| reply_id | integer | 子留言 ID |
| reply | text | 子留言內容 (primary)|
| reply_time | datetime | 子留言時間 |
| nickname | varchar(32) | 暱稱 |