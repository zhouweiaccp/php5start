<?php
	/* �ļ�����test_request.php */
	echo "<pre>";
	echo "GET: ";		print_r($_GET);			//GET������ֵ
	echo "POST: ";		print_r($_POST);		//POST������ֵ
	echo "REQUEST: ";	print_r($_REQUEST);	//������GET��POST������ֵ
	echo "</pre>";
?>
<form action="test_request.php?id=1" method="POST">
    �û��˺ţ�<input type="text" name="id" value="2"><br>
    <input type="submit" name="submit" value="�ύ">
</form>
