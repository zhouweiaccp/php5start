<?php
	$str1 = "php gRoUp";
	$str2 = "PHP Group";

	//����ıȽ��ǵ�Ч��
	$test =strcasecmp($str1, $str2);					//����0
	$test =strcmp(strtolower($str1),strtolower($str2));		//����0
?>
