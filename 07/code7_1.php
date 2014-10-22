<?php
	echo filetype('/etc/passwd'); 		// file
	echo filetype('/etc/');       		// dir

	$filetypes = array(
		'file' => '普通文件',			'dir' => '目录文件',
		'block' => '设备文件',			'fifo' => '命名管道',
		'link' => '符号连接',			'char' => '套接字',
		'unknown' => '未知',
	);
	
	//根据$file的类型，打印不同的文字
	if($type = filetype($file))
	{
		//列用返回的$type类型与类型数组$filetypes
		//结合使用，是一种和聪明的方式
		echo $file."是一个“" .$filetypes[$type]. "”的类型。\n";
	}
?>
