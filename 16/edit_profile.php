<?php
  /******************************************/
  /*		�ļ�����edit_profile.php		*/
  /*		���ܣ��û������޸�ҳ��		    */
  /******************************************/

  require('config.inc.php');

  //�û���
  $id = $_SESSION['username'];

  //����û�û�е�¼
  if (!$_SESSION['username']) {
	ExitMessage("��<b>��¼</b>��ִ�и�����", "logon_form.php");
  }
?>

<?php include('header.inc.php'); ?>

<h2>�༭��������</h2>

<?php
  //��ѯ�û�����
  $sql="SELECT * FROM forum_user WHERE username = '$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);
?>
<fieldset>
	<legend>��������</legend>
<form method="post" action="update_profile.php">

<table>
  <tr>
    <td>��¼�û���</td>
    <td><b><? echo $rows['username']; ?></b></td>
  </tr>
  <tr>
	<td>��������:</td><td><input name="password" type="password">
	�������գ����������¡�</td>
  </tr>
  <tr>
	<td>�����ʼ�:</td>
	<td><input name="email" type="text"
			value="<?php echo $rows['email']; ?>"></td>
  </tr>
  <tr>
	<td>��ʵ����:</td>
	<td><input name="realname" type="text"
			 value="<?php echo $rows['realname']; ?>"></td>
  </tr>
</table>
<br><br>
<input type="submit" name="submit" value="���¸�������" class="button"> 
</form>
</fieldset>
	
<?php include('footer.inc.php'); ?>
