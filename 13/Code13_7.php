<?php 
    include("adodb.inc.php");
    $db = &NewADOConnection("access://root:pwd@localhost");

    $db->SetFetchMode(ADODB_FETCH_NUM);		//返回数字索引数组
    $rs1 = $db->Execute("SELECT * FROM table"); 

    print_r($rs1->fields);				//输出：array(0 =>'v0', 1 =>'v1')

    $db->SetFetchMode(ADODB_FETCH_ASSOC); 	//返回字段名的关联数组
    $rs2 = $db->Execute("SELECT * FROM table"); 

    print_r($rs2->fields);				//输出：array('col1' =>'v0', 'col2' =>'v1')
?>
