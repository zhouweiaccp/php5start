<?php
	$array1 = array ("color" => "red", 3);
	$array2 = array ("x", "color" => "green", "shape" => "circle", 3);
	$result = array_merge ($array1, $array2);
	print_r($result);
?>
