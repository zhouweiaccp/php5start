<?php
	$conn = mysql_connect ($host, $user, $pass);
	mysql_select_db ($db);

	//插入数据时的记录影响行数
	$insert_sql = "INSERT INTO guestbook (name, sex, email, comment, postdtm)
			   VALUES('宾客', 1, 'guest@mail.com', '留言正文……', Now())";
	$result = mysql_query ($insert_sql);
	$insert_id = mysql_insert_id ($conn);
	echo "前次记录的ID：$insert_id";
?>
