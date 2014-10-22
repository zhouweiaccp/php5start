<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>网上商城</title>
<style type="text/css">
 body { link=rgb(84,107,173) vlink=rgb(84,107,173) alink="red";}
 h2 { color:rgb(84,107,173) }
 li { margin-left: -1em; margin-right: -2em; color:rgb(84,107,173);}
 p { color: rgb(84,107,173); font-family: Tahoma, Helvetica, sans-serif;} 
 a {text-decoration:none; font-weight:bold; color:rgb(84,107,173);}
</style>
</head>

<body topmargin="0" leftmargin="0" buttommargin="0" rightmargin="0">
<table border="0" cellpadding="17" cellspacing="0" width="100%" height="100%">
  <tr>
  <td width="20%" bgcolor="#e7f0ff" valign="top">
  <!-- 右侧导航条开始 -->
	<img border=0 width=133 height=65 src="img/logo.gif">
	<!-- 购物车开始，显示所购商品数量 -->
<?php
	//用户身份识别
	$session_id = session_id();

	//查询购物车，检索商品数量
	$sql = "SELECT SUM(number) FROM carts WHERE session_id='$session_id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$number = intval($row[0]);		//商品数量
?>
<b>购物中有<a href="mycart.php"><font color=red><? echo $number ?></font></a>件商品</b>
<hr>
	<!-- 购物车结束 -->
<ul>
	<li><a href="index.php">首页</a></li>
    <li><b>商品目录</b></li>
<ul>
<?php
	//列出商品目录
	$sql = "SELECT * FROM categories ORDER BY category_name";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		echo "<li><a href=\"list.php?catid=$row[category_id]\">";
		echo htmlspecialchars($row['category_name']);
		echo "</a></li>";
	}
?>
</ul>
      <li><a href="mycart.php">购物车</a></li>
      <li><a href="checkout.php">结帐台</a></li>
</ul>
  <!-- 右侧导航条开始 -->
　</td>
  <td width="80%" valign="top">
   	<!--正文开始部分-->
