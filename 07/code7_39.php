<?php
	//�ļ�Դ�ǣ�original.html
	$name = 'original.html';

	//����ͷ��Ϣ��ָ���ļ�����
	header('Content-type: text/html');

	//����ͷ��Ϣ��ָ���ļ��ı���
	header('Content-Disposition: attachment; filename="downloaded.html"');

	//����ͷ��Ϣ��ָ���ļ���С
	header("Content-Length: ".filesize($name));

	//����ļ�����
	$fp = fopen($name, "r");
	while(false==feof($fp)){
		echo fread($fp, 1024);
	}
?>
