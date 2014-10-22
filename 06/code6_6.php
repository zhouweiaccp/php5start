<?php
	$lines = file('source.php');				//将文件读入数组中

	for($i=0; $i<count($lines); $i++)
	{
		//将行末以“\\”或“#”开头的注释去掉
		$lines[$i] = eregi_replace("(\/\/|#).*$", "", $lines[$i]); 
		//将行末的空白消除
		$lines[$i] = eregi_replace("[ \n\r\t\v\f]*$", "\r\n", $lines[$i]); 
	}

	//整理后输出到页面
	echo htmlspecialchars(join("",$lines));
?>
