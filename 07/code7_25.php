<?php
	//打开目录
	$d = dir("/path/to/files");

	echo "Handle: ".$d->handle."<br>\n";
	echo "Path: ".$d->path."<br>\n";
	
	//循环输出
	while (false !== ($file = $d->read()))
	{
	    echo $file."<br>\n";
	}
	
	//关闭目录
	$d->close();
?>
