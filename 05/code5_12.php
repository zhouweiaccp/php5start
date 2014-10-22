<?php
	$input = array ("red", "green", "blue", "yellow");
	$ouput = array_splice ($input, 2);
	//$ouput的值是array ("blue", "yellow")
	//$input现在的值是array ("red", "green")

	$input = array ("red", "green", "blue", "yellow");
	array_splice ($input, 1, -1);
	//$ouput的值是array ("green", "blue")
	//$input现在的值是array ("red", "yellow")
?>
