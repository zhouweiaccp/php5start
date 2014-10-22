<?php
	$file = "/path/to/file";
	if (is_dir($file)) { 
		rmdir ($file);			//É¾³ýÄ¿Â¼
	} else {
		unlink ($file);			//É¾³ýÎÄ¼þ
	}
?>
