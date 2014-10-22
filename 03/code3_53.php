<?php
	function more_args()
	{
		$args = func_get_args();
		foreach($args as $current_arg){
			echo $current_arg . PATH_SEPARATOR;
							/* PATH_SEPARATOR是路径分隔符常量 */
		}
	}
	more_args("A", "B", "C");		//在Windows中输出“A;B;C;”
?>
