<?php
	$trans = array ("x" => 1, "y" => 1, "z" => 2);
	$trans = array_flip ($trans);
	print_r($trans);
	/* 输出结果，后来的将覆盖前面的
	Array
	(
 	   [1] => y
 	   [2] => z
	)
	*/
?>
