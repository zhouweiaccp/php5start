<?php
	$oldfilesize = filesize($fname);		//�ļ��Ĵ�С

	$fp = fopen($fname, "r+");			//����ʹ�ö�дģʽ��
	
	while(1){
		$last_line = $line;			//ǰһ�е�λ��
		$line = ftell($fp);			//��ǰ�е�λ��
		if(! @fgets($fp, 1024)){
			break;
		}
	}
	
	ftruncate($fp, $last_line);			//���ļ���ȡ
	fclose($fp);
	
	$newfilesize = filesize($fname);		//��ȡ����ļ�����
	
	echo "ԭʼ���ļ����ȣ�$oldfilesize\n";
	echo "��ȡ����ļ����ȣ�$newfilesize\n";
?>
