<?php
  /**********************************/
  /*		文件名：sendmsg.php		*/
  /*		功能：用户发言页面		*/
  /**********************************/

  include "config.inc.php";		//包含配置信息
  include "header.inc.php";		//包含公用头部页面

  //行为
  $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'public';
  //私人聊天对象
  $to = isset($_REQUEST['to']) ? $_REQUEST['to'] : '';
  //发言者，当前用户名
  $username = isset($_POST['username']) ? $_POST['username'] : $_SESSION['username'];
  //发言信息
  $message = isset($_POST['message']) ? $_POST['message'] : '';

  if(!empty($message))
  {
	//检查用户是否存在
	$query = "SELECT * from chatter_users WHERE username='$username'";
	$result = @mysql_query ($query);
	$num_rows = mysql_num_rows($result);

	//如果用户存在
	if($num_rows>0)
	{
	  //更新用户在线时间，以防超时
	  $query = "UPDATE chatter_users SET time=NOW() WHERE username='$username'";
	  $result = @mysql_query ($query);

	  //增加留言记录
	  if($action=='private')
	  {
		//增加私聊天记录
		$query = "INSERT INTO chatter_privboard(time, fromname, toname, message)
				VALUES (NOW(),'$username', '$to', '$message');";
		$result = @mysql_query ($query);
	  }
 	  else
	  {
		//增加公共聊天记录
		$query = "INSERT INTO chatter_chatboard(time, username, message)
				VALUES (NOW(),'$username', '$message');";
		$result = @mysql_query ($query);
	  }

	}else{
		echo "<script>parent.document.location.href='login.php'</script>";
		die("非法操作！");
	}
 }
?>

<?php
	if($action=="private"){	//“私聊”时的界面
?>
<form action="sendmsg.php?to=<?php=htmlentities(urlencode($to));?>&action=private"
	 method="POST" name="submitchat">
 <input type="hidden" size="25" name="username"
	 value="<?php echo htmlspecialchars($username); ?>">
 <input type="hidden" size="25" name="to"
	 value="<?php echo htmlspecialchars($to); ?>">
 <input type="hidden" size="25" name="action"
	 value="private">
 <table align="center">
  <tr>
    <td>消息：</td>
   <td><input type="text" size="50" name="message" value=""></td>
   <td><input type="submit" name="submit" value="发送" class="buttons"></td>
   </tr>
 </table>
</form>
<?php
	}else{	//“公开”时的界面
?>
<form action="sendmsg.php?action=public" method="POST" name="submitchat">
 <input type="hidden" size="25" name="action" value="public">
 <table align="center">
  <tr>
   <td>用户名：</td>
   <td>
    <?php
		//判断用户是否登录
		if (!isset($_SESSION['username']))
		{
	?>
		<input type="text" size="25" name="username" value="<?php echo $username; ?>">
	<?php
		}else{
	?>
	<b><?php echo $username; ?></b>
		<input type="hidden" size="25" name="username" value="<?php echo $username; ?>">
	<?php
		}
	?>

   </td>
   <td>消息：</td>
   <td><input type="text" size="50" name="message" value=""></td>
   <td><input type="submit" name="submit" value="发送" class="buttons"></td>
   <td><a href="login.php?action=logout" target="_parent">改变用户/登出</a></td>
  </tr>
 </table>
</form>
<?php } ?>

</body>
</html>
