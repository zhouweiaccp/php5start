<?php
  //�˳���̨�������
  if(isset($_GET['logout']))
  {
	header('WWW-Authenticate:Basic realm="��ӭ��¼�̳ǹ���ϵͳ"'); 
	header('HTTP/1.0 401 Unauthorized'); 
	die("<H2>��ӭ�˳���¼</h2>");
  }

  //ʹ��HTTP��֤��ʽ��¼��̨�������
  if ($_SERVER['PHP_AUTH_USER']==ADMIN_USER && $_SERVER['PHP_AUTH_PW']==ADMIN_PW)
  {
	; //�ɹ���¼
  } else {
    header('WWW-Authenticate:Basic realm="��ӭ��¼�̳ǹ���ϵͳ"'); 
    header('HTTP/1.0 401 Unauthorized'); 
    die("<H2>��������ȷ���˺�������!</h2>"); 
  }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�̳ǹ���</title>
<style>
<!--
 /* Global Styles */
 body {background-color: #fff; font-size: 12px; margin: 0px;} 
 p {text-align: left;} 
 a {color: #336699;} 
 caption {font-size: 14px; font-weight: bold;}

 /* �����ʽ */
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
<!-- ������ -->
<h3 align=left>
 <a href="category.php">������</a> |
 <a href="product.php">��Ʒ����</a> |
 <a href="order.php">��������</a> |
 <a href="?logout">�˳�</a>
</h3>
