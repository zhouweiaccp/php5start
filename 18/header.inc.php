<html>
<head>
<meta name="keywords" content="���Ա�" />
<meta name="Description" content="PHP���Ա�" />
<meta http-equiv=Content-Type content="text/html; charset=gb2312" />
<title>������Ա� - Dreamfly ���Ա�</title>

<?php
//����ʽ��Ϣ�����ڣ����߸ı���ʽʱ
//����ȡ����ʽ��Ϣ
if(!($_SESSION['skinCss'] && $_SESSION['skinId'] && $_SESSION['skinName']) || isset($_GET['style']))
{
	//ѡ����ʽ
	$style_id = intval($_GET['style']);
	$result = mysql_query("SELECT * FROM styles WHERE id='$style_id' LIMIT 1");
	$row = mysql_fetch_array($result);

	//���ݲ�ѯ�����ȡ�÷����ʽ����
	if($row)
	{
		$_SESSION['skinId'] = $row['id'];        //��ʽID
		$_SESSION['skinCss'] = $row['css'];      //��ʽCSS�ļ�
		$_SESSION['skinName'] = $row['name'];    //��ʽ�������
	}
	else
	{
		$_SESSION['skinId'] = 0;				 //Ĭ����ʽID
		$_SESSION['skinCss'] = 'Skin/style.css'; //Ĭ����ʽCSS�ļ�
		$_SESSION['skinName'] = 'Ĭ����ʽ';      //Ĭ����ʽ
	}
}

//����ҳ������Ϣ
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
      <td>&nbsp;<img src="images/logo.gif" width=225 height=60 alt="������Ա�"></td>
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

<a href="list.php">������ҳ</a> ��

<?php
	//���ݹ���Ա��¼��������ͬ������
	if($_SESSION['isAdmin'])
	{
	 	echo '<a href="login_post.php?logout=1">�˳�����</a>';
	}
	else
	{
		echo '<a href="login.php">��¼����</a>';
	}
?>
�� <a href="help.php">ʹ�ð���</a></div></td>
      <td align=right id=MenuBar>
	  ��ʽѡ��
  	<select id="selStyle" size=1 name="style" style="width:110px"
		onchange="location.href='?style=' +this.options[selectedIndex].value;">
		<option value="0">Ĭ����ʽ</option>
	<?php
		//��ѯ�����ʽ��¼
		$result = mysql_query("SELECT * FROM styles WHERE 1=1 ORDER BY name");
		//�����ʽ
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

<!--ͷ����Ϣ-->
<table border=0 cellpadding=0 cellspacing=0 width=730 height=45>
<tr>
  <td valign=top></td>
  <td align=right valign=top>
  <img src="images/write.gif" height=32 width=32 border="0">
  					<a href="write.php"><strong>ǩд����</strong></a>
  <img src="images/system.gif" height=32 width=32 border="0">
<?php
	//���ݹ���Ա��¼��������ͬ������
	if($_SESSION['isAdmin'])
	{
	 	echo '<a href="login_post.php?logout=1"><strong>�˳�����</strong></a>';
	}
	else
	{
		echo '<a href="login.php"><strong>��¼����</strong></a>';
	}
?>
  </strong></a>&nbsp;</td>
</tr>
</table>
	<!--ͷ���ļ����������Ŀ�ʼ����-->
