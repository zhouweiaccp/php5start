<?php
	$file = "/home/tom/public_html/files";
	$uid = fileowner($file);			//������ID
	echo posix_getpwuid($uid);		//��������

	$gid = filegroup($file); 			//������ID
	echo posix_getgrgid($uid);		//����
?>
