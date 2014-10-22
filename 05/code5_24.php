<?php
	define('MAX_LENGTH', 4);		//定义单词的最大长度
	
	$words = array(					//单词列表
		'long'=>'psychotomimetic',
		'fuel',
		'google',
		'small'=>'at',
		'recall',
	);
	
	//回调函数，返回长度大于MAX_LENGTH字节的单词
	function long_word($word) {
	    	return (strlen($word)> MAX_LENGTH);
	}
	
	echo "长度大于4字节的单词：\n";
	print_r(array_filter($words, "long_word"));
?>
