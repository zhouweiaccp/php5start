<html>
<head><title>�򵥵�PHP����</title></head>
<body>
<?php
	define("MAX_LINE_NUM", 4);				//������������
	$title = "<h1>Hello, PHP World!</h1>\n";		//��ʼ��һ���ַ���

	echo $title;							//��ӡһ�����֡�\n����������з�

	//ѭ������Ǻ�
	echo "<pre>\n";
	for($i=1; $i<=MAX_LINE_NUM; $i++)
	{
		echo print_star($i);
		echo "\n";
	}
	echo "</pre>\n";
	
	/**
	 * �������ܣ���ӡָ����Ŀ���Ǻš�*��
	 * ������$num  ��ӡ�Ǻŵ�����
	 * ���أ��ַ���
	 */
	function print_star($num)
	{
		return str_repeat("*", $num);			//�ظ����$num����*��
	}
?>
</body>
</html>
