<?php
	//��������
	$city = "����";
	$province = "����ʡ";
	$project = "PHP Programm";
	$location_vars = array ("province", "city");
	//��������
	$result = compact ("project", "nothing", $location_vars);
	print_r($result);
?>
