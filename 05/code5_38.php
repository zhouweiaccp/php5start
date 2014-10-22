<?php
	/* array_intersect() ��ʹ�� */
	$array1 = array ("a" => "blue", "red", "b" => "green", "red", "favorite" =>array("yellow"));
	$array2 = array ("b" => "blue", "yellow", "red");
	$array3 = array ("favorite" =>array("yellow"), "c" => "blue");
	$result = array_intersect ($array1, $array2, $array3);

	/* $result�Ľ��
		array (
			"a" => "blue"
		)
	*/
	
	/* array_intersect_assoc() ��ʹ�� */
	$array1 = array ("a" => "green", "b" => "brown", "c" => "yellow", "red");
	$array2 = array ("a" => "green", "yellow", "red");
	$result = array_intersect_assoc($array1, $array2);

	/* $result�Ľ����
		array (
			"a" => "green"
		)
	*/
?>
