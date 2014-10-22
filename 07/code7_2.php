<?php
	$fstat = stat("/etc/passwd");
	print_r(array_slice($fstat, 13));
?>
