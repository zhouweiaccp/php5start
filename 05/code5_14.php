<?php
	$input_array = array('A', 'E', 'I', 'O', 'U');
	print_r(array_chunk($input_array, 3));
	print_r(array_chunk($input_array, 3, TRUE));
?>
