<?php
	//��Ҫƥ����ַ�����date�������ص�ǰʱ��
	$content = "Current date and time is ".date("Y-m-d h:i a").", we are learning PHP together.";

	//ʹ��ͨ���ķ���ƥ��ʱ��
	if (preg_match ("/\d{4}-\d{2}-\d{2} \d{2}:\d{2} [ap]m/", $content, $m)) 
	{
	    echo "ƥ���ʱ���ǣ�" .$m[0]. "\n";
	}

	//����ʱ���ģʽ���ԣ�Ҳ���Լ򵥵�ƥ��
	if (preg_match ("/([\d-]{10}) ([\d:]{5} [ap]m)/", $content, $m)) 
	{
		echo "��ǰ�����ǣ�" .$m[1]. "\n";
		echo "��ǰʱ���ǣ�" .$m[2]. "\n";
	}
        echo date("Y-m-d h:i a");
        
?>
