<?php
	$filename = 'test.txt';
	$somecontent = "�����Щ���ֵ��ļ�\n";

	//����Ҫȷ���ļ����ڲ��ҿ�д
	if (is_writable($filename))
	{
    		//ʹ�����ģʽ��$filename���ļ�ָ�뽫�����ļ��Ŀ�ͷ
	     if (!$handle = fopen($filename, 'a')) 
		{
			echo "���ܴ��ļ� $filename";
			exit;									//�޷����ļ����˳�����
    		}

    		//��$somecontentд�뵽���Ǵ򿪵��ļ��С�
		if (!fwrite($handle, $somecontent)) 
		{
			echo "����д�뵽�ļ� $filename";
			exit;									//�޷�д���ļ����˳�����
		}

		echo "�ļ���$filename��д��ɹ�";

		//�ر��ļ�
		fclose($handle);
	} else {
		echo "�ļ���$filename������д";
	}
?>
