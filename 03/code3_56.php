<?php
	function StaticVar(){
		static $var = 0;			//����һ����̬������������ֵΪ0
		$var = $var + 1;
		echo $var;			//������
	}
	StaticVar();				//��һ�����У����1
	StaticVar();				//�ڶ������У����2
	StaticVar();				//���������У����3
?>
