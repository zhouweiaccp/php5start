<?php
	/**
	* 函数名：move
	* 功  能：移动指定的文件和目录
	* 参  数：$source  要操作的文件
	*		 $dest    要移动到的文件目录
	* 返回值：bool
     */
	function move ($source, $dest)
	{
		$file = basename($source);			//取得目录名
		$desct = $desct .DIRECTORY_SEPARATOR. $file;
	
		return rename($source, $desct);
	}
	
	//将文件或目录从path1移动到path2目录下
	move("/path1/name.gif", "/path2");
	move("/path1/dir", "/path2");
?>
