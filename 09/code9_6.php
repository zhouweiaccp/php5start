<?php 
define("DEBUG_SEND", 1);			//调试请求信息
define("DEBUG_RCPT", 2);			//调试响应信息

class POP3_Mail
{ 
	var $pop3		 = 'localhost';		//POP3服务器
	var $port		 = 110;			//POP3服务端口号
	var $username	 = '';				//POP3用户账号
	var $password	 = '';				//POP3用户密码
	var $debug	 = false;			//调试信息

	var $last_command = '';			//发信状态
	var $fp		 = null;			//套接字连接句柄

	/** POP3_Mail构造函数 **/
	function POP3_Mail($mailconf=null) 
	{
		if(isset($mailconf['pop3']))		$this->smtp	 = $mailconf['pop3'];
		if(isset($mailconf['port']))		$this->port	 = $mailconf['port'];
		if(isset($mailconf['username']))	$this->username  = $mailconf['username'];
		if(isset($mailconf['password']))	$this->password  = $mailconf['password'];
		if(isset($mailconf['debug']))	$this->debug	 = $mailconf['debug'];
	}

	/** 连接POP3发信服务器 **/
	function connect()
	{
		$this->fp = fsockopen($this->pop3, $this->port, $errno, $errstr, 30)
			or die("<p>POP3服务器连接失败！</p>");

		$rcpt = $this->_get();
		if(!$rcpt){
			die("<p>POP3服务器遇到错误！</p>");
		}
	}
	
	/** 用户认证 **/
	function auth()
	{
		$this->_put('USER', $this->username);
		$this->_get();
		$this->_put('PASS', $this->password);
		return $this->_get();
	}
	
	/** 获得邮件总数量 **/
	function getMailNumber()
	{
		$this->_put('STAT');
		if($rcpt = $this->_get()){
			list($stat, $number, $size) = split(" ", $rcpt);
		}
		return $number;
	}
	
	/** 获得邮件全文 **/
	function getMail($id)
	{
		$this->_put('RETR', $id);
		if($content = $this->_get()){
			//删除第一行：类似“+OK 2091 octets”的信息
			list($first, $last) = split("\n", $content, 2);
			return $last;
		}else{
			return false;
		}
	}

	/** 标记要删除的邮件 **/
	function delMail($id)
	{
		$this->_put('DEL', $id);
		return (bool)$this->_get();
	}

	/** 退出 **/
	function close()
	{
		$this->_put('QUIT', $id);
		$this->_get();
		fclose($this->fp);
	}

	/** 接受响应，返回结果 **/
	function _get()
	{
		//接收第一行数据，根据不同的状态值（+OK或-ERR）
		//进行进一步处理
		$rcpt = fgets($this->fp);
		if(substr($rcpt, 0, 3)=='+OK'){
			//对于LIST、RETR、TOP等命令，可能返回多行结果
			//只能把“.”作为多行消息的结束标志。对于其它
			//命令，只返回一行结果
			if(in_array($this->last_command, array('LIST','RETR','TOP')))
			{
				do{
					$tmp_rcpt = fgets($this->fp);
					if (trim($tmp_rcpt, "\r\n")=='.'){ 
					    break; 
					}
					$rcpt .= $tmp_rcpt;
				}while(1);
			}
			$this->_debug($rcpt, DEBUG_RCPT);
			return $rcpt;
		}else{//-ERR
			$this->_debug($rcpt, DEBUG_RCPT);
			return false;
		}
	}
	
	/** 发送套接字命令 **/
	function _put($command, $args='')
	{
		$this->last_command = strtoupper($command);
		$send = (empty($args)) 
			 ? $command . "\r\n" : $command . ' ' .$args. "\r\n";

        if (is_resource($this->fp)) {
            fputs($this->fp, $send);
			$this->_debug($send, DEBUG_SEND);
        }else{
			die("<p>远程POP3服务器关闭！</p>");
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
		    	echo "<font color=#0000FF>→</font>" .$data;
		   break;
		   case DEBUG_SEND:
		     echo "<font color=#FF0000>←</font><b>" .$data. "</b>";
		   break;
	    	}
    	 }
    }

} 
?>
