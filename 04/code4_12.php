<?php
	$test = strcmp("Thomas", "Tom");		//返回-1
	
	//也可以对中文等多字节字符进行比较
	if(strcmp("大连","大庆")>0)
	{
		echo "大连";
	}else{
		echo "大庆";
	}

	//结果将输出“大庆”
?>
