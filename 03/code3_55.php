<?php
	$var = "Hello, World!"; 		//����һ��ȫ�ֱ���
	function TestVar(){
		global $var;			//����һ��ȫ�ֱ���
		echo $var;			//���
	}
	TestVar();					//���Ϊ��Hello, World!��
?>
