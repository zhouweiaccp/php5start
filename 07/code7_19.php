<?php
	$fname = "/home/tom/public_html/test.txt";
	
	//�Զ�д��ʽ���ļ�
	if( $fp = @fopen($fname, "w+") )
	{
		die("�޷����ļ� $fname");
	}
	
	//д���ļ�ʱ���ܽ��ļ�����ΪLOCK_EX
	if( !flock($fp, LOCK_EX) )
	{
		die("�޷����ļ�����Ϊ LOCK_EX\n");
	}
	//д���ļ�
	fwrite($fp, "��һ������\n");
	fwrite($fp, "��һ������\n");

	flock($fp, LOCK_UN);						//�ͷŶ�ռ����

	//��ȡ�ļ�ʱ���ܽ��ļ�����ΪLOCK_SH
	if( !flock($fp, LOCK_SH) )
	{
		die("�޷����ļ�����Ϊ LOCK_SH\n");
	}

	//��ȡ�ļ�
	rewind($fp);								//���ļ�ָ�뵹���ļ��Ŀ�ͷ
	while(!feof($fp))
	{
		echo fread($fp, 1024);
	}

	flock($fp, LOCK_UN);						//�ͷŹ�������

	fclose($fp);								//�ر��ļ�
?>
