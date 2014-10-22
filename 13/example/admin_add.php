<?php
require_once 'common.php';
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理界面::软件添加</title>
</head>

<body>
<h2>管理界面::软件添加</h2>
<?php
if($_POST['submit']){

	$rs = $db->Execute("SELECT * FROM SoftwareLib WHERE id=1");
	if($rs){
		$record['softname'] = $_POST['softname'];
		$record['content'] = $_POST['content'];
		$record['postdate'] = $db->DBDate(time());
		$insert_query = $db->GetInsertSQL($rs, $record);
		$rs = $db->Execute($insert_query);
		echo "添加记录成功！";
	}else{
		echo "添加记录失败！";
	}
	echo "<br>", url("admin_list.php", "返回");
}else{
?>
	<form action="admin_add.php" method="post">
	<p>软件名称：<input name="softname" size="40" value="" /></p>
	<p>描述正文：<textarea name="content" cols="40" rows="5"></textarea></p>
	<p><input type="submit" name="submit"></p>
	</form>
<?php
}
?>
</body>
</html>
