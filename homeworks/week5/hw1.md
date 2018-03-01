資料庫名稱：forum

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
| mess_id | integer | 主留言 ID (primary A_I) |
| message | text | 留言內容 |
| time | datetime | 留言時間 |
| parent_id | integer | 子留言所屬主留言的 ID |
| nickname | varchar(32) | 暱稱 |