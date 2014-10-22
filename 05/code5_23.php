<?php
	/* 单个数组使用的例子 */
	$websites = array ("g"=>"google", "b"=>"baidu", "y"=>"yahoo");
	
	//定义对单个数组处理的回调函数
	function value_alter($value){
		return ucfirst($value) . ".com";
	}

	$urls = array_map("value_alter", $websites);
	print_r($urls);
	
	/* 多个数组使用的例子 */
	$a = array(1, 2, 3);
	$b = array(7, 8, 9);
	
	//定义对多个数组处理的回调函数
	function value_multi($a, $b){
		return $a * $b;
	}
	
	$results = array_map("value_multi", $a, $b);
	print_r($results);
?>
