<?php
	//����ADODB���
	include('adodb.inc.php');

	//�������ݿ�
	$conn = &NewADOConnection("mysql");
	$conn->PConnect("test");

	//��������
	$record = array(
		"product" => "������",
		"code" => "SM002501",
	);

	$conn->AutoExecute($table, $record, "INSERT");
	//ִ�С�INSERT INTO $table (product, code) values ('������', 'SM002501')��

	$record = array(
		"product" => "������",
		"code" => "XP002501",
		"another" => "Some thing here ��",		//����һ�������ֶ����ݣ�
												//���ᱻ���ԡ�
	);

	$conn->AutoExecute($table, $record, "UPDATE", "code like 'SM%'");
	//ִ�С�UPDATE $table SET product ='������', code=' XP002501'
	//	   WHERE lastname like 'SM%'��
?>
