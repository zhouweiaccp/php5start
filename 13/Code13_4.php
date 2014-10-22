<?php
	include("adodb.inc.php");
	$db = & NewADOConnection('postgres');
	$db->PConnect('host=localhost port=5432 dbname=postgres');
?>
