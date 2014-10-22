<?php
	$stack = array("apple ", "banana");
	$num = array_push($stack, "orange", "pear");		//入栈操作，返回2
	//现在$stack的值为array("apple ", "banana", "orange",  "pear");

	$last = array_pop($stack);						//出栈操作，返回“pear”
	//现在$stack的值为array("apple ", "banana", "orange");
?>
