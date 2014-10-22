<?php
	print_r($employee);						//输出变量$employee的内容
	echo "<br>";

	$salary = $employee->getSalary();
	$employee->setSalary($salary + 800);		//增加工资
	$employee->setId(2006091);				//设置新的员工号
	echo $employee->getEmployeeInfo();		//输出员工的基本信息
?>
