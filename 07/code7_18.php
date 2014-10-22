<?php
	$tempfile = tempnam("C:\\", " MM_");		//建立临时文件
	
	//写入$tempfile文件
	$fp = fopen($tempfile, "w");
	
	if(!$fp)
	{
		die("无法打开 $tempfile");
	}

	fwrite($fp, "第一行文字\n");
	fwrite($fp, "另一行文字\n");
	fwrite($fp, "更多行文字\n");
	fclose($fp);			//关闭文件

	//读取$tempfile文件
	$fp = fopen($tempfile, "r");
	if(!$fp)
	{
		die("无法打开 $tempfile");
	}

	while($line = fgets($fp, 1024))
	{
		echo $line;
	}
	fclose($fp);			//关闭文件
?>
