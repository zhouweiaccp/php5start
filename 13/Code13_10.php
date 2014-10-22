<?php
	//包含ADODB类库
	include('adodb.inc.php');

	//建立Access数据库连接
	$conn = &NewADOConnection("access");

	//连接到northwind主机的数据库
	$conn->PConnect("northwind"); 

	//处理字符串中的引号
	$shipto = $conn->qStr("John's Old Shoppe");

	//处理当前时间
	$current = $conn->DBDate(time());

	$sql = "INSERT INTO orders (customerID, EmployeeID, OrderDate, ShipName)
		  VALUES ('ANATR', 2, $current, $shipto)"; 

	if ($conn->Execute($sql) === false) 
	{ 
        echo "数据插入错误：" . $conn->ErrorMsg() ;
    } else {
        echo "数据插入成功！" ; 
    }

?>
