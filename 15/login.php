<?php
  /******************************************/
  /*		文件名：login.php				*/
  /*		功能：用户登录界面，以及		*/
  /*		      退出登录控制				*/
  /******************************************/

  include "config.inc.php";		//包含配置信息
  include "header.inc.php";	//包含公用头部页面

  //退出登录
  if(isset($_GET['action']) && $_GET['action']=='logout')
  {
	$username = $_SESSION['username'];

	//设置登录时间为“0000-00-00”
	$query = "UPDATE chatter_users SET time='0000-00-00'
			WHERE username='$username'";
	$result = @mysql_query ($query);

	//判断数据插入成功与否
	$affected_rows = mysql_affected_rows();
	if($affected_rows >0)
	{
		//用户状态更新成功，清除username的SESSION值
		unset($_SESSION['username']);
		ExitMessage("用户登出成功！", "login.php");
	}else{
		//用户状态更新失败
		ExitMessage("用户登出失败！", "");
     }
  }
?>

<!-- 定义表单，数据将提交到main.php页面 -->
<form action="main.php" method="post" name="login">
<table align="center" width="400">
  <tr>
    <td colspan=2>
      <b>欢迎访问淘到我心@聊天室</b>
	 <br><br>
      请输入您的用户名和密码，或者注册一个新账号。
	 <br><br>
    </td>
  </tr>
  <tr>
    <td>用户名：</td>
    <td><input type="text" size="20" name="username"></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input type="password" size="20" name="password"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="登陆" class="buttons"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><a href="register.php">注册用户</a></td>
  </tr>
  <tr>
    <td colspan="2">
	<a href="http://www.taodoor.com" target="_blank"><b>淘到我心@聊天室</b></a>
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
