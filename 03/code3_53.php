<?php
	function more_args()
	{
		$args = func_get_args();
		foreach($args as $current_arg){
			echo $current_arg . PATH_SEPARATOR;
							/* PATH_SEPARATOR��·���ָ������� */
		}
	}
	more_args("A", "B", "C");		//��Windows�������A;B;C;��
?>
