<?php
$text =" [b]粗体文字1[/b]
	正常文字	[b]粗体文字2[/b] ";

echo preg_replace("/\[b\](.+)\[\/b\]/is", '<b>\\1</b>', $text);

/*------输出的结果-------
<b>粗体文字1</b>
	正常文字	<b>粗体文字2</b>
*/

?>
