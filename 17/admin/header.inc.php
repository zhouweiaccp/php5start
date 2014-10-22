<?php
  //退出后台管理界面
  if(isset($_GET['logout']))
  {
	header('WWW-Authenticate:Basic realm="欢迎登录商城管理系统"'); 
	header('HTTP/1.0 401 Unauthorized'); 
	die("<H2>欢迎退出登录</h2>");
  }

  //使用HTTP认证方式登录后台管理界面
  if ($_SERVER['PHP_AUTH_USER']==ADMIN_USER && $_SERVER['PHP_AUTH_PW']==ADMIN_PW)
  {
	; //成功登录
  } else {
    header('WWW-Authenticate:Basic realm="欢迎登录商城管理系统"'); 
    header('HTTP/1.0 401 Unauthorized'); 
    die("<H2>请输入正确的账号与密码!</h2>"); 
  }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>商城管理</title>
<style>
<!--
 /* Global Styles */
 body {background-color: #fff; font-size: 12px; margin: 0px;} 
 p {text-align: left;} 
 a {color: #336699;} 
 caption {font-size: 14px; font-weight: bold;}

 /* 表格样式 */
 TABLE.main {background: #999; border: 0px; font-size: 12px;} 
 TABLE.main TD {background-color: #FEFEFE; padding:2 5 5 2; height:20px;} 
 TABLE.main TH {background-color: #CCCCCC; padding-top: 4px; height: 22px;} 
 DIV.btnInsert {float: left; width:150px; border: #336699 solid 1px; padding: 5 0 5 0; background: #EFEFEF;} 
 DIV.submit {text-align: center; padding-top: 20px; height: 32px;} 
 DIV.error {text-align:left; background: #FFFFCC; border: #FF0000 solid 1px;} 
//-->
</style>
</head>
<body>
<br><center>
<div style="width:96%; text-align:center">
<!-- 导航条 -->
<h3 align=left>
 <a href="category.php">类别管理</a> |
 <a href="product.php">商品管理</a> |
 <a href="order.php">订单管理</a> |
 <a href="?logout">退出</a>
</h3>
