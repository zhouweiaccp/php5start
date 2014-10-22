<?php
	$4years = 'long long ago';			//错误，以数字开头
	$_4years = 'long long ago';		//正确

	$name = "Tom";
	$Name = "Jerry";
	echo "$name, $Name";			//输出“Tom, Jerry”
	unset($name);					//删除变量$name
	echo "$name, $Name";			//输出“, Jerry”
?>
