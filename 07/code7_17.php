<?php
	$tmp_handle = tmpfile();
	fwrite($tmp_handle, "write some data into tempfile.");	//写入临时数据
	fclose($tmp_handle); 							//临时文件关闭，同时被删除
?>
