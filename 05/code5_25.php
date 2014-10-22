<?php
	//定义相乘的回调函数
	function rsum($v, $w) {
    		$v += $w;
	    return $v;
	}
	
	//定义字符串连接的回调函数
	function rcat($v, $w){
		$v .= $w;
		return $v;
	}

	$a = array(5, 4, 3, 2, 1);
	$x = array();
	$as = array_reduce($a, "rsum")				//返回15
	$ac = array_reduce($a, "rcat", "*");			//返回“054321”
	$xs = array_reduce($x, "rsum", 10);			//返回10
?>  
