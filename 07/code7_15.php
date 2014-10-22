<?php
	$filename = "data.db";
	$fp = fopen($filename, "rb");

	fseek($fp, 0);					//将指针移动到文件开头

	$total = filesize($filename);		//获得文件总长度
	
	$chars = array();
	while(ftell($fp)<$total){
		$chars[] = fgetc($fp);			//取得一个字节长度的数据
		fseek($fp, 99, SEEK_CUR);	//从当前位置后移动99个字节
	}
	print_r ($chars);
?>
