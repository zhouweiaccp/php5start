<?php
	define('MAX_LENGTH', 4);		//���嵥�ʵ���󳤶�
	
	$words = array(					//�����б�
		'long'=>'psychotomimetic',
		'fuel',
		'google',
		'small'=>'at',
		'recall',
	);
	
	//�ص����������س��ȴ���MAX_LENGTH�ֽڵĵ���
	function long_word($word) {
	    	return (strlen($word)> MAX_LENGTH);
	}
	
	echo "���ȴ���4�ֽڵĵ��ʣ�\n";
	print_r(array_filter($words, "long_word"));
?>
