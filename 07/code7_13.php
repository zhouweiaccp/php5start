<?php
	set_time_limit(0);		//为了避免连接超时，这里设定
						//对程序运行时间未做限制
	$remote_url = "http://www.taodoor.com";

	//打开远程文件
	$handdle = fopen($remote_url . "/news.html", "r");

	if($handdle)
	{
		$data = '';

		//读取文件
		while(!feof($handdle))
		{
			$data .= fgets($handdle, 1024);
		}

		//使用正则表达式分析页面的链接地址
		preg_match_all('/<a\s+href="?([^>"]+)"?\s*[^>]*>([^>]+)<\/a>/i',$data,$arr);

		//循环输出
		for($i=0; $i<count($arr[1]); $i++)
		{
			echo '<li><a href="'.$remote_url.$arr[1][$i].'">'.$arr[2][$i].'</a>';
		}
	}else{
		echo "无法连接到远程服务器。";
	}
?>
