<?php
	$host = "localhost";			//���ݿ�������ַ
	$user = "root";				//�û���
	$pass = "password";			//����
	$db = "guestbook";			//���ݿ�

	//�������ݿ�
	$conn = mysql_connect ($host, $user, $pass) or
		die ("�������ݿ������ʧ�ܣ�");
	//ѡ�����ݿ�
	mysql_select_db ($db) or
		die ("��guestbook ���ݿ�ʧ�ܣ�");
?>
