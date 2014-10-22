<?php
	$fname = "/home/tom/public_html/test.txt";
	
	//以读写方式打开文件
	if( $fp = @fopen($fname, "w+") )
	{
		die("无法打开文件 $fname");
	}
	
	//写入文件时，总将文件锁定为LOCK_EX
	if( !flock($fp, LOCK_EX) )
	{
		die("无法将文件锁定为 LOCK_EX\n");
	}
	//写入文件
	fwrite($fp, "第一行文字\n");
	fwrite($fp, "另一行文字\n");

	flock($fp, LOCK_UN);						//释放独占锁定

	//读取文件时，总将文件锁定为LOCK_SH
	if( !flock($fp, LOCK_SH) )
	{
		die("无法将文件锁定为 LOCK_SH\n");
	}

	//读取文件
	rewind($fp);								//将文件指针倒回文件的开头
	while(!feof($fp))
	{
		echo fread($fp, 1024);
	}

	flock($fp, LOCK_UN);						//释放共享锁定

	fclose($fp);								//关闭文件
?>
