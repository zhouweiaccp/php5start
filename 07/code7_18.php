<?php
	$tempfile = tempnam("C:\\", " MM_");		//������ʱ�ļ�
	
	//д��$tempfile�ļ�
	$fp = fopen($tempfile, "w");
	
	if(!$fp)
	{
		die("�޷��� $tempfile");
	}

	fwrite($fp, "��һ������\n");
	fwrite($fp, "��һ������\n");
	fwrite($fp, "����������\n");
	fclose($fp);			//�ر��ļ�

	//��ȡ$tempfile�ļ�
	$fp = fopen($tempfile, "r");
	if(!$fp)
	{
		die("�޷��� $tempfile");
	}

	while($line = fgets($fp, 1024))
	{
		echo $line;
	}
	fclose($fp);			//�ر��ļ�
?>
