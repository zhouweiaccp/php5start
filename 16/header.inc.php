<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=gb2312">
<title>�Ե�������̳</title>
<style type="text/css" media="all">
body { margin:0px; padding:0px; font:12px verdana, arial, helvetica, sans-serif;}
td, legend{ font-size:14px; line-height:16px;}
p { font-size:12px;}

/* HTMLͷ��ʽ */
#Header { margin:10px 0px 10px 0px; padding:10px 8px 8px 20px; border-style:solid; 
	border-color:black; background-color:#eee; font-size:14px; height:14px;
}

/* HTML����������ʽ */
#Content { margin:5px; width:100%; padding:10px;}
</style>
</head>

<body>
<h1>�Ե�������̳</h1>

<!-- ͷ��ʼ -->
<div id="Header">
<?php 
  //�ж��û��Ƿ��¼���Ӷ���ʾ��ͬ�ĵ�������
  if($_SESSION['username']) 
  { 
?>
	<!-- �û���¼��ĵ����� -->
	<strong><?php echo $_SESSION['username']; ?>����ӭ��¼</strong> | &nbsp;
	<a href="main_forum.php">��ҳ</a> | &nbsp;
	<a href="edit_profile.php">��������</a> | &nbsp;
	<a href="logoff_user.php">�˳���̳</a>

<?php } else { ?>

	<!-- �û�δ��¼�ĵ����� -->
	<a href="main_forum.php">��ҳ</a> | &nbsp;
	<a href="create_user.php">ע��</a> | &nbsp;
	<a href="logon_form.php">��¼</a>
<?php 
  }//�жϽ���
?>
	<br>
</div>
<!-- ͷ���� -->

<!-- �������ݿ�ʼ -->
<div id="Content">
