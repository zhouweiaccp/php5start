<?php
	$words = array ("l"=>"lemon", "o"=>"orange", "b"=>"banana", "a"=>"apple");
	
	//����һ���ص��������������Ԫ��
	function word_print ($value, $key, $prefix) {
	    echo "$prefix : $key => $value<br>\n";
	}

	//����һ���ص�����ֱ�Ӹı�Ԫ�ص�ֵ
	function word_alter (&$value, $key) {
		$value = ucfirst(strtolower($value)) . ":" . strtoupper($key);
	}
	
	//���Ԫ�ص�ֵ
	array_walk ($words, 'word_print', 'words');

	//�ı�Ԫ�ص�ֵ
	array_walk ($words, 'word_alter');
	print_r($words);
?>
