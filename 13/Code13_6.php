<?php
    //包含ADODB类库
    include("adodb.inc.php");
	
	//建立Access数据库连接
	$conn = &NewADOConnection("access");
	
	//连接到northwind主机的数据库
	$conn->PConnect("northwind"); 

    $recordSet = &$conn->Execute("SELECT * FROM products"); 

	if (!$recordSet)
	{
        echo $conn->ErrorMsg(); 		//错误信息
	}
	else{
        while ($rows = $recordSet->FetchRow() )
	   {
            echo $rows [0]. " ". $rows[1]. "<BR>"; 
            $recordSet->MoveNext(); 	//记录后移一行
        }
    }
    $recordSet->Close();		//可选的，关闭记录集
    $conn->Close();			//可选的，关闭连接
?>
