<?php
	$title = "按钮";
	$question = "这是一个复杂的按钮么？";
	
	$button ="<input type=\"button\" value=\"" .$title. "\" onClick=\"javascript:confirm('" .$question. "')\" />";
	echo $button;

	/* 输出内容
		<input type="button" value="按钮" onClick="javascript:confirm('这是一个复杂的按钮么？')" />
	*/
?>
