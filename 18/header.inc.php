<html>
<head>
<meta name="keywords" content="留言本" />
<meta name="Description" content="PHP留言本" />
<meta http-equiv=Content-Type content="text/html; charset=gb2312" />
<title>酷虫留言本 - Dreamfly 留言本</title>

<?php
//当样式信息不存在，或者改变样式时
//重新取得样式信息
if(!($_SESSION['skinCss'] && $_SESSION['skinId'] && $_SESSION['skinName']) || isset($_GET['style']))
{
	//选择样式
	$style_id = intval($_GET['style']);
	$result = mysql_query("SELECT * FROM styles WHERE id='$style_id' LIMIT 1");
	$row = mysql_fetch_array($result);

	//根据查询结果，取得风格样式数据
	if($row)
	{
		$_SESSION['skinId'] = $row['id'];        //样式ID
		$_SESSION['skinCss'] = $row['css'];      //样式CSS文件
		$_SESSION['skinName'] = $row['name'];    //样式风格名称
	}
	else
	{
		$_SESSION['skinId'] = 0;				 //默认样式ID
		$_SESSION['skinCss'] = 'Skin/style.css'; //默认样式CSS文件
		$_SESSION['skinName'] = '默认样式';      //默认样式
	}
}

//返回页面风格信息
$style_id = $_SESSION['skinId'];
$style_css = $_SESSION['skinCss'];
$style_name = $_SESSION['skinName'];

?>
<link rel="stylesheet" type="text/css" href="<?php echo $style_css ?>" />
<style type="text/css">
	.booktext {TABLE-LAYOUT: fixed; WORD-BREAK: break-all;
		WORD-WRAP: break-word; overflow: hidden; width:550px;}
</style>
</head>
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0>
<center>
<div align=center>
<!-- Header -->
<table border=0 cellpadding=0 cellspacing=0 width=730>
  <tr>
    <td class=MenuBar_B rowspan=8 width=1></td>
    <td height=8 class=MenuBar_B></td>
    <td class=MenuBar_B rowspan=8 width=1></td>
  </tr>
  <tr><td height=2></td></tr>
  <tr><td height=1 class=MenuBar_B></td></tr>
  <tr>
    <td height=74>
	<table border=0 cellpadding=0 cellspacing=0 width=100%>
    <tr>
      <td>&nbsp;<img src="images/logo.gif" width=225 height=60 alt="酷虫留言本"></td>
      <td align=right>&nbsp;
</td>
      </tr>
    </table></td>
  </tr>
  <tr><td height=1 class=MenuBar_B></td></tr>
  <tr><td height=2></td></tr>
  <tr><td height=6 class=MenuBar_B></td></tr>
  <tr>
    <td>
	<table border=0 width=728 cellspacing=0 cellpadding=0 class=MenuBar>
    <tr>
      <td valign=middle id=MenuBar><div>&nbsp; &nbsp;

<a href="list.php">返回首页</a> ┊

<?php
	//根据管理员登录与否，输出不同的链接
	if($_SESSION['isAdmin'])
	{
	 	echo '<a href="login_post.php?logout=1">退出管理</a>';
	}
	else
	{
		echo '<a href="login.php">登录管理</a>';
	}
?>
┊ <a href="help.php">使用帮助</a></div></td>
      <td align=right id=MenuBar>
	  样式选择
  	<select id="selStyle" size=1 name="style" style="width:110px"
		onchange="location.href='?style=' +this.options[selectedIndex].value;">
		<option value="0">默认样式</option>
	<?php
		//查询风格样式记录
		$result = mysql_query("SELECT * FROM styles WHERE 1=1 ORDER BY name");
		//输出样式
		while($row = mysql_fetch_array($result))
		{
			if($style_id == $row['id'])
				$checked = ' selected';
			else
				$checked = '';

			echo "\n";
			echo '<option value="'.$row['id'].'"' .$checked. '>'.$row['name'].'</option>';
		}
	?>
	</select>
	  </td>
    </tr>
    </table></td>
  </tr>
</table>
<br />

<!--头部信息-->
<table border=0 cellpadding=0 cellspacing=0 width=730 height=45>
<tr>
  <td valign=top></td>
  <td align=right valign=top>
  <img src="images/write.gif" height=32 width=32 border="0">
  					<a href="write.php"><strong>签写留言</strong></a>
  <img src="images/system.gif" height=32 width=32 border="0">
<?php
	//根据管理员登录与否，输出不同的链接
	if($_SESSION['isAdmin'])
	{
	 	echo '<a href="login_post.php?logout=1"><strong>退出管理</strong></a>';
	}
	else
	{
		echo '<a href="login.php"><strong>登录管理</strong></a>';
	}
?>
  </strong></a>&nbsp;</td>
</tr>
</table>
	<!--头部文件结束，正文开始部分-->
