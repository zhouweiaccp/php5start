<?php
	//�ϴ��ļ��Ĵ洢Ŀ¼
	$uploaddir = "/home/tom/public_html/uploads/";

	//�ļ��ϴ���ȫ·������
	$uploadfile = $uploaddir. $_FILES["upfile"]["name"];
	
	if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $uploadfile)) 
	{
	    print "�ļ��ϴ��ɹ���\n";
	    print_r($_FILES);
	} else {
	    print "�ļ��ϴ�ʧ�ܣ�\n";
	    print_r($_FILES);
	}
?>
