<?php
	if(isset($_POST['submit'])){		//提交后的处理
		echo "<p>标题：". htmlspecialchars(stripslashes($_POST['title']))."</p>\n";
		echo "<p>正文：". htmlspecialchars(stripslashes($_POST['content']))."</p>\n";
		echo "<a href=\"?\">返回</a>\n";
	}else{						//提交前的页面
		//略...
	} 
?>
