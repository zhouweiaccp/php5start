<?php
	$a = $b = $c = array (4 => "four", 3 => "three", 20 => "twenty", 10 => "ten");
	
	ksort($a);					//��������
	krsort($b);					//��������

	function cmp_key($k1, $k2)
	{
		return strcmp($k1, $k2);
	}
	uksort($c, "cmp_key");		//�Զ�������
	var_dump($a, $b, $c);		//�������
?>
