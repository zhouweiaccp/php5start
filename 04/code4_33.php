<?php
	$text = '<p>段落标记：<b>粗体</b>字</p>

<!-- 注释文字 -->
其他的文字，<i>斜体</i>字';
	echo strip_tags($text);
	echo "\n-------\n";

	//允许标签<i>，<b>
	echo strip_tags($text, '<i><b>');
?>
