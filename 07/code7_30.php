<?php
	if(copy ("./file.gif", "./file.gif.bak"))
	{
		echo "文件复制成功！";
	}else{
		echo "文件复制失败！";
	}
?>
