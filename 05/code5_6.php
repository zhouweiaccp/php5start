<?php
	$fruits = array (
		"a"=>"apple", "b"=>"banana", "c"=>"cherry",
		"pear", "orange", "grape"
	);
	$var = current($fruits);			//��ǰ��Ԫ��apple
	$key= key($fruits);				//��ǰ������a
	$var = next($fruits);				//����ƶ���banana
	next($fruits);
	next($fruits);
	$var = pos($fruits);				//��ǰ��Ԫ��orange
	$var = prev($fruits);				//��ǰ�ƶ���pear
	$var = end($fruits);				//�ƶ�ĩβ��grape
	$key= key($fruits);				//��ǰ������2
	$var = reset($fruits);				//�ƶ���ʼ��apple	
?>
