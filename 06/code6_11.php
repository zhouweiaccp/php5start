<?php
	/* 校验URL地址 */
	function checkDomain($domain)
	{
		return ereg("^(http|ftp)s? ://(www\.)?.+(com|net|org)$", $domain);
	}
	
	$rs = checkDomain ("www.taodoor.com");				//返回假
	$rs = checkDomain ("http://www.taodoor.com");		//返回真
?>
