<?php
	$conn = mysql_pconnect ($server, $username, $password);
	mysql_select_db ($db);

	//这将删除表中的前10条记录
	$sql = "DELETE FROM guestbook WHERE id<10";
	$result = mysql_query ($sql);
	echo "删除的记录数：" . mysql_affected_rows ($conn);

	//这将删除表中的全部记录
	$sql = "DELETE FROM guestbook";
	$result = mysql_query ($sql);
	echo "删除的记录数：" . mysql_affected_rows ($conn);
?>
