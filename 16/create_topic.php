<?php
  /***********************************/
  /*      �ļ�����create_topic.php   */
  /*      ���ܣ���������ҳ��		 */
  /***********************************/

  require('config.inc.php');
  include('header.inc.php'); 
?>

<h2>��������</h2>

<?php 
  if (!$_SESSION['username'])
  { 
	  //����û�δ��¼����ʾ������Ϣ
?>

<h3>δע����û�</h3>
<p>�Բ�����<a href="create_user.php">ע��</a>���û���
	���߽���<a href="logon_form.php">��¼</a>��
</p>

<?php
  }else{ 
	//����û���¼����ʾ�����
?>

<h3>����ע������</h3>
<ul>
	<li>������Ŀ������д��</li>
	<li>�ڱ���������в���ʹ��HTML���롣</li>
	<li>Ϊ�˰�ȫ������벻Ҫ����̳��͸¼�������Ҫ��Ϣ��</li>
</ul>

<form method="post" action="add_topic.php" id="postComment">
<table>
  <tr>
	<td>����</td>
	<td><input name="topic" type="text" id="topic" size="50"><td>
  </tr>
  <tr>
    <td>����</td>
    <td><textarea name="detail" cols="50" rows="10" id="detail"></textarea></td>
  </tr>
</table>

<?php
  //����ǹ���Ա������ʾ���ö����͡�����������
  if ($_SESSION['username'] == ADMIN_USER)
  {
?>
	<br>�������ö� <input type="checkbox" name="sticky" value="on">
	<br>���������� <input type="checkbox" name="locked" value="on">
<?php
  }
?>

<br><br>
<input type="submit" name="Submit" value="��������" class="button">
<input type="reset" name="Submit2" class="button">
</form>

<?php } ?>

<?php 
	//����β��ҳ��
	include('footer.inc.php'); 
?>
