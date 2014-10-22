<?php
	$str = "Tom Is A PHP Programer."
	//全部转换为小写
	$lower = strtolower($str);             	//返回“tom is a php programer.”
	//全部转换为大写
	$upper = strtoupper($str);             	//返回“TOM IS A PHP PROGRAMER.”
	
	//将整句的首字母转为大写
	$string = 'hello PHP world!';
	echo ucfirst($string);             		//输出“Hello PHP world!”
	
	//将单词的首字母转为大写
	$php = "php: hypertext preprocessor";	
	$php = ucwords($php);				//返回“PHP: Hypertext Preprocessor”
	
	//单词是由空白进行分隔的，下面的repairing不会转换
	$word = "i try do some programming/repairing.";
	$word = ucwords($word);				//返回“I Try Do Some Programming/repairing.”
?>
