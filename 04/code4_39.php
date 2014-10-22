<?php
	/* http_build_query() 使用的例子 */
	$data = array(
		'foo'=>'bar',
		'baz'=>'boom',
		'cow'=>'milk',
		'php'=>'hypertext processor'
	);

	echo http_build_query($data);
	//输出：“foo=bar&baz=boom&cow=milk&php=hypertext+processor”

	/* http_build_query() 使用数字下标的元素 */
	$data = array('foo', 'bar',
			   'cow' => 'milk',
			   'php' =>'hypertext processor'
			);

	echo http_build_query($data);
	//输出：“0=foo&1=bar&cow=milk&php=hypertext+processor”

	echo http_build_query($data, 'var_');		
	//输出：“var_0=foo&var_1=bar&cow=milk&php=hypertext+processor”
?>
