<?php
	//连接到MySQL数据库
	$conn = mysql_connect("localhost", "root", "password");

	//选择数据库
	mysql_select_db("my_db",$conn);

	//发送查询语句
	$result = mysql_query("SELECT * FROM employees",$db);

	//数据库查询失败
	if ($result === false) 
	{
		die("查询失败！"); 
	}

	//获得数据库查询内容
	while ($fields = mysql_fetch_row($result)) 
	{
		for ($i=0, $max=sizeof($fields); $i < $max; $i++) 
		{
			echo $fields[$i].' ';
		}
		echo "<br>n";
	}

	//关闭数据库连接
	mysql_close($conn);
?>
