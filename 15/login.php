<?php
  /******************************************/
  /*		�ļ�����login.php				*/
  /*		���ܣ��û���¼���棬�Լ�		*/
  /*		      �˳���¼����				*/
  /******************************************/

  include "config.inc.php";		//����������Ϣ
  include "header.inc.php";	//��������ͷ��ҳ��

  //�˳���¼
  if(isset($_GET['action']) && $_GET['action']=='logout')
  {
	$username = $_SESSION['username'];

	//���õ�¼ʱ��Ϊ��0000-00-00��
	$query = "UPDATE chatter_users SET time='0000-00-00'
			WHERE username='$username'";
	$result = @mysql_query ($query);

	//�ж����ݲ���ɹ����
	$affected_rows = mysql_affected_rows();
	if($affected_rows >0)
	{
		//�û�״̬���³ɹ������username��SESSIONֵ
		unset($_SESSION['username']);
		ExitMessage("�û��ǳ��ɹ���", "login.php");
	}else{
		//�û�״̬����ʧ��
		ExitMessage("�û��ǳ�ʧ�ܣ�", "");
     }
  }
?>

<!-- ����������ݽ��ύ��main.phpҳ�� -->
<form action="main.php" method="post" name="login">
<table align="center" width="400">
  <tr>
    <td colspan=2>
      <b>��ӭ�����Ե�����@������</b>
	 <br><br>
      �����������û��������룬����ע��һ�����˺š�
	 <br><br>
    </td>
  </tr>
  <tr>
    <td>�û�����</td>
    <td><input type="text" size="20" name="username"></td>
  </tr>
  <tr>
    <td>���룺</td>
    <td><input type="password" size="20" name="password"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="��½" class="buttons"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><a href="register.php">ע���û�</a></td>
  </tr>
  <tr>
    <td colspan="2">
	<a href="http://www.taodoor.com" target="_blank"><b>�Ե�����@������</b></a>
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
