<?php
  /**************************************/
  /*		文件名：register.php		*/
  /*		功能：用户注册程序			*/
  /**************************************/

  include "config.inc.php";		//包含配置信息
  include "header.inc.php";	//包含公用头部页面

  //判断是否提交了数据
  if (isset($_POST['submit'])) {

	//如果没有输入任何信息，则输出错误
	if(!$_POST['username'] && !$_POST['password1'] && !$_POST['password2']){
		ExitMessage("所有注册信息都必须填写！", "");
	}

	//输入的注册信息
	$username = $_POST['username'];		//注册用户名
	$password1 = $_POST['password1'];	//密码
	$password2 = $_POST['password2'];	//确认密码
	$ip = getIPAddress();				//获得IP地址

	//判断用户是否已经存在
	$query = "SELECT * from chatter_users WHERE username = '$username'";
	$result = @mysql_query ($query);

	$num_rows = mysql_num_rows($result);

	if($num_rows == 0)
	{
		//用户不存在
		if($password1 == $password2){
		   $password = $password1;

		   //将用户信息插入输入库
		   $query = "INSERT INTO chatter_users (username, ip, password)
				 VALUES ('$username','$ip', '$password');";
		   $result_adduser = @mysql_query ($query);

		   //判断数据插入成功与否
		   $affected_rows = mysql_affected_rows();
		   if($affected_rows >0)
		   {
		   	  //数据插入成功
			  ExitMessage("用户注册成功，请登陆！", "login.php");
		   }else{
			  //数据插入失败
		   	  ExitMessage("用户注册失败，请重试！", "register.php");
            }
		}else{
		  //两次输入的用户密码不相符
		  ExitMessage("用户密码不符！", "");
		}
	}
	else
	{
		//用户已经存
		ExitMessage("用户已经存在，请选择其他的名字！", "");
	}
  }
?>

<!-- 定义表单，数据将提交到register.php页面 -->
<form action="register.php" method="post" name="login">
<table align="center" width="400">
  <tr>
    <td colspan=2>
      <b>淘到我心@聊天室 - 用户注册</b>
      <br><br>
      请填写以下注册信息
      <br><br>
   </td>
  </tr>
  <tr>
    <td>用户名：</td>
    <td><input type="text" size="20" name="username" value=""></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input type="password" size="20" name="password1" value=""></td>
  </tr>
  <tr>
    <td>确认密码：</td>
    <td><input type="password" size="20" name="password2" value=""></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="注册" class="buttons"></td>
  </tr>
</table>
</form>

</body>
</html>
