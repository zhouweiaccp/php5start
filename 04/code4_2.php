<?php
	$string = "Nothing is impossible. Just do it!";

	$just = substr($string, 23, 4);		//���ء�Just��
	$just = substr($string, -11, 4);		//���ء�Just��
	$center = substr($string, 11, 11);	//���ء�impossible!��
	echo substr($string, -11);			//�����Just do it!��
	echo substr($string, -1);			//�����!��
?>
