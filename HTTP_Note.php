<?php

[HTTP请求] ----------
组成：请求行、请求头、请求主体

[请求行]
格式：Method Request-URI HTTP-Version CRLF
Method表示请求方法
Request-URI是一个统一资源标识符
HTTP-Version表示请求的HTTP协议版本
CRLF表示回车和换行

[请求头]
请求报头允许客户端向服务器端传递请求的附加信息以及客户端自身的信息

[请求主体]
请求时所携带的数据
典型的POST表单数据，GET请求方式的数据放在URL中

[模拟请求]
[建立连接]
fsockopen($host, $port [,$errno [,$errstr [,$timeout]]])
    返回一个文件指针，可用于 fgets(), fgetss(), fwrite(), fclose(), feof()等函数
[发送请求]
fwrite($handle, $str)
    将HTTP请求数据字符串写入资源
[读取数据]
fread($handle, $length)

[HTTP响应] ----------
组成：响应行、响应头、响应主体

[响应行]
格式：HTTP-Version Status-Code Reason-Phrase CRLF
HTTP-Version 表示服务器HTTP协议的版本
Status-Code 表示服务器发回的响应状态代码
Reason-Phrase 表示状态代码的文本描述

状态码：
1xx: 信息
2xx: 成功
3xx: 重定向
4xx: 客户端错误
5xx: 服务器错误

常见状态码、状态信息
200 OK：请求成功
301 Moved Permanently：重定向，所请求的页面已经转移至新的url
304 Not Modified：未按预期修改文档
400 Bad Request：服务器未能理解请求 
401 Unauthorized：被请求的页面需要用户名和密码
403 Forbidden：对被请求页面的访问被禁止
404 Not Found：服务器无法找到被请求的页面
500 Internal Server Error：服务器遇到不可预知的情况
503 Service Unavailable：服务器临时过载或当机 

典型响应行：HTTP/1.1 200 OK

[响应头]

[响应主体]
数据：PHP输出的数据，以及PHP标签外的任何内容

[模拟响应]
[响应行/响应头]
header($str)




[消息报头] ----------
类型：普通报头、请求报头、响应报头、实体报头
格式：标识 + ":" + 空格 + 值
1. 标识名称与大小写无关
2. 消息报头与主体之间用空行(CELF)分隔

[Host]指定被请求资源的主机和端口号
[Accept]指定客户端接受哪些类型的信息
    Accept: text/html;q=0.8,image/jpeg;q=0.2
    q参数表示相对选择等级，从0到1
[Accept-Charset]指定可接受的字符集
    Accept-Charset: UTF-8,*
[Accept-Encoding]指定可接受的内容编码
    Accept-Encoding: gzip,deflate
[Accept-Language]指定可接受的自然语言
    Accept-Language: zh-cn,zh;q=0.5
[Cache-Control]指定在请求/响应链上所有的缓存机制必须服从的指令
    Cache-Control: no-cache/no-store/
[Connection]是否长连接
    keep-alive：保持连接(HTTP/1.1默认)
    close：不保持连接(HTTP/1.0默认)
[Content-Encoding]指定请求/响应主体的编码
[Content-Length]指定请求/响应主体的长度
[Content-Type]响应主体类型
    Content-Type: text/html
    Content-Type: application/x-www-form-urlencoded
[Date]响应日期和时间
[Last-Modified]指示资源的最后修改日期和时间
[Location]重定向客户端到非Request-URI的位置来完成请求或标识新的资源
    Location: nextpage.html
[Referer]请求客户端来源地址
[Server]包含原始服务器处理请求所使用的软件的信息
    Server: Apache/2.2.22 (Win32) PHP/5.3.13
[User-Agent]发起请求的用户代理的信息
    User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1
[Content-Disposition]设置提醒用户将内容保存为文件
    header('Content-Disposition: attachment; filename=demo.jpg');
[Expires]给出响应被认为过期的日期/时间
    必须是GMT时间！
    时间格式："Mon, 09 Dec 2013 15:01:09"
    header('Expires: ' . gmdate('D, d M Y H:i:s', time()-1) . ' GMT');

#--------------------
[cURL]Client URL
[开启扩展]php.ini
extension=php_curl.dll
[潜在问题]若开启扩展失效，可将以下文件拷贝到system32目录下
libeay32.dll
libsasl.dll
#初始化cURL会话
curl_init() //初始化一个cURL会话
    $ch = curl_init();
#设置选项
curl_setopt($ch, $option, $value) //设置一个cURL传输选项
    curl_setopt($ch, CURLOPT_URL, 'localhost/demo.php');
#发出请求
curl_exec($ch) //执行一个cURL会话
#释放资源
curl_close($ch) //关闭一个cURL会话
#常用选项
CURLOPT_URL //需要获取的URL地址
    tip：绝对路径
    GET方式，直接将数据写在URL中
    curl_setopt($ch, CURLOPT_URL, 'localhost/demo.php?name=admin&pass=1234');
CURLOPT_HEADER //启用时会将头文件的信息作为数据流输出
CURLOPT_RETURNTRANSFER //将curl_exec()获取的信息以文件流的形式返回，而不是直接输出
CURLOPT_POST //启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded
CURLOPT_POSTFIELDS //全部数据使用HTTP协议中的"POST"操作来发送。
    要发送文件，在文件名前面加上@前缀并使用完整路径。
    这个参数可以通过urlencoded后的字符串类似'para1=val1&para2=val2&...'或使用一个以字段名为键值，字段数据为值的数组。
    如果value是一个数组，Content-Type头将会被设置成multipart/form-data。
    #POST表单提交/上传文件
    curl_setopt($ch, CURLOPT_POST, 1); //设置POST请求
    $post = array('name'=>'admin', 'pass'=>'admin'); //POST提交数据
    $post['file'] = '@' . __DIR__ . 'demo.txt'; //上传文件路径，绝对路径！
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post); //添加POST数据
CURLOPT_COOKIE 
CURLOPT_COOKIEJAR //连接结束后保存cookie信息的文件
    $cookie_file = 'D:/cookie.log';
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file); //设置COOKIE保存文件
CURLOPT_COOKIEFILE //包含cookie数据的文件名
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); //携带COOKIE保存文件
CURLOPT_REFERER //在HTTP请求头中"Referer: "的内容，$_SERVER['HTTP_REFERER']获取该值


//数据采集
$ch = curl_init(); //初始化cURL对象
curl_setopt($ch, CURLOPT_URL, $pic_url); //采集地址
curl_setopt($ch, CURLOPT_HEADER, 0); //去掉HTTP响应头
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //返回字符串数据
$pic = curl_exec($ch); //执行采集


#HTTP下载
$file = './sumsung.jpg';//文件名
$mime  = mime_content_type($file); //获取原文件的MIME类型
//获取MIME类型也可以：
//$finfo = finfo_open(FILEINFO_MIME); //获得一个得到文件的MIME类型的资源
//$mime  = finfo_file($finfo, $file); //获得某个文件的MIME类型
header('Content-Type: ' . $mime); //设置当前文件的MIME类型
header('Content-Disposition: attachment; filename=' . basename($file)); //设置附件下载及文件名
readfile($file); //读取文件内容并输出

可用Web服务器的X-Sendfile直接下载文件
http://www.laruence.com/2012/05/02/2613.html


//控制浏览器缓存
header('Expires: ' . gmdate('D, d M Y H:i:s', time()-1) . ' GMT');
header('Cache-Control: no-store no-cache must-revalidate');
