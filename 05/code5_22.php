<?php
	$words = array ("l"=>"lemon", "o"=>"orange", "b"=>"banana", "a"=>"apple");
	
	//定义一个回调函数，输出数组元素
	function word_print ($value, $key, $prefix) {
	    echo "$prefix : $key => $value<br>\n";
	}

	//定义一个回调函数直接改变元素的值
	function word_alter (&$value, $key) {
		$value = ucfirst(strtolower($value)) . ":" . strtoupper($key);
	}
	
	//输出元素的值
	array_walk ($words, 'word_print', 'words');

	//改变元素的值
	array_walk ($words, 'word_alter');
	print_r($words);
?>
