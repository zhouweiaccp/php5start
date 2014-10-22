<?php
	if(isset($_POST['submit'])){
		if( ! trim($_POST['title']) ){					//判断标题是否为空
			echo "<p><font color=red>标题没有填写！</font>";
		}elseif( ! trim($_POST['content']) ){ 			//判断内容是否为空
			echo "<p><font color=red>正文没有填写！</font>";
		}else{
			echo $_POST['title'];
			echo "<hr>";
			echo $_POST['content'];
		}
	}
?>
<form method="post" action="">
	标题：<input type="text" name="title" value="  ">
	正文：<textarea name="content"></textarea>
	<input type="submit" name="submit" value="提交">
</form>
