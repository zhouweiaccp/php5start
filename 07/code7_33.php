<?php
	/**
	* ��������copyDir
	* ��  �ܣ��ݹ�ظ�������Ŀ¼
	* ��  ����$dirFrom   ԴĿ¼��
	*		$dirTo	  Ŀ��Ŀ¼��
	* ����ֵ����
     */
	function copyDir($dirFrom, $dirTo)
	{
		//�������һ��ͬ�����ļ����޷�����
		//Ŀ¼��ֱ���˳�
		if(is_file($dirTo))
		{
			die("�޷�����Ŀ¼ $dirTo");
		}
		
		//���Ŀ¼�Ѿ����ھͲ��ؽ���
		if(!file_exists($dirTo))
		{
			mkdir($dirTo);
		}

		$handle = opendir($dirFrom);		//�򿪵�ǰĿ¼

		readdir ($handle);				//�ų���ǰĿ¼��.��
		readdir ($handle);				//�ų�����Ŀ¼��..��

		//ѭ����ȡ�ļ�
		while (false !== ($file = readdir($handle))) 
		{
			//����Դ�ļ���
			$fileFrom = $dirFrom .DIRECTORY_SEPARATOR. $file;
			//����Ŀ���ļ���
			$fileTo = $dirTo .DIRECTORY_SEPARATOR. $file;
			
			if(is_dir($fileFrom)){			//�������Ŀ¼���ͽ��еݹ����
				copyDir($fileFrom, $fileTo);
			}else{					//������ļ���ֱ��ʹ��copy()����
				@copy($fileFrom, $fileTo);
			}
		}
	}
	
	//���Դ���
	copyDir("C:\\windows\\temp", "D:\\temp");
?>
