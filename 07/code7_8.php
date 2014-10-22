<?php
	$filename = "/usr/local/readme.txt";
	
	//一次性读取整个文件
	$handle = fopen ($filename, "r");			//打开一个只读文件
	$length = filesize ($filename);				//计算文件的大小
	$content = fread ($handle, $length);			//读取文件的内容
	fclose ($handle);						//关闭文件
	
	//传统读取文件的方法
	$handle = fopen ($filename, "r+");
	$content = "";

	//使用feof()判断文件的结束
	while(!feof($handle))
	{
		$content .= fread($handle, 1024);
	}
	fclose ($handle);

	//更便捷的方法
	$handle = fopen ($filename, "r");
	$content = "";
	do{
		$data = fread($handle, 1024);
		if(strlen($data)===0)					//当没有数据时，跳出循环
			break;
		$content .= $data;
	}while(1);
	fclose ($handle);

	//使用fgets()的方法
	$handle = fopen ($filename, "rt");			//使用“t”将“\n”替换为“\r\n”
	while (!feof ($handle)) 
	{
		$content .= fgets($handle, 4096);
	}
	fclose ($handle);

	//使用fgetc()逐字节读取文件内容
	$handle = fopen ($filename, "r");
	while (($c = fgetc($handle))!==FALSE) 
	{
		$content .= $c;
	}
	fclose ($handle);
?>
