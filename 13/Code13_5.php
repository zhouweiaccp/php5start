<?php
	//非持久性连接
	$dsn = 'mysql://root:pwd@localhost/mydb';
	$db = NewADOConnection($dsn);
	if (!$db) 
		die("Connection failed");

	//无须调用方法Connect()或PConnect()
	$res = $db-> Execute("SELECT * FROM table");

	//持久性连接DSN
	$dsn2 = "mysql://root:pwd@localhost/mydb?persist";
?>
