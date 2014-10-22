<?php
	$input  = array ("php", 5.0, array ("apple", "pear"));
	$result = array_reverse ($input);
	print_r($result);
	
	$result = array_reverse ($input, TRUE);		//保留原来的键名
	print_r($result);
?>
