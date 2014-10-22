<?php
	//一个图片文件
	$name = "img.png";

	//发送头信息
	header("Content-Type: image/png");
	header("Content-Disposition: attachment; filename=\"$name\"");
	header("Content-Length: ".filesize($name));

	//输出文件
	readfile($fp);
?>
