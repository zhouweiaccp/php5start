<?php
	$logs = file("server.log");			//��ȡһ����־�ļ�
	$contents = array_reverse($logs);
	foreach($contents as $line){
		echo $line;
	}
?>
