<?php
	$conn = mysql_connect ($host, $user, $pass) or
		die ("�������ݿ������ʧ�ܣ�");

	mysql_select_db ($db) or
		die ("ѡ�����ݿ�{$db}ʧ�ܣ�");

	//��������ʱ�ļ�¼Ӱ������
	$insert_sql = "INSERT INTO guestbook (name, sex, email, comment, postdtm)
			   VALUES('����', 1, 'guest@mail.com', '�������ġ���', Now())";
	$result = mysql_query ($insert_sql);
	$insert_num = mysql_affected_rows ($conn);
	echo "����ļ�¼����$insert_num";

	//��������ʱ�ļ�¼Ӱ������
	$update_sql = "UPDATE guestbook SET comment='�����޸ĵ����ġ���'
			     WHERE id=1";
	$result = mysql_query ($update_sql);
	$update_num = mysql_affected_rows ($conn);
	echo "���µļ�¼����$update_num";

	//ɾ������ʱ�ļ�¼Ӱ������
	$delete_sql = "DELETE guestbook WHERE id<99";
	$result = mysql_query ($delete_sql);
	$delete_num = mysql_affected_rows ($conn);
	echo "ɾ���ļ�¼����$delete_num";

	mysql_close ($conn);
?>
