<?php
	//��һ���ļ��������顣����ͨ��HTTP��URL��ȡ��HTMLԴ�ļ�
	$lines = file ("http://www.taodoor.com/");

	//��������ѭ������ʾHTML��Դ�ļ��������к�
	foreach ($lines as $line_num => $line) {
		echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br>\n";
	}
	
	//���ｫһ���ļ������ַ���������file_get_contents()
	$html = implode ("", file ("/home/tom/public_html/test.php"));
?>
