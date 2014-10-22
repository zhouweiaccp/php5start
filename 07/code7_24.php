<?php
	//打开一个目录
	$handle = @opendir("/path/to/files");
	
	if ($handle)
     {
		echo "目录文件：\n";

		readdir($handle);		//获取“.”，当前目录的表示
		readdir($handle);		//获取“..”，上级目录的表示

		//正确地遍历目录方法，使用“!==”符号
		while (false !== ($file = readdir($handle))) {
			echo "$file\n";
		}

		//将目录的指针倒回开头
		rewinddir($handle);

		//关闭目录
		closedir($handle);
	}
?>
