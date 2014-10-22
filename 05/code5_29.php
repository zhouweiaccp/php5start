<?php
	//定义一个文件的数组
	$files = array (
	  array("name"=>"pic.gif", "size"=>"1.2M"),		//1,258,291字节
	  array("name"=>"pic1.gif", "size"=>"500K"),		//512,000字节
	  array("name"=>"pic2.gif", "size"=>"0.97M"),		//1,017,118字节
	  array("name"=>"pic10.gif", "size"=>123400),		//123,400字节
	  array("name"=>"pic12.gif", "size"=>"123456b")	//123,456字节
	);

	//自定文件尺存比较函数
	function cmpare_filesize($a, $b){
		$sizeA = cal_filesize($a["size"]);
		$sizeB = cal_filesize($b["size"]);
		return $sizeA - $sizeB;
	}
	
	//将一个文字格式的尺寸量转换为字节值
	//如“2k”是2048字节
	function cal_filesize($size){
		$signal = strtoupper(substr($size, -1));
		switch($signal){
			case 'M':
				$size = (float)$size * 1024 *1024; break;
			case 'K':
				$size = (float)$size * 1024; break;
			case 'B':
			default:
				$size = (float)$size;
		}
		return intval($size);			//为了便于比较，返回整形
	}

	//自定义方法排序，按照文件尺寸由小到大
	usort ($files, "cmpare_filesize");
	
	//输出比较的结果
	echo "Name &nbsp;  Size<br>-------------------<br>";
	foreach($files as $file){
		echo $file["name"] ." ". $file["size"] . "<br>\n";
	}
?>
