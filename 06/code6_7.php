<?php
	//�ַ���
	$string = "Name: {Name}<br>\nEmail: {Email}<br>\nAddress: {Address}<br>\n";

	//ģʽ
	$patterns =array(
			"/{Address}/",
			"/{Name}/",
			"/{Email}/"
	);

	//�滻�ִ�
	$replacements = array (
			"No.5, Wilson St., New York, U.S.A",
			"Thomas Ching",
			"tom@emailaddress.com",
	);

	//���ģʽ�滻���
	print preg_replace($patterns, $replacements, $string);
?>
