<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ǩд����</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<form name="FormName" method="post" action="finish.php">
<input type="hidden" name="act" value="write">
 <table width="90%" border="0" cellpadding="4" cellspacing="1">
  <tr>
   <td colspan="2" class="HeaderRow">ǩд����</td>
  </tr>
  <tr>
   <td colspan="2" class="SubTitleRow"><span class="redfont">��*�����ݱ�����д</span></td>
  </tr>
  <tr>
   <td width="25%" align="right" class="InputRow">������</td>
   <td width="75%" class="InputRow">
    <input name="name" type="text" id="name" size="25" maxlength="10">
    <span class="redfont">��*��</span>   </td>
  </tr>
  <tr>
   <td width="25%" align="right" class="InputRow">�Ա�</td>
   <td width="75%" class="InputRow">
    <input name="sex" type="radio" id="sex" value="1" checked>
    ˧��
    <input name="sex" type="radio" id="sex" value="0">
    ��ü</td>
  </tr>
  <tr>
   <td align="right" class="InputRow">�����ʼ���</td>
   <td class="InputRow">
    <input name="email" type="text" id="email" size="25" maxlength="80">
    <span class="redfont">��*��</span> </td>
  </tr>
  <tr>
   <td width="25%" align="right" class="InputRow">��ַ��</td>
   <td width="75%" class="InputRow">
    <input name="url" type="text" id="url" size="40" maxlength="100">
   </td>
  </tr>
  <tr>
   <td width="25%" align="right" class="InputRow">���������ݣ�</td>
   <td width="75%" class="InputRow">
    <textarea name="comment" cols="40" rows="8" id="comment"></textarea>
   <span class="redfont">��*��</span>   </td>
  </tr>
  <tr>
   <td colspan="2" align="center">
    <input name="submit" type="submit" id="submit" value=" �ύ���� ">
   </td>
  </tr>
 </table>
</form>
</body>
</html>
