<?php
	$filename = "/usr/local/readme.txt";
	
	//һ���Զ�ȡ�����ļ�
	$handle = fopen ($filename, "r");			//��һ��ֻ���ļ�
	$length = filesize ($filename);				//�����ļ��Ĵ�С
	$content = fread ($handle, $length);			//��ȡ�ļ�������
	fclose ($handle);						//�ر��ļ�
	
	//��ͳ��ȡ�ļ��ķ���
	$handle = fopen ($filename, "r+");
	$content = "";

	//ʹ��feof()�ж��ļ��Ľ���
	while(!feof($handle))
	{
		$content .= fread($handle, 1024);
	}
	fclose ($handle);

	//����ݵķ���
	$handle = fopen ($filename, "r");
	$content = "";
	do{
		$data = fread($handle, 1024);
		if(strlen($data)===0)					//��û������ʱ������ѭ��
			break;
		$content .= $data;
	}while(1);
	fclose ($handle);

	//ʹ��fgets()�ķ���
	$handle = fopen ($filename, "rt");			//ʹ�á�t������\n���滻Ϊ��\r\n��
	while (!feof ($handle)) 
	{
		$content .= fgets($handle, 4096);
	}
	fclose ($handle);

	//ʹ��fgetc()���ֽڶ�ȡ�ļ�����
	$handle = fopen ($filename, "r");
	while (($c = fgetc($handle))!==FALSE) 
	{
		$content .= $c;
	}
	fclose ($handle);
?>
