<?php
	//包含ADODB类库
	include("adodb.inc.php");

	//创建MySQL数据库的连接对象
	$db =& NewADOConnection('mysql');

	//连接数据库
	$db->Connect("localhost", "root", "password", "mydb");

	//执行查询操作
	$result = $db->Execute("SELECT * FROM employees");

	//数据库查询失败处理
	if ($result === false)
	{
		die("查询失败！"); 
	}

	//输出查询结果
	while (!$result->EOF) 
	{
	    	for ($i=0, $max=$result->FieldCount(); $i < $max; $i++)
		{
           echo $result->fields[$i].' ';
		}
    		$result->MoveNext();
   		echo "<br>n";
 	}
	
	//关闭数据库连接
	$db->Close();
?>
