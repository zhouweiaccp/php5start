<?php
	$conn = mysql_connect ($host, $user, $pass);
	mysql_select_db ($db);

	//��������ʱ�ļ�¼Ӱ������
	$insert_sql = "INSERT INTO guestbook (name, sex, email, comment, postdtm)
			   VALUES('����', 1, 'guest@mail.com', '�������ġ���', Now())";
	$result = mysql_query ($insert_sql);
	$insert_id = mysql_insert_id ($conn);
	echo "ǰ�μ�¼��ID��$insert_id";
?>
