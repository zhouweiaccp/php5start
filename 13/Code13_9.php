<?php
	//����ADODB���
	include('adodb.inc.php'); 

	//����rs2html����
	include('tohtml.inc.php'); 

	//�������ݿ�
	$conn = &ADONewConnection('mysql');
	$conn->PConnect('localhost','userid','password','database');
	$rs = $conn->Execute('SELECT * FROM table');
	
	//����¼ת��ΪHTML
	echo rs2html($rs); 
?>
