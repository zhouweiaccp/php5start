<?php
    //包含ADODB类库
    include('adodb.inc.php'); 

    //包含表格生成函数库
    include('tohtml.inc.php'); 

    $conn = &ADONewConnection("mysql");	//连接数据库
    $conn->debug=1; 					//开启调试
	$conn->PConnect("localhost", "admin", "", "test"); 

    //执行一个测试的查询，返回一个空的记录集
    $sql = "SELECT * FROM adotable WHERE id = -1";  
    $rs = $conn->Execute($sql); 

    //准备一个数组，用户插入数据
    $record = array( 
		"product" => "热水器 25L",
		"code" => "MX2500",
		"created" => time(),
	);

    //生成一个插入数据的SQL语句
    $insertSQL = $conn->GetInsertSQL($rs, $record); 
    $conn->Execute($insertSQL); 		//执行数据插入操作

    //返回刚刚插入的记录ID
    $insert_id = $conn->Insert_ID();

    //给定需要修正的数据
    $record["product"] = "热水器 25L"; 
    $record["code"] = "XP2500";

    //生成一个更新数据的SQL语句
    $updateSQL = $conn->GetUpdateSQL($rs, $record, "id=".$insert_id); 
    $conn->Execute($updateSQL); 			//执行更新操作

    $conn->Close(); 
?>
