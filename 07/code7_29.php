<?php
	/**
	* ��������deleteDir
	* ��  �ܣ��ݹ��ɾ��ָ����Ŀ¼
	* ��  ����$dirĿ¼
	* ����ֵ����
     */
	function deleteDir ($dir)
	{
		$handle = @opendir ($dir);	//��Ŀ¼

		readdir ($handle);			//�ų���ǰĿ¼��.��
		readdir ($handle);			//�ų�����Ŀ¼��..��
		while (false !== ($file = readdir($handle))) 
		{
			//�����ļ���Ŀ¼��·��
			$file = $dir .DIRECTORY_SEPARATOR. $file;

			if (is_dir ($file)){			//�������Ŀ¼���ͽ��еݹ����
				delete ($file);
			} else {				//������ļ�����ʹ��unlik()ɾ��
				if (@unlink ($file)) {
					echo "�ļ�<b>$file</b>ɾ���ɹ��ˡ�<br>\n";
				} else {
					echo "�ļ�<b>$file</b>ɾ��ʧ�ܣ�<br>\n";
				}
			}
		}
		
		//���ڣ�ɾ����ǰĿ¼
		if (@rmdir ($dir)) {
			echo "Ŀ¼<b>$dir</b>ɾ���ɹ��ˡ�<br>\n";
		} else {
			echo "Ŀ¼<b>$dir</b>ɾ��ʧ�ܣ�<br>\n";
		}
	}

	//���Գ���
	$dir = "/home/tom/public_html/delete_dir";
	deleteDir ($dir);
?>
