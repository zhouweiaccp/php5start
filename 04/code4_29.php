<?php
	$str = '<b>Red Color</b>';
	echo htmlspecialchars ($str);		//�����&lt;b&gt;Red Color&lt;/b&gt;��

	$str = 'it quotes "Tea"!';
	echo htmlspecialchars ($str);		//�����it quotes &quot;Tea&quot;!��
?>
