<?php
	/*************************************/
	/*        �ļ�����edit.php		    */
	/*        ���ܣ���д������Ϣ		*/
	/************************************/

	include "dbconnect.php";

	//ȡ����������
	$id = intval($_GET['id']);	//���༭������ID
	$res = mysql_query("SELECT * FROM guestbook WHERE id=$id");
	$row = mysql_fetch_object($res);
?>
<html>
<head>
<title>�༭����</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="FormName" method="post" action="finish.php">
<input type="hidden" name="act" value="edit">
<input type="hidden" name="id" value="<?php echo $row->id ?>">
 <table width="90%" border="0" cellpadding="4" cellspacing="1">
  <tr>
	<td colspan="2" class="HeaderRow">ǩд����</td>
  </tr>
  <tr>
   <td colspan="2" class="SubTitleRow">
	<span class="redfont">��*�����ݱ�����д</span></td>
  </tr>
  <tr class="InputRow">
   <td width="25%" align="right">������</td>
   <td width="75%">
    <input name="name" type="text" size="25" maxlength="10" 
		value="<?php echo htmlspecialchars($row->name) ?>">
    <span class="redfont">��*��</span>   </td>
  </tr>
  <tr class="InputRow">
   <td align="right">�Ա�</td>
   <td>
   <input name="sex" type="radio" value="1" <? if($row->sex==1) echo "checked";?>> ˧��
   <input name="sex" type="radio" value="0" <? if($row->sex==0) echo "checked";?>> ��ü
  </td>
  </tr>
  <tr class="InputRow">
   <td align="right">�����ʼ���</td>
   <td class="InputRow">
    <input name="email" type="text" size="25" maxlength="80"
		value="<?php echo htmlspecialchars($row->email) ?>">
    <span class="redfont">��*��</span> </td>
  </tr>
  <tr class="InputRow">
   <td align="right">��ַ��</td>
   <td class="InputRow">
    <input name="url" type="text" size="40" maxlength="100"
		value="<?php echo htmlspecialchars($row->url) ?>">
   </td>
  </tr>
  <tr class="InputRow">
   <td align="right">���������ݣ�</td>
   <td>
    <textarea name="comment" cols="40" rows="8" id="comment">
		<?php echo htmlspecialchars($row->comment) ?>
	</textarea>
   <span class="redfont">��*��</span></td>
  </tr>
  <tr>
   <td colspan="2" align="center">
    <input name="submit" type="submit" id="submit" value=" �ύ���� ">
	<input type="button" value=" ���� " onClick="location.href='list.php'">
   </td>
  </tr>
 </table>
</form>

</body>
</html>
