<?php
	$files = array ("pic1.gif", "pic10.gif", "pic2.gif", "pic12.gif", "pic.gif");

	function cmp_file($a, $b){
		return strnatcmp($a, $b);	//����Ȼ���򡱷��Ƚ��ַ���
	}
	
	usort ($files, "cmp_file");		//�Զ��巽������
	echo "<p>�Զ�������";
	echo join(", ", $files);
	//������Ϊ���Զ�������pic.gif, pic1.gif, pic2.gif, pic10.gif, pic12.gif��
?>
