<?php
	$full_path = "/home/tom/public_html/index.php";

	//����·������
	$path = pathinfo ($full_path);     //$file��ֵΪ��index.php��

	echo $path["dirname"] . "\n";
	echo $path["basename"] . "\n";
	echo $path["extension"] . "\n";
?>
