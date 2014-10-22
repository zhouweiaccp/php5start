<?php
  /*************************/
  /*   文件名：login.php     */
  /*   说明：管理员登录页面     */
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
		alert('您的管理帐号没有填写！' );
		return false;
	}
	else if( oForm.user_pass.value=="" )
	{
		alert ('您的管理密码没有填写！' );
		return false;
	}
	else
	{
		return true;
	}
}
//-->
</Script>
<!--标题-->
<table border=0 cellpadding=0 cellspacing=0 width=730 class=TitleBar>
  <tr>
    <td class=TitleBar_L></td>
    <td class=TitleBar_T> ≡ 管理员登录 ≡ </td>
    <td class=TitleBar_R></td>
  </tr>
</table>

<!--登录框-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <form method=POST action="login_post.php" id="form1" onsubmit="return vaildForm();">
  <tr>
    <td height="18" colspan="2" width="715"></td>
  </tr>
  <tr>
    <td width="40%" align="right">管理员帐号：　</td>
    <td width="60%"><input type="text" class="text" name="user_name" size="20" style="width: 120"></td>
  </tr>
  <tr>
    <td height="5" colspan="2" width="715"></td>
  </tr>
  <tr>
    <td width="40%" align="right">登录密码：　</td>
	<td width="60%">
	<input type="password" class="text" name="user_pass" size="20" style="width: 120">
	</td>
  </tr>
  <tr>
	<td colspan="2" align="center" height="60">
	<input type="submit" value=" 进入管理 " class="button" name="submit">
	</td>
  </tr>
</table>
</td>
</tr>
<tr>
  <td height="8"></td>
</tr>
</table>

<!--底边-->
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
