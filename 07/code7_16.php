<?php
	if( $fp = @fopen($fname, "w+") ){
		die("�޷����ļ� $fname");
	}
	
	//д���ļ�
	fwrite($fp, "��һ������\n");
	fwrite($fp, "��һ������\n");

	//��ʱ���ļ�ָ��λ���ļ�ĩβ�����Ҫ���������ļ�����
	//���뽫�ļ�ָ�뵹�����ļ���ͷ����
	rewind($fp);
	
	//��ȡ�ļ�
	while(!feof($fp)){
		echo fread($fp, 1024);
	}
?>
