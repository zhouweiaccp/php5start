<?php
	//��һ��Ŀ¼
	$handle = @opendir("/path/to/files");
	
	if ($handle)
     {
		echo "Ŀ¼�ļ���\n";

		readdir($handle);		//��ȡ��.������ǰĿ¼�ı�ʾ
		readdir($handle);		//��ȡ��..�����ϼ�Ŀ¼�ı�ʾ

		//��ȷ�ر���Ŀ¼������ʹ�á�!==������
		while (false !== ($file = readdir($handle))) {
			echo "$file\n";
		}

		//��Ŀ¼��ָ�뵹�ؿ�ͷ
		rewinddir($handle);

		//�ر�Ŀ¼
		closedir($handle);
	}
?>
