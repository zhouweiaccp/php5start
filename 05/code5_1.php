<?php
	$array = array (
			"input" => "200V", 
			"output" => "1.5V", 
			"battery"=>array("a" => "Cell")
			);
	print_r(array_keys ($array));			//输出数组的键
	/* 输出结果
	Array
	(
		[0] => input
		[1] => output
		[2] => battery
	)
	*/

	print_r(array_values ($array));			//输出数组的值
	/* 输出结果
	Array (
		[0] => 200V
		[1] => 1.5V
		[2] => Array (
			[a] => Cell
		)
	)
	*/
?> 
