<?php
	/* ��������ʹ�õ����� */
	$websites = array ("g"=>"google", "b"=>"baidu", "y"=>"yahoo");
	
	//����Ե������鴦��Ļص�����
	function value_alter($value){
		return ucfirst($value) . ".com";
	}

	$urls = array_map("value_alter", $websites);
	print_r($urls);
	
	/* �������ʹ�õ����� */
	$a = array(1, 2, 3);
	$b = array(7, 8, 9);
	
	//����Զ�����鴦��Ļص�����
	function value_multi($a, $b){
		return $a * $b;
	}
	
	$results = array_map("value_multi", $a, $b);
	print_r($results);
?>
