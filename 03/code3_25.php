<?php
	/* 文件名：test_request.php */
	echo "<pre>";
	echo "GET: ";		print_r($_GET);			//GET方法的值
	echo "POST: ";		print_r($_POST);		//POST方法的值
	echo "REQUEST: ";	print_r($_REQUEST);	//包含了GET和POST方法的值
	echo "</pre>";
?>
<form action="test_request.php?id=1" method="POST">
    用户账号：<input type="text" name="id" value="2"><br>
    <input type="submit" name="submit" value="提交">
</form>
