<?php
	/********************/
	/*   系统参数设置   */
	/********************/

	//连接数据库的定义
	define('DB_USER',		 "root");			//用户名
	define('DB_PASSWORD',	 "pass");			//密码
	define('DB_HOST',		 "localhost");		//数据库主机地址
	define('DB_NAME',		 "php_gbook");		//数据库

	//管理员用户账号
	define('ADMIN_USER',	"admin");
	define('ADMIN_PASS',	"admin");

	//分页设置，每页最多显示的记录数
	define('EACH_PAGE',	 5);

	/******************/
	/*   初始化程序   */
	/******************/
	//开启SESSION，允许COOKIE
	ob_start();
	if(function_exists(session_cache_limiter))
	{
		session_cache_limiter("private, must-revalidate");
	}
	session_start();

	//打开数据库连接
	$db = mysql_pconnect(DB_HOST, DB_USER, DB_PASSWORD);
	if (!$db)
	{
	   die('<b>数据库连接失败！</b>');
	   exit;
	}
	//选择数据库
	mysql_select_db (DB_NAME);
?>