#!/usr/bin/env python

print
raw_input

\：转义字符
\n：换行符
\t：制表符
r''表示''内部的字符串默认不转义
'''...'''的格式表示多行内容
''''''前面加r也表示不转义

布尔值：True(1), False(0)

# list(列表)
list是一种有序的集合，可以随时添加和删除其中的元素
len() 获取列表元素个数
通过索引访问列表元素，-1表示最后一个元素
L.append(object) 末尾追加元素
L.insert(index, object) 在指定位置插入元素
L.pop(index) 删除指定位置的元素并返回该元素值
L[index] = value 可直接赋值到指定索引位置

#tuple(元组)
tuple一旦初始化就不能修改
只有1个元素的tuple定义时必须加一个逗号,，来消除歧义

#条件判断
if ... elif ... else
#循环
for x in ...
while SELECTION:
	pass

#range
range(stop) 生成从0开始，步数为1，小于stop的整数值列表
range(start, stop[, step]) 生成指定范围的整数值列表

