Ajax(Asynchronous JavaScript And XML)	//异步JavaScript及XML

Ajax不允许跨域访问！

//创建 XMLHttpRequest 对象
if(window.XMLHttpRequest){
  	xmlhttp = new XMLHttpRequest();
}else if(window.ActiveXObject){
  	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	//IE5, IE6
}

//属性
readyState
	HTTP请求的状态。当一个XMLHttpRequest初次创建时，这个属性的值从0开始，直到接收到完整的HTTP响应，这个值增加到4。
	0 Uninitialized		初始化状态。XMLHttpRequest 对象已创建或已被 abort()方法重置。
	1 Open 				open()方法已调用，但 send()方法未调用。请求还没有被发送。
	2 Sent 				send()方法已调用，HTTP请求已发送到Web服务器。未接收到响应。
	3 Receiving 		所有响应头部都已经接收到。响应体开始接收但未完成。
	4 Loaded HTTP 		响应已经完全接收。
responseText	//获得字符串形式的响应数据
responseXML		//对请求的响应数据解析为XML并作为Document对象返回
status
	由服务器返回的HTTP状态代码，如200表示"OK"，而404表示"Not Found"错误。当readyState小于3的时候读取这一属性会导致一个异常。
statusText
	这个属性用名称而不是数字指定了请求的HTTP的状态代码。也就是说，当状态为200的时候它是"OK"，当状态为404的时候它是"Not Found"。和status属性一样，当readyState小于3的时候读取这一属性会导致一个异常。

//事件
onreadystatechange
	每次readyState属性改变的时候调用的事件句柄函数。当readyState为3时，它也可能调用多次。

//方法
open(method, url, async)	//初始化HTTP请求参数
	method：请求的类型；GET或POST 
	url：文件在服务器上的位置 
	async：true（异步）或 false（同步） 
send(body)	//发送HTTP请求，使用传递给open()方法的参数，以及传递给该方法的可选请求体
	如果通过调用open()指定的HTTP方法是POST或PUT，body参数指定了请求体，作为一个字符串或者Document对象。如果请求体不适必须的话，这个参数就为null。对于任何其他方法，这个参数是不可用的，应该为null。
setRequestHeader(name, value)	//向一个打开但未发送的请求设置或添加一个HTTP请求
	//只有当readyState为1的时候才能调用
	name参数是要设置的头部的名称。这个参数不应该包括空白、冒号或换行。
	value参数是头部的值。这个参数不应该包括换行。
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
abort()
	取消当前响应，关闭连接并且结束任何未决的网络活动。这个方法把XMLHttpRequest对象重置为readyState为0的状态，并且取消所有未决的网络活动。
getAllResponseHeaders()
	把HTTP响应头部作为未解析的字符串返回。
	如果readyState小于3，这个方法返回null。否则，它返回服务器发送的所有HTTP响应的头部。头部作为单个的字符串返回，一行一个头部。每行用换行符"\r\n"隔开。
getResponseHeader()
	返回指定的HTTP响应头部的值。其参数是要返回的HTTP响应头部的名称。可以使用任何大小写来制定这个头部名字，和响应头部的比较是不区分大小写的。
	该方法的返回值是指定的HTTP响应头部的值，如果没有接收到这个头部或者readyState小于3则为空字符串。如果接收到多个有指定名称的头部，这个头部的值被连接起来并返回，使用逗号和空格分隔开各个头部的值。

//FormData
FormData对象既可获取表单内容，也可获取附件内容
var obj = new FormData(document.getElementById('form'));    //获取表单的所有数据
var val = document.getElementById('file').files[0];     //获取节点附件数据
var upd = new FormData();   upd.append('data', 'val');    //给obj对象添加数据
var file = window.URL.createObjectURL(val);    //获取附件源地址信息

//XMLHttpRequestUpload
XMLHttpRequest 对象的upload属性是XMLHttpRequestUpload对象
var xhr = new XMLHttpRequest();
//每个50ms监听
xhr.upload.onprogress = function(event){
    event.loaded;   //已经上传大小
    event.total;    //文件总大小
}