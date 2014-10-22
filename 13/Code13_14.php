<?php
	//包含ADODB类库
	include_once('adodb.inc.php'); 

	//包含分页函数库
	include_once('adodb-pager.inc.php'); 
   
	//初始化SESSION用于在每页之间传递数据
	session_start(); 

	//连接数据库
	$db = NewADOConnection('mysql'); 
	$db->Connect('localhost','root','pwd','test'); 
	
	$sql = "SELECT * from adotable ";

	//实例化分页对象
	$pager = new ADODB_Pager($db, $sql);

	//设置允许以HTML格式显示数据
	$pager->htmlSpecialChars = false;

	//实现分页显示，5条记录每页
	$pager->Render(5);
?>
