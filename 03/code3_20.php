<?php
	$fp = fopen("foo","w");
	echo get_resource_type($fp);			//输出file，一个文件的资源
?>
