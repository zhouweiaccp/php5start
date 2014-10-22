<?php
	$str1 = "php gRoUp";
	$str2 = "PHP Group";

	//下面的比较是等效的
	$test =strcasecmp($str1, $str2);					//返回0
	$test =strcmp(strtolower($str1),strtolower($str2));		//返回0
?>
