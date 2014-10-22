<?php
	$conn = mysql_connect ($host, $user, $pass) or
		die ("连接数据库服务器失败！");

	mysql_select_db ($db) or
		die ("选择数据库{$db}失败！");

	//插入数据时的记录影响行数
	$insert_sql = "INSERT INTO guestbook (name, sex, email, comment, postdtm)
			   VALUES('宾客', 1, 'guest@mail.com', '留言正文……', Now())";
	$result = mysql_query ($insert_sql);
	$insert_num = mysql_affected_rows ($conn);
	echo "插入的记录数：$insert_num";

	//更新数据时的记录影响行数
	$update_sql = "UPDATE guestbook SET comment='留言修改的正文……'
			     WHERE id=1";
	$result = mysql_query ($update_sql);
	$update_num = mysql_affected_rows ($conn);
	echo "更新的记录数：$update_num";

	//删除数据时的记录影响行数
	$delete_sql = "DELETE guestbook WHERE id<99";
	$result = mysql_query ($delete_sql);
	$delete_num = mysql_affected_rows ($conn);
	echo "删除的记录数：$delete_num";

	mysql_close ($conn);
?>
