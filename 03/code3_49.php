<?php
	/*如果file_get_contents不存在，则使用自定义的版本
	  file_get_contents函数在PHP4.2.0中被首次引入。*/
	if(!function_exists("file_get_contents"))
	{ 
		function file_get_contents($filename){
			$handle = fopen ($filename, "r");
			$contents = fread ($handle, filesize ($filename));
			fclose ($handle);
			return $contents;
		}
	}
	
	$string = file_get_contents("data.txt");		//函数的调用
?>
