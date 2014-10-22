<?php
	$input = array ("a" => "orange", "pear", "b" => "orange", "pear", "apple");
	$result = array_unique ($input);
	print_r($result);
	
	//测试数据类型
	$input = array (5,"5","4",4,5,"4");
	$result = array_unique ($input);
	var_dump($result);
?>
