<?php
	//�������ݿ�
	$conn = mysql_connect ($host, $user, $pass) or
		die ("�������ݿ������ʧ�ܣ�");

	//ѡ�����ݿ�
	mysql_select_db ($db) or
		die ("ѡ�����ݿ�{$db}ʧ�ܣ�");

	//���Ͳ�ѯ
	$result = mysql_query ("SELECT Id, Name FROM guestbook");

	//ʹ��mysql_fetch_array()ȡ�ý����
	while ($row = mysql_fetch_array ($result, MYSQL_BOTH))
	{
		printf ("ID: %s  Name: %s", $row["Id"], $row["Name"]);	//��������
		printf ("ID: %s  �û���: %s", $row[0], $row[1]);			//��������
	}

	//�ر����ݿ�����
	mysql_close ($conn);
?>
