<?php
	$input = array ("a"=>"A", "B", "C", "d"=>"D", "E");
	$output = array_slice ($input, 2);			//返回array("C", "D", "E")
	$output = array_slice ($input, 2, -1);			//返回array("C", "D")
	$output = array_slice ($input, -2, 1);			//返回array("D")
	$output = array_slice ($input, 0, 3);			//返回array("A", "B", "C")
?>
