<?php
	$input = array ("red", "green", "blue", "yellow");
	$ouput = array_splice ($input, 2);
	//$ouput��ֵ��array ("blue", "yellow")
	//$input���ڵ�ֵ��array ("red", "green")

	$input = array ("red", "green", "blue", "yellow");
	array_splice ($input, 1, -1);
	//$ouput��ֵ��array ("green", "blue")
	//$input���ڵ�ֵ��array ("red", "yellow")
?>
