<?php
	/*���file_get_contents�����ڣ���ʹ���Զ���İ汾
	  file_get_contents������PHP4.2.0�б��״����롣*/
	if(!function_exists("file_get_contents"))
	{ 
		function file_get_contents($filename){
			$handle = fopen ($filename, "r");
			$contents = fread ($handle, filesize ($filename));
			fclose ($handle);
			return $contents;
		}
	}
	
	$string = file_get_contents("data.txt");		//�����ĵ���
?>
