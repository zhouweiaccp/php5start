<?php
	//����ADODB���
	include("adodb.inc.php");

	//����MySQL���ݿ�����Ӷ���
	$db =& NewADOConnection('mysql');

	//�������ݿ�
	$db->Connect("localhost", "root", "password", "mydb");

	//ִ�в�ѯ����
	$result = $db->Execute("SELECT * FROM employees");

	//���ݿ��ѯʧ�ܴ���
	if ($result === false)
	{
		die("��ѯʧ�ܣ�"); 
	}

	//�����ѯ���
	while (!$result->EOF) 
	{
	    	for ($i=0, $max=$result->FieldCount(); $i < $max; $i++)
		{
           echo $result->fields[$i].' ';
		}
    		$result->MoveNext();
   		echo "<br>n";
 	}
	
	//�ر����ݿ�����
	$db->Close();
?>
