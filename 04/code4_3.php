<?php
	$string = "wxyz wxyz";
	$first = strpos($string, "x");		//����1
	$last = strrpos($string, "x");		//����6
	$zero = strpos($string, "w");		//����0
	$pos = strrpos($string, "y", 1);		//����7
?>
