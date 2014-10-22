<?php
	//读取一个本地文件
	echo file_get_contents("/home/tom/public_html/index.html");

	//读取一个远程文件
	echo file_get_contents("http://www.taodoor.com/index.php");

	//如果使用低版本的PHP程序，应该使用代替方案，
	//这样可以增强程序的移植性
	if(!file_exists("file_get_contents"))
	{
		//自定义的代替方法
		function file_get_contents ($filename)
		{
			//打开文件
			$fp = @fopen ($filename, "r");

			//锁定文件
			@flock($fp, LOCK_SH);

			//读取文件内容
			$data = @fread($fp, filesize($filename));

			//关闭文件
			@fclock($fp);

			if($data)
			{
				return $data;
			}else{
				return "";
			}
		}
	}
?>
