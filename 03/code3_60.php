<?php
	print_r($employee);						//�������$employee������
	echo "<br>";

	$salary = $employee->getSalary();
	$employee->setSalary($salary + 800);		//���ӹ���
	$employee->setId(2006091);				//�����µ�Ա����
	echo $employee->getEmployeeInfo();		//���Ա���Ļ�����Ϣ
?>
