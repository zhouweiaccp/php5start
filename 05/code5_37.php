<?php
	$array1 = array ("a" => "green", "b" => "brown", "c" => "blue", "red");
	$array2 = array ("a" => "green", "yellow", "red");
	$result = array_diff_assoc($array1, $array2);

	/*$result的结果是
		array(
			"b" => "brown",
			"c" => "blue",
			0 => "red"
		)
	*/
?>
