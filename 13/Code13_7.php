<?php 
    include("adodb.inc.php");
    $db = &NewADOConnection("access://root:pwd@localhost");

    $db->SetFetchMode(ADODB_FETCH_NUM);		//����������������
    $rs1 = $db->Execute("SELECT * FROM table"); 

    print_r($rs1->fields);				//�����array(0 =>'v0', 1 =>'v1')

    $db->SetFetchMode(ADODB_FETCH_ASSOC); 	//�����ֶ����Ĺ�������
    $rs2 = $db->Execute("SELECT * FROM table"); 

    print_r($rs2->fields);				//�����array('col1' =>'v0', 'col2' =>'v1')
?>
