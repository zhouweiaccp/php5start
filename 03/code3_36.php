<?php
	//������$x��$y��$z��ʾ�����Ƶĵ�������$x=10��$y=5��$z=6�ȡ�
	//��$money������Ϸ�ߵ����е��ʽ�

	if($x+$y+$z == 21){						//�ж�ʤ��������
		$money ++;						//Ӯ�ó���
		echo "Bingo��You are the WINNER.<br>";
	}else{								//����ִ��ʧ��
		$money --;						//ʧ����ע
		echo "Sorry��You are a LOSER.<br>";
	}
	
	//����Ĵ�����
?>
