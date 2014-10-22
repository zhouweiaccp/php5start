<?php
	$char = "o";
	switch($char){
		case "a" :
		case "e" :
		case "i" :
		case "o" :								//程序执行到此处并不跳出
		case "u" :								//继续执行
			echo "这是一个元音“$char”\n";
		break;								//在此处跳出
		default:
			echo "这是一个辅音“$char”\n";
	}
?>
