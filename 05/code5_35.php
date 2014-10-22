<?php
	$array1 = array ("color" => array ("favorite" => "red"), 5);
	$array2 = array (10, "color" => array ("favorite" => "green", "blue"));
	$result = array_merge_recursive ($array1, $array2);
	print_r($result);
?>
