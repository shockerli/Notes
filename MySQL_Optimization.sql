[MySQL优化方案]
1. 表设计合理，满足3NF规范
2. 适当创建索引
3. SQL语句优化
4. 适当创建存储过程/触发器/函数/视图
5. 分表和分区技术
6. PHP程序对MySQL维护
7. my.ini配置文件优化
8. 硬件升级

①3NF
[1NF]
	1. 表的各个属性(列)须具备原子性(不能分割)
	2. 表中不能有重复的列
	注意：关系型数据库本身就满足1NF
	关系型数据库：MySQL, SQL Server, Oracle, Informi
	非关系型数据库：面向集合或对象，Resis, MongoDB
[2NF]2NF是对记录的惟一性约束，要求记录有惟一标识，即实体的惟一性。要求表中不能存在完全相同的记录
[3NF]表中不能有冗余，即：如果某列的的数据可以通过显示推导或隐式推导，则不应该设置该列。
[反3NF]有时为了效率的提高，会出现冗余字段。

②慢查询
[开启日志]cmd{%mysql/bin%}>mysqld.exe --safe-mode --slow-query-log
	5.0及以下版本：mysqld.exe –log-slow-queries=d:/abc.log
[日志文件]my.ini配置文件，datadir="C:/Program Files/MySQL/Data/"
[时间]long_query_time，查询时间超过该值将记录日志
	[查看]show variables like 'long_query_time';
	[设置]set long_query_time = 1;
[日志记录]
	mysqld.exe, Version: 5.5.24-log (MySQL Community Server (GPL)). started with:
	TCP Port: 3306, Named Pipe: (null)
	Time                 Id Command    Argument
	# Time: 131205  0:15:54
	# User@HostUser@Host: root[root] @ localhost [127.0.0.1]
	# Query_time: 2.616149  Lock_time: 0.001000 Rows_sent: 1  Rows_examined: 5000000
	use guyuanbiao;
	SET timestamp=1386173754;
	select * from emp where empno=555555;

③EXPLAIN
-- 获得关于MySQL如何执行SELECT语句的信息
	EXPLAIN SELECT查询语句 \G
           id: 1 (查询序号)
  select_type: SIMPLE (查询方式)
        table: en_cn (查询所用到的表)
         type: const (检索类型)
possible_keys: name (可能用到的索引)
          key: name (实际使用的索引)
      key_len: 194 (使用的索引的长度)
          ref: const (索引的哪一列被使用)
         rows: 1 (MYSQL认为必须检查的用来返回请求数据的行数)
        Extra: (额外信息)

[type]连接使用的类型(由好到差)
	system：表仅有一行(=系统表)。这是const连接类型的一个特例。
	const：const用于用常数值比较PRIMARY KEY时。当查询的表仅有一行时，使用 System。
	eq_ref：除const类型外最好的可能实现的连接类型。它用在一个索引的所有部分被连接使用并且索引是UNIQUE或PRIMARY KEY，对于每个索引键，表中只有一条记录与之匹配。
	ref：连接不能基于关键字选择单个行，可能查找到多个符合条件的行。 叫做 ref 是因为索引要跟某个参考值相比较。这个参考值或者是一个常数，或者是来自一个表里的多表查询的结果值。
	ref_or_null：如同ref，但是MySQL必须在初次查找的结果里找出null条目，然后进行二次查找。
	index_merge：说明索引合并优化被使用了。
	unique_subquery：在某些IN查询中使用此种类型，而不是常规的ref
	index_subquery：在某些IN查询中使用此种类型，与unique_subquery类似，但是查询的是非唯一性索引
	range：只检索给定范围的行，使用一个索引来选择行。key列显示使用了哪个索引。当使用=、<>、>、>=、<、<=、IS NULL、<=>、BETWEEN或者 IN 操作符，用常量比较关键字列时，可以使用 range。
	index：全表扫描，只是扫描表的时候按照索引次序进行而不是行。主要优点就是避免了排序，但是开销仍然非常大。
	all：最坏的情况，从头到尾全表扫描。

④SHOW STATUS
[SHOW STATUS]提供服务器状态信息
	SHOW [GLOBAL|SESSION] STATUS [LIKE 'pattern']
	Com_xxx语句计数变量表示每个xxx语句执行的次数
		show status like 'Com_[select/insert/update/delete]';
	Connections：试图连接MySQL服务器的次数
	Uptime：服务器工作的时间（单位秒）
	Slow_queries：慢查询的次数 (默认是慢查询时间10s)

[SHOW TABLE STATUS]提供数据表的状态信息
	SHOW TABLE STATUS [FROM db_name] [LIKE 'pattern']
           Name:表名
         Engine:存储引擎
        Version:.frm文件的版本号
     Row_format:行存储格式
           Rows:行的数目
 Avg_row_length:平均的行长度
    Data_length:数据文件的长度
Max_data_length:数据文件的最大长度
   Index_length:索引文件的长度
      Data_free:被整序，但是未使用的字节的数目
 Auto_increment:下一个AUTO_INCREMENT值
    Create_time:建表时间
    Update_time:最后更新时间
     Check_time:最后检查时间
      Collation:表的字符集和整序
       Checksum:活性校验和值
 Create_options:和CREATE TABLE同时使用的额外选项
        Comment:创建表时使用的评注

⑤索引
[主键索引]PRIMARY KEY
	[创建]
	1. CREATE TABLE XXX (字段名 INT UNSIGNED PRIMARY KEY);
	2. CREATE TABLE XXX (字段名 INT UNSIGNED, PRIMARY KEY [index_type] (字段列表));
	3. ALTER TABLE XXX ADD PRIMARY KEY [index_type] (字段列表);
	index_type：BTREE, FULLTEXT, HASH, RTREE
	[删除]
	ALTER TABLE XXX DROP PRIMARY KEY;
	[特点]
	1. 一张表最多一个主键索引
	2. 主键索引可以同时指向多个字段，也称为复合索引
	3. 主键对应的字段，字段值不能重复，也不能为空
	4. 主键索引的效率相对较高
[唯一索引]UNIQUE
	[创建]
	1. CREATE TABLE XXX (字段名 INT UNSIGNED UNIQUE);
	2. CREATE UNIQUE INDEX [索引名] [USING index_type] ON 表名 (字段列表);
	3. ALTER TABLE XXX ADD UNIQUE [索引名] [index_type] (字段列表);
	[删除]
	ALTER TABLE XXX DROP INDEX 索引名;
	[特点]
	1. 一个表可以有多个唯一索引
	2. 唯一索引对应字段的值不能重复，但如果没有设定为NOT NULL，则值可为NULL，而且允许存在多个NULL
	3. 唯一索引的效率较高
[普通索引]INDEX/KEY
	[创建]
	1. CREATE INDEX [索引名] [USING index_type] ON 表名 (字段列表);
	2. ALTER TABLE XXX ADD INDEX INDEX [索引名] [index_type] (字段列表);
	3. CREATE TABLE XXX (字段名, INDEX [索引名] [index_type] (字段列表));
	[删除]
	ALTER TABLE 表名 DROP INDEX 索引名;
	DROP INDEX 索引名 ON 表名;
	[特点]
	1. 一个表可以有多个普通索引
	2. 普通索引可以同时指向多个字段
	3. 普通索引效率较低
	4. 不确定字段是否存在重复记录值时，只能创建普通索引
[全文索引]FULLTEXT
	[创建]
	1. CREATE TABLE XXX (字段1, 字段2, FULLTEXT (字段列表));
	2. ALTER TABLE XXX ADD FULLTEXT [索引名] (字段列表);
	[删除]
	ALTER TABLE XXX DROP INDEX [索引名];
	[特点]
	1. 只能对英文创建全文索引
	2. 只有myisam引擎支持全文索引
	3. FULLTEXT索引只能对CHAR, VARCHAR和TEXT列编制索引，并且只能在MyISAM表中编制。
	[使用]
	MATCH (col1,col2,...) AGAINST (expr [IN BOOLEAN MODE | WITH QUERY EXPANSION])
	eg: SELECT * FROM articles WHERE MATCH (title,body) AGAINST ('database');

[查看索引]
	1. SHOW KEYS FROM 表名
	2. SHOW INDEX FROM 表名
	3. SHOW INDEXES FROM 表名
	4. DESC 表名

[查看索引效率]
SHOW STATUS LIKE 'Handler_read%';
	handler_read_key:这个值越高越好，越高表示使用索引查询到的次数。
	handler_read_rnd_next:这个值越高，说明查询低效。

[使用规则]
1. 较频繁的作为查询字段应该创建索引
2. 唯一性太差的字段不适合单独创建索引
3. 更新非常频繁的字段不适合创建索引
4. 不会出现在WHERE子句中的字段不该创建索引


⑥SQL优化
1. 默认MySQL对GROUP BY子句的字段进行排序，使用ORDER BY NULL禁止排序
2. 子查询需建临时表，可用JOIN连接替代。但子查询和连接查询均应尽量避免。
3. 存储引擎的选择：
	1) 如果追求速度，不在乎数据是否一直把保存，也不考虑事务，请选择 memory 比如存放用户在线状态.
	2) 如果表的数据要持久保存，应用是以读操作和插入操作为主，只有很少的更新和删除操作，并且对事务的完整性要求不是很高。选用MyISAM
	3) 如果需要数据持久保存，并提供了具有提交、回滚和崩溃恢复能力的事务安全,请选用Innodb
4. 数据类型的选择：
	1) 在精度要求高的应用中，建议使用定点数(decimal)来存储数值，以保证结果的准确性。
	2) 对于存储引擎是MyISAM的数据库,如果经常做删除和修改记录的操作，要定时执行 optimize table table_name;功能对表进行碎片整理。
	3) 日期类型要根据实际需要选择能够满足应用的最小存储的日期类型
5. 如果全表扫描可能比使用索引快，则不使用索引。
6. 对于LIKE查询，%content类型(即%在左边)不会使用索引，%在右边会使用索引
7. 条件语句中有OR运算符，即使content%类型类型也不会使用索引
8. 对于复合索引(索引含有多字段)，查询条件只要使用了最左边的字段就会使用到索引
9. WHERE 子句优化
	1) 去除不必要的括号
	2) 常量重叠：(a<b AND b=c) AND a=5  =>  b>5 AND b=c AND a=5
	3) 去除常量条件：(B>=5 AND B=5) OR (B=6 AND 5=5) OR (B=7 AND 5=6)  =>  B=5 OR B=6
	4) 索引使用的常数表达式仅计算一次




⑦分表技术
1. 水平分表：将大表数据分到各小表，各个小表的结构一样。
2. 垂直分表：将表的某些字段单独其他表中，尤其是数据量大且很少查询的字段。

⑧分区技术
跨文件系统分配单个表的多个部分，每个部分在不同的位置被存储为单独的表。

分表				分区
多张数据表			一张数据表
重复数据表的风险		没有数据重复的风险
写入多张表			写入一张表
没有统一的约束限制	强制的约束限制

/*示例*/
CREATE TABLE employees (
    id INT NOT NULL,
    fname VARCHAR(30),
    lname VARCHAR(30),
    hired DATE NOT NULL DEFAULT '1970-01-01',
    separated DATE NOT NULL DEFAULT '9999-12-31'
)
PARTITION BY RANGE (YEAR(separated)) (
    PARTITION p0 VALUES LESS THAN (1991),
    PARTITION p1 VALUES LESS THAN (1996),
    PARTITION p2 VALUES LESS THAN (2001),
    PARTITION p3 VALUES LESS THAN MAXVALUE
);
-- RANGE表示分区类型
-- YEAR(separated)：表示如何分区
-- p0/p1等表示分区名
-- VALUES LESS THAN (1991)表示小于该值的记录存入该分区
-- VALUES LESS THAN MAXVALUE表示上一个分区容量的所有记录均存入该分区

-- 详细构建分区的语法->手册中CREATE TABLE语句

[EXPLAIN]获取查询语句详情，包含分区信息
explain partitions select语句

[清空数据]
TRUNCATE [TABLE] 表名
对于分区表，该语句会保留分区，即：数据和索引文件被取消并重新创建，同时分区定义（.par）文件不受影响

[维护分区]
ALTER TABLE 表名 分区子句
分区子句：
1. 新建分区 PARTITION BY partition_definition
2. 添加分区 ADD PARTITION partition_definition
3. 删除分区 DROP PARTITION partition_names
4. 优化分区 OPTIMIZE PARTITION partition_names
5. 修复分区 REPAIR PARTITION partition_names

[子分区]子分区是分区表中每个分区的再次分割
-- 示例
CREATE TABLE ts (id INT, purchased DATE)
    PARTITION BY RANGE(YEAR(purchased))
    SUBPARTITION BY HASH(TO_DAYS(purchased))
    SUBPARTITIONS 2
    (
        PARTITION p0 VALUES LESS THAN (1990),
        PARTITION p1 VALUES LESS THAN (2000),
        PARTITION p2 VALUES LESS THAN MAXVALUE
    )；


[分区的限制]
1. 只能对整型字段进行分区，或者可以通过函数转换成整型的字段进行分区
2. 最大分区数不超过1024
3. 如果含有唯一索引或者主键，则分区列必须包含所有的唯一索引或主键在内
4. 不支持外键
5. 不支持全文索引
6. 按日期进行分区较合适

[使用情形]
1. 海里数据表
2. 对于大表，特别是索引远远大于服务器有效内存时，可以不用索引，此时分区效率会更有效。

[分区类型]
RANGE 分区类型使用最多！
RANGE：基于属于一个给定连续区间的列值，把多行分配给分区
LIST：类似于按RANGE分区，区别在于LIST分区是基于列值匹配一个离散值集合中的某个值来进行选择
HASH：基于用户定义的表达式的返回值来进行选择的分区，该表达式使用将要插入到表中的这些行的列值进行计算。这个函数可以包含MySQL 中有效的、产生非负整数值的任何表达式。
KEY：类似于按HASH分区，区别在于KEY分区只支持计算一列或多列，且MySQL 服务器提供其自身的哈希函数。必须有一列或多列包含整数值。


⑨my.ini配置
1. INNODB
innodb_additional_mem_pool_size = 64M
innodb_buffer_pool_size = 1G
2. MyISAM
key_buffer_size=25M
3. 修改默认存储引擎
default-storage-engine = INNODB
4. 最大连接数
max_connetions 100
5. 修改MySQL端口

