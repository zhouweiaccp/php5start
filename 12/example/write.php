<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>签写留言</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<form name="FormName" method="post" action="finish.php">
<input type="hidden" name="act" value="write">
 <table width="90%" border="0" cellpadding="4" cellspacing="1">
  <tr>
   <td colspan="2" class="HeaderRow">签写留言</td>
  </tr>
  <tr>
   <td colspan="2" class="SubTitleRow"><span class="redfont">（*）内容必须填写</span></td>
  </tr>
  <tr>
   <td width="25%" align="right" class="InputRow">姓名：</td>
   <td width="75%" class="InputRow">
    <input name="name" type="text" id="name" size="25" maxlength="10">
    <span class="redfont">（*）</span>   </td>
  </tr>
  <tr>
   <td width="25%" align="right" class="InputRow">性别：</td>
   <td width="75%" class="InputRow">
    <input name="sex" type="radio" id="sex" value="1" checked>
    帅哥
    <input name="sex" type="radio" id="sex" value="0">
    美眉</td>
  </tr>
  <tr>
   <td align="right" class="InputRow">电子邮件：</td>
   <td class="InputRow">
    <input name="email" type="text" id="email" size="25" maxlength="80">
    <span class="redfont">（*）</span> </td>
  </tr>
  <tr>
   <td width="25%" align="right" class="InputRow">网址：</td>
   <td width="75%" class="InputRow">
    <input name="url" type="text" id="url" size="40" maxlength="100">
   </td>
  </tr>
  <tr>
   <td width="25%" align="right" class="InputRow">留言言内容：</td>
   <td width="75%" class="InputRow">
    <textarea name="comment" cols="40" rows="8" id="comment"></textarea>
   <span class="redfont">（*）</span>   </td>
  </tr>
  <tr>
   <td colspan="2" align="center">
    <input name="submit" type="submit" id="submit" value=" 提交留言 ">
   </td>
  </tr>
 </table>
</form>
</body>
</html>
