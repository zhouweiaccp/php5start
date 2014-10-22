<?php
	$number = intval("5.6abc");		//$number = 5
	$number = (float) "+5.6abc";		//$number = 5.6
	$number = floatval("-1.2e3f4g5");	//$number = -1.2e3 = -1200
	
	$result = "12.3xy45" - 6;			//运算结果是12.3 - 6 = 6.3
	$result = "xy1234" / 5;			//运算结果是0 / 5 = 0
	$result = "1.2.3.4" * 5;			//运算结果是1.2 * 5 = 6
	$result = 1 + "-1.3e3";			//运算结果是1+(-1300) = -1299
?>
