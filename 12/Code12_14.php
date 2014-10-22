<?php
	$conn = mysql_connect ($server, $username, $password);
	mysql_select_db ($db);

	//这将更新表中的全部记录
	$sql = "UPDATE mytable SET value=id";
	$result = mysql_query ($sql);
	echo "更新的记录数：" . mysql_affected_rows ($conn);

	mysql_close ($conn);
?>
