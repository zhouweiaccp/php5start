<?php
	$num = 123;
	$str = "abc";

	//��Ϊ���ֵıȽ�
	var_dump($num > $str);			//bool(true)

	//��Ϊ�ַ����ıȽ�
	var_dump("$num" > $str);			//bool(false)
	var_dump(strcmp($num, $str));		//int(-1)
?>
