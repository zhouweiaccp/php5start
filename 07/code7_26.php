<?php
	//������ǰĿ¼�е����С�*.txt���ļ�
	$files = glob("*.txt");
	foreach ($files as $filename)
	{
	    echo "$filename size " . filesize($filename) . "\n";
	}

	//������ǰĿ¼�е������ԡ�c����ͷ����Ŀ¼
	$files = glob("c*", GLOB_ONLYDIR);
	foreach ($files as $filename) 
	{
	    echo "$filename size " . filesize($filename) . "\n";
	}

	//������/path/���е������ԡ�a������b����c����ͷ��PHP�ļ�
	$files = glob("/path/{a,b,c}*.php", GLOB_BRACE);
	foreach ($files as $filename)
	{
	    echo "$filename size " . filesize($filename) . "\n";
	}
?>
