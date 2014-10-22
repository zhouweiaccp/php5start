<?php
	//数据库连接
	include("dbconnect.php");
	//创建数据表
	$sql = "CREATE TABLE guestbook
		(
		 id int(11) AUTO_INCREMENT,
		 name varchar(40),
		 sex tinyint (1) Default 1,
		 email varchar(50),
		 url varchar(100),
		 comment text,
		 postdtm datetime,
		 PRIMARY KEY (id)
		) ";
	if(mysql_query($sql))
	{
		echo "数据表guestbook建立失败！<br>\n";
		echo "错误代码：" . mysql_errno(). "<br>\n";
		echo "错误信息：" . mysql_error(). "<br>\n";
	}
?>
