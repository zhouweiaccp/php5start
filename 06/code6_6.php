<?php
	$lines = file('source.php');				//���ļ�����������

	for($i=0; $i<count($lines); $i++)
	{
		//����ĩ�ԡ�\\����#����ͷ��ע��ȥ��
		$lines[$i] = eregi_replace("(\/\/|#).*$", "", $lines[$i]); 
		//����ĩ�Ŀհ�����
		$lines[$i] = eregi_replace("[ \n\r\t\v\f]*$", "\r\n", $lines[$i]); 
	}

	//����������ҳ��
	echo htmlspecialchars(join("",$lines));
?>
