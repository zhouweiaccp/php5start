<?php
	$vowels = array("a", "A", "e", "E", "i", "I", "o", "O", "u", "U");		//元音字符数组
	$string = "Replace All Vowels in String.";
	echo str_replace($vowels, "*", $string);		//输出结果“R*pl*c* *ll V*w*ls *n Str*ng.”
?>
