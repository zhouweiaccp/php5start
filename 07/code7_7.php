<?php
	//Unixϵͳ������
	$handle = fopen ("/home/thomas/file.txt", "r");
	$handle = fopen ("/home/thomas/file.gif", "wb");
	
	//Windowsϵͳ������
	$handle = fopen ("c:\\data\\info.txt", "r");
	$handle = fopen ("c:/data/info.db", "ab");

	//�ر��ļ�������
	fclose($handle);
?>
