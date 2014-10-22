<?php
	/*******************/
	/*  系统参数设置   */
	/*******************/

	//连接数据库的定义
	define('DB_USER',		 "root");		//用户名
	define('DB_PASSWORD',	 "pass");		//密码
	define('DB_HOST',		 "localhost");	//数据库主机地址
	define('DB_NAME',		 "php_chat");	//数据库

	//聊天室发言内容显示的行数
	$chatrows = "25";

	//判断用户超时允许的最大值（秒）
	$sessiontime = "100";

	//页面刷新的时间间隔（秒）
	$refreshrate = "5";

	//是否使用表情控制
	$use_smilies = true;

	//设定作为管理员的用户名
	$admin = "admin";

	//表情数组
	$smilies = array(
		   ":)" => '<img src="smilies/smile.gif">',
		   ":(" => '<img src="smilies/sad.gif">',
		   ";)" => '<img src="smilies/wink.gif">',
		   ":D" => '<img src="smilies/lol.gif">',
		   ":*(" => '<img src="smilies/crying.gif">',
		   ":?" => '<img src="smilies/confused.gif">',
		   ":X" => '<img src="smilies/sealed.gif">',
		   "8)" => '<img src="smilies/cool.gif">',
		   ":P" => '<img src="smilies/tongue.gif">',
		   ":@" => '<img src="smilies/mad.gif">',
		   ":$" => '<img src="smilies/shy.gif">',
		   ":L" => '<img src="smilies/love.gif">',
		   ":|" => '<img src="smilies/blank.gif">',
		   ":Z" => '<img src="smilies/sleep.gif">',
		   "(devil)" => '<img src="smilies/devil.gif">',
		   "(clown)" => '<img src="smilies/clown.gif">',
		   "(pig)" => '<img src="smilies/pig.gif">',
		   "(cow)" => '<img src="smilies/cow.gif">',
		   "(monkey)" => '<img src="smilies/monkey.gif">',
		   "(chicken)" => '<img src="smilies/chicken.gif">',
		   "(rose)" => '<img src="smilies/rose.gif">',
		   "(skull)" => '<img src="smilies/skull.gif">',
		   "(alien)" => '<img src="smilies/alien.gif">',
		   "(boy)" => '<img src="smilies/boy.gif">',
		   "(girl)" => '<img src="smilies/girl.gif">',
	);

	/*******************/
	/*  公共函数设置   */
	/*******************/

	//功能：将字符串中的特殊字符转换为表情图片
	//输入：字符串
	//输出：字符串
	function Smilies($text) {
		global $smilies;
		$text = strtr ($text, $smilies );
		return $text;
	}

	//功能：显示错误信息和返回的链接地址，并终止程序执行
	//输入：错误信息, 链接地址
	//输出：
	function ExitMessage($message, $url='')
	{
		echo '<p class="message">';
		echo $message;
		echo '<br />';
		if($url){
	    	echo '<a href="'.$url.'">返回</a>';
	    }else{
	    	echo '<a href="#" onClick="window.history.go(-1);">返回</a>';
	    }
		echo '</p>';
		exit;
	}


	/*******************/
	/*   初始化程序    */
	/*******************/

	//开启SESSION
	session_start();

	//打开数据库连接
	$db = mysql_pconnect(DB_HOST, DB_USER, DB_PASSWORD);
	if (!$db) {
	   die('<b>数据库连接失败！</b>');
	   exit;
	}
	mysql_select_db (DB_NAME);

?>
