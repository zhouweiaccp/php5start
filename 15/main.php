<?php
  /**************************************/
  /*		�ļ�����main.php			*/
  /*		���ܣ���������ҳ��			*/
  /**************************************/

  include "config.inc.php";		//����������Ϣ
  include "header.inc.php";	//��������ͷ��ҳ��

  //���username/password���ʧ�ܣ��򷵻ش�����Ϣ���˳�
  $username = $_POST['username'];
  $password = $_POST['password'];

  //����û����Ƿ��Ѿ�����
  $query = "SELECT * from chatter_users WHERE username = '$username'";
  $result = @mysql_query ($query);
  $num_rows = mysql_num_rows($result);

  if($num_rows == "0")
  {
	//����û������ڣ����������Ϣ
	ExitMessage("�û��������ڣ���ע������ԣ�", "login.php");
  }
  else
  {
	//����û����ڼ��
	if ($rows = mysql_fetch_assoc($result))
	{
	  $old_password = $rows['password'];
	}

	if($old_password != $password)
	{
	  //�������
	  ExitMessage("�û�������������������ԣ�", "login.php");
	}
	else
	{
	  //���IP��ַ
	  $ip = getIPAddress();

	  //�����û���¼ʱ�䡢IP��ַ
	  $query = "UPDATE chatter_users
			  SET time=Now(), ip=$ip
			  WHERE username='$username'";
	  $result = @mysql_query ($query);

	  //����username��SESSION
    	  $_SESSION['username'] = $username;
     }
  }

?>

<table width="100%" height="100%" class="main_table" cellpadding="4" cellspacing="3">
  <tr>
    <td height="20" class="cells" colspan="2">
      <font size="4"><b>�Ե�����@������ - <?php echo "$version"; ?></b>
    </td>
  </tr>
  <tr>
    <td class="cells">
		<!-- Ƕ�������ҷ�����ʾҳ�� -->
		<iframe src="chatboard.php?action=public"
			width="100%" height="100%" border="0" name="chatboard"
			frameborder="0" style="border:0px solid black">
		</iframe>

    </td>
    <td class="cells" width=200>
		<!-- Ƕ�������û���ʾҳ�� -->
		<iframe src="userlist.php"
			width="100%" height="70%" border="0" name="currentusers"
			frameborder="0" style="border:0px solid black">
		</iframe>

		<!-- Ƕ���û�����ҳ�� -->
		<iframe src="action.php"
			width="100%" height="30%" border="0" name="actions"
			frameborder="0" style="border:0px solid black" scrolling="no">
		</iframe>

    </td>
  </tr>
  <tr>
    <td height="40" class="cells" colspan="2" valign="middle">

		<!-- Ƕ�뷢�Թ���ҳ�� -->
		<iframe src="sendmsg.php" scrolling="no"
			width="100%" height="100%" border="0" name="msg" frameborder="0"
			marginheight="0" marginwidth="0" style="border:0px solid black">
		</iframe>

    </td>
  </tr>
</table>

</body>
</html>
