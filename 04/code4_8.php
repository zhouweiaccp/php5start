<?php
	if(isset($_POST['submit'])){
		if( ! trim($_POST['title']) ){					//�жϱ����Ƿ�Ϊ��
			echo "<p><font color=red>����û����д��</font>";
		}elseif( ! trim($_POST['content']) ){ 			//�ж������Ƿ�Ϊ��
			echo "<p><font color=red>����û����д��</font>";
		}else{
			echo $_POST['title'];
			echo "<hr>";
			echo $_POST['content'];
		}
	}
?>
<form method="post" action="">
	���⣺<input type="text" name="title" value="  ">
	���ģ�<textarea name="content"></textarea>
	<input type="submit" name="submit" value="�ύ">
</form>
