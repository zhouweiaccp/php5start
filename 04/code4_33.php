<?php
	$text = '<p>�����ǣ�<b>����</b>��</p>

<!-- ע������ -->
���������֣�<i>б��</i>��';
	echo strip_tags($text);
	echo "\n-------\n";

	//�����ǩ<i>��<b>
	echo strip_tags($text, '<i><b>');
?>
