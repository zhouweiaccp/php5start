<?php
	//����ADODB���
	include('adodb.inc.php');

	//����Access���ݿ�����
	$conn = &NewADOConnection("access");

	//���ӵ�northwind���������ݿ�
	$conn->PConnect("northwind"); 

	//�����ַ����е�����
	$shipto = $conn->qStr("John's Old Shoppe");

	//����ǰʱ��
	$current = $conn->DBDate(time());

	$sql = "INSERT INTO orders (customerID, EmployeeID, OrderDate, ShipName)
		  VALUES ('ANATR', 2, $current, $shipto)"; 

	if ($conn->Execute($sql) === false) 
	{ 
        echo "���ݲ������" . $conn->ErrorMsg() ;
    } else {
        echo "���ݲ���ɹ���" ; 
    }

?>
