<?php
  /**************************************/
  /*		�ļ�����view_topic.php		*/
  /*		���ܣ�������ϸҳ��			*/
  /**************************************/

  require('config.inc.php');

  //����IDȡ�����Ӽ�¼
  $id=$_GET['id'];
  $sql="SELECT * FROM forum_topic WHERE id='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);

  //��¼������
  if (!$rows) 
  {
	ExitMessage("������¼�����ڣ�", "main_forum.php");
  }

  //�ö����
  $sticky=$rows['sticky'];

?>

<?php include('header.inc.php'); ?>

<h2><? echo $rows['topic']; ?></h2>
<em class="info">
	��<a href="view_profile.php?id=<?php echo $rows['name']; ?>">
	<? echo $rows['name']; ?></a> �� <? echo $rows['datetime']; ?>
	����
</em>

<p>
<?php
	//�������õ�����
	echo nl2br(htmlspecialchars($rows['detail']));
?>
</p>
<?php if ($rows['locked']) { $locked = 1; } ?>
<hr size=1 />
<dl>
<?php

  //��ȡ�ظ�����
  $sql	="SELECT * FROM forum_reply WHERE topic_id='$id'";
  $result	= mysql_query($sql);
  $num_rows = mysql_num_rows($result);

  if ($num_rows)
  {
	//ѭ��ȡ����¼����
	while($rows=mysql_fetch_array($result))
	{
?>
 <dt>
    <a href="view_profile.php?id=<?php echo $rows['reply_name']; ?>">
    	<? echo $rows['reply_name']; ?>
    </a>
     - <em><?php echo $rows['reply_datetime']; ?></em>
 </dt>
 <dd>
  <p><?php
    	//�������õ�����
    	echo nl2br(htmlspecialchars($rows['reply_detail'])); 
     ?></p>
 </dd>
 <?
	}//����ѭ��
  }else{
	echo "<p><strong>û�и�����¼��</strong></p>";
  }

  //�������1
  $sql = "UPDATE forum_topic set view=view+1 WHERE id='$id'";
  $result = mysql_query($sql);

?>
</dl>

<!--���ݻظ�������ʼ-->
<fieldset>
<legend>���ӻظ�</legend>
<?php 
//�ж��û��Ƿ��Ѿ�ע��
if (!$_SESSION['username'])
{
	echo '<p>����<a href="create_user.php">ע��</a>��
		  ����<a href="logon_form.php">��¼</a>�����в�����<br>&nbsp;</p>';
} else {

	//�����Ѿ�������
	if ($locked == 1)
	{ 
		echo '<p><strong>�����Ǳ������ģ��޷�����</strong><br>&nbsp;</p>';
	}else{
?>
<form name="form1" method="post" action="add_reply.php" id="reply">
 <input name="id" type="hidden" value="<? echo $id; ?>">
 <table>
  <tr>
   <td valign="top">����<br>����</td>
   <td>
    <textarea name="reply_detail" cols="45" rows="10"></textarea>
   </td>
  </tr>
  <tr>
   <td valign="top">&nbsp;</td>
   <td><em>�벻Ҫʹ��HTML��ǩ</em></td>
  </tr>
 </table>
 <br />
 <input type="submit" name="Submit" value="�ظ�����" class="button" />
 <input type="reset" name="Reset" class="button" />
</form>
<?php } ?>
</fieldset><br>
<!--���ݻظ���������-->

<?php 
  //����ǹ���Ա�û�����������ö��������������͡�ɾ������ť
  if ($_SESSION['username'] == ADMIN_USER)
  { 
?>
<!--����Ա����������ʼ-->
<fieldset>
<legend>����Ա����</legend>

   <!--��ʾ����������ť-->
   <?php if ($locked == 0) { ?>
	<form name="lock" method="post" action="lock_topic.php">
	 <input type="hidden" name="id" value="<?php echo $id; ?>">
	 <input type="submit" name="Submit" value="��������" class="button">
	 �����������������û��޷��ظ�
	</form>
  <?php }else{ ?>
	<form name="unlock" method="post" action="unlock_topic.php">
	 <input type="hidden" name="id" value="<?php echo $id; ?>">
	 <input type="submit" name="Submit" value="�������" class="button">
	 ��������������˿��Իظ�
	</form>
  <?php } ?>

  <!--��ʾ�ö�������ť-->
  <?php if ($sticky == 0) { ?>
	<form name="stick" method="post" action="stick_topic.php">
	 <input type="hidden" name="id" value="<?php echo $id; ?>">
	 <input type="submit" name="Submit" value="�ö�����" class="button">
	 ���������ڶ���
	</form>
  <?php } else { ?>
	<form name="unstick" method="post" action="unstick_topic.php">
	 <input type="hidden" name="id" value="<?php echo $id; ?>">
	 <input type="submit" name="Submit" value="ȡ���ö�" class="button">
	 ȡ�������ö�
	</form>
  <?php } ?>
  
  <!--��ʾɾ��������ť-->
  <form name="delete" method="get" action="del_topic.php">
	 <input type="hidden" name="id" value="<?php echo $id; ?>">
	 <input type="submit" name="Submit" value="ɾ������" class="button">
	 ɾ��������ظ�����
  </form>
</fieldset>
<!--����Ա������������-->
<?php 
	} 
}
?>

<?php include('footer.inc.php'); ?>
