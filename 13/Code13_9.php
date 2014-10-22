<?php
	//包含ADODB类库
	include('adodb.inc.php'); 

	//包括rs2html函数
	include('tohtml.inc.php'); 

	//连接数据库
	$conn = &ADONewConnection('mysql');
	$conn->PConnect('localhost','userid','password','database');
	$rs = $conn->Execute('SELECT * FROM table');
	
	//将记录转换为HTML
	echo rs2html($rs); 
?>
