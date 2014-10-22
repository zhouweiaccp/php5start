<?php
	
	$host = "localhost";		//ݿַ
	$user = "root";				//û
	$pass = "pass";			//
	$db = "test";			//ݿ

	//ݿ
	$conn = mysql_pconnect ($host, $user, $pass) or
		die ("ݿʧܣ");
	//ѡݿ
	mysql_select_db ($db) or
		die ("guestbook ݿʧܣ");
?>
