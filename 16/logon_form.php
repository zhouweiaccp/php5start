<?php
  /**************************************/
  /*		�ļ�����logon_form.php		*/
  /*		���ܣ��û���¼����			*/
  /**************************************/

  require('config.inc.php');

  if($_POST['submit'])
  {
	//�û���
	$username=ClearSpecialChars($_POST['username']);
	//���룬��Ҫ����MD5����
	$password=md5($_POST['password']);

	//�����ݿ��м����û����������Ƿ�ƥ��
	$sql = "SELECT * FROM forum_user
		  WHERE username='$username' AND password='$password'";
	$result = mysql_query($sql);
	$num_rows = mysql_num_rows($result);
	
	if($num_rows == 1)
	{
		//����û���
		$row = mysql_fetch_assoc($result);

		//���û�������SESSION��
		$_SESSION['username'] = $row['username'];

		//��ת����̳��ҳ��
		header("Location: main_forum.php");
	}
	else {
		ExitMessage("�û��������������", "logon_form.php");
	}
  }
  else{
	
	//����ͷ��ҳ��
	include('header.inc.php');
?>

<h2>�û���¼</h2>

<fieldset>
<form method="post" action="logon_form.php">
<table>
  <tr>
	<td>�û�����</td>
    <td><input name="username" type="text"></td>
  </tr>
  <tr>
    <td>�ܡ��룺</td>
	<td><input name="password" type="password"></td>
  </tr>
</table>
<input type="submit" name="submit" value="��¼" class="button">
</form>
</fieldset>

<?php 
  }

  //����β��ҳ��
  include('footer.inc.php'); 
?>
