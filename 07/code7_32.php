<?php
	/**
	* ��������move
	* ��  �ܣ��ƶ�ָ�����ļ���Ŀ¼
	* ��  ����$source  Ҫ�������ļ�
	*		 $dest    Ҫ�ƶ������ļ�Ŀ¼
	* ����ֵ��bool
     */
	function move ($source, $dest)
	{
		$file = basename($source);			//ȡ��Ŀ¼��
		$desct = $desct .DIRECTORY_SEPARATOR. $file;
	
		return rename($source, $desct);
	}
	
	//���ļ���Ŀ¼��path1�ƶ���path2Ŀ¼��
	move("/path1/name.gif", "/path2");
	move("/path1/dir", "/path2");
?>
