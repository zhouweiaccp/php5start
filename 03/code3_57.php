<?php
	function Factorial($n)
	{
		if($n==0) 						//��ֹ�ݹ������
			return 1; 
		else
			return n* Factorial(n-1);		//�ݹ鲽��
	}
?>
