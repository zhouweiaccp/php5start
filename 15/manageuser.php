<?php
  /**************************************/
  /*		�ļ�����manageuser.php		*/
  /*		���ܣ��û�����ҳ��			*/
  /**************************************/

  include "config.inc.php";		//����������Ϣ
  include "header.inc.php";		//��������ͷ��ҳ��

  //�û���
  $username = $_SESSION['username'];

  //�����û���Ϣ
  $query = "SELECT * FROM chatter_users
		  WHERE username = '$username' AND isadmin = 1";
  $result = mysql_query ($query);
  $num_rows = mysql_num_rows($result);

  //�Ƿ��ǹ���Ա�û�
  $isadmin = ($num_rows > 0) ? true : false;

  //�ǹ���Ա
  if(!$isadmin)
  {
	ExitMessage("ֻ�й���Ա����ɾ���û���", "chatboard.php");
  }

  //����ύ������
  if(count($_POST["check"]))
  {
 	//����ɾ���û�
 	foreach($_POST["check"] as $id)
	{
		$query = "DELETE FROM chatter_users WHERE id='$id'";
		$result = @mysql_query ($query);
	}
	ExitMessage("�û�ɾ���ɹ���", "manageuser.php");
   }
?>

<script language="JavaScript">
//ɾ��ȷ�ϰ�ť
function delChecked()
{
	if(confirmSubmit('ȷ��ɾ����ѡ�û�?'))
	{
		document.editform.submit();
	}else{
		return false;
	}
}
</script>

<b>�û�����</b> - <a href="chatboard.php">����</a>
<form action="manageuser.php" method="post" name="editform">
<table width="100%" class="current_listing" cellspacing=2>
<tr>
  <td class="row_title" width="5">Sel</td>
  <td class="row_title">Id</td>
  <td class="row_title">�û���</td>
  <td class="row_title">�����Ϣ</td>
  <td class="row_title">IP</td>
  <td class="row_title" colspan=3>����</td>
</tr>
<tr>
  <td bgcolor="FFFFFF" align="left" colspan="6" height="3">
	<a href="#" onClick="return delChecked()">
		ɾ��ѡ���û�
	</a>
  </td>
</tr>

<?php
  $query = "SELECT * from chatter_users ORDER BY username";
  $result = @mysql_query ($query);

  //���ز�ѯ���
  while ($row = mysql_fetch_assoc($result))
  {
    $id_old = $row['id'];
    $time_old = $row['time'];
    $username_old = $row['username'];
    $ip_old = $row['ip'];
    $pwd_old = $row['password'];
    $isadmin_old = $row['isadmin'];

    //�����еļ����ɫ
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
			ɾ��ѡ���û�
		</a>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
