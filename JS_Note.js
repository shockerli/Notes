/*消息框*/
警告框：alert('文本')
	当警告框出现后，用户需要点击确定按钮才能继续进行操作。
确认框：confirm('文本')
	确认框出现后，用户需要点击确定或者取消按钮才能继续进行操作。
	如果用户点击确认，那么返回值为true。如果用户点击取消，那么返回值为false。
提示框：prompt('文本', '默认值')
调试框：console.log()	//将信息显示到调试工具(如FireBug)内
	会将对象可以使用的属性或方法显示出来

/*数据类型*/
原始类型：Undefined、Null、Boolean、Number、String
val.toString()    //转换为String
parseInt(val)     //转换为Number
parseFloat(val)   //转换为Float
强制转换：
Boolean(val)
Number(val)
String(val)

/*函数*/
函数名就是函数的首地址！
函数的参数都是局部变量，均是按值传递。
//匿名函数
var i = function(){...}     //将匿名函数首地址保存到变量中
i();    //调用匿名函数
(function(name){alert('Hello ' + name);})('张三')     //自调用匿名函数
//函数调用
obj = func;   //无括号表示将该函数首地址赋值给该变量，执行obj()相当于执行该函数func()
obj = func(); //有括号表示将该函数的返回值赋值给该变量

/*arguments对象*/
arguments      //返回一个包含传递给当前执行函数的每个参数的数组。
arguments.length    //包含了传递给函数的参数的数目。
对于arguments对象所包含的单个参数，其访问方法与数组中所包含的参数的访问方法相同。如：arguments[0]

/*执行流程*/
分段执行
读取代码段 -> 编译（声明变量、声明函数、语法检查、语义检查...） -> 执行 -> 下一代码段

/*Global对象*/
//方法
eval(str)   计算JS字符串，并把它作为脚本代码来执行
decodeURI() 解码某个编码的URI
encodeURI() 把字符串编码为URI
decodeURIComponent() 解码一个编码的URI组件
encodeURIComponent() 把字符串编码为URI组件
isNaN(num)  检查某个值是否是数字
Number(obj)  把对象的值转换为数字
String(obj)  把对象的值转换为字符串
parseFloat(str)  解析一个字符串并返回一个浮点数
parseInt(str, radix) 解析一个字符串并返回一个整数
    radix可选。表示要解析的数字的基数。该值介于2~36之间
//属性
NaN     指示某个值是不是数字值
undefined   指示未定义的值

/*数组Array对象*/
每个数组是Array类的实例。
文本下标元素不计入到数组的长度中
带有文本下标的元素需要使用for...in语句进行遍历
文本下标元素是数组对象的属性，可以使用“.”进行调用
数组属于Object类型。索引数组用[]访问元素，关联数组既可用[]也可用“.”访问元素。
//Array对象属性
arr.length  设置或返回数组中元素的数目
object.prototype.name = value   向对象添加属性和方法
//Array对象方法
arr.push(element[, ...])  向数组的末尾添加一个或更多元素，并返回新的长度
arr.unshift(element[, ...])   向数组的开头添加一个或更多元素，并返回新的长度
arr.shift() 删除并返回数组的第一个元素
arr.pop()   删除并返回数组的最后一个元素
arr.splice(index, howmany[, element, ...])  插入、删除或替换数组的元素
    index必需。规定从何处添加/删除元素。该参数是开始插入或删除的数组元素的下标，必须是数字。
    howmany必需。规定应该删除多少元素。必须是数字，但可以是"0"。如果未规定此参数，则删除从index开始到原数组结尾的所有元素。
    element可选。规定要添加到数组的新元素。从index所指的下标处开始插入。可多个。
arr.slice(start[, end]) 从某个已有的数组返回选定的元素
    start必需。规定从何处开始选取。如果是负数，那么它规定从数组尾部开始算起的位置。
    end可选。规定从何处结束选取。该参数是数组片断结束处的数组下标。
        如果没有指定该参数，那么切分的数组包含从start到数组结束的所有元素。
        如果这个参数是负数，那么它规定的是从数组尾部开始算起的元素。
    两个参数不可同时为负数。
arr.concat(arrayX[, ...]) 连接多个数组
    arrayX必需。该参数可以是具体的值，也可以是数组对象。可以是任意多个。
arr.join([separator])   连接数组元素为字符串
    separator为分隔符，默认为逗号。
str.split(separator[, howmany])    切割字符串成数组元素
    separator必需。字符串或正则表达式，从该参数指定的地方分割stringObject。如果为空字符串("")，则每个字符均被分割。
    howmany可选。该参数可指定返回的数组的最大长度。
arr.sort(sortby)    对数组的元素进行排序
    sortby可选。规定排序顺序。必须是函数。 

/*Math对象*/
Math对象并不像Date和String那样是对象的类，因此没有构造函数。均是静态属性和静态方法。
无需创建，通过把Math作为对象使用就可以调用其所有属性和方法。
//Math对象属性
Math.E  返回算术常量e，即自然对数的底数
Math.PI 返回圆周率
//Math对象方法
Math.abs(x)     返回数的绝对值
Math.ceil(x)    对数进行向上取整
Math.floor(x)   对数进行向下取整
Math.max(x, y)  返回x和y中的最高值
Math.min(x, y)  返回x和y中的最低值
Math.pow(x, y)  返回x的y次幂
Math.random()   返回0~1之间的随机数
Math.round(x)   对数进行四舍五入
Math.sqrt(x)    取平方根

/*Number对象*/
每个数值是Number类的实例。
var myNum=new Number(value);
var myNum=Number(value);
当 Number()和运算符 new 一起作为构造函数使用时，它返回一个新创建的 Number 对象。
如果不用 new 运算符，把 Number()作为一个函数来调用，它将把自己的参数转换成一个原始的数值，并且返回这个值（如果转换失败，则返回 NaN）。
//Number对象方法
NumberObject.toString(radix)    把一个Number对象转换为字符串，使用指定的进制数，默认为10
NumberObject.toLocaleString()   把一个Number对象转换为本地格式的字符串
NumberObject.toFixed(num)       把Number对象四舍五入为指定小数位数的数字
NumberObject.toExponential(num) 把对象的值转换成指数计数法
NumberObject.toPrecision(num)   把数字格式化为指定长度的指数计数法

/*String对象*/
通过new关键字创建的字符串可给起添加属性和方法，而普通的字面量写法不可以。如：
var box = new String('value');
box.name = 'val';   //有效
box.age = function(){return 50;}    //有效
var pox = 'value';
pox.name = 'val';   //无效
//以上方式的区别，适用于Boolean、Number、String三种基本包装类型
//属性
str.length      字符串长度
//方法
str.charAt(index)       返回在指定位置的字符
str.indexOf(subString[, startIndex])     返回某个指定的字符串值在字符串中首次出现的位置
    startIndex：字符串中开始检索的位置
    如果要检索的字符串值没有出现，则该方法返回-1。
str.lastIndexOf(subString[, startIndex])    返回某个指定的字符串值在字符串中最后一次出现的位置
str.match(regexp)       在字符串内检索指定的值，或找到一个或多个正则表达式的匹配
str.replace(regexp/substr, replacement)     在字符串中用一些字符替换另一些字符，或替换一个与正则表达式匹配的子串
str.search(regexp)      检索字符串中指定的子字符串，或检索与正则表达式相匹配的子字符串
str.slice(start, end)   提取字符串的片断（参数可以为负）
str.substring(start, stop)  提取字符串中两个指定的索引号之间的字符
str.substr(start, length)   从起始索引号提取字符串中指定数目的字符
str.toLowerCase()   把字符串转换为小写
str.toUpperCase()   把字符串转换为大写
str.localeCompare(target)   用本地特定的顺序来比较两个字符串
    如果str小于target，则返回小于0的数。
    如果str大于target，则该方法返回大于0的数。
    如果两个字符串相等，或根据本地排序规则没有区别，该方法返回0。

/*Date对象*/
Date()  返回当日的日期和时间  //var d = new Date()
d.getFullYear()     年份(4位数)
d.getMonth()        月份(0~11)
d.getDate()         天数(1~31)
d.getDay()          星期(0~6)
d.getHours()        返回Date对象的小时(0~23)
d.getMinutes()      返回Date对象的分钟(0~59)
d.getSeconds()      返回Date对象的秒数(0~59)
d.getMilliseconds() 返回Date对象的毫秒(0~999)
d.getTime()         返回1970年1月1日至今的毫秒数
Date.parse(datestr) 返回1970年1月1日午夜到指定日期(字符串)的毫秒数
d.toLocaleString()  根据本地时间格式，把Date对象转换为字符串
d.toLocaleTimeString()  根据本地时间格式，把Date对象的时间部分转换为字符串
d.toLocaleDateString()  根据本地时间格式，把Date对象的日期部分转换为字符串

/*HTML DOM(基本)*/
HTML文档对象模型（HTML Document Object Model）
//节点
HTML文档中的每个成分都是一个节点。
    整个文档是一个文档节点
    每个HTML标签是一个元素节点
    包含在HTML元素中的文本是文本节点
    每一个HTML属性是一个属性节点
    注释属于注释节点
//节点访问
document.getElementById()           返回对拥有指定id的第一个对象的引用
document.getElementsByName()        返回拥有指定name属性值的对象集合
document.getElementsByTagName()     返回拥有指定标签名的对象集合
document.forms  //文档中所有form表单节点的集合
document.images //文档中所有img标签节点的集合
document.links  //文档中所有指定了HREF属性的a对象和所有area对象的集合

parentNode  //父节点
childNodes  //所有子节点的集合
firstChild  //第一个子节点
lastChild   //最后一个子节点
nextSibling     //后一个节点
previousSibling //前一个节点


document.documentElement    //访问HTML或XML文档根节点
document.body               //访问HTML中的body标签
//节点列表
对于节点列表，可通过索引下标访问。例如：document.getElementsByTagName('img')[3]
也可通过length属性获得其节点个数。例如：document.getElementsByTagName('img').length
//节点信息
nodeName    //节点名称
    元素节点的nodeName是标签名称
    属性节点的nodeName是属性名称
    文本节点的nodeName永远是#text
    文档节点的nodeName永远是#document
    nodeName所包含的XML元素的标签名称永远是大写的
nodeValue   //节点值
    对于文本节点，nodeValue属性包含文本。
    对于属性节点，nodeValue属性包含属性值。
    nodeValue属性对于文档节点和元素节点是不可用的。
nodeType    //节点类型
    元素 -> 1, 属性 -> 2, 文本 -> 3, 注释 -> 8, 文档 -> 9
//节点属性
对节点属性的访问，既可取值，也可赋值。
HTML属性：
    对象.属性名
    特例：对象.className   //访问class属性
CSS属性：
    对象.style.属性名      //将属性名原“-”连接处改成驼峰式命名
    特例：
        W3C：对象.style.cssFloat
        IE：对象.style.styleFloat
value		//获取元素的值
innerHTML   //设置或获取位于对象起始和结束标签内的HTML
innerText   //设置或获取位于对象起始和结束标签内的文本
outerHTML	//设置或获取对象及其内容的HTML形式
outerText	//设置或获取对象的文本
clientWidth;	//获取对象的宽度，不计算任何边距、边框、滚动条或可能应用到该对象的补白
clientHeight;	//获取对象的高度，不计算任何边距、边框、滚动条或可能应用到该对象的补白
clientLeft      //获取 offsetLeft 属性和客户区域的实际左边之间的距离
clientTop       //获取 offsetTop 属性和客户区域的实际顶端之间的距离
offsetWidth     //获取对象相对于版面或由父坐标 offsetParent 属性指定的父坐标的宽度
offsetHeight    //获取对象相对于版面或由父坐标 offsetParent 属性指定的父坐标的高度
offsetLeft      //获取对象相对于版面或由 offsetParent 属性指定的父坐标的计算左侧位置
offsetTop       //获取对象相对于版面或由 offsetTop 属性指定的父坐标的计算顶端位置

//节点创建
document.createElement(sTag)    //给文档创建标签(元素)节点
document.createStyleSheet([sURL[, iIndex]])     //给文档创建样式表
//节点方法
document.write()    //向文档写HTML表达式或JS代码
document.writeln()  //等同于write()方法，不同的是在每个表达式之后写一个换行符
obj.focus()     //使得元素得到焦点并执行由onfocus事件指定的代码
obj.blur()      //使得元素失去焦点并执行由onblur事件指定的代码
obj.appendChild(oNode)   //给对象追加一个子节点
obj.applyElement(oNew[, sWhere])  //使得元素成为其它元素的子元素或父元素
    sWhere：outside(默认，成为oNew节点的父节点)，inside(obj成为oNew节点的子节点，自身原有子节点也移动)
obj.removeChild(oNode)  //删除某个子节点
obj.select()    //使表单元素内容处于选中状态(input, textarea)
obj.index[=iIndex]   //获取或设置下拉列表框中的依序位置(仅适用option)
obj.selected[='selected']      //设置或获取列表框中的选项是否为默认项目(仅适用option)
obj.checked[='checked']     //设置或获取复选框或单选钮的状态(仅适用option)
obj.disabled[='disabled']   //获取表明用户是否可与该对象交互的值
obj.selectedIndex[=num]		//设置或返回下拉列表中被选选项的索引号(仅适用select)

//事件属性
event.target(W3C)/event.srcElement(IE)   //获取触发当前事件的节点
event.keyCode   //设置或获取与导致事件的按键关联的键值(onkeypress与onkeyup/onkeydown不同)
event.clientX   //事件触发时，鼠标相对于浏览器的横坐标
event.clientY   //事件触发时，鼠标相对于浏览器的竖坐标
//事件列表
onload 一张页面或一幅图像完成加载
onunload 用户退出页面(刷新页面也触发)
onclick 当用户点击某个对象时调用的事件句柄
onfocus 元素获得焦点
onblur 元素失去焦点
onmousedown 鼠标按钮被按下
onmouseup 鼠标按键被松开
onmousemove 鼠标被移动
onmouseover 鼠标移到某元素之上
onmouseout 鼠标从某元素移开
onchange 域的内容被改变(input type=text, select, textarea)
onselect 文本被选中
onkeypress 某个键盘按键被按下并松开(无法捕获功能键)
onkeydown 某个键盘按键被按下
onkeyup 某个键盘按键被松开
onsubmit 确认按钮被点击
onreset 重置按钮被点击

/*事件编程*/
//事件绑定
行内绑定
动态绑定(结构、样式与行为的分离)
    对象.事件 = 事件处理程序
事件监听
给事件绑定处理程序：
    IE：bSuccess = object.attachEvent(sEvent, fpNotify)
        sEvent：事件名
        fpNotify：处理程序
        IE只支持冒泡模型。
        返回值bSuccess为boolean类型。
    W3C：addEventListener(type, callback[, capture])
        type：事件名（除去on的事件名，如click）（只有监听时才没有on）
        callback：处理程序
        capture：使用冒泡模型(false，默认)还是捕捉模型(true)
    不同点：
        a. 监听的方法不同
        b. 参数不同
        c. 事件名称不同
        d. W3C支持捕获模型，IE只支持冒泡模型
        e. 事件处理程序触发顺序不同，IE：先绑定后触发，W3C：先绑定先触发
//事件模型
只针对父元素和子元素具有相同事件触发。
捕捉模型：从外往里相应
冒泡模型：从里往外响应
IE：window.event.cancelBubble = true
W3C：obj.onclick = function func(event){event.stopPropagation();}   //需要给处理程序传递event对象
//默认行为
某些元素具有自己的行为。
IE：window.event.returnValue = false;
W3C：event.preventDefault();
也可以用 return false 进行取消。
//事件对象
事件发生时自动产生的对象，具有兼容问题。
IE：window.event    //通过window对象进行调用event对象
W3C：function (event){}  //通过参数传递event对象，IE也支持该调用方式
获取键值：
    IE：window.event.keyCode 或 event.keyCode    //chrome也支持该方式
    W3C：event.keyCode 或 event.which
    onkeyup 与 onkeydown 获得的键值一样，与 onkeypress 不一样。

/*BOM*/ Browser Object Model
//Window对象
Window对象表示一个浏览器窗口或一个框架，即全局对象，可以省略。
如果没有给this指定对象，则this代表Window对象。
//方法
alert(msg) 显示带有一段消息和一个确认按钮的警告框   //msg为纯文本信息
w.blur() 把键盘焦点从顶层窗口移开
window.open([URL, name, features, replace])
w.close() 关闭浏览器窗口
confirm(msg) 显示带有一段消息以及确认按钮和取消按钮的对话框
w.focus() 把键盘焦点给予一个窗口
w.moveBy(x,y) 可相对窗口的当前坐标把它移动指定的像素
w.moveTo(x,y) 把窗口的左上角移动到一个指定的坐标
w.print() 打印当前窗口的内容
prompt(text, defaultText) 显示可提示用户输入的对话框
w.setInterval(code, millisec) 按照指定的周期（以毫秒计）来调用函数或计算表达式
w.clearInterval(id_of_setinterval) 取消由setInterval()设置的timeout
w.setTimeout(code, millisec) 在指定的毫秒数后调用函数或计算表达式
w.clearTimeout(id_of_settimeout) 取消由setTimeout()方法设置的timeout
scrollBy(x, y) 按照指定的像素值来滚动内容
scrollTo(x, y) 把内容滚动到指定的坐标
resizeBy(width, height) 照指定的像素调整窗口的大小
resizeTo(width, height) 把窗口的大小调整到指定的宽度和高度

/*Navigator对象*/
//属性
navigator.appCodeName 返回浏览器的代码名
navigator.appName 返回浏览器的名称
navigator.appVersion 返回浏览器的平台和版本信息
navigator.cookieEnabled 返回指明浏览器中是否启用cookie的布尔值
navigator.onLine 返回指明系统是否处于脱机模式的布尔值
navigator.platform 返回运行浏览器的操作系统平台
navigator.userAgent 返回由客户机发送服务器的user-agent头部的值

/*Location对象*/ 包含有关当前URL的信息
//属性
hash 设置或返回从井号(#)开始的URL（锚）
host 设置或返回主机名和当前URL的端口号
hostname 设置或返回当前URL的主机名
href 设置或返回完整的URL
pathname 设置或返回当前URL的路径部分
port 设置或返回当前URL的端口号
protocol 设置或返回当前URL的协议
search 设置或返回从问号(?)开始的URL（查询部分）
//方法
location.assign(URL) 加载新的文档
location.reload(force) 重新加载当前文档  //force默认为false(F5)，true表示强制刷新
location.replace(newURL) 用新的文档替换当前文档

/*Screen对象*/ 包含有关客户端显示屏幕的信息
screen.availHeight 返回显示屏幕的高度(除Windows任务栏之外)
screen.availWidth 返回显示屏幕的宽度(除Windows任务栏之外)
screen.height 返回显示屏幕的高度
screen.width 返回显示屏幕的宽度
screen.colorDepth 返回目标设备或缓冲器上的调色板的比特深度

/*Document对象*/
Document代表整个HTML DOM。每个载入浏览器的HTML文档都会成为Document对象。
//属性
document.cookie 设置或返回与当前文档有关的所有cookie
document.title 返回当前文档的标题
//方法
getElementById() 返回对拥有指定id的第一个对象的引用
getElementsByName() 返回带有指定名称的对象集合
getElementsByTagName() 返回带有指定标签名的对象集合

/*类*/
对象是属性的无序集合！
//构造函数
function func(){}
JS没有类的定义语句，function定义之后，这个函数就是同名类的构造函数。
//实例化类
var obj = new func();    //实例化类时，该类的同名函数(即构造函数)会自动执行。
    类名后的括号，在不需要传递参数给构造函数时，可省略。
obj.arg = 'val';     //JS中的对象属性在创建对象后动态添加
//属性的访问
对象.属性名 或 对象['属性']
属性的类型：字符串、数值、布尔型、对象
//属性的删除
delete obj.attr     //只能删除自定义对象的属性
//JS中，一切皆对象！
obj.constructor     返回对象的构造器
    由对象调用！
    系统类：Array, Boolean, Date, Math, Number, String, RegExp, Functions, Events
typeof obj          返回对象类型
obj instanceof className    判断某对象是否为某个类的实例
//函数的使用方式：面向对象的形式
var obj = new func();   //obj对象调用func()
func();     window.func();  //相当于window对象调用func()
//内存
对象的名保存在栈中，对象的数据保存在堆中，将对象1赋值给对象2，则将对象1的堆地址赋值给对象2，即对堆地址的引用。
删除对象2，即释放对象2在栈中的内存，并未影响对象1及其堆中的数据。
obj2= null;(释放变量或对象的方式)
非Object类型均存放到栈内存中。
//this
定义类的构造函数时，用this代表本对象，在构造函数内给其添加属性。如：
function Func(arg){
    this.attr = arg;
}
var obj = new Func('value');    //实例化时传递参数
则每个实例化该类的对象均有arg这个属性。
    //this总是引用代码当前所在的那个对象。
    //如果在其他所有对象的上下文之外使用this，则它指的是window对象。

/*作用域链*/ 
函数内部为局部作用域，函数外部为全局作用域。
使用var声明变量则是局部变量，不使用则为全局变量(需该函数至少被执行过一次才能成为有效的全局变量)。
    一个变量没有找到它的声明，则会自动向上一级作用域中去找，如果找到声明则使用这个变量；如果没有没有找到则继续向上一级找；如果在全局作用域中找到声明则使用全局作用域的这个变量，如果全局作用域也没找到，则在全局作用域中自动创建该变量。
//局部访问全局变量->作用域链
//全局访问局部变量->函数闭包

　　全局执行环境是最外围的执行环境。在Web浏览器中，全局执行环境被认为是window对象。因此所有的全局变量和函数都是作为window对象的属性和方法创建的。全局的变量和函数，都是window对象的属性和方法。

/*函数闭包*/
1. 读取函数内部的局部变量
2. 让这些变量的值始终保存在内存中
函数可以返回另一个函数的首地址。
被返回的函数首地址存在，则该函数不会被回收。
被返回的局部函数使用到的局部变量会一直存于内存中，也不会被回收。
function func(arg1){
    var i = arg1;
    this.get = function(arg2){  //将匿名函数首地址存入对象方法
        return i = arg2;
    }
}
var f = func('abc');
f.get('123');    //值为传递的参数值'123'

/*对象之间的赋值*/
对象可作为参数传递到函数内部。
函数传递参数时，形参值的改变不会影响到实参，但对象作为实参例外。因为传递的是该对象值的堆地址。
对象可作为返回值返回，则可以返回多个数据。返回对象，相当于将该对象的首地址赋值给新变量，故对象原来的首地址和数据依然存在。
一块堆内存被指向几次会自动计数，如果次数为0，则会自动回收内存。

/*for...in遍历对象*/
for...in语句是严格的迭代语句，用于枚举对象的属性
对象属性的访问：obj[i]，不能用“.”的形式访问

/*成员方法*/
给对象增加一个属性保存添加的方法(函数)的首地址，调用对象的方法就可以。如：
obj.fun = func;    //将func()函数的首地址保存到obj.fun这个属性(即对象的新方法)
obj.fun();  //调用对象的fun()方法
也可以在构造函数内用对象的属性保存匿名函数，这样就拥有了某个方法。


/*JSON*/
1. 对象是指属性的无序集合。
2. 所谓“集合”是指名/值对的集合。属性名:属性值
3. 可以用{}表示该集合。
var json = {名:值, 名:值[,...]}
属性名可以不加引号，也可以加单引号或双引号，含义相同。
调用方式：对象名.属性名
可用数组保存多个JSON对象。
JSON对象属性中可用匿名函数保存为方法，用this代表当前对象。
例：
var obj = {
    name:'lisi';    //name是属性，不是变量
    age:30;
    say:function(){
        alert(this.name);
    }
}
使用{}创建出JSON对象，是Object类的实例。

//PHP与JSON
json_encode(mixed $value)   //对变量进行JSON编码
    $value只能接受UTF-8编码的数据
    只能从数组或对象上生成JSON字符串，对象的属性必须是public
json_decode(str $json [, bool $assoc])  //对JSON字符串进行解析
    参数assoc为true时，将返回array而非object（默认）。

/*prototype*/
功能：返回对象类型原型的引用，可以向原型对象添加属性和方法
格式：class.prototype.name = val;     //给class类的原型对象添加实例(对象)属性
    由类调用！
    该类实例化的所有对象均拥有通过prototype动态添加的属性或方法。
class.name = val;   //给class类添加静态属性
obj.name = val;     //给obj对象单独添加属性
    每个函数都有一个独立的原型对象。
    类的构造器均有个prototype属性指向该类的原型对象，该类的原型对象也有个constructor属性指向该类的构造器。
    当一个对象找不到相应的属性时，会到它的构造器的原型对象中去找。也就是说，prototype添加属性或方法不是添加到该类的实例对象上，而是添加到该类的原型对象上，便于各实例对象去找到该新添的属性或方法。
    如果给实例化的对象单独添加原型对象中具有的属性，则该对象用自身的属性。但不会影响原型对象中的属性。如果自身调用该属性，但没有时才会去原型对象中寻找。
Func.prototype.name = 'val';
var p1 = new Func();
var p2 = new Func();
p1.name = 'new_val';
//此时相当于给p1.name赋值，但未改变原型对象的name属性值
//而p2.name依然等于原型对象的值

//原型继承
原型是Object类实例化的一个对象。
创建原型对象时，系统会自动执行 className.prototype = new Object();
任何一个类的实例对象均可调用Object类的所有属性和方法。
childObj.prototype = new ParentObj();   //将子类的原型对象实例化为父类的实例，则不再是Object类的实例，但依然拥有Object的属性和方法

//原型链
如果该类的原型对象中也找不到相应的属性，就会去实例化该对象的类的原型对象中找，如果还找不到就会去Object的原型对象中找，如果还找不到就到未知区域找，然后返回undefined
Object原型对象中Object.prototype的动态属性或方法，可以被任何类的实例对象调用。

/*Object类*/
Object类是所有类的基类，使用Object类创建自定义对象时，可以无需定义构造函数。
只需保存数据，不关心对象类型时，不需要定义构造器，可用Object类。var obj = new Object();
subClass.prototype = new Object();
obj.hasOwnProperty(property)    //判断当前对象是否具有某个属性
//实例属性
语法：对象.属性名
//静态属性(模拟，本身不具备)
语法：类名.属性名
//私有属性(模拟，本身不具备)
构造器内部，使用this声明的是公有的，使用var声明的是私有的。
var声明的是一个局部变量，而非属性，函数执行完毕会被回收。

/*call, apply*/
作用：调用一个对象的一个方法，以另一个对象替换当前对象
func.call([thisObj[, arg, ...]])
func.apply([thisObj[,argArray]])
    thisObj：将被用作当前对象的对象，如果省略则用Global对象
将func函数中this对象指向thisObj，并给func传递参数，然后再执行func函数。

/*继承模拟*/
//方式一：Object.prototype
Object.prototype.ext = function(parObject){
    for(var i in parObject){
        this[i] = parObject[i];
    }
}
将父类需要被子类继承的属性和方法添加到Object原型对象中，以便子类可以访问。
//方式二：call, apply
子类中调用父类构造函数，并传递this、参数。
function Parent(arg){   //父类构造器
    this.i = arg;
}
function Child(arg1, arg2){
    this.k = arg1;
    Person.call(this, arg2);    //将arg2参数传递给Person的arg实参
}
用this代表当前对象，到父类构造器中添加父类的属性和方法到本类中。
//方式三：原型继承
childObj.prototype = new ParentObj();   //子类拥有父类的属性和方法，不再是Object类的
