<?php
	/* 校验邮政编码 */
	function checkZipcode($code)
	{
		//去掉多余的分隔符
		$code = preg_replace("/[\. -]/", "", $code);

		//包含一个6位的邮政编码
		if(preg_match("/^\d{6}$/", $code))
		{
			return true;
		}else{
			return false;
		}
	}

	$rs = checkZipCode("123456");					//返回真
?>
