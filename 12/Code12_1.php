<?php
	$host = "localhost";			//数据库主机地址
	$user = "root";				//用户名
	$pass = "password";			//密码
	$db = "guestbook";			//数据库

	//连接数据库
	$conn = mysql_connect ($host, $user, $pass) or
		die ("连接数据库服务器失败！");
	//选择数据库
	mysql_select_db ($db) or
		die ("打开guestbook 数据库失败！");
?>
