<?php
    /*******************************/
    /*  文件名：list.php	       */
    /*  功能：显示留言和分页	   */
    /*******************************/

	include "dbconnect.php";

	//当前页数
	$page = isset($_GET['page'])?intval($_GET['page']):1;

	//每页记录数
	$each_page = 5;

	//查询留言总数
	$res = mysql_query("SELECT COUNT(*) FROM guestbook WHERE 1=1");
	$total = mysql_result($res, 0);

	//总页数
	$total_page = ceil($total/$each_page);

	//计算真实的页数，使得页数总是落在1～$total_page之间
	$page = ($page<0)?1:$page;
	$page = ($page>$total_page)?$total_page:$page;

	//根据真实的页数值，计算偏移量
	$offset = ($page-1)*$each_page;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>签写留言</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<input type="button" value=" 签写留言 " onClick="location.href='write.php'">
 <table width="90%" border="0" cellpadding="4" cellspacing="1">
  <tr>
   <td colspan="2" class="HeaderRow">留言列表
	(<?php echo sprintf("%d记录 %d/%d页",$total, $page, $total_page) ?>)</td>
  </tr>
<?php
	if($total)
	{
		//存在留言记录
		$sql = "SELECT * FROM guestbook WHERE 1=1
			  ORDER BY postdtm DESC limit $offset, $each_page";
		$res = mysql_query($sql);
		$i = 0;

		//遍历内容输出
		while($row = mysql_fetch_object($res))
		{
			//循环输出双色表格
			$tmp = ($i++)%2;
?>
  <tr>
   <td width="25%" valign="top" class="InputRow<?php echo $tmp ?>">
	<b><?php echo htmlspecialchars($row->name) ?></b><br>
	性别：<?php echo ($row->sex)?"帅哥":"美眉" ?><br>
	<a href="mailto:<?php echo htmlspecialchars($row->email) ?>">电子邮件</a><br>
    <?php if($row->url){ ?>
		<a href="<?php echo htmlspecialchars($row->url) ?>" target="_blank">
		个人主页</a>
	<?php } ?>
   </td>
   <td width="75%" valign="top" class="InputRow<?php echo $tmp ?>">
<div align="right">
	<a href="edit.php?id=<?php echo $row->id ?>">编辑</a>
	 |
	<a href="del.php?id=<?php echo $row->id ?>">删除</a>
</div>
<hr size="1">
	<!-- 正文内容 -->
	<?php echo $row->comment ?>
	</td>
  </tr>
<?php } ?>

<?php }else{ ?>
  <tr><td colspan="2" class="SubTitleRow" align="center">
	<b>留言内容不存在!</b></td></tr>
<?php } ?>

  <tr>
   <td colspan="2" align="center">
	<?php
		if($page>1){
			//如果页数大于1，则激活显示“前一页”的按钮
	?>
	    <input type="button" value=" 前一页 "
			onClick="location.href='?page=<?php echo $page-1 ?>'">
	<?php
		}else{
			//这里非激活显示“前一页”的按钮
	?>
	    <input type="button" disabled value=" 前一页 ">
	<?php } ?>

	 &nbsp;

	<?php
		if($page<$total_page){
			//如果页数大于总页数，则激活显示“下一页”的按钮
	?>
		<input type="button" value=" 下一页 "
			onClick="location.href='?page=<?php echo $page+1 ?>'">
	<?php
		}else{
			//这里非激活显示“下一页”的按钮
	?>
	    <input type="button" disabled value=" 下一页 ">
	<?php } ?>

   </td>
  </tr>
</table>
</body>
</html>
