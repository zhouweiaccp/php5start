<?php
	$rows = file('php.ini');  //��php.ini�ļ�����������

	//ѭ������
	foreach($rows as $line)
	{
	  If(trim($line))
	  {
		//��ƥ��ɹ��Ĳ���д��������
		if(eregi("^([a-z0-9_.]*) *=(.*)", $line, $matches))
		{
            $options[$matches[1]] = trim($matches[2]);
         }
         unset($matches);
       }
	}

	//����������
	print_r($options);
?>
