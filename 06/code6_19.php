<html> 
<head>
<title>��ʽ��Apache��������־�ļ�</title>
</head>
<body>
<?php
  //��access.log��־����һ������
  $loginfo = file('usr/apache2/logs/access.log');
  $i=0;

  echo "<table border=1><tr>\n";
  echo "  <th>�ͻ���IP</th>\n";
  echo "  <th>ʱ��</th>\n";
  echo "  <th>���ͷ�ʽ</th>\n";
  echo "  <th>�ͻ���Э��</th>\n";
  echo "  <th>�����ļ�</th>\n";
  echo "<tr>";	

  //������־��Ϣ����
  foreach($loginfo as $logline)
  {
	//�������ļ�����ƥ�䡣ֻ���ܺ�׺Ϊ��.php������.html������.htm�����ļ�
	if(preg_match("/\".*\/[^\/]+\.(php|html|htm)\??.*\"/i", $logline))
	{
		echo "<tr>\n";

		//����ƥ��
		$pattern =
			 "([\d.]+)\s"										//IP��ַ
			. "([-\w]+)\s	([-\w]+)\s"							//��ݱ�ʶ
			. "\[(.+?)\]\s" 									//ƥ��ʱ��
			. "\"(POST|GET)\s([^\s]+)\s(HTTP\/1\.[0123])\"\s"	//�����ѯ��Ϣ
			. "(\d+)\s(\d+)";

		preg_match("/$pattern/ix", $logline, $m);				//ʹ�á�x����ʾ���Կհ�

		echo "  <td>{$m[1]}</td>\n";							//��ʾIP��ַ

		//���¸�ʽ��ʱ�䣬ͨ����/������:�����зָ�
		$dt = split("[\/\: ]", $m[4]);
		$newtime = strtotime ("{$dt[0]} {$dt[1]} {$dt[2]} {$dt[3]}:{$dt[4]}:{$dt[5]} {$dt[6]}");
		$newtime    = date("[O] Y-m-d H:i:s", $newtime);

		echo "  <td align=left>{$newtime}</td>\n";				//��ʾʱ��
		echo "  <td align=center>{$m[5]}</td>\n";				//��ʾ���ͷ�ʽ
		echo "  <td align=center>{$m[7]}</td>\n";				//��ʾ�ͻ���Э��
		echo "  <td align=left>{$m[6]}</td>\n";					//��ʾ�����ļ�
		echo "</td>\n";
	}
  }
  echo "</table>";
?>
</body>
</html>
