<?php
    //����ADODB���
    include("adodb.inc.php");
	
	//����Access���ݿ�����
	$conn = &NewADOConnection("access");
	
	//���ӵ�northwind���������ݿ�
	$conn->PConnect("northwind"); 

    $recordSet = &$conn->Execute("SELECT * FROM products"); 

	if (!$recordSet)
	{
        echo $conn->ErrorMsg(); 		//������Ϣ
	}
	else{
        while ($rows = $recordSet->FetchRow() )
	   {
            echo $rows [0]. " ". $rows[1]. "<BR>"; 
            $recordSet->MoveNext(); 	//��¼����һ��
        }
    }
    $recordSet->Close();		//��ѡ�ģ��رռ�¼��
    $conn->Close();			//��ѡ�ģ��ر�����
?>
