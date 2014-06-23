<!-- XML -->
XML：EXtensible Markup Language，可扩展标记语言
XML是独立于软件和硬件的信息传输工具。
用途：XML用以结构化、存储及传输数据，HTML用以显示数据。
语法：
    1. 元素必须有关闭标签。
    2. 标签对大小写敏感。
    3. 元素必须正确嵌套。
    4. 文档必须有且仅有一个根元素。
    5. 元素的属性值必须加引号。
    6. 连续空格不会被删节。
    7. 以换行符LF存储换行。
命名：
    1. 可以包含字母、数字、下划线等
    2. 不能以数字或者标点符号开始
    3. 不能以xml、Xml或XML等开头
    4. 不能包含空格
元数据（有关数据的数据）应当存储为属性，而数据本身应当存储为元素。

<?xml version="1.0" encoding="utf-8" ?>
<?xml-stylesheet type="text/css" href="style.css" ?>    加载CSS样式表，用标签选择器
<?xml-stylesheet type="text/xsl" href="style.xsl" ?>    加载XSLT样式表
<![CDATA[内容]]>     用以存放不被解析的内容


<!-- DTD -->
XML约束技术：XML DTD、XML Schema、XDR、SOX
DTD：Document Type Definition，文档类型定义，可定义合法的XML文档构建模块。

-- DOCTYPE声明
<!DOCTYPE 根元素 [元素声明]>
<!DOCTYPE 根元素 SYSTEM "文件名">

元素是XML以及HTML文档的主要构建模块。
属性可提供有关元素的额外信息。
实体是用来定义普通文本的变量。实体引用是对实体的引用。
PCDATA(parsed character data)是会被解析器解析的文本。文本中的标签会被当作标记来处理，而实体会被展开。
CDATA(character data)是不会被解析器解析的文本。在这些文本中的标签不会被当作标记来对待，其中的实体也不会被展开。

-- 元素声明
<!ELEMENT 元素名称 类别> 或 <!ELEMENT 元素名称 (元素内容))>
元素类别：
    空元素，EMPTY：<!ELEMENT 元素名称 EMPTY>
    只有PCDATA的元素，PCDATA：<!ELEMENT 元素名称 (#PCDATA)>
    带有任何内容的元素，ANY：<!ELEMENT 元素名称 ANY>
    带有子元素（序列）元素，(子元素1, 子元素2, ...)：<!ELEMENT 元素名称 (子元素名称 1,子元素名称 2,.....)>
        这些子元素必须按照相同的顺序出现在文档中。在一个完整的声明中，子元素也必须被声明，同时子元素也可拥有子元素。
    声明只出现一次的元素：<!ELEMENT 元素名称 (子元素名称)>
    声明最少出现一次的元素：<!ELEMENT 元素名称 (子元素名称+)>
    声明出现零次或多次的元素：<!ELEMENT 元素名称 (子元素名称*)>
    声明出现零次或一次的元素：<!ELEMENT 元素名称 (子元素名称+)>
    声明混合型的内容：<!ELEMENT note (header, (#PCDATA|to|from|header|message)*)>

-- 属性声明
<!ATTLIST 元素名 属性名 属性类型 默认值>
类型选项：
CDATA           值为字符数据
(en1|en2|..)    此值是枚举列表中的一个值
ID              值为唯一的id
IDREF           值为另外一个元素的id
默认值参数：
#REQUIRED   属性值是必需的
#IMPLIED    属性不是必需的
#FIXED      属性值是固定的
列举属性值：    <!ATTLIST 元素名称 属性名称 (en1|en2|..) 默认值>

-- 声明实体
<!ENTITY 实体名称 "实体的值"> 或 <!ENTITY 实体名称 SYSTEM "URI/URL">
一个实体由三部分构成：一个和号(&)，一个实体名称，以及一个分号(;)。

-- 参数实体
<!ENTITY % 参数实体名称 "实体值">
参数实体由三部分构成：一个百分号(%)，一个实体名称，以及一个分号(;)。
参数实体的定义必须在DTD约束的最顶端。
参数实体必须定义在外部DTD中。

-- DTD验证
<script>
var xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
xmlDoc.async = "false";             //关闭异步加载模式
xmlDoc.validateOnParse = "true";    //开启XML校验
xmlDoc.load("note_dtd_error.xml");  //加载需验证的XML文件
document.write("<br>Error Code: " + xmlDoc.parseError.errorCode);
document.write("<br>Error Reason: " + xmlDoc.parseError.reason);
document.write("<br>Error Line: " + xmlDoc.parseError.line);
</script>


<!-- PHP解析XML -->
<?php
函数库：PHP DOM、SimpleXML
/* PHP DOM(增、删、改) */
主要类：DOMDocument、DOMNodeList、DOMNode、DOMElement
#查询节点
属性：documentElement     //获取根节点
DOMDocument::__construct([string $version [, string $encoding]])    //创建DOMDocument对象
mixed DOMDocument::load(string $filename)       //加载XML文件，在内存中形成树状结构
DOMNodeList DOMDocument::getElementsByTagName(string $name)     //根据标签名获取节点列表
属性：$length     表示节点个数
DOMElement DOMNodelist::item(int $index)   //选中指定索引的节点
属性：$nodeValue  表示节点的值
#添加节点
DOMElement DOMDocument::createElement(string $name [, string $value])   //创建节点
DOMNode DOMNode::appendChild(DOMNode $newnode)      //添加子节点
#移除节点
DOMNode DOMNode::removeChild(DOMNode $oldnode)      //移除节点
#修改节点
DOMNode DOMNode::replaceChild(DOMNode $newnode, DOMNode $oldnode)   //修改节点
#保存XML
string DOMDocument::saveXML([DOMNode $node [, int $options]])   //将数据存到字符串
int DOMDocument::save(string $filename [, int $options])    //将内存中的数据写入XML文件
#节点属性的查询
bool DOMElement::hasAttribute(string $name)     //判断当前元素是否具有某个属性
bool DOMNode::hasAttributes(void)       //判断当前元素是否具有属性
string DOMElement::getAttribute(string $name)    //获取某个属性的值
#节点属性的添加/修改
DOMAttr DOMElement::setAttribute(string $name , string $value)      //添加或修改节点属性
#节点属性的删除
bool DOMElement::removeAttribute(string $name) //删除节点某个属性

/* SimpleXML(查询) */
SimpleXMLElement simplexml_load_file($filename) //从XML文件中读取数据，返回XML数据对象
SimpleXMLElement::__construct($data) //从XML结构的字符串中读取数据
#子节点操作
SimpleXMLElement::children() //获取当前元素的所有子节点
SimpleXMLElement::addChild($name [,$value]) //添加子节点
int SimpleXMLElement::count() //获取当前元素的子节点个数
#属性操作
SimpleXMLElement::attributes() //获取节点的所有属性
SimpleXMLElement::addAttribute($name [,$value]) //添加节点属性
#保存XML
SimpleXMLElement::asXML([$filename]) //将数据写入XML文件

SimpleXMLElement::xpath($path) //对XML数据执行XPath语句
$path参数是有xpath语言写的语句，返回值永远为数组

?>

<!-- XPath -->
XPath是一门在XML文档中查找信息的语言。XPath用于在XML文档中通过元素和属性进行遍历。
共有七种类型的节点：元素、属性、文本、命名空间、处理指令、注释以及文档节点（或成为根节点）。
基本值是无父或无子的节点。项目是基本值或者节点。
字符串必须用单引号包裹！

nodename    选取此节点的所有子节点。
/           从根节点选取。
//          从匹配选择的当前节点选择文档中的节点，而不考虑它们的位置。
.           选取当前节点。
..          选取当前节点的父节点。
@           选取属性。

/bookstore/book[1]      选取属于bookstore子元素的第一个book元素。
/bookstore/book[last()]     选取属于bookstore子元素的最后一个book元素。
/bookstore/book[last()-1]   选取属于bookstore子元素的倒数第二个book元素。
/bookstore/book[position()<3]   选取最前面的两个属于bookstore元素的子元素的book元素。
//title[@lang]      选取所有拥有名为lang的属性的title 元素。
//title[@lang='eng']        选取所有title元素，且这些元素拥有值为eng的lang属性。
/bookstore/book[price>35.00]    选取bookstore元素的所有book元素，且其中的price元素的值须大于35.00。
/bookstore/book[price>35.00]/title  选取bookstore元素中的book元素的所有title元素，且其中的price元素的值须大于35.00。

*               匹配任何元素节点。
@*              匹配任何属性节点。
node()          匹配任何类型的节点。
/bookstore/*    选取 bookstore 元素的所有子元素。
//*             选取文档中的所有元素。
//title[@*]     选取所有带有属性的 title 元素。

通过在路径表达式中使用“|”运算符，您可以选取若干个路径。

