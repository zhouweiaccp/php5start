<html>
<head>
	<title>HTML表单</title>
</head>
<body>

<?php
	if(isset($_POST['submit']))
	{
		//提交后的处理
		echo "<p>标题：".$_POST['title']."</p>\n";
		echo "<p>正文：".$_POST['content']."</p>\n";
		echo "<a href=\"?\">返回</a>\n";
	}else{						//提交前的页面
?>

<form action="" method="post">
	    标题：<input type="text" name="title" size=40>
	<br>正文：<textarea name="content" cols=40 rows=10></textarea>
	<br><input type="submit" name="submit" value="提交">
</form>
<?php } ?>

</body>
</html>
