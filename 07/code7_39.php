<?php
	//文件源是：original.html
	$name = 'original.html';

	//发送头信息：指定文件类型
	header('Content-type: text/html');

	//发送头信息：指定文件的表述
	header('Content-Disposition: attachment; filename="downloaded.html"');

	//发送头信息：指定文件的小
	header("Content-Length: ".filesize($name));

	//输出文件内容
	$fp = fopen($name, "r");
	while(false==feof($fp)){
		echo fread($fp, 1024);
	}
?>
