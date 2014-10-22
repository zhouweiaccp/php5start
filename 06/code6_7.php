<?php
	//×Ö·û´®
	$string = "Name: {Name}<br>\nEmail: {Email}<br>\nAddress: {Address}<br>\n";

	//Ä£Ê½
	$patterns =array(
			"/{Address}/",
			"/{Name}/",
			"/{Email}/"
	);

	//Ìæ»»×Ö´®
	$replacements = array (
			"No.5, Wilson St., New York, U.S.A",
			"Thomas Ching",
			"tom@emailaddress.com",
	);

	//Êä³öÄ£Ê½Ìæ»»½á¹û
	print preg_replace($patterns, $replacements, $string);
?>
