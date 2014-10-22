<?php
	$fp = fopen($fname, "w+");
	flock($fp, LOCK_EX + LOCK_NB);
	fwrite($fp, "Some thing wrote\n");
	flock($fp, LOCK_UN + LOCK_NB);
	fclose();
?>
