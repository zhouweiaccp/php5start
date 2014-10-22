<?php
	//定义
	define("MAGIC_QUOTES_GPC", get_magic_quotes_gpc() );
	
	//表单数据处理函数
	function html2text($html){
		if(MAGIC_QUOTES_GPC){
			$str = stripslashes($html);
		}
		return htmlspecialchars($str);
	}
?>
