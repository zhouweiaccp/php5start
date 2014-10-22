<?php
	/* 使用定界符定义一个字符串 */
	$string = <<<EOD
	<pre>
		Example of string spanning multiple lines,
		such as "Tom's house",
		using heredoc syntax.
		</pre>
EOD;
echo $string;
?>