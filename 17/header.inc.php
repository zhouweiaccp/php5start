<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�����̳�</title>
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
  <!-- �Ҳർ������ʼ -->
	<img border=0 width=133 height=65 src="img/logo.gif">
	<!-- ���ﳵ��ʼ����ʾ������Ʒ���� -->
<?php
	//�û����ʶ��
	$session_id = session_id();

	//��ѯ���ﳵ��������Ʒ����
	$sql = "SELECT SUM(number) FROM carts WHERE session_id='$session_id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$number = intval($row[0]);		//��Ʒ����
?>
<b>��������<a href="mycart.php"><font color=red><? echo $number ?></font></a>����Ʒ</b>
<hr>
	<!-- ���ﳵ���� -->
<ul>
	<li><a href="index.php">��ҳ</a></li>
    <li><b>��ƷĿ¼</b></li>
<ul>
<?php
	//�г���ƷĿ¼
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
      <li><a href="mycart.php">���ﳵ</a></li>
      <li><a href="checkout.php">����̨</a></li>
</ul>
  <!-- �Ҳർ������ʼ -->
��</td>
  <td width="80%" valign="top">
   	<!--���Ŀ�ʼ����-->
