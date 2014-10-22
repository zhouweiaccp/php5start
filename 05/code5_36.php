<?php
	$array1 = array ("a" => "blue", "red", "b" => "green", "red", "favorite" =>array("yellow"));
	$array2 = array ("b" => "blue", "yellow", "red");
	$array3 = array ("favorite" =>array("yellow"));
	$result = array_diff ($array1, $array2, $array3);

	/*$result的结果是
		array (
			"b" => "green"
		)
	*/
?>
