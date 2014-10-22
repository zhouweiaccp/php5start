<?php
	$template = <<< TPL
<table border=1>
	<tr bgcolor="%bgcolor1%">
		<td>line 1</td></tr>
	<tr bgcolor="%bgcolor2%">
		<td>line 2</td></tr>
	<tr bgcolor="%bgcolor1%">
		<td>line 3</td></tr>
	<tr bgcolor="%bgcolor2%">
		<td>line 4</td></tr>
</table>
TPL;
	$template = str_replace("%bgcolor1%", "#FFCCEE", $template);
	$template = str_replace("%bgcolor2%", "#339966", $template);
	echo $template;
?>
