<?php
	//Unix系统的例子
	$handle = fopen ("/home/thomas/file.txt", "r");
	$handle = fopen ("/home/thomas/file.gif", "wb");
	
	//Windows系统的例子
	$handle = fopen ("c:\\data\\info.txt", "r");
	$handle = fopen ("c:/data/info.db", "ab");

	//关闭文件的例子
	fclose($handle);
?>
