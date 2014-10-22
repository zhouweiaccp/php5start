<?php
	$username = $_SERVER['REMOTE_USER'];
	$filename = $_GET['file'];

	//对文件名进行过滤，以保证系统安全
	if (!ereg('^[^./][^/]*$', $userfile))
	{
		die('这不是一个非法的文件名！');
	}

	//对用户名进行过滤
	if (!ereg('^[^./][^/]*$', $username))
	{
		die('这不是一个无效的用户名');
	}
	
	//通过安全过滤，拼合文件路径
	$thefile = "/home/$username/$filename";
?>
