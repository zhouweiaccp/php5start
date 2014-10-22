<?php
	//文件
	$filename = "data/file.txt";

	if(is_file($filename))
	{
		if(@unlink($filename))
			echo "文件删除成功！";
		else
			echo "文件删除失败！";
	}else{
		echo "这不是一个文件，或者文件不存在！";
	}
?>
