<?php
  /**************************************/
  /*		�ļ�����private.php			*/
  /*		���ܣ���˽�ġ�����ҳ��		*/
  /***************************************/

  include "config.inc.php";		//����������Ϣ
  include "header.inc.php";		//��������ͷ��ҳ��

  //˽�Ķ�����û���
  $to = $_GET['to'];

  //����˽�Ķ������Ϣ
  $query = "SELECT * from chatter_users WHERE username='$to'";
  $result = @mysql_query ($query);
  $num_rows = mysql_num_rows($result);

  if($num_rows > 0)
  {
	//��������������ϴ���
	$rows = mysql_fetch_assoc($result);
	$id_current = $rows['id'];
	$time_current = $rows['time'];
	$username_current = $rows['username'];
	$ip_current = $rows['ip'];
  }
  else
  {
	//���������û����ϲ�����
	ExitMessage("�û�{$to}�����ڣ���ر����촰�ڡ�", "");
  }
?>

<table width="100%" height="100%" class="main_table" cellpadding="4">
  <tr>
    <td class="cells" colspan=3>
    <b><?php echo $_SESSION['username']; ?></b> ��
    <b><?php echo $_GET['to']; ?></b> ˽��

    <!--Ƕ������������ʾҳ��-->
    <iframe src="chatboard.php?action=private&to=<?=htmlentities(urlencode($to))?>"
		width="100%" height="90%" border="0" frameborder="0"
		name="msg" style="border:0px solid black" scrolling="no">
    </iframe>
    </td>
  </tr>
  <tr>
<td height="40" class="cells">

     <!--Ƕ�뷢��ҳ��-->
     <iframe src="sendmsg.php?action=private&to=<?=htmlentities(urlencode($to))?>"
		width="100%" height="100%" border="0" frameborder="0"
		name="msg" style="border:0px solid black" scrolling="no">
	</iframe>
    </td>
  </tr>
</table>

</body>
</html>
