<?php
	$char = "o";
	switch($char){
		case "a" :	echo "这是一个元音“a”\n";  break;
		case "e" :	echo "这是一个元音“e”\n";  break;
		case "i" : 	echo "这是一个元音“i”\n";  break;
		case "o" :	echo "这是一个元音“o”\n";  break;	  //程序执行到此处跳出
		case "u" :	echo "这是一个元音“u”\n";  break;
		default:
			echo "这是一个辅音“$char”\n";
	}
?>
