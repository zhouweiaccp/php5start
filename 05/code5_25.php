<?php
	//������˵Ļص�����
	function rsum($v, $w) {
    		$v += $w;
	    return $v;
	}
	
	//�����ַ������ӵĻص�����
	function rcat($v, $w){
		$v .= $w;
		return $v;
	}

	$a = array(5, 4, 3, 2, 1);
	$x = array();
	$as = array_reduce($a, "rsum")				//����15
	$ac = array_reduce($a, "rcat", "*");			//���ء�054321��
	$xs = array_reduce($x, "rsum", 10);			//����10
?>  
