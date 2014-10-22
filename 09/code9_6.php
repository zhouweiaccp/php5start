<?php 
define("DEBUG_SEND", 1);			//����������Ϣ
define("DEBUG_RCPT", 2);			//������Ӧ��Ϣ

class POP3_Mail
{ 
	var $pop3		 = 'localhost';		//POP3������
	var $port		 = 110;			//POP3����˿ں�
	var $username	 = '';				//POP3�û��˺�
	var $password	 = '';				//POP3�û�����
	var $debug	 = false;			//������Ϣ

	var $last_command = '';			//����״̬
	var $fp		 = null;			//�׽������Ӿ��

	/** POP3_Mail���캯�� **/
	function POP3_Mail($mailconf=null) 
	{
		if(isset($mailconf['pop3']))		$this->smtp	 = $mailconf['pop3'];
		if(isset($mailconf['port']))		$this->port	 = $mailconf['port'];
		if(isset($mailconf['username']))	$this->username  = $mailconf['username'];
		if(isset($mailconf['password']))	$this->password  = $mailconf['password'];
		if(isset($mailconf['debug']))	$this->debug	 = $mailconf['debug'];
	}

	/** ����POP3���ŷ����� **/
	function connect()
	{
		$this->fp = fsockopen($this->pop3, $this->port, $errno, $errstr, 30)
			or die("<p>POP3����������ʧ�ܣ�</p>");

		$rcpt = $this->_get();
		if(!$rcpt){
			die("<p>POP3��������������</p>");
		}
	}
	
	/** �û���֤ **/
	function auth()
	{
		$this->_put('USER', $this->username);
		$this->_get();
		$this->_put('PASS', $this->password);
		return $this->_get();
	}
	
	/** ����ʼ������� **/
	function getMailNumber()
	{
		$this->_put('STAT');
		if($rcpt = $this->_get()){
			list($stat, $number, $size) = split(" ", $rcpt);
		}
		return $number;
	}
	
	/** ����ʼ�ȫ�� **/
	function getMail($id)
	{
		$this->_put('RETR', $id);
		if($content = $this->_get()){
			//ɾ����һ�У����ơ�+OK 2091 octets������Ϣ
			list($first, $last) = split("\n", $content, 2);
			return $last;
		}else{
			return false;
		}
	}

	/** ���Ҫɾ�����ʼ� **/
	function delMail($id)
	{
		$this->_put('DEL', $id);
		return (bool)$this->_get();
	}

	/** �˳� **/
	function close()
	{
		$this->_put('QUIT', $id);
		$this->_get();
		fclose($this->fp);
	}

	/** ������Ӧ�����ؽ�� **/
	function _get()
	{
		//���յ�һ�����ݣ����ݲ�ͬ��״ֵ̬��+OK��-ERR��
		//���н�һ������
		$rcpt = fgets($this->fp);
		if(substr($rcpt, 0, 3)=='+OK'){
			//����LIST��RETR��TOP��������ܷ��ض��н��
			//ֻ�ܰѡ�.����Ϊ������Ϣ�Ľ�����־����������
			//���ֻ����һ�н��
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
	
	/** �����׽������� **/
	function _put($command, $args='')
	{
		$this->last_command = strtoupper($command);
		$send = (empty($args)) 
			 ? $command . "\r\n" : $command . ' ' .$args. "\r\n";

        if (is_resource($this->fp)) {
            fputs($this->fp, $send);
			$this->_debug($send, DEBUG_SEND);
        }else{
			die("<p>Զ��POP3�������رգ�</p>");
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
		    	echo "<font color=#0000FF>��</font>" .$data;
		   break;
		   case DEBUG_SEND:
		     echo "<font color=#FF0000>��</font><b>" .$data. "</b>";
		   break;
	    	}
    	 }
    }

} 
?>
