<?php
	$string = "wxyz wxyz";
	$first = strpos($string, "x");		//返回1
	$last = strrpos($string, "x");		//返回6
	$zero = strpos($string, "w");		//返回0
	$pos = strrpos($string, "y", 1);		//返回7
?>
