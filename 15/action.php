<?php
  /**************************************/
  /*		�ļ�����action.php			*/
  /*		���ܣ��û���������ҳ��		*/
  /**************************************/

  include "config.inc.php";		//����������Ϣ
  include "header.inc.php";		//��������ͷ��ҳ��

  //�û���
  $username = $_SESSION['username'];

  //�����û���Ϣ
  $query = "SELECT * FROM chatter_users
		  WHERE username = '$username' AND isadmin = 1";
  $result = mysql_query ($query);

  //�ж��Ƿ����Ա
  $num_rows = mysql_num_rows($result);
  $isadmin = ($num_rows > 0) ? true : false;
?>

<table height="100%">
<tr>
  <td valign="bottom"><b>�û�����</b><br>
	<li><a href="clearmsg.php?action=private"
		onClick="return confirm('ȷʵҪ���˽�ļ�¼��')">���˽�ļ�¼</a>
	<br>

	<?php 
		//���ʹ�ñ������
		if($use_smilies == true){ 
	?>
	<li><a href="emotion.php" target="currentusers">�鿴����</a><br>
	<?php 
		}
	?>
    
	<li><a href="changepwd.php" target="currentusers">��������</a><br>

	<?php
		//����ǹ���Ա
      	if($isadmin == true){
    ?>
    <b>����Ա����</b><br>
<li><a href="clearmsg.php?action=all"
		onClick="return confirm('ȷʵҪȫ�������¼��')">���ȫ�������¼</a>
<br>
    <li><a href="manageuser.php" target="chatboard">�����û�</a><br>
  	<?php
		}
	?>
  </td>
</tr>
</table>

</body>
</html>
