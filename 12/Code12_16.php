<?php
	//�������ݿ�
	$conn = mysql_connect ($host, $user, $pass);
	mysql_select_db ($db);

	//����һ���򵥵����ݿ��ѯ���
	$result = mysql_query ("SELECT * FROM guestbook LIMIT 1");

	//��ѯ�ֶ�����
	$total = mysql_num_fields($result);
	
	//��ӡ�ֶ���Ϣ
	echo "<pre>";
	for ($i=0; $i<$total; $i++){
		print_r (mysql_fetch_field ($result ,$i) );
	}
	echo "</pre>";

	//�ر����ݿ�����
	mysql_close ($conn);
?>
