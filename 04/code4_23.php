<?php
	//���ڵı�ʾ
	$date = sprintf("%04d-%02d-%02d", 2006, 9, 3);		//���ء�2006-09-03��
	
	//�۸�ı�ʾ
	$money1 = 1038.45;
	$money2 = 2154.75;
	$sum_money = sprintf("%01.2f��", $money1 + $money2);	//���ء�3193.20����
	
	//�������ַ���
	$format = "There are %d dogs in the %s.";
	printf($format, "5.1", "my room");  	//�����There are 5 dogs in the my room.��
	
	//һ���ٷֱ�
	printf("%.2f%%", 32.1);			//�����32.10%��

	//ʮ���ƺ�ʮ������
	$num = 1234;
	printf("The hex value of %d is %X", $num, $num); 
								//�����The hex value of 1234 is 4D2��
?>
