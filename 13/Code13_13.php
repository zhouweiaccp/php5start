<?php
    //����ADODB���
    include('adodb.inc.php'); 

    //����������ɺ�����
    include('tohtml.inc.php'); 

    $conn = &ADONewConnection("mysql");	//�������ݿ�
    $conn->debug=1; 					//��������
	$conn->PConnect("localhost", "admin", "", "test"); 

    //ִ��һ�����ԵĲ�ѯ������һ���յļ�¼��
    $sql = "SELECT * FROM adotable WHERE id = -1";  
    $rs = $conn->Execute($sql); 

    //׼��һ�����飬�û���������
    $record = array( 
		"product" => "��ˮ�� 25L",
		"code" => "MX2500",
		"created" => time(),
	);

    //����һ���������ݵ�SQL���
    $insertSQL = $conn->GetInsertSQL($rs, $record); 
    $conn->Execute($insertSQL); 		//ִ�����ݲ������

    //���ظող���ļ�¼ID
    $insert_id = $conn->Insert_ID();

    //������Ҫ����������
    $record["product"] = "��ˮ�� 25L"; 
    $record["code"] = "XP2500";

    //����һ���������ݵ�SQL���
    $updateSQL = $conn->GetUpdateSQL($rs, $record, "id=".$insert_id); 
    $conn->Execute($updateSQL); 			//ִ�и��²���

    $conn->Close(); 
?>
