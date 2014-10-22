<?php
	srand ((float) microtime() * 10000000);			//设置随机发生器种子
	$servers = array ("Unix", "Linux", "Windows", "MacOS", "Solaris");
	$rand_keys = array_rand ($servers, 2);
	print $input[$rand_keys[0]]."\n";
	print $input[$rand_keys[1]]."\n";
?>
