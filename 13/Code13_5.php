<?php
	//�ǳ־�������
	$dsn = 'mysql://root:pwd@localhost/mydb';
	$db = NewADOConnection($dsn);
	if (!$db) 
		die("Connection failed");

	//������÷���Connect()��PConnect()
	$res = $db-> Execute("SELECT * FROM table");

	//�־�������DSN
	$dsn2 = "mysql://root:pwd@localhost/mydb?persist";
?>
