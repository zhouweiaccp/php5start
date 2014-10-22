<?php
	$filename = "test.txt";
	$fp = fopen($filename, "r");
	$line = fgets($fp, 1024);				//读取文件的第一行内容
	$current = ftell($fp);
	echo "当前读取内容的字节数是：$current\n";
	echo "数据长为：" .strlen($line);
?>
