-- 批量更新多行数据
UPDATE categories
    SET display_order = CASE id
        WHEN 1 THEN 3
        WHEN 2 THEN 4
        WHEN 3 THEN 5
    END,
    title = CASE id 
        WHEN 1 THEN 'New Title 1'
        WHEN 2 THEN 'New Title 2'
        WHEN 3 THEN 'New Title 3'
    END
WHERE id IN (1,2,3)
-- mysql批量更新与批量更新多条记录的不同值实现方法 http://www.jb51.net/article/41852.htm

INSERT INTO test_tbl (id,dr) VALUES (1,'2'),(2,'3'),...(x,'y') ON DUPLICATE KEY UPDATE dr=VALUES(dr);
