<?php
	//����
	define("MAGIC_QUOTES_GPC", get_magic_quotes_gpc() );
	
	//�����ݴ�����
	function html2text($html){
		if(MAGIC_QUOTES_GPC){
			$str = stripslashes($html);
		}
		return htmlspecialchars($str);
	}
?>
