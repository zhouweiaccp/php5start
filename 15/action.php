<?php
  /**************************************/
  /*		文件名：action.php			*/
  /*		功能：用户操作控制页面		*/
  /**************************************/

  include "config.inc.php";		//包含配置信息
  include "header.inc.php";		//包含公用头部页面

  //用户名
  $username = $_SESSION['username'];

  //检索用户信息
  $query = "SELECT * FROM chatter_users
		  WHERE username = '$username' AND isadmin = 1";
  $result = mysql_query ($query);

  //判断是否管理员
  $num_rows = mysql_num_rows($result);
  $isadmin = ($num_rows > 0) ? true : false;
?>

<table height="100%">
<tr>
  <td valign="bottom"><b>用户动作</b><br>
	<li><a href="clearmsg.php?action=private"
		onClick="return confirm('确实要清空私聊记录？')">清空私聊记录</a>
	<br>

	<?php 
		//如果使用表情符号
		if($use_smilies == true){ 
	?>
	<li><a href="emotion.php" target="currentusers">查看表情</a><br>
	<?php 
		}
	?>
    
	<li><a href="changepwd.php" target="currentusers">更改密码</a><br>

	<?php
		//如果是管理员
      	if($isadmin == true){
    ?>
    <b>管理员动作</b><br>
<li><a href="clearmsg.php?action=all"
		onClick="return confirm('确实要全部聊天记录？')">清空全部聊天记录</a>
<br>
    <li><a href="manageuser.php" target="chatboard">管理用户</a><br>
  	<?php
		}
	?>
  </td>
</tr>
</table>

</body>
</html>
