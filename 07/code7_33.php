<?php
	/**
	* 函数名：copyDir
	* 功  能：递归地复制整个目录
	* 参  数：$dirFrom   源目录名
	*		$dirTo	  目标目录名
	* 返回值：无
     */
	function copyDir($dirFrom, $dirTo)
	{
		//如果遇到一个同名的文件，无法复制
		//目录则直接退出
		if(is_file($dirTo))
		{
			die("无法建立目录 $dirTo");
		}
		
		//如果目录已经存在就不必建立
		if(!file_exists($dirTo))
		{
			mkdir($dirTo);
		}

		$handle = opendir($dirFrom);		//打开当前目录

		readdir ($handle);				//排除当前目录“.”
		readdir ($handle);				//排除父级目录“..”

		//循环读取文件
		while (false !== ($file = readdir($handle))) 
		{
			//生成源文件名
			$fileFrom = $dirFrom .DIRECTORY_SEPARATOR. $file;
			//生成目标文件名
			$fileTo = $dirTo .DIRECTORY_SEPARATOR. $file;
			
			if(is_dir($fileFrom)){			//如果是子目录，就进行递归操作
				copyDir($fileFrom, $fileTo);
			}else{					//如果是文件，直接使用copy()函数
				@copy($fileFrom, $fileTo);
			}
		}
	}
	
	//测试代码
	copyDir("C:\\windows\\temp", "D:\\temp");
?>
