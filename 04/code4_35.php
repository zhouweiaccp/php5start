<?php
	//������URL����
	$url_str = "https://usr:pwd@localhost/path/index.php?act=show&id=1#top";
	print_r(parse_url($url_str));

	/* ������
	Array(
		[scheme] => https
		[host] => localhost
		[user] => usr
		[pass] => pwd
		[path] => /path/index.php
		[query] => act=show&id=1
		[fragment] => top
	)
	*/

	//���ֵ�URL���������������Э�����ƣ���������������Ϊ·������
	print_r(parse_url("www.taodoor.com"));

	/* ������
	Array
	(
	   [path] => www.taodoor.com
	)
	*/
?>
