<?php
	$fruits = array (
		"a"=>"apple", "b"=>"banana", "c"=>"cherry",
		"pear", "orange", "grape"
	);
	next($fruits);				//����ƶ�
	$foo = each ($fruits);			//Ҳ����ƶ���
	print_r($foo);
	echo "Current Value: " . current($fruits);
?>
