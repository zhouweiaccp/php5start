<?php
	$str = '<b>Red Color</b>';
	echo htmlspecialchars ($str);		//Êä³ö¡°&lt;b&gt;Red Color&lt;/b&gt;¡±

	$str = 'it quotes "Tea"!';
	echo htmlspecialchars ($str);		//Êä³ö¡°it quotes &quot;Tea&quot;!¡±
?>
