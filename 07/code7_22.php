<?php
	//将一个文件读入数组。这里通过HTTP从URL中取得HTML源文件
	$lines = file ("http://www.taodoor.com/");

	//在数组中循环，显示HTML的源文件并加上行号
	foreach ($lines as $line_num => $line) {
		echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br>\n";
	}
	
	//这里将一个文件读入字符串，类似file_get_contents()
	$html = implode ("", file ("/home/tom/public_html/test.php"));
?>
