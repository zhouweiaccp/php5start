<?php
	$files = array ("pic1.GIF", "Pic10.gif", "pIC2.gif", "pic12.gif", "pic.gif");	
	natsort($files);				//普通的“自然排序”
	print_r($files);
	
	natcasesort($files);			//忽略大小写的“自然排序”
	print_r($files);

	uasort($files, 'strcasecmp');	//另一种方式的“自然排序”的实现
							//也忽略大小写
	print_r($files);
?>
