<?php
	$input = array ("a"=>"A", "B", "C", "d"=>"D", "E");
	$output = array_slice ($input, 2);			//����array("C", "D", "E")
	$output = array_slice ($input, 2, -1);			//����array("C", "D")
	$output = array_slice ($input, -2, 1);			//����array("D")
	$output = array_slice ($input, 0, 3);			//����array("A", "B", "C")
?>
