<?php
  /**************************************/
  /*		�ļ�����view_profile.php	*/
  /*		���ܣ��鿴�û�����ҳ��		*/
  /**************************************/
  require('config.inc.php');

  //ȡ���û�ID
  $id=$_GET['id'];

  //ȡ���û���Ϣ
  $sql="SELECT * FROM forum_user WHERE username='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);

  if (!$rows){
	ExitMessage("�û���¼�����ڣ�", "index.php");
  }

  //��������
  $sql = "SELECT * FROM forum_topic WHERE name = '" . $id . "'";
  $count_q = mysql_query($sql);
  $num_count_q = mysql_num_rows($count_q);

  //�ظ�����
  $sql = "SELECT * FROM forum_reply WHERE reply_name = '" . $id . "'";
  $count_a = mysql_query($sql);
  $num_count_a = mysql_num_rows($count_a);

  //�����û��������������
  $num_count = $num_count_q + $num_count_a;
?>

<?php include('header.inc.php'); ?>

<h2>�鿴 <b><?php echo $rows['username']; ?></b> ��������</h2>

<?php
	//��д�����ʼ���ַ
	$mail=$rows['email'];
	$mail=str_replace("@", " [at] ", $mail);
	$mail=str_replace(".", " [dot] ", $mail);
?>
<fieldset>
	<legend>��������</legend>
<br>
<table>
  <tr>
    <td><strong>��ʵ����</strong></td>
    <td><?php echo $rows['realname']; ?></td>
  </tr>
  <tr>
    <td><strong>�����ʼ�</strong></td>
    <td><?php echo $mail; ?></td>
  </tr>
  <tr>
    <td><strong>��������</strong></td>
    <td><?php echo $num_count; ?></td>
  </tr>
</table>
<br>
<input type="button" value="������ҳ" onclick="location.href='main_forum.php'">
</fieldset>

<?php include('footer.inc.php'); ?>
