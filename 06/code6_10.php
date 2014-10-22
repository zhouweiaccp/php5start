<?php
	/* 校验邮件地址 */
	function checkMail($email)
	{
		//用户名，由“\w”格式字符、“-”或“.”组成
		$email_name	= "\w|(\w[-.\w]*\w)";

		//域名中的第一段，规则和用户名类似，不包括点号“.”
		$code_at		= "@";
		$per_domain	= "\w|(\w[-\w]*\w)";

		//域名中间的部分，至多两段
		$mid_domain	= "(\." .$per_domain. "){0,2}";	

		//域名的最后一段，只能为“.com”、“.org”或“.net”
		$end_domain	= "(\.(com|net|org))";		

		$rs = preg_match(
			  "/^{$email_name}@{$per_domain}{$mid_domain}{$end_domain}$/",
			  $email
			 );
		return (bool)$rs;
	}

	//测试，下面均返回成功
	var_dump( checkMail("root@localhost") );
	var_dump( checkMail("Frank.Roulan@esun.edu.org") );
	var_dump( checkMail("Tom.024-1234@x-power_1980.mail-address.com") );
?>
