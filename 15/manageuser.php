<?php
  /**************************************/
  /*		文件名：manageuser.php		*/
  /*		功能：用户管理页面			*/
  /**************************************/

  include "config.inc.php";		//包含配置信息
  include "header.inc.php";		//包含公用头部页面

  //用户名
  $username = $_SESSION['username'];

  //检索用户信息
  $query = "SELECT * FROM chatter_users
		  WHERE username = '$username' AND isadmin = 1";
  $result = mysql_query ($query);
  $num_rows = mysql_num_rows($result);

  //是否是管理员用户
  $isadmin = ($num_rows > 0) ? true : false;

  //非管理员
  if(!$isadmin)
  {
	ExitMessage("只有管理员可以删除用户！", "chatboard.php");
  }

  //如果提交了数据
  if(count($_POST["check"]))
  {
 	//逐条删除用户
 	foreach($_POST["check"] as $id)
	{
		$query = "DELETE FROM chatter_users WHERE id='$id'";
		$result = @mysql_query ($query);
	}
	ExitMessage("用户删除成功！", "manageuser.php");
   }
?>

<script language="JavaScript">
//删除确认按钮
function delChecked()
{
	if(confirmSubmit('确认删除所选用户?'))
	{
		document.editform.submit();
	}else{
		return false;
	}
}
</script>

<b>用户管理</b> - <a href="chatboard.php">返回</a>
<form action="manageuser.php" method="post" name="editform">
<table width="100%" class="current_listing" cellspacing=2>
<tr>
  <td class="row_title" width="5">Sel</td>
  <td class="row_title">Id</td>
  <td class="row_title">用户名</td>
  <td class="row_title">最后消息</td>
  <td class="row_title">IP</td>
  <td class="row_title" colspan=3>密码</td>
</tr>
<tr>
  <td bgcolor="FFFFFF" align="left" colspan="6" height="3">
	<a href="#" onClick="return delChecked()">
		删除选中用户
	</a>
  </td>
</tr>

<?php
  $query = "SELECT * from chatter_users ORDER BY username";
  $result = @mysql_query ($query);

  //返回查询结果
  while ($row = mysql_fetch_assoc($result))
  {
    $id_old = $row['id'];
    $time_old = $row['time'];
    $username_old = $row['username'];
    $ip_old = $row['ip'];
    $pwd_old = $row['password'];
    $isadmin_old = $row['isadmin'];

    //设置行的间隔颜色
    if($bgrow == 1){
	  $bgcolor = "row_1";
	  $bgrow = 0;
    }else{
	  $bgcolor = "row_2";
	  $bgrow = 1;
    }

?>
    <tr class="<?php echo $bgcolor; ?>">
          <td valign="top">
            <?php if(!$isadmin_old){ ?>
            	<input type="checkbox" name="check[]" value="<?=$id_old?>" />
            <?php }else{
            	$username_old = "<b>".$username_old."</b>";
            ?>
            	<b>Admin</b>
            <?php } ?>
      </td>
      <td valign="top"><?php echo $id_old; ?></td>
      <td valign="top"><?php echo $username_old; ?></td>
      <td valign="top"><?php echo $time_old; ?></td>
      <td valign="top"><?php echo $ip_old; ?></td>
      <td valign="top"><?php echo $pwd_old; ?></td>
    </tr>
    <?php } ?>
    <tr>
      <td bgcolor="FFFFFF" align="left" colspan="6" height="3">
		<a href="#" onClick="return delChecked()">
			删除选中用户
		</a>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
