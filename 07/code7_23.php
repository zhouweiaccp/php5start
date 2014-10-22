<?php
	$logs = file("server.log");			//读取一个日志文件
	$contents = array_reverse($logs);
	foreach($contents as $line){
		echo $line;
	}
?>
