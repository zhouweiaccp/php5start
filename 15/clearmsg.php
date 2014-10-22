<?php
  /**************************************/
  /*		文件名：clearmsg.php		*/
  /*		功能：清空聊天记录页面		*/
  /**************************************/

  include "config.inc.php";		//包含配置信息
  include "header.inc.php";	//包含公用头部页面

  //用户名
  $username = $_SESSION['username'];
  //行为
  $action = $_GET['action'];

  if($action == "private")
  {
	//删除用户的私有聊天记录

	//将发送者为$username的记录设置删除标记
	$query = "UPDATE chatter_privboard SET delfrom = 1
		  WHERE fromname = '$username'";
	$result = @mysql_query ($query);

	//将接受者为$username的记录设置删除标记
	$query = "UPDATE chatter_privboard SET delto = 1
		  WHERE toname = '$username'";
	$result = @mysql_query ($query);

	ExitMessage("全部私聊信息清除成功！", "action.php");
  }
  elseif($action == "all")
  {
	//查询管理员
	$query = "SELECT * FROM chatter_users
		 	WHERE username = '$username' AND isadmin = 1";
	$result = mysql_query ($query);

	//判断是否为管理员
	$num_rows = mysql_num_rows($result);
	$isadmin = ($num_rows > 0) ? true : false;

	if($isadmin)
	{
		//清空公共聊天记录
		$query = "TRUNCATE TABLE chatter_chatboard";
		$result = @mysql_query ($query);

		//清空私有聊天记录
		$query = "TRUNCATE TABLE chatter_privboard";
		$result = @mysql_query ($query);

		ExitMessage("全部信息清除成功！", "action.php");
	}
	else
	{
		ExitMessage("只有管理员可以清除全部聊天记录！", "");
	}
  }

?>
</body>
</html>
