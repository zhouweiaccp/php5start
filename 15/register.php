<?php
  /**************************************/
  /*		�ļ�����register.php		*/
  /*		���ܣ��û�ע�����			*/
  /**************************************/

  include "config.inc.php";		//����������Ϣ
  include "header.inc.php";	//��������ͷ��ҳ��

  //�ж��Ƿ��ύ������
  if (isset($_POST['submit'])) {

	//���û�������κ���Ϣ�����������
	if(!$_POST['username'] && !$_POST['password1'] && !$_POST['password2']){
		ExitMessage("����ע����Ϣ��������д��", "");
	}

	//�����ע����Ϣ
	$username = $_POST['username'];		//ע���û���
	$password1 = $_POST['password1'];	//����
	$password2 = $_POST['password2'];	//ȷ������
	$ip = getIPAddress();				//���IP��ַ

	//�ж��û��Ƿ��Ѿ�����
	$query = "SELECT * from chatter_users WHERE username = '$username'";
	$result = @mysql_query ($query);

	$num_rows = mysql_num_rows($result);

	if($num_rows == 0)
	{
		//�û�������
		if($password1 == $password2){
		   $password = $password1;

		   //���û���Ϣ���������
		   $query = "INSERT INTO chatter_users (username, ip, password)
				 VALUES ('$username','$ip', '$password');";
		   $result_adduser = @mysql_query ($query);

		   //�ж����ݲ���ɹ����
		   $affected_rows = mysql_affected_rows();
		   if($affected_rows >0)
		   {
		   	  //���ݲ���ɹ�
			  ExitMessage("�û�ע��ɹ������½��", "login.php");
		   }else{
			  //���ݲ���ʧ��
		   	  ExitMessage("�û�ע��ʧ�ܣ������ԣ�", "register.php");
            }
		}else{
		  //����������û����벻���
		  ExitMessage("�û����벻����", "");
		}
	}
	else
	{
		//�û��Ѿ���
		ExitMessage("�û��Ѿ����ڣ���ѡ�����������֣�", "");
	}
  }
?>

<!-- ����������ݽ��ύ��register.phpҳ�� -->
<form action="register.php" method="post" name="login">
<table align="center" width="400">
  <tr>
    <td colspan=2>
      <b>�Ե�����@������ - �û�ע��</b>
      <br><br>
      ����д����ע����Ϣ
      <br><br>
   </td>
  </tr>
  <tr>
    <td>�û�����</td>
    <td><input type="text" size="20" name="username" value=""></td>
  </tr>
  <tr>
    <td>���룺</td>
    <td><input type="password" size="20" name="password1" value=""></td>
  </tr>
  <tr>
    <td>ȷ�����룺</td>
    <td><input type="password" size="20" name="password2" value=""></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="ע��" class="buttons"></td>
  </tr>
</table>
</form>

</body>
</html>
