<?php
  /**************************************/
  /*		文件名：main.php			*/
  /*		功能：聊天室主页面			*/
  /**************************************/

  include "config.inc.php";		//包含配置信息
  include "header.inc.php";	//包含公用头部页面

  //检查username/password如果失败，则返回错误信息并退出
  $username = $_POST['username'];
  $password = $_POST['password'];

  //检查用户名是否已经存在
  $query = "SELECT * from chatter_users WHERE username = '$username'";
  $result = @mysql_query ($query);
  $num_rows = mysql_num_rows($result);

  if($num_rows == "0")
  {
	//如果用户不存在，输出错误信息
	ExitMessage("用户名不存在，请注册后再试！", "login.php");
  }
  else
  {
	//如果用户存在检查
	if ($rows = mysql_fetch_assoc($result))
	{
	  $old_password = $rows['password'];
	}

	if($old_password != $password)
	{
	  //密码错误
	  ExitMessage("用户名或者密码错误，请重试！", "login.php");
	}
	else
	{
	  //获得IP地址
	  $ip = getIPAddress();

	  //更新用户登录时间、IP地址
	  $query = "UPDATE chatter_users
			  SET time=Now(), ip=$ip
			  WHERE username='$username'";
	  $result = @mysql_query ($query);

	  //创建username的SESSION
    	  $_SESSION['username'] = $username;
     }
  }

?>

<table width="100%" height="100%" class="main_table" cellpadding="4" cellspacing="3">
  <tr>
    <td height="20" class="cells" colspan="2">
      <font size="4"><b>淘到我心@聊天室 - <?php echo "$version"; ?></b>
    </td>
  </tr>
  <tr>
    <td class="cells">
		<!-- 嵌入聊天室发言显示页面 -->
		<iframe src="chatboard.php?action=public"
			width="100%" height="100%" border="0" name="chatboard"
			frameborder="0" style="border:0px solid black">
		</iframe>

    </td>
    <td class="cells" width=200>
		<!-- 嵌入在线用户显示页面 -->
		<iframe src="userlist.php"
			width="100%" height="70%" border="0" name="currentusers"
			frameborder="0" style="border:0px solid black">
		</iframe>

		<!-- 嵌入用户功能页面 -->
		<iframe src="action.php"
			width="100%" height="30%" border="0" name="actions"
			frameborder="0" style="border:0px solid black" scrolling="no">
		</iframe>

    </td>
  </tr>
  <tr>
    <td height="40" class="cells" colspan="2" valign="middle">

		<!-- 嵌入发言功能页面 -->
		<iframe src="sendmsg.php" scrolling="no"
			width="100%" height="100%" border="0" name="msg" frameborder="0"
			marginheight="0" marginwidth="0" style="border:0px solid black">
		</iframe>

    </td>
  </tr>
</table>

</body>
</html>
