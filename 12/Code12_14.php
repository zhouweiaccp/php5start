<?php
	$conn = mysql_connect ($server, $username, $password);
	mysql_select_db ($db);

	//�⽫���±��е�ȫ����¼
	$sql = "UPDATE mytable SET value=id";
	$result = mysql_query ($sql);
	echo "���µļ�¼����" . mysql_affected_rows ($conn);

	mysql_close ($conn);
?>
