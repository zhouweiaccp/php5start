<?php
	$conn = mysql_connect ($host, $user, $pass) or
		die ("�������ݿ������ʧ�ܣ�");

	//ѡ�����ݿ�
	mysql_select_db ($db);
	
	//�������ݿ��ѯ���
    $result = mysql_query ("SELECT name, url FROM guestbook") or
		die("���ݿ��ѯʧ�ܣ�" . mysql_error());

	//������ؽ���еڶ��е�name�ֶε�����
    echo "�û�����" . mysql_result ($result, 2); 

	//������䷵�ص�������ͬ
	//��������ؽ���е����е�url�ֶε�����
    echo mysql_result ($result, 3, 1); 
    echo mysql_result ($result, 3, ��url��); 

	//�ر����ݿ�����
    mysql_close ($conn);
?>
