<?php
	//��Ŀ¼
	$d = dir("/path/to/files");

	echo "Handle: ".$d->handle."<br>\n";
	echo "Path: ".$d->path."<br>\n";
	
	//ѭ�����
	while (false !== ($file = $d->read()))
	{
	    echo $file."<br>\n";
	}
	
	//�ر�Ŀ¼
	$d->close();
?>
