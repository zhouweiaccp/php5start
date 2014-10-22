<?php
	$filename = 'test.txt';
	$somecontent = "添加这些文字到文件\n";

	//首先要确定文件存在并且可写
	if (is_writable($filename))
	{
    		//使用添加模式打开$filename，文件指针将会在文件的开头
	     if (!$handle = fopen($filename, 'a')) 
		{
			echo "不能打开文件 $filename";
			exit;									//无法打开文件则退出程序
    		}

    		//将$somecontent写入到我们打开的文件中。
		if (!fwrite($handle, $somecontent)) 
		{
			echo "不能写入到文件 $filename";
			exit;									//无法写入文件则退出程序
		}

		echo "文件“$filename”写入成功";

		//关闭文件
		fclose($handle);
	} else {
		echo "文件“$filename”不可写";
	}
?>
