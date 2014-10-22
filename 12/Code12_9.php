<?php
	//连接数据库
	$conn = mysql_connect ($host, $user, $pass) or
		die ("连接数据库服务器失败！");

	//选择数据库
	mysql_select_db ($db) or
		die ("选择数据库{$db}失败！");

	//发送查询
	$result = mysql_query ("SELECT Id, Name FROM guestbook");

	//使用mysql_fetch_array()取得结果集
	while ($row = mysql_fetch_array ($result, MYSQL_BOTH))
	{
		printf ("ID: %s  Name: %s", $row["Id"], $row["Name"]);	//关联数组
		printf ("ID: %s  用户名: %s", $row[0], $row[1]);			//数字索引
	}

	//关闭数据库连接
	mysql_close ($conn);
?>
