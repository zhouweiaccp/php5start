<?php
	//所有者具有读、写权限；其他人无任何权限
	chmod ("/somedir/somefile", 0600);

	//所有者具有读、写权限；其他人具有读权限
	chmod ("/somedir/somefile", 0644);

	//所有者具有全部权限；其他人具有读、执行权限
	chmod ("/somedir/somefile", 0755);

	//所有者具有全部权限；所有者所在的组具有读、执行权限；访问者不具权限
	chmod ("/somedir/somefile", 0750);
?>
