<?php
	$num = 123;
	$str = "abc";

	//作为数字的比较
	var_dump($num > $str);			//bool(true)

	//作为字符串的比较
	var_dump("$num" > $str);			//bool(false)
	var_dump(strcmp($num, $str));		//int(-1)
?>
