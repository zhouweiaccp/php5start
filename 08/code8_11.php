<?php
	$filename = "img/photo.jpg";
	list($width, $height, $type, $attrib) = getimagesize($filename);
	echo "<img src=\"$filename\" $attrib />";
?>
