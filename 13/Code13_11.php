<?php
	//����ADODB���
	include('adodb.inc.php');

	//�������ݿ�
	$conn = &NewADOConnection("mysql");
	$conn->PConnect("test");

	//����ǰʱ��
	$current = $conn->DBDate(time());
	
	//���¼�¼
	$sql = "UPDATE table SET postdate = '$current'
		  WHERE userId <=10"; 
	$conn->Execute($sql);

	//��ʾ���¼�¼����
	echo "���ݿ��Ѿ�����" . $conn->Affected_Rows() . "����¼";

	//������¼
	$sql = "INSERT INTO table (username, password, postdate)
		  VALUES('Tom', 'Pass', '$current')"; 
	$conn->Execute($sql);

	//��ʾ������¼ID
	echo "������¼userIdΪ��" . $conn->Insert_ID();
?>
