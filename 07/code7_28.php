<?php
	$file = "/path/to/file";
	if (is_dir($file)) { 
		rmdir ($file);			//ɾ��Ŀ¼
	} else {
		unlink ($file);			//ɾ���ļ�
	}
?>
