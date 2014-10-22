<?php
	/* array_intersect() 的使用 */
	$array1 = array ("a" => "blue", "red", "b" => "green", "red", "favorite" =>array("yellow"));
	$array2 = array ("b" => "blue", "yellow", "red");
	$array3 = array ("favorite" =>array("yellow"), "c" => "blue");
	$result = array_intersect ($array1, $array2, $array3);

	/* $result的结果
		array (
			"a" => "blue"
		)
	*/
	
	/* array_intersect_assoc() 的使用 */
	$array1 = array ("a" => "green", "b" => "brown", "c" => "yellow", "red");
	$array2 = array ("a" => "green", "yellow", "red");
	$result = array_intersect_assoc($array1, $array2);

	/* $result的结果是
		array (
			"a" => "green"
		)
	*/
?>
