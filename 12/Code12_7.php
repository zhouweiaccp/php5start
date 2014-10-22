<?php
	//连接数据库
	$conn = mysql_connect ($host, $user, $pass) or
		die ("连接数据库服务器失败！");

	//选择数据库
	mysql_select_db ($db) or
		die ("选择数据库{$db}失败！");

	//发送查询
    $result = mysql_query ("SELECT id, name FROM guestbook");
	
	//使用mysql_fetch_row()取得结果集
	while ($row = mysql_fetch_row ($result))
	{
        printf ("ID: %s  Name: %s", $row[0], $row[1]);
    }

	//释放资源
	mysql_free_result ($result);

	//关闭数据库连接
	mysql_close ($conn);
?>
