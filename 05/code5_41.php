<?php
	$input  = array ("php", 5.0, array ("apple", "pear"));
	$result = array_reverse ($input);
	print_r($result);
	
	$result = array_reverse ($input, TRUE);		//����ԭ���ļ���
	print_r($result);
?>
