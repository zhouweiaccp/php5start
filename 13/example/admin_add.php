<?php
require_once 'common.php';
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�������::������</title>
</head>

<body>
<h2>�������::������</h2>
<?php
if($_POST['submit']){

	$rs = $db->Execute("SELECT * FROM SoftwareLib WHERE id=1");
	if($rs){
		$record['softname'] = $_POST['softname'];
		$record['content'] = $_POST['content'];
		$record['postdate'] = $db->DBDate(time());
		$insert_query = $db->GetInsertSQL($rs, $record);
		$rs = $db->Execute($insert_query);
		echo "��Ӽ�¼�ɹ���";
	}else{
		echo "��Ӽ�¼ʧ�ܣ�";
	}
	echo "<br>", url("admin_list.php", "����");
}else{
?>
	<form action="admin_add.php" method="post">
	<p>������ƣ�<input name="softname" size="40" value="" /></p>
	<p>�������ģ�<textarea name="content" cols="40" rows="5"></textarea></p>
	<p><input type="submit" name="submit"></p>
	</form>
<?php
}
?>
</body>
</html>
