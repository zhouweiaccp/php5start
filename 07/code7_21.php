<?php
	//��ȡһ�������ļ�
	echo file_get_contents("/home/tom/public_html/index.html");

	//��ȡһ��Զ���ļ�
	echo file_get_contents("http://www.taodoor.com/index.php");

	//���ʹ�õͰ汾��PHP����Ӧ��ʹ�ô��淽����
	//����������ǿ�������ֲ��
	if(!file_exists("file_get_contents"))
	{
		//�Զ���Ĵ��淽��
		function file_get_contents ($filename)
		{
			//���ļ�
			$fp = @fopen ($filename, "r");

			//�����ļ�
			@flock($fp, LOCK_SH);

			//��ȡ�ļ�����
			$data = @fread($fp, filesize($filename));

			//�ر��ļ�
			@fclock($fp);

			if($data)
			{
				return $data;
			}else{
				return "";
			}
		}
	}
?>
