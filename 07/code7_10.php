<?php
	//�ļ�
	$filename = "data/file.txt";

	if(is_file($filename))
	{
		if(@unlink($filename))
			echo "�ļ�ɾ���ɹ���";
		else
			echo "�ļ�ɾ��ʧ�ܣ�";
	}else{
		echo "�ⲻ��һ���ļ��������ļ������ڣ�";
	}
?>
