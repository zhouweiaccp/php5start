<?php
	if(isset($_POST['submit'])){		//�ύ��Ĵ���
		echo "<p>���⣺". htmlspecialchars(stripslashes($_POST['title']))."</p>\n";
		echo "<p>���ģ�". htmlspecialchars(stripslashes($_POST['content']))."</p>\n";
		echo "<a href=\"?\">����</a>\n";
	}else{						//�ύǰ��ҳ��
		//��...
	} 
?>
