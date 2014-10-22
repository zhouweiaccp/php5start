<?php
	//连接数据库
	$conn = mysql_connect ($host, $user, $pass);
	mysql_select_db ($db);

	//发送一个简单的数据库查询语句
	$result = mysql_query ("SELECT * FROM guestbook LIMIT 1");

	//查询字段数量
	$total = mysql_num_fields($result);
	
	//打印字段信息
	echo "<pre>";
	for ($i=0; $i<$total; $i++){
		print_r (mysql_fetch_field ($result ,$i) );
	}
	echo "</pre>";

	//关闭数据库连接
	mysql_close ($conn);
?>
