<?php
	include(ROOT."lib/adodb/adodb.inc.php");		//��adodb�Ľӿ��ļ�����
	function getDBConnect() {						//������DB���ӵĺ���������������ҳʹ��
		global $conn;								//�õ��ⲿ��$conn����
		if(!$conn) {									//���û�����������˵��û��DB����
			$conn = &ADONewConnection('mysql');	//ʹ��ADODB��ADONewConnection��������
			$conn->Connect("localhost","root","12347890","category");	//ִ������
		}
		return $conn;								//���õ���DB����ʵ������
	}
?>