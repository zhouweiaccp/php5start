<?php
	//����ADODB���
	include_once('adodb.inc.php'); 

	//������ҳ������
	include_once('adodb-pager.inc.php'); 
   
	//��ʼ��SESSION������ÿҳ֮�䴫������
	session_start(); 

	//�������ݿ�
	$db = NewADOConnection('mysql'); 
	$db->Connect('localhost','root','pwd','test'); 
	
	$sql = "SELECT * from adotable ";

	//ʵ������ҳ����
	$pager = new ADODB_Pager($db, $sql);

	//����������HTML��ʽ��ʾ����
	$pager->htmlSpecialChars = false;

	//ʵ�ַ�ҳ��ʾ��5����¼ÿҳ
	$pager->Render(5);
?>
