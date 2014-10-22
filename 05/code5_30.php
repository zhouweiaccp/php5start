<?php
	$a = $b = $c = array (4 => "four", 3 => "three", 20 => "twenty", 10 => "ten");
	
	ksort($a);					//正序排列
	krsort($b);					//逆序排列

	function cmp_key($k1, $k2)
	{
		return strcmp($k1, $k2);
	}
	uksort($c, "cmp_key");		//自定义排序
	var_dump($a, $b, $c);		//输出数组
?>
