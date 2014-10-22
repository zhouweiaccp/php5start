<?php
	$seek  = array();
	$text   = "I have a dream that one day I can make it. So just do it, nothing is impossible!";
	
	//将字符串按空白，标点符号拆分（每个标点后也可能跟有空格）
	$words = preg_split("/[.,;!\s']\s*/", $text);
	foreach($words as $val)
	{
		$seek[strtolower($val)] ++;
	}

	echo "共有大约" .count($words). "个单词。";
	echo "其中共有" .$seek['i']. "个单词“I”。";
?>
