-- 批量更新多行数据
UPDATE categories
    SET display_order = CASE id
        WHEN 1 THEN 3
        WHEN 2 THEN 4
        WHEN 3 THEN 5
        ELSE display_order
    END,
    title = CASE id 
        WHEN 1 THEN 'New Title 1'
        WHEN 2 THEN 'New Title 2'
        WHEN 3 THEN 'New Title 3'
        ELSE title
    END
WHERE id IN (1,2,3)
-- mysql批量更新与批量更新多条记录的不同值实现方法 http://www.jb51.net/article/41852.htm


INSERT INTO test_tbl (id,dr) VALUES (1,'2'),(2,'3'),...(x,'y') ON DUPLICATE KEY UPDATE dr=VALUES(dr);

INSERT INTO test_tbl 
    (`license_id`, `serial`, `username`, `time`) 
VALUES 
    ('SDOHFOEI305', 'No.16NOVBJ005', 'A', 'November 19, 2016'),
    ('SDOHFOEI308', 'No.16NOVBJ008', 'B', 'November 19, 2016'),
    ('SDOHFOEI318', 'No.16NOVBJ018', 'C', 'November 19, 2016') 
ON DUPLICATE KEY UPDATE 
    serial=VALUES(serial), 
    username=VALUES(username), 
    time=VALUES(time)



-- 若要在i ≤ R ≤ j 这个范围得到一个随机整数R ，需要用到表达式：FLOOR(i + RAND() * (j - i + 1))
UPDATE `tablename` SET `field` = `field` + FLOOR(10 + RAND() * (100 - 10 + 1)) WHERE `id` IN (1, 2, 3);

