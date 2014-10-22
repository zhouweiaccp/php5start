<?php
	$conn = mysql_connect ($host, $user, $pass) or
		die ("连接数据库服务器失败！");

	//选择数据库
	mysql_select_db ($db);
	
	//发送数据库查询语句
    $result = mysql_query ("SELECT name, url FROM guestbook") or
		die("数据库查询失败：" . mysql_error());

	//输出返回结果中第二行的name字段的数据
    echo "用户名：" . mysql_result ($result, 2); 

	//以下语句返回的内容相同
	//均输出返回结果中第三行的url字段的数据
    echo mysql_result ($result, 3, 1); 
    echo mysql_result ($result, 3, ‘url’); 

	//关闭数据库连接
    mysql_close ($conn);
?>
