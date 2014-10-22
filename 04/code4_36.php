<?php
	//如果要访问ftp://www.taodoor.com/我的文档/PHP教程.doc
	//应该使用下面的方法
	echo '<a href="ftp://www.taodoor.com/',
		  rawurlencode("我的文档"), '/', rawurlencode("PHP教程.doc"),
		 '">Tom的目录</a>';
?>
