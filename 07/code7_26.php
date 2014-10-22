<?php
	//检索当前目录中的所有“*.txt”文件
	$files = glob("*.txt");
	foreach ($files as $filename)
	{
	    echo "$filename size " . filesize($filename) . "\n";
	}

	//检索当前目录中的所有以“c”开头的子目录
	$files = glob("c*", GLOB_ONLYDIR);
	foreach ($files as $filename) 
	{
	    echo "$filename size " . filesize($filename) . "\n";
	}

	//检索“/path/”中的所有以“a”、“b”或“c”开头的PHP文件
	$files = glob("/path/{a,b,c}*.php", GLOB_BRACE);
	foreach ($files as $filename)
	{
	    echo "$filename size " . filesize($filename) . "\n";
	}
?>
