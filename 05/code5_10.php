<?php
	//给定变量
	$city = "大连";
	$province = "辽宁省";
	$project = "PHP Programm";
	$location_vars = array ("province", "city");
	//创建数组
	$result = compact ("project", "nothing", $location_vars);
	print_r($result);
?>
