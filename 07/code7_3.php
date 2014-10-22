<?php
	$file = "/home/tom/public_html/files";
	$uid = fileowner($file);			//所有者ID
	echo posix_getpwuid($uid);		//所有者名

	$gid = filegroup($file); 			//所属组ID
	echo posix_getgrgid($uid);		//组名
?>
