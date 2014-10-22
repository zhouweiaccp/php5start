<?php
	$fruits = array (
		"a"=>"apple", "b"=>"banana", "c"=>"cherry",
		"pear", "orange", "grape"
	);
	next($fruits);				//向后移动
	$foo = each ($fruits);			//也向后移动了
	print_r($foo);
	echo "Current Value: " . current($fruits);
?>
