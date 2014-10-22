<?php
	//数据库连接
	$conn = mysql_connect ($host, $user, $pass) or
		die ("连接数据库服务器失败！");

	//使用mysql_query语句选择数据库
	mysql_query ("USE $db") or
		die ("打开{$db}数据库失败！");

	//	……
	//这里进行相关的数据库操作
	//	……
	
	//关闭数据库连接
	mysql_close ($conn);
?>
