<?php
	$tmp_handle = tmpfile();
	fwrite($tmp_handle, "write some data into tempfile.");	//д����ʱ����
	fclose($tmp_handle); 							//��ʱ�ļ��رգ�ͬʱ��ɾ��
?>
