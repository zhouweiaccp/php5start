<?php
	$number = intval("5.6abc");		//$number = 5
	$number = (float) "+5.6abc";		//$number = 5.6
	$number = floatval("-1.2e3f4g5");	//$number = -1.2e3 = -1200
	
	$result = "12.3xy45" - 6;			//��������12.3 - 6 = 6.3
	$result = "xy1234" / 5;			//��������0 / 5 = 0
	$result = "1.2.3.4" * 5;			//��������1.2 * 5 = 6
	$result = 1 + "-1.3e3";			//��������1+(-1300) = -1299
?>
