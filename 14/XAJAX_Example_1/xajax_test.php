<?php
//包含XAJAX类库
require_once("../xajax/xajax.inc.php");

//实例化XAJAX对象:
$xajax = new xajax();

//注册所需要通过XAJAX调用的PHP函数的名称
$xajax->registerFunction("showOutput");

//编写注册的PHP函数，并且在函数之中使用xajaxResponse对象返回XML指令

function showOutput()
{
	//处理数据，这里只是示范性的
	//实际可能是从数据库中取得的
	$testResponseOutput ="<b>Hello, XAJAX World!</b>";

	//实例化xajaxResponse对象
	$objResponse = new xajaxResponse();

	//添加指令到响应之中，用于指派
	//指定元素(例如id="submittedDiv")的innerHTML属性的新的内容
	$objResponse->addAssign("submittedDiv", "innerHTML", $testResponseOutput);

	//返回处理后的xajaxResponse对象
	return $objResponse;
}

//在脚本输出任何信息之前，调用XAJAX接管请求
$xajax->processRequests();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/2000/REC-xhtml1-20000126/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>XAJAX测试程序</title>
<?php 
	//生成所必需的JavaScript代码，通常在<head>标签之间
	$xajax->printJavascript("../xajax/");
?>
</head>
<body>

<h2>XAJAX测试程序</h2>

<form id="testForm1" onsubmit="return false;">

<!--在程序中，从JavaScript事件调用前面注册的函数-->
<p><input type="submit" value="显示请求响应" onclick="xajax_showOutput(); return false;" /></p>
</form>

<div id="submittedDiv"></div>

</body>
</html>
