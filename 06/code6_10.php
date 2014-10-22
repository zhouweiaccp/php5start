<?php
	/* У���ʼ���ַ */
	function checkMail($email)
	{
		//�û������ɡ�\w����ʽ�ַ�����-����.�����
		$email_name	= "\w|(\w[-.\w]*\w)";

		//�����еĵ�һ�Σ�������û������ƣ���������š�.��
		$code_at		= "@";
		$per_domain	= "\w|(\w[-\w]*\w)";

		//�����м�Ĳ��֣���������
		$mid_domain	= "(\." .$per_domain. "){0,2}";	

		//���������һ�Σ�ֻ��Ϊ��.com������.org����.net��
		$end_domain	= "(\.(com|net|org))";		

		$rs = preg_match(
			  "/^{$email_name}@{$per_domain}{$mid_domain}{$end_domain}$/",
			  $email
			 );
		return (bool)$rs;
	}

	//���ԣ���������سɹ�
	var_dump( checkMail("root@localhost") );
	var_dump( checkMail("Frank.Roulan@esun.edu.org") );
	var_dump( checkMail("Tom.024-1234@x-power_1980.mail-address.com") );
?>
