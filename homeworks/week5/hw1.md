資料庫名稱：messages

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
| id | integer | 主留言 ID (primary A_I) |
| message | text | 留言內容 |
| created_at | datetime | 留言時間 |
| parent_id | integer | 子留言所屬主留言的 ID |
| user_id | integer | 使用者 ID |