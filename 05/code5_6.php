<?php
	$fruits = array (
		"a"=>"apple", "b"=>"banana", "c"=>"cherry",
		"pear", "orange", "grape"
	);
	$var = current($fruits);			//当前单元，apple
	$key= key($fruits);				//当前索引，a
	$var = next($fruits);				//向后移动，banana
	next($fruits);
	next($fruits);
	$var = pos($fruits);				//当前单元，orange
	$var = prev($fruits);				//向前移动，pear
	$var = end($fruits);				//移动末尾，grape
	$key= key($fruits);				//当前索引，2
	$var = reset($fruits);				//移动开始，apple	
?>
