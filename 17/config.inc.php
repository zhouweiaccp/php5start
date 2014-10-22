<?php
	/**********************/
	/*    系统参数设置    */
	/**********************/

	//连接数据库的定义
	define('DB_USER',		 "root");		//用户名
	define('DB_PASSWORD',	 "pass");		//密码
	define('DB_HOST',		 "localhost");	//数据库主机地址
	define('DB_NAME',		 "php_shop");	//数据库

	//管理员用户账号
	define('ADMIN_USER',	"admin");
	define('ADMIN_PW',		"passwd");

	//分页设置，每页最多显示的记录数
	define('EACH_PAGE',	 5);

	//文件上传目录
	define('UPLOAD_PATH',dirname(__FILE__)."/uploads/");

	/**********************/
	/*    公共函数设置    */
	/**********************/

	//功能：显示错误信息和返回的链接地址，并终止程序执行
	//输入：错误信息, 链接地址
	//输出：错误信息
	function ExitMessage($message, $url='')
	{
		echo '<p class="message">'. $message. '<br>';
		if($url){
		    	echo '<a href="'.$url.'">返回</a>';
		}else{
			echo '<a href="#" onClick="window.history.go(-1);">返回</a>';
		}
		echo '</p>';
		exit;
	}

	//功能：用于管理界面，显示错误信息
	//输入：错误信息数组
	//输出：错误信息
	function ShowErrorBox($error)
	{
		if(!is_array($error)){
			$error = array($error);
		}
		$error_msg = '<ul>';
		foreach($error as $err){
			$error_msg .= "<li>$err</li>";
		}
		$error_msg .= '</ul>';
		echo '<div class="error">' .$error_msg. '</div>';
	}

	//功能：显示类别的下拉菜单<OPTION>
	//输入：错误信息, 链接地址
	//输出：字符串
	function OptionCategories($selected_id=0)
	{
		global $db;
		$sql = "SELECT * FROM categories ORDER BY category_name";
		$result=mysql_query($sql);
		while ($row=mysql_fetch_array($result))
		{
		  $category_id=$row["category_id"];
		  $category_name=htmlspecialchars($row["category_name"]);

		  if($selected_id == $category_id)
		  {
			echo '<option value="'.$category_id.'" selected>'.$category_name.'</option>';
		  }else{
			echo '<option value="'.$category_id.'">'.$category_name.'</option>';
		  }
		}
	}

	//格式化HTML字符串
	//输入：HTML字符串
	//输出：字符串
	function Html2Text($html)
	{
		return htmlspecialchars(stripslashes($html));
	}

	//格式化价格字符串
	//输入：价格
	//输出：带有逗号的价格字符串
	function MoneyFormat($price)
	{
		return number_format($price, 2, '.', ',');
	}

	/********************/
	/*    初始化程序    */
	/********************/

	//开启SESSION
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
