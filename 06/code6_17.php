<?php
	//引用文件UBBCode.php
	Include  "UBBCode.php";
?>
<html> 
<head>
<title>UBB代码的测试</title>
</head>
<body> 
<?php
  if($_POST['title'])
  {
  	echo "<p>标题：";
  	echo htmlspecialchars($_POST['title']);
  	echo "</p>";
  }
  
  if($_POST['content'])
  {
  	echo "<p>正文：";
  	echo nl2br(converUBB($_POST['content']));
  	echo "</p>";
  }
?>
<hr>
<form action="" method="POST">
<p>标题：
	<input type="text" name="title" size="40" value="<?php echo htmlspecialchars($_POST['title']) ?>">
</p>
<p>正文：
	<textarea cols=40 rows=8 name="content"><?php echo htmlspecialchars($_POST['content']) ?>
	</textarea>
</p>
<p><input type="submit" value="提交"></p>
</form>
</body>
</html>
