<?php
  /*************************/
  /*   �ļ�����login.php     */
  /*   ˵��������Ա��¼ҳ��     */
  /*************************/

  include "config.inc.php";
  include "header.inc.php";
?>

<Script language="JavaScript">
<!--//
var oForm = document.forms[0];

function vaildForm()
{
	if( oForm.user_name.value=="" )
	{
		alert('���Ĺ����ʺ�û����д��' );
		return false;
	}
	else if( oForm.user_pass.value=="" )
	{
		alert ('���Ĺ�������û����д��' );
		return false;
	}
	else
	{
		return true;
	}
}
//-->
</Script>
<!--����-->
<table border=0 cellpadding=0 cellspacing=0 width=730 class=TitleBar>
  <tr>
    <td class=TitleBar_L></td>
    <td class=TitleBar_T> �� ����Ա��¼ �� </td>
    <td class=TitleBar_R></td>
  </tr>
</table>

<!--��¼��-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <form method=POST action="login_post.php" id="form1" onsubmit="return vaildForm();">
  <tr>
    <td height="18" colspan="2" width="715"></td>
  </tr>
  <tr>
    <td width="40%" align="right">����Ա�ʺţ���</td>
    <td width="60%"><input type="text" class="text" name="user_name" size="20" style="width: 120"></td>
  </tr>
  <tr>
    <td height="5" colspan="2" width="715"></td>
  </tr>
  <tr>
    <td width="40%" align="right">��¼���룺��</td>
	<td width="60%">
	<input type="password" class="text" name="user_pass" size="20" style="width: 120">
	</td>
  </tr>
  <tr>
	<td colspan="2" align="center" height="60">
	<input type="submit" value=" ������� " class="button" name="submit">
	</td>
  </tr>
</table>
</td>
</tr>
<tr>
  <td height="8"></td>
</tr>
</table>

<!--�ױ�-->
<table border="0" cellpadding="0" cellspacing="0" width="730" class="Hemline">
  <tr>
    <td class="Hemline_L"></td>
    <td class="Hemline_T"><img style="width: 1; height: 0"></td>
    <td class="Hemline_R"></td>
  </tr>
</table>
<?php
include "footer.inc.php";
?>
