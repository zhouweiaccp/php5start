<?php
	$str = "Tom Is A PHP Programer."
	//ȫ��ת��ΪСд
	$lower = strtolower($str);             	//���ء�tom is a php programer.��
	//ȫ��ת��Ϊ��д
	$upper = strtoupper($str);             	//���ء�TOM IS A PHP PROGRAMER.��
	
	//�����������ĸתΪ��д
	$string = 'hello PHP world!';
	echo ucfirst($string);             		//�����Hello PHP world!��
	
	//�����ʵ�����ĸתΪ��д
	$php = "php: hypertext preprocessor";	
	$php = ucwords($php);				//���ء�PHP: Hypertext Preprocessor��
	
	//�������ɿհ׽��зָ��ģ������repairing����ת��
	$word = "i try do some programming/repairing.";
	$word = ucwords($word);				//���ء�I Try Do Some Programming/repairing.��
?>
