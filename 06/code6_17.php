<?php
	//�����ļ�UBBCode.php
	Include  "UBBCode.php";
?>
<html> 
<head>
<title>UBB����Ĳ���</title>
</head>
<body> 
<?php
  if($_POST['title'])
  {
  	echo "<p>���⣺";
  	echo htmlspecialchars($_POST['title']);
  	echo "</p>";
  }
  
  if($_POST['content'])
  {
  	echo "<p>���ģ�";
  	echo nl2br(converUBB($_POST['content']));
  	echo "</p>";
  }
?>
<hr>
<form action="" method="POST">
<p>���⣺
	<input type="text" name="title" size="40" value="<?php echo htmlspecialchars($_POST['title']) ?>">
</p>
<p>���ģ�
	<textarea cols=40 rows=8 name="content"><?php echo htmlspecialchars($_POST['content']) ?>
	</textarea>
</p>
<p><input type="submit" value="�ύ"></p>
</form>
</body>
</html>
