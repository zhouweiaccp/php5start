<?php
	//�ļ��ϴ�Ŀ¼
	$uploaddir = "/home/tom/public_html/uploads/";

	//ѭ������$_FILE��������ж�
	for($i=0; $i<count($_FILES['upfile']['name']); $i++)
	{
		//��������
		$error = array();

		//�ж��ļ���С
		if($_FILES['upfile']['size'][$i] >= 40000)
		{
			$error[] = "�ļ��ĳߴ�̫��";
		}

		//�ж��ļ�����
		if($_FILES['upfile']['type'][$i] != "text/plain")
		{
			$error[] = "�ļ������ͱ���Ϊ�ı��ļ���";
		}

		//������������
		if($_FILES['upfile']['error'][$i] != UPLOAD_ERR_OK)
		{
			$error[] = "�ļ��ϴ�ʧ�ܣ�";
		}
	
		echo "�ļ�{$i}��".$_FILES['upfile']['name'][$i]."<br>\n";
	
		if(count($error))
		{
			//���ִ���
			echo join("<br>", $error);
		}else{
			move_uploaded_file($_FILES['upfile']['tmp_name'][$i],
							$uploaddir . $_FILES['upfile']['name'][$i]);
		}
		echo "<hr>";
	}
?>
