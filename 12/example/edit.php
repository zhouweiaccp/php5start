<?php
	/*************************************/
	/*        文件名：edit.php		    */
	/*        功能：编写留言信息		*/
	/************************************/

	include "dbconnect.php";

	//取得留言内容
	$id = intval($_GET['id']);	//所编辑的留言ID
	$res = mysql_query("SELECT * FROM guestbook WHERE id=$id");
	$row = mysql_fetch_object($res);
?>
<html>
<head>
<title>编辑留言</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="FormName" method="post" action="finish.php">
<input type="hidden" name="act" value="edit">
<input type="hidden" name="id" value="<?php echo $row->id ?>">
 <table width="90%" border="0" cellpadding="4" cellspacing="1">
  <tr>
	<td colspan="2" class="HeaderRow">签写留言</td>
  </tr>
  <tr>
   <td colspan="2" class="SubTitleRow">
	<span class="redfont">（*）内容必须填写</span></td>
  </tr>
  <tr class="InputRow">
   <td width="25%" align="right">姓名：</td>
   <td width="75%">
    <input name="name" type="text" size="25" maxlength="10" 
		value="<?php echo htmlspecialchars($row->name) ?>">
    <span class="redfont">（*）</span>   </td>
  </tr>
  <tr class="InputRow">
   <td align="right">性别：</td>
   <td>
   <input name="sex" type="radio" value="1" <? if($row->sex==1) echo "checked";?>> 帅哥
   <input name="sex" type="radio" value="0" <? if($row->sex==0) echo "checked";?>> 美眉
  </td>
  </tr>
  <tr class="InputRow">
   <td align="right">电子邮件：</td>
   <td class="InputRow">
    <input name="email" type="text" size="25" maxlength="80"
		value="<?php echo htmlspecialchars($row->email) ?>">
    <span class="redfont">（*）</span> </td>
  </tr>
  <tr class="InputRow">
   <td align="right">网址：</td>
   <td class="InputRow">
    <input name="url" type="text" size="40" maxlength="100"
		value="<?php echo htmlspecialchars($row->url) ?>">
   </td>
  </tr>
  <tr class="InputRow">
   <td align="right">留言言内容：</td>
   <td>
    <textarea name="comment" cols="40" rows="8" id="comment">
		<?php echo htmlspecialchars($row->comment) ?>
	</textarea>
   <span class="redfont">（*）</span></td>
  </tr>
  <tr>
   <td colspan="2" align="center">
    <input name="submit" type="submit" id="submit" value=" 提交留言 ">
	<input type="button" value=" 返回 " onClick="location.href='list.php'">
   </td>
  </tr>
 </table>
</form>

</body>
</html>
