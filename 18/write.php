<?php
   /**********************************/
   /*    �ļ�����write.php           */
   /*    ˵����ǩд���Եı�ҳ��    */
   /**********************************/

   include "config.inc.php";
   include"header.inc.php";
?>
<!--����-->
<table border=0 cellpadding=0 cellspacing=0 width=730 class=TitleBar>
  <tr>
    <td class=TitleBar_L></td>
    <td class=TitleBar_T> �� ǩд���� �� </td>
    <td class=TitleBar_R></td>
  </tr>
</table>

<!--���������ʼ-->
<table border="0" cellpadding="0" cellspacing="0" width="730" class="TextBox_1">
  <tr>
    <td width="5" rowspan="4" class="Border_L"></td>
    <td height="1" class="BgLine"></td>
    <td width="5" rowspan="4" class="Border_R"></td>
  </tr>
  <tr>
    <td height="8"></td>
  </tr>
  <tr>
    <td valign="top">
	<table border=0 cellpadding=0 cellspacing=0 width=100%>
        <form method=POST name="form1" action="write_post.php" id="form1" onsubmit="return vaildForm();">
	  <tr>
		<td width=199 align=center>
		<img id="imgFace" height=100 width=100 alt="ѡ��һ��ͷ��" src="images/face/1.gif" />
		<p>
		<select id="selFace" size=1 name="face" style="width:110px"
			onchange="document.images['imgFace'].src='images/face/' +options[selectedIndex].value+ '.gif';">
		 <?php
			//���ͷ��
			for($i=1; $i<=20; $i++)
			{
				echo '<option value="'.$i.'">�û�ͷ�� - '.$i.'</option>';
			}
		 ?>
		</select>
		</p>
		<p>�Ա�
			<select size=1 name="gender">
			  <option value=1 selected>˧��</option>
			  <option value=0>��ü</option>
			</select>
		 </p>
		 </td>
		<td width=1 class=bgLine></td>
		<td width=520 align=right>
		  <!--�����ʼ-->
		  <table border=0 cellpadding=2 cellspacing=2 width=97%>
			<tr>
			  <td>�� ����</td>
			  <td><input type=text class=text name="name" size=24 maxlength=15 value="">
				<font class=insist>*</font>
			    </td>
			  <td nowrap>�� ����</td>
			  <td><input type=text class=text name="email" size=24 maxlength=50 value=""></td>
			</tr>
			<tr>
			  <td>�� ҳ��</td>
			  <td><input type=text class=text name="homepage" size=24 value=""></td>
			  <td>OICQ ��</td>
			  <td><input type=text class=text name="oicq" size=24 maxlength=15 value=""></td>
			</tr>
			<tr>
			  <td nowrap>�� �</td>
			  <td colspan=3>
			  	<input type=checkbox name="hide" value=ON>
				<label for=checkbox>���Ļ���ֻ�й���Ա�ɼ�ѽ��</label>
			  </td>
			</tr>
			<tr>
			  <td valign=top>�� �ԣ�</td>
			  <td colspan=3>
			  <textarea name="content" id="content" rows=10 style="width: 410; height:200"></textarea>
			  <font class=insist>*</font> </td>
			</tr>
			<tr>
			  <td>��</td>
			  <td colspan=3>
			    <input class=button type="submit" value=" �ύ���� " name="submit">
				<input class=button type="reset" value=" ȫ����д "></td>
			</tr>
		  </table>
		  <!--��������-->
		</td>
	  </tr>
      </form>
      </table>
	  </td>
  </tr>
  <tr>
    <td height="8"></td>
  </tr>
</table>
<!--������������-->

<Script language="JavaScript">
<!--

//ģʽ����
function execRE(re, content) 
{
	oReg = new RegExp(re, "ig");
	r = ( oReg.exec(content) ) ? true : false;
	return r;
}

//��
var oForm = document.forms[0];

function vaildForm()
{
	if( oForm.name.value=="" || execRE("^[ ��\n\t\r\0\x0B]+$", oForm.name.value))
	{
		alert ('�����ǳ�û����д��' );
		return false;
	}
	else if( !execRE("^[-a-zA-Z0-9_\u0391-\uFFE5]+$", oForm.name.value) )
	{
		alert ('�����ǳƲ��ܰ����Ƿ��ַ���' );
		return false;
	}
	else if( oForm.content.value=="" || execRE("^[ ��\n\t\r\0\x0B]+$", oForm.content.value) )
	{
		alert ('�����������ݲ������հף�' );
		return false;
	}
	else if( oForm.email.value &&
		  !execRE("[-a-z0-9_\.]+\@([0-9a-z][-a-z0-9_]+\.)+[a-z]{2,3}$", oForm.email.value) )
	{
		alert ('�����ʼ���ַ��д���淶��' );
		return false;
	}
	else if( oForm.page.value && !execRE("^http://", oForm.page.value) )
	{
		alert ('������ҳ��ַ��д���淶��' );
		return false;
	}
	else if( oForm.oicq.value && !execRE("^[0-9]{5,14}$", oForm.oicq.value) )
	{
		alert ( '���� OICQ ��д���淶��' );
		return false;
	}
	else
	{
		return true;
	}

}

//-->
</Script>
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
