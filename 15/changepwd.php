<?php
  /**************************************/
  /*		�ļ�����changepwd.php		*/
  /*		���ܣ��û�������ҳ��		*/
  /**************************************/

  include "config.inc.php";		//����������Ϣ
  include "header.inc.php";	//��������ͷ��ҳ��

  //�ύ����
  if($_POST['submit'])
  {
    $password = $_POST['password'];		//����
    $password2 = $_POST['password2'];		//ȷ������
    $username = $_SESSION['username'];	//�û���

    if($password != "")
    {
	  if($password == $password2)
  	  {
		//�����û�����
         $query = "UPDATE chatter_users SET password='$password'
				WHERE username = '$username'";
         $result = @mysql_query ($query);

		//�����µļ�¼��
		$affected_rows = mysql_affected_rows();
		if($affected_rows >= 0)
		{
         		ExitMessage("�û������޸ĳɹ���", "userlist.php");
		}else{
         		ExitMessage("�û������޸�ʧ�ܣ�", "changepwd.php");
		}
      }else{
		//û���޸�����
		ExitMessage("�û�����û�б��޸ģ�", "changepwd.php");
      }
    }
  }

?>

<form action="changepwd.php" method="POST" name="login">
<table align="center">
    <tr>
      <td>��½���룺</td>
      <td><input type="password" size="10" name="password"></td>
    </tr>
    <tr>
      <td>ȷ�����룺</td>
      <td><input type="password" size="10" name="password2"></td>
    </tr>
    <tr>
      <td clospan="2">
	  	<input type="submit" name="submit" value="�޸�" class="buttons">
		&nbsp;
	  	<a href="userlist.php">����</a>
      </td>
    </tr>
</table>
</form>

</body>
</html>
