<?php
require_once ("../xajax/xajax.inc.php");

//服务器处理函数
function processForm($aFormValues)
{
	$objResponse = new xajaxResponse();
	
	$bError = false;
	
	//清空错误信息
	$objResponse->addClear("usernameInfo", "innerHTML");
	$objResponse->addClear("passwordInfo", "innerHTML");
	$objResponse->addClear("nameInfo", "innerHTML");
	$objResponse->addClear("emailInfo", "innerHTML");
	
	//判断账号
	if (trim($aFormValues['username']) == "")
	{
		$objResponse->addAppend("usernameInfo", "innerHTML", "请输入用户账号。");
		$bError = true;
	}

	//判断密码
	if (trim($aFormValues['password']) == "")
	{
		$objResponse->addAppend("passwordInfo", "innerHTML", "请输入用户密码。");
		$bError = true;
	}
	else if ($aFormValues['password'] != $aFormValues['password2'])
	{
		$objResponse->addAppend("passwordInfo", "innerHTML", "确认密码不相同。");
		$bError = true;
	}

	//判断用户姓名
	if (trim($aFormValues['firstname']) == "")
	{
		$objResponse->addAppend("nameInfo", "innerHTML", "用户姓不能为空。");
		$bError = true;
	}
	else if (trim($aFormValues['lastname']) == "")
	{
		$objResponse->addAppend("nameInfo", "innerHTML", "用户名不能为空。");
		$bError = true;
	}
	//判断电子邮件地址
	if (!preg_match("/^[0-9a-zA-Z_-]+@[0-9a-zA-Z_-]+(\.[0-9a-zA-Z_-]+){0,3}$/", $aFormValues['email']))
	{
		$objResponse->addAppend("emailInfo", "innerHTML", "请输入格式正确的电子邮件。");
		$bError = true;
	}

	if (!$bError)
	{
		$sForm .="<div>账号：" .$aFormValues['username']. "</div>\n";
		$sForm .="<div>密码：" .$aFormValues['password']. "</div>\n";
		$sForm .="<div>用户姓名：" .$aFormValues['firstname']. " " .$aFormValues['lastname']. "</div>\n";
		$sForm .="<div>电子邮件地址：" .$aFormValues['email']. "</div>\n";
		$sForm .="<div class=\"submitDiv\"><input id=\"submitButton\" type=\"submit\" value=\"确定\"/></div>";

		$objResponse->addAssign("formDiv","innerHTML",$sForm);
		$objResponse->addAssign("formWrapper","style.backgroundColor", "green");
	}
	else
	{
		$objResponse->addAssign("submitButton","value","提交注册");
		$objResponse->addAssign("submitButton","disabled",false);
	}
	
	return $objResponse;
}

//构造对象
$xajax = new xajax();

//注册处理函数
$xajax->registerFunction("processForm");

//接管HTTP请求
$xajax->processRequests();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
	//生成必要的JavaScript
	$xajax->printJavascript('../xajax/'); 
?>

<title>XAJAX用户注册</title>
<style type="text/css">
#formWrapper{	color: #111111; background-color: rgb(200,200,200); width: 360px;}
#title{color: #FFFFFF; text-align: center; background-color: #000000; }
#formDiv{	padding: 20px;}
.submitDiv{ margin-top: 10px; text-align: center; }
.errorSpan{ color:red;}
</style>

<script type="text/javascript">
<!--//提交表单
  function submitSignup()
  {
	xajax.$('submitButton').disabled=true;
	xajax.$('submitButton').value="验证中...";
	xajax_processForm(xajax.getFormValues("signupForm"));
	return false;
  }
//-->
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div id="formWrapper">
  <div id="title">注册新用户</div>
  <div id="formDiv">
    <form id="signupForm" action="javascript:void(null);" onsubmit="submitSignup();">
      <div>账号：<span id="usernameInfo" class="errorSpan">&nbsp;</span></div>
      <div>
        <input type="text" name="username" />
      </div>
      <div>密码：<span id="passwordInfo" class="errorSpan">&nbsp;</span></div>
      <div>
        <input type="password" name="password" />
      </div>
      <div>确认密码：</div>
       <div>
        <input type="password" name="password2" />
      </div>
      <div>用户姓名：<span id="nameInfo" class="errorSpan">&nbsp;</span></div>
      <div>
        <input type="text" name="firstname" size="10" /> - <input type="text" name="lastname" size="10" />
      </div>
      <div>电子邮件地址:<span id="emailInfo" class="errorSpan">&nbsp;</span></div>
      <div>
        <input type="text" name="email" />
      </div>
      <div class="submitDiv">
        <input name="submit" type="submit" id="submitButton" value="提交注册"/>
      </div>
    </form>
  </div>
</div>
<div id="outputDiv"> </div>
</body>
</html>
