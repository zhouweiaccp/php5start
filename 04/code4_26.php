<html>
<head>
	<title>HTML��</title>
</head>
<body>

<?php
	if(isset($_POST['submit']))
	{
		//�ύ��Ĵ���
		echo "<p>���⣺".$_POST['title']."</p>\n";
		echo "<p>���ģ�".$_POST['content']."</p>\n";
		echo "<a href=\"?\">����</a>\n";
	}else{						//�ύǰ��ҳ��
?>

<form action="" method="post">
	    ���⣺<input type="text" name="title" size=40>
	<br>���ģ�<textarea name="content" cols=40 rows=10></textarea>
	<br><input type="submit" name="submit" value="�ύ">
</form>
<?php } ?>

</body>
</html>
