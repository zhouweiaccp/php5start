<?php
	$fruits = array ("lemon", "orange", "banana", "apple");
	sort ($fruits);				//��������
	echo "<p>�������У�";
	echo join(", ", $fruits);
	/* ������Ϊ���������У�apple, banana, lemon, orange��*/

	rsort ($fruits);				//��������
	echo "<p>�������У�";
	echo join(", ", $fruits);
	/* ������Ϊ���������У�orange, lemon, banana, apple��*/
?>
