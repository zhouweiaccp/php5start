<?php
	$rows = file('php.ini');  //将php.ini文件读到数组中

	//循环便历
	foreach($rows as $line)
	{
	  If(trim($line))
	  {
		//将匹配成功的参数写入数组中
		if(eregi("^([a-z0-9_.]*) *=(.*)", $line, $matches))
		{
            $options[$matches[1]] = trim($matches[2]);
         }
         unset($matches);
       }
	}

	//输出参数结果
	print_r($options);
?>
