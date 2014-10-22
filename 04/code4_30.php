<?php
	$str = "Do you like Tom\'s new story?";
	echo stripslashes($str);		//Êä³ö¡°Do you like Tom's new story?¡±

	$str = 'Have you ever see the film "Tea"?';
	echo addslashes($str);		//Êä³ö¡°Have you ever see the film \"Tea\"?¡±
?>
