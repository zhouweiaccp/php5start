<?php
	$str = "Do you like Tom\'s new story?";
	echo stripslashes($str);		//�����Do you like Tom's new story?��

	$str = 'Have you ever see the film "Tea"?';
	echo addslashes($str);		//�����Have you ever see the film \"Tea\"?��
?>
