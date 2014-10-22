<?php 
	include("adodb.inc.php");
	$db = &NewADOConnection("mysql://root:pwd@localhost");

	$rs = $db->SelectLimit("SELECT * FROM table", 10, 2);
	print_r($rs->fields);
?>
