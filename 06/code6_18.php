<?php
	//�������ļ�����ƥ��
	$filename = "\/[^\/]+\.(php|html|htm)\??";

	//���ļ�����������֮�ڣ���.*����ʾ�ļ������˵�������Ϣ
	$pattern  = "/\".*"  . $filename.  ".*\"/i";
	preg_match($pattern, $logline);
?>
