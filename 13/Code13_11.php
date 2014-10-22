<?php
	//包含ADODB类库
	include('adodb.inc.php');

	//连接数据库
	$conn = &NewADOConnection("mysql");
	$conn->PConnect("test");

	//处理当前时间
	$current = $conn->DBDate(time());
	
	//更新记录
	$sql = "UPDATE table SET postdate = '$current'
		  WHERE userId <=10"; 
	$conn->Execute($sql);

	//显示更新记录行数
	echo "数据库已经更新" . $conn->Affected_Rows() . "条记录";

	//新增记录
	$sql = "INSERT INTO table (username, password, postdate)
		  VALUES('Tom', 'Pass', '$current')"; 
	$conn->Execute($sql);

	//显示新增记录ID
	echo "新增记录userId为：" . $conn->Insert_ID();
?>
