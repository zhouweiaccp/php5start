<?php
	$seek  = array();
	$text   = "I have a dream that one day I can make it. So just do it, nothing is impossible!";
	
	//���ַ������հף������Ų�֣�ÿ������Ҳ���ܸ��пո�
	$words = preg_split("/[.,;!\s']\s*/", $text);
	foreach($words as $val)
	{
		$seek[strtolower($val)] ++;
	}

	echo "���д�Լ" .count($words). "�����ʡ�";
	echo "���й���" .$seek['i']. "�����ʡ�I����";
?>
