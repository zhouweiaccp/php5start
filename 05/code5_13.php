<?php
	$input = array ("red", "green", "blue", "yellow");
	array_splice ($input, -1, 1, array("black", "maroon"));
	//$input���ڵ�ֵ��array ("red", "green", "blue", "black", "maroon")

	$input = array ("red", "green", "blue", "yellow");
	array_splice ($input, 3, 0, "purple");
	//$input���ڵ�ֵ��array ("red", "green", "blue", "purple", "yellow");
?>
