<?php
	//�������ݿ�
	$conn = mysql_connect ($host, $user, $pass) or
		die ("�������ݿ������ʧ�ܣ�");

	//ѡ�����ݿ�
	mysql_select_db ($db) or
		die ("ѡ�����ݿ�{$db}ʧ�ܣ�");

	//���Ͳ�ѯ
    $result = mysql_query ("SELECT id, name FROM guestbook");
	
	//ʹ��mysql_fetch_row()ȡ�ý����
	while ($row = mysql_fetch_row ($result))
	{
        printf ("ID: %s  Name: %s", $row[0], $row[1]);
    }

	//�ͷ���Դ
	mysql_free_result ($result);

	//�ر����ݿ�����
	mysql_close ($conn);
?>
