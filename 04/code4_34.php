<?php
	/* ������������롰http://localhost/test.php?action=test&foo[]=hello&foo[]=world��
	   ��ʱ$_SERVER["QUERY_STRING"] = "action=test&foo[]=hello&foo[]=world"
	*/
	
	//��һ�ַ�ʽ���������ں����ڲ�
	function test()
	{
		parse_str($_SERVER["QUERY_STRING"]);
		echo $action. "<br>";				//�����test��
		if(define($foo)){
		echo $foo[1] . "<br>";			//�����hello��
		echo $foo[2] . "<br>";			//�����world��
		}
	}
	test();
	
	//ʹ�õڶ��з�ʽ��������������������������
	parse_str($_SERVER["QUERY_STRING"], $arr);
	echo $arr['action'];				//�����test��
	echo $arr['foo'][0];				//�����hello��
	echo $arr['foo'][1];				//�����world��
?>
