<?php
define("DEBUG_SEND", 1);			//����������Ϣ
define("DEBUG_RCPT", 2);			//������Ӧ��Ϣ

Class Smtp_Mail
{
	var $from;						//������
	var $to;						//�ռ���
	var $subject;					//����
	var $body;					//����

	var $smtp		 = 'localhost';		//SMTP������
	var $port		 = 25;			//SMTP����˿ں�
	var $auth		 = false;			//�Ƿ����������֤
	var $username	 = '';				//SMTP�û��˺�
	var $password	 = '';				//SMTP�û�����
	var $debug	 = true;			//������Ϣ

	var $issend	 = false;			//����״̬���ɹ�true��ʧ��false��
	var $fp		 = null;			//�׽������Ӿ��

	/** SMTP_Mail���캯�� **/
	function Smtp_Mail($mailinfo, $mailconf =null) 
	{
		if(isset($mailinfo['to']))		$this->to		 = $mailinfo['to'];
		if(isset($mailinfo['from']))		$this->from	 = $mailinfo['from'];
		if(isset($mailinfo['subject']))	$this->subject	 = $mailinfo['subject'];
		if(isset($mailinfo['body']))		$this->body	 = $mailinfo['body'];

		if(isset($mailconf['smtp']))		$this->smtp	 = $mailconf['smtp'];
		if(isset($mailconf['port']))		$this->port	 = $mailconf['port'];
		if(isset($mailconf['auth']))		$this->auth	 = $mailconf['auth'];
		if(isset($mailconf['username']))	$this->username  = $mailconf['username'];
		if(isset($mailconf['password']))	$this->password  = $mailconf['password'];
		if(isset($mailconf['debug']))	$this->debug	 = $mailconf['debug'];
	}

	/** ��SMTP�����ʼ� **/
	function Send()
	{
		//���ӷ�����
		$this->connect();

		//���������������
		if($this->auth)
		{
			//��Ҫ�����֤
			$this->_put('HELO', 'taodoor.com', 250);
			$this->_put('AUTH LOGIN', '', 334);

			//base64����
			$this->_put(base64_encode($this->username), '', 334); 
			$this->_put(base64_encode($this->password), '', 235); 
		}else{
			//������֤
			$this->_put('HELO', 'taodoor.com', 250);
		}

		//������
		$this->_put('MAIL FROM:', "<{$this->from}>", 250);
		
		//�ռ���
		if(!is_array($this->to))
		{
			$this->to = array($this->to);
		}
		
		//ѭ�������ʼ���ַ
		foreach($this->to as $key=>$to)
		{
			$to = trim($to);
			if($this->checkMail($to)) {
				$this->_put('RCPT TO:', "<{$to}>", 250);
				$this->to[$key] = $to;
			}else{
				unset($this->to[$key]);
			}
		}

		//�ʼ�����
		$this->_put('DATA', '', 354);
		$stream	 = "From: " .$this->from. "\r\n";
		$stream	.= "To: \"" .join('", "', $this->to). "\" \r\n";
		$stream	.= "Subject: " .$this->subject. "\r\n";
		$stream	.= "Date: " .date('r'). "\r\n";		//RFC 822 ��ʽ������ 
										//�磺Thu, 21 Dec 2000 16:01:07 +0200
		$stream	.= "Mime-Version: 1.0\r\n";
		$stream	.= "Content-Type: text/plain; charset=\"gb2312\"\r\n";
		$stream	.= rtrim($this->body, ".\n\r");	//ɾ�����ġ�.�����س����з���
		$stream	.= "\r\n.";
		$this->_put ($stream, '', 250);

		//�˳�
		$this->_put ('QUIT', '', 221);
		
		$this->issend = true;
		@fclose($this->fp);
	}
	
	/** ����SMTP���ŵ�״̬ **/
	function stat()
	{
		return $this->issend;
	}

	/** ����SMTP���ŷ����� **/
	function connect() 
	{
		$this->fp = fsockopen($this->smtp, $this->port, $errno, $errstr, 30)
			or die("<p>SMTP����������ʧ�ܣ�</p>");

		$rcpt = fgets($this->fp);
		$this->_debug($rcpt, DEBUG_RCPT);

		if(substr($rcpt,0,3) != 220){
			die("<p>SMTP��������������</p>");
		}
	}

	/** 
	   �����׽������������Ӧ
	   ������ $command������
		      $args������
			 $code�������ķ���ֵ
	**/
	function _put($command, $args, $code)
	{
        $send = (empty($args))
        	? $command . "\r\n" : $command . ' ' .$args. "\r\n";

        if (is_resource($this->fp)) {
            fputs($this->fp, $send);
			$rcpt = fgets($this->fp);
			$this->_debug($send, DEBUG_SEND);
			$this->_debug($rcpt, DEBUG_RCPT);
			if(substr($rcpt,0,3) != $code){
				die("<p>�ʼ�����ʧ�ܣ�ϣ������ӦֵΪ`$code`����</p>");
			}
        }else{
			die("<p>Զ��SMTP�������رգ�</p>");
	   }
    }
    
    /** ������Ϣ **/
    function _debug($data, $type)
    {
	  if($this->debug == true){
	    	echo "<pre>";
		$data = htmlspecialchars(trim($data));
	    	switch($type){
		   case DEBUG_RCPT:
		    	echo "<font color=#00F>��</font>" .$data;
		   break;
		   case DEBUG_SEND:
		     echo "<font color=#F00>��</font><b>" .$data. "</b>";
		   break;
	    	}
    	 }
    }

	/** ����ʼ���ַ�ĺϷ��� **/
	function checkMail($mail)
    {
		return preg_match("/^[\w-]+@[\w-]+(\.[\w-]+){0,3}$/", $mail);
	}
}
?>
