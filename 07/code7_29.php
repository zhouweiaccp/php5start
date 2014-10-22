<?php
	/**
	* 函数名：deleteDir
	* 功  能：递归地删除指定的目录
	* 参  数：$dir目录
	* 返回值：无
     */
	function deleteDir ($dir)
	{
		$handle = @opendir ($dir);	//打开目录

		readdir ($handle);			//排除当前目录“.”
		readdir ($handle);			//排除父级目录“..”
		while (false !== ($file = readdir($handle))) 
		{
			//构造文件或目录的路径
			$file = $dir .DIRECTORY_SEPARATOR. $file;

			if (is_dir ($file)){			//如果是子目录，就进行递归操作
				delete ($file);
			} else {				//如果是文件，则使用unlik()删除
				if (@unlink ($file)) {
					echo "文件<b>$file</b>删除成功了。<br>\n";
				} else {
					echo "文件<b>$file</b>删除失败！<br>\n";
				}
			}
		}
		
		//现在，删除当前目录
		if (@rmdir ($dir)) {
			echo "目录<b>$dir</b>删除成功了。<br>\n";
		} else {
			echo "目录<b>$dir</b>删除失败！<br>\n";
		}
	}

	//测试程序
	$dir = "/home/tom/public_html/delete_dir";
	deleteDir ($dir);
?>
