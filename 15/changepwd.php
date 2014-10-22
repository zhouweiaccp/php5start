<?php
  /**************************************/
  /*		文件名：changepwd.php		*/
  /*		功能：用户密码变更页面		*/
  /**************************************/

  include "config.inc.php";		//包含配置信息
  include "header.inc.php";	//包含公用头部页面

  //提交数据
  if($_POST['submit'])
  {
    $password = $_POST['password'];		//密码
    $password2 = $_POST['password2'];		//确认秘密
    $username = $_SESSION['username'];	//用户名

    if($password != "")
    {
	  if($password == $password2)
  	  {
		//更新用户密码
         $query = "UPDATE chatter_users SET password='$password'
				WHERE username = '$username'";
         $result = @mysql_query ($query);

		//被更新的记录数
		$affected_rows = mysql_affected_rows();
		if($affected_rows >= 0)
		{
         		ExitMessage("用户密码修改成功！", "userlist.php");
		}else{
         		ExitMessage("用户密码修改失败！", "changepwd.php");
		}
      }else{
		//没有修改密码
		ExitMessage("用户密码没有被修改！", "changepwd.php");
      }
    }
  }

?>

<form action="changepwd.php" method="POST" name="login">
<table align="center">
    <tr>
      <td>登陆密码：</td>
      <td><input type="password" size="10" name="password"></td>
    </tr>
    <tr>
      <td>确认密码：</td>
      <td><input type="password" size="10" name="password2"></td>
    </tr>
    <tr>
      <td clospan="2">
	  	<input type="submit" name="submit" value="修改" class="buttons">
		&nbsp;
	  	<a href="userlist.php">返回</a>
      </td>
    </tr>
</table>
</form>

</body>
</html>
