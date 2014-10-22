<?php
	//完整的URL解析
	$url_str = "https://usr:pwd@localhost/path/index.php?act=show&id=1#top";
	print_r(parse_url($url_str));

	/* 输出结果
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

	//部分的URL解析。如果不包含协议名称，单独的域名仅作为路径看待
	print_r(parse_url("www.taodoor.com"));

	/* 输出结果
	Array
	(
	   [path] => www.taodoor.com
	)
	*/
?>
