<?php
	//���ݿ�����
	include("dbconnect.php");
	//�������ݱ�
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
		echo "���ݱ�guestbook����ʧ�ܣ�<br>\n";
		echo "������룺" . mysql_errno(). "<br>\n";
		echo "������Ϣ��" . mysql_error(). "<br>\n";
	}
?>
