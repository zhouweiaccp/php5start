<?php
/**
 * 服务器端处理程序，必须使用utf-8编码
 */

//取得客户端数据
$username = $_POST["username"];

//判断用户名的惟一性
if("Thomas" == $username)
{
	printf("用户名“%s”已经被注册，请更换一个用户名。", $username);
}else{
	printf("用户名“%s”尚未被使用，您可以继续。", $username);
}
?>

