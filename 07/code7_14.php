<?php
	$filename = "test.txt";
	$fp = fopen($filename, "r");
	$line = fgets($fp, 1024);				//��ȡ�ļ��ĵ�һ������
	$current = ftell($fp);
	echo "��ǰ��ȡ���ݵ��ֽ����ǣ�$current\n";
	echo "���ݳ�Ϊ��" .strlen($line);
?>
