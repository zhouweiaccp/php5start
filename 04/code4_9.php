<?php
	//���飬��Ŀ֧��=>����
	$prices = array(
		"��Ա����" => 42840,  "����" => 4000,  ά�޷�" => 925,
	);
	$sum = 0;

	//�������
	foreach($prices as $title=>$pay)
	{
		$sum += $pay;
		echo str_pad($title, 10, " ");					//��$title����
		echo str_pad($pay, 10, "*", STR_PAD_LEFT);		//��$payǰ����
		echo "��\n";
	}
	
	echo str_repeat("-", 30), "\n";						//�������
	
	//�ϼ����
	echo str_pad("��֧��", 10, " ");
	echo str_pad($sum, 10, "*", STR_PAD_LEFT);
	echo "��\n";
?>
