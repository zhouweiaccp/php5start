<?php
	/* У��URL��ַ */
	function checkDomain($domain)
	{
		return ereg("^(http|ftp)s? ://(www\.)?.+(com|net|org)$", $domain);
	}
	
	$rs = checkDomain ("www.taodoor.com");				//���ؼ�
	$rs = checkDomain ("http://www.taodoor.com");		//������
?>
