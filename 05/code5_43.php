<?php
	$numbers = range (1,20);					//array(1,2, ��, 19, 20)
	srand ((float)microtime()*1000000); 		//�����������������
	shuffle ($numbers);							//���������˳��
	
	//ѭ�����
	while (list (, $number) = each ($numbers)) 
	{
    		echo "$number ";
	}
?>
