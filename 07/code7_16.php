<?php
	if( $fp = @fopen($fname, "w+") ){
		die("无法打开文件 $fname");
	}
	
	//写入文件
	fwrite($fp, "第一行文字\n");
	fwrite($fp, "另一行文字\n");

	//此时，文件指针位于文件末尾，如果要读出整个文件内容
	//必须将文件指针倒回至文件开头部分
	rewind($fp);
	
	//读取文件
	while(!feof($fp)){
		echo fread($fp, 1024);
	}
?>
