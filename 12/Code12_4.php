<?php
	//���ݿ�����
	$conn = mysql_connect ($host, $user, $pass) or
		die ("�������ݿ������ʧ�ܣ�");

	//ʹ��mysql_query���ѡ�����ݿ�
	mysql_query ("USE $db") or
		die ("��{$db}���ݿ�ʧ�ܣ�");

	//	����
	//���������ص����ݿ����
	//	����
	
	//�ر����ݿ�����
	mysql_close ($conn);
?>
