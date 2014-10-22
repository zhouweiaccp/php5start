<?php
  /**************************************/
  /*		文件名：private.php			*/
  /*		功能：“私聊”窗口页面		*/
  /***************************************/

  include "config.inc.php";		//包含配置信息
  include "header.inc.php";		//包含公用头部页面

  //私聊对象的用户名
  $to = $_GET['to'];

  //检索私聊对象的信息
  $query = "SELECT * from chatter_users WHERE username='$to'";
  $result = @mysql_query ($query);
  $num_rows = mysql_num_rows($result);

  if($num_rows > 0)
  {
	//如果聊天对象的资料存在
	$rows = mysql_fetch_assoc($result);
	$id_current = $rows['id'];
	$time_current = $rows['time'];
	$username_current = $rows['username'];
	$ip_current = $rows['ip'];
  }
  else
  {
	//聊天对象的用户资料不存在
	ExitMessage("用户{$to}不存在，请关闭聊天窗口。", "");
  }
?>

<table width="100%" height="100%" class="main_table" cellpadding="4">
  <tr>
    <td class="cells" colspan=3>
    <b><?php echo $_SESSION['username']; ?></b> 与
    <b><?php echo $_GET['to']; ?></b> 私聊

    <!--嵌入聊天内容显示页面-->
    <iframe src="chatboard.php?action=private&to=<?=htmlentities(urlencode($to))?>"
		width="100%" height="90%" border="0" frameborder="0"
		name="msg" style="border:0px solid black" scrolling="no">
    </iframe>
    </td>
  </tr>
  <tr>
<td height="40" class="cells">

     <!--嵌入发言页面-->
     <iframe src="sendmsg.php?action=private&to=<?=htmlentities(urlencode($to))?>"
		width="100%" height="100%" border="0" frameborder="0"
		name="msg" style="border:0px solid black" scrolling="no">
	</iframe>
    </td>
  </tr>
</table>

</body>
</html>
