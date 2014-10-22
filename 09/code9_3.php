<?php
define("DEBUG_SEND", 1);			//调试请求信息
define("DEBUG_RCPT", 2);			//调试响应信息

Class Smtp_Mail
{
	var $from;						//送信人
	var $to;						//收件人
	var $subject;					//主题
	var $body;					//正文

	var $smtp		 = 'localhost';		//SMTP服务器
	var $port		 = 25;			//SMTP服务端口号
	var $auth		 = false;			//是否允许身份验证
	var $username	 = '';				//SMTP用户账号
	var $password	 = '';				//SMTP用户密码
	var $debug	 = true;			//调试信息

	var $issend	 = false;			//发信状态（成功true，失败false）
	var $fp		 = null;			//套接字连接句柄

	/** SMTP_Mail构造函数 **/
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

	/** 用SMTP发送邮件 **/
	function Send()
	{
		//连接服务器
		$this->connect();

		//向服务器发送请求
		if($this->auth)
		{
			//需要身份认证
			$this->_put('HELO', 'taodoor.com', 250);
			$this->_put('AUTH LOGIN', '', 334);

			//base64编码
			$this->_put(base64_encode($this->username), '', 334); 
			$this->_put(base64_encode($this->password), '', 235); 
		}else{
			//无需认证
			$this->_put('HELO', 'taodoor.com', 250);
		}

		//送信人
		$this->_put('MAIL FROM:', "<{$this->from}>", 250);
		
		//收件人
		if(!is_array($this->to))
		{
			$this->to = array($this->to);
		}
		
		//循环处理邮件地址
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

		//邮件正文
		$this->_put('DATA', '', 354);
		$stream	 = "From: " .$this->from. "\r\n";
		$stream	.= "To: \"" .join('", "', $this->to). "\" \r\n";
		$stream	.= "Subject: " .$this->subject. "\r\n";
		$stream	.= "Date: " .date('r'). "\r\n";		//RFC 822 格式的日期 
										//如：Thu, 21 Dec 2000 16:01:07 +0200
		$stream	.= "Mime-Version: 1.0\r\n";
		$stream	.= "Content-Type: text/plain; charset=\"gb2312\"\r\n";
		$stream	.= rtrim($this->body, ".\n\r");	//删除最后的“.”及回车换行符号
		$stream	.= "\r\n.";
		$this->_put ($stream, '', 250);

		//退出
		$this->_put ('QUIT', '', 221);
		
		$this->issend = true;
		@fclose($this->fp);
	}
	
	/** 返回SMTP发信的状态 **/
	function stat()
	{
		return $this->issend;
	}

	/** 连接SMTP发信服务器 **/
	function connect() 
	{
		$this->fp = fsockopen($this->smtp, $this->port, $errno, $errstr, 30)
			or die("<p>SMTP服务器连接失败！</p>");

		$rcpt = fgets($this->fp);
		$this->_debug($rcpt, DEBUG_RCPT);

		if(substr($rcpt,0,3) != 220){
			die("<p>SMTP服务器遇到错误！</p>");
		}
	}

	/** 
	   发送套接字命令、接受响应
	   参数： $command，命令
		      $args，参数
			 $code，期望的返回值
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
				die("<p>邮件发送失败（希望的响应值为`$code`）！</p>");
			}
        }else{
			die("<p>远程SMTP服务器关闭！</p>");
	   }
    }
    
    /** 调试信息 **/
    function _debug($data, $type)
    {
	  if($this->debug == true){
	    	echo "<pre>";
		$data = htmlspecialchars(trim($data));
	    	switch($type){
		   case DEBUG_RCPT:
		    	echo "<font color=#00F>→</font>" .$data;
		   break;
		   case DEBUG_SEND:
		     echo "<font color=#F00>←</font><b>" .$data. "</b>";
		   break;
	    	}
    	 }
    }

	/** 检查邮件地址的合法性 **/
	function checkMail($mail)
    {
		return preg_match("/^[\w-]+@[\w-]+(\.[\w-]+){0,3}$/", $mail);
	}
}
?>
