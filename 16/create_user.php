<?php
  /**************************************/
  /*		�ļ�����create_user.php		*/
  /*		���ܣ������û�ע��ҳ��		*/
  /**************************************/

  require('config.inc.php');
  include('header.inc.php');
?>

<h2>ע�����û�</h2>

<fieldset>
<form method="post" action="add_user.php">
<table>
  <tr>
	<td>�û���:</td>
	<td><input name="username" type="text"></td>
  </tr>
  <tr>
    <td>�� ��:</td>
    <td><input name="password" type="password"></td>
  </tr>
  <tr>
    <td>E-mail:</td>
    <td><input name="email" type="text"></td>
  </tr>
  <tr>
    <td>��ʵ����:</td>
    <td><input name="realname" type="text"></td>
  </tr>
</table>

<input type="submit" name="Submit" value="�ύע��" class="button"/>
<input type="reset" name="Submit2" value="���" class="button"/>
</form>
</fieldset>

<?php 

	//����β��ҳ��
	include('footer.inc.php');
?>
