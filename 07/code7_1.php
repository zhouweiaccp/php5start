<?php
	echo filetype('/etc/passwd'); 		// file
	echo filetype('/etc/');       		// dir

	$filetypes = array(
		'file' => '��ͨ�ļ�',			'dir' => 'Ŀ¼�ļ�',
		'block' => '�豸�ļ�',			'fifo' => '�����ܵ�',
		'link' => '��������',			'char' => '�׽���',
		'unknown' => 'δ֪',
	);
	
	//����$file�����ͣ���ӡ��ͬ������
	if($type = filetype($file))
	{
		//���÷��ص�$type��������������$filetypes
		//���ʹ�ã���һ�ֺʹ����ķ�ʽ
		echo $file."��һ����" .$filetypes[$type]. "�������͡�\n";
	}
?>
