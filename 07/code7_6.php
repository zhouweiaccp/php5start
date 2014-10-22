<?php
	$full_path = "/home/tom/public_html/index.php";

	//返回路径数组
	$path = pathinfo ($full_path);     //$file的值为“index.php”

	echo $path["dirname"] . "\n";
	echo $path["basename"] . "\n";
	echo $path["extension"] . "\n";
?>
