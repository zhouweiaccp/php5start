<?php
	$files = array ("pic1.GIF", "Pic10.gif", "pIC2.gif", "pic12.gif", "pic.gif");	
	natsort($files);				//��ͨ�ġ���Ȼ����
	print_r($files);
	
	natcasesort($files);			//���Դ�Сд�ġ���Ȼ����
	print_r($files);

	uasort($files, 'strcasecmp');	//��һ�ַ�ʽ�ġ���Ȼ���򡱵�ʵ��
							//Ҳ���Դ�Сд
	print_r($files);
?>
