<?php
	//�������ݿ�
	$conn = mysql_connect ($host, $user, $pass) or
		die ("�������ݿ������ʧ�ܣ�");

	//ѡ�����ݿ�
	mysql_select_db ($db) or
		die ("��{$db}���ݿ�ʧ�ܣ�");

	//	����
	//���������ص����ݿ����
	//	����
	
	//�ر����ݿ�����
	mysql_close($conn);
?>
