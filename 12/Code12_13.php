<?php
	$conn = mysql_pconnect ($server, $username, $password);
	mysql_select_db ($db);

	//�⽫ɾ�����е�ǰ10����¼
	$sql = "DELETE FROM guestbook WHERE id<10";
	$result = mysql_query ($sql);
	echo "ɾ���ļ�¼����" . mysql_affected_rows ($conn);

	//�⽫ɾ�����е�ȫ����¼
	$sql = "DELETE FROM guestbook";
	$result = mysql_query ($sql);
	echo "ɾ���ļ�¼����" . mysql_affected_rows ($conn);
?>
