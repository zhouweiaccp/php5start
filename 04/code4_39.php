<?php
	/* http_build_query() ʹ�õ����� */
	$data = array(
		'foo'=>'bar',
		'baz'=>'boom',
		'cow'=>'milk',
		'php'=>'hypertext processor'
	);

	echo http_build_query($data);
	//�������foo=bar&baz=boom&cow=milk&php=hypertext+processor��

	/* http_build_query() ʹ�������±��Ԫ�� */
	$data = array('foo', 'bar',
			   'cow' => 'milk',
			   'php' =>'hypertext processor'
			);

	echo http_build_query($data);
	//�������0=foo&1=bar&cow=milk&php=hypertext+processor��

	echo http_build_query($data, 'var_');		
	//�������var_0=foo&var_1=bar&cow=milk&php=hypertext+processor��
?>
