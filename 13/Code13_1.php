<?php
	//���ӵ�MySQL���ݿ�
	$conn = mysql_connect("localhost", "root", "password");

	//ѡ�����ݿ�
	mysql_select_db("my_db",$conn);

	//���Ͳ�ѯ���
	$result = mysql_query("SELECT * FROM employees",$db);

	//���ݿ��ѯʧ��
	if ($result === false) 
	{
		die("��ѯʧ�ܣ�"); 
	}

	//������ݿ��ѯ����
	while ($fields = mysql_fetch_row($result)) 
	{
		for ($i=0, $max=sizeof($fields); $i < $max; $i++) 
		{
			echo $fields[$i].' ';
		}
		echo "<br>n";
	}

	//�ر����ݿ�����
	mysql_close($conn);
?>
