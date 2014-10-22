<?php
	$queue = array("x", "y");
	array_unshift($queue, "a", array(1,2));	//
	//现在$queue的值为：array("a", array(1,2), "x", "y");
?>
