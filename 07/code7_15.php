<?php
	$filename = "data.db";
	$fp = fopen($filename, "rb");

	fseek($fp, 0);					//��ָ���ƶ����ļ���ͷ

	$total = filesize($filename);		//����ļ��ܳ���
	
	$chars = array();
	while(ftell($fp)<$total){
		$chars[] = fgetc($fp);			//ȡ��һ���ֽڳ��ȵ�����
		fseek($fp, 99, SEEK_CUR);	//�ӵ�ǰλ�ú��ƶ�99���ֽ�
	}
	print_r ($chars);
?>
