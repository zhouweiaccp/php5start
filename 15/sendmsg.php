<?php
  /**********************************/
  /*		�ļ�����sendmsg.php		*/
  /*		���ܣ��û�����ҳ��		*/
  /**********************************/

  include "config.inc.php";		//����������Ϣ
  include "header.inc.php";		//��������ͷ��ҳ��

  //��Ϊ
  $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'public';
  //˽���������
  $to = isset($_REQUEST['to']) ? $_REQUEST['to'] : '';
  //�����ߣ���ǰ�û���
  $username = isset($_POST['username']) ? $_POST['username'] : $_SESSION['username'];
  //������Ϣ
  $message = isset($_POST['message']) ? $_POST['message'] : '';

  if(!empty($message))
  {
	//����û��Ƿ����
	$query = "SELECT * from chatter_users WHERE username='$username'";
	$result = @mysql_query ($query);
	$num_rows = mysql_num_rows($result);

	//����û�����
	if($num_rows>0)
	{
	  //�����û�����ʱ�䣬�Է���ʱ
	  $query = "UPDATE chatter_users SET time=NOW() WHERE username='$username'";
	  $result = @mysql_query ($query);

	  //�������Լ�¼
	  if($action=='private')
	  {
		//����˽�����¼
		$query = "INSERT INTO chatter_privboard(time, fromname, toname, message)
				VALUES (NOW(),'$username', '$to', '$message');";
		$result = @mysql_query ($query);
	  }
 	  else
	  {
		//���ӹ��������¼
		$query = "INSERT INTO chatter_chatboard(time, username, message)
				VALUES (NOW(),'$username', '$message');";
		$result = @mysql_query ($query);
	  }

	}else{
		echo "<script>parent.document.location.href='login.php'</script>";
		die("�Ƿ�������");
	}
 }
?>

<?php
	if($action=="private"){	//��˽�ġ�ʱ�Ľ���
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
    <td>��Ϣ��</td>
   <td><input type="text" size="50" name="message" value=""></td>
   <td><input type="submit" name="submit" value="����" class="buttons"></td>
   </tr>
 </table>
</form>
<?php
	}else{	//��������ʱ�Ľ���
?>
<form action="sendmsg.php?action=public" method="POST" name="submitchat">
 <input type="hidden" size="25" name="action" value="public">
 <table align="center">
  <tr>
   <td>�û�����</td>
   <td>
    <?php
		//�ж��û��Ƿ��¼
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
   <td>��Ϣ��</td>
   <td><input type="text" size="50" name="message" value=""></td>
   <td><input type="submit" name="submit" value="����" class="buttons"></td>
   <td><a href="login.php?action=logout" target="_parent">�ı��û�/�ǳ�</a></td>
  </tr>
 </table>
</form>
<?php } ?>

</body>
</html>
