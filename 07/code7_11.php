<?php
	$oldfilesize = filesize($fname);		//文件的大小

	$fp = fopen($fname, "r+");			//必须使用读写模式打开
	
	while(1){
		$last_line = $line;			//前一行的位置
		$line = ftell($fp);			//当前行的位置
		if(! @fgets($fp, 1024)){
			break;
		}
	}
	
	ftruncate($fp, $last_line);			//将文件截取
	fclose($fp);
	
	$newfilesize = filesize($fname);		//截取后的文件长度
	
	echo "原始的文件长度：$oldfilesize\n";
	echo "截取后的文件长度：$newfilesize\n";
?>
