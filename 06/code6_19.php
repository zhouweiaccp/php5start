<html> 
<head>
<title>格式化Apache服务器日志文件</title>
</head>
<body>
<?php
  //将access.log日志读入一个数组
  $loginfo = file('usr/apache2/logs/access.log');
  $i=0;

  echo "<table border=1><tr>\n";
  echo "  <th>客户端IP</th>\n";
  echo "  <th>时间</th>\n";
  echo "  <th>发送方式</th>\n";
  echo "  <th>客户端协议</th>\n";
  echo "  <th>请求文件</th>\n";
  echo "<tr>";	

  //遍历日志信息数组
  foreach($loginfo as $logline)
  {
	//被请求文件名的匹配。只接受后缀为“.php”、“.html”、“.htm”的文件
	if(preg_match("/\".*\/[^\/]+\.(php|html|htm)\??.*\"/i", $logline))
	{
		echo "<tr>\n";

		//进行匹配
		$pattern =
			 "([\d.]+)\s"										//IP地址
			. "([-\w]+)\s	([-\w]+)\s"							//身份表识
			. "\[(.+?)\]\s" 									//匹配时间
			. "\"(POST|GET)\s([^\s]+)\s(HTTP\/1\.[0123])\"\s"	//请求查询信息
			. "(\d+)\s(\d+)";

		preg_match("/$pattern/ix", $logline, $m);				//使用“x”表示忽略空白

		echo "  <td>{$m[1]}</td>\n";							//显示IP地址

		//重新格式化时间，通过“/”，“:”进行分隔
		$dt = split("[\/\: ]", $m[4]);
		$newtime = strtotime ("{$dt[0]} {$dt[1]} {$dt[2]} {$dt[3]}:{$dt[4]}:{$dt[5]} {$dt[6]}");
		$newtime    = date("[O] Y-m-d H:i:s", $newtime);

		echo "  <td align=left>{$newtime}</td>\n";				//显示时间
		echo "  <td align=center>{$m[5]}</td>\n";				//显示发送方式
		echo "  <td align=center>{$m[7]}</td>\n";				//显示客户端协议
		echo "  <td align=left>{$m[6]}</td>\n";					//显示请求文件
		echo "</td>\n";
	}
  }
  echo "</table>";
?>
</body>
</html>
