<?php
	include("/adodb/adodb.inc.php");
	$db =& NewADOConnection('mysql');
	$db->Connect("localhost", "root", "password", "mydb");
?>
