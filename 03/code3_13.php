<?php
	class Cat	{
		var $name;		//è������
		var $weight = 0;	//����

		//������������һ����ʵ��
		function Cat($name)
		{
			$this->name = $name;
			$this->weight = 1.5;		//��ʼ��������1.5ǧ��
		}
		
		//��ʳ�ķ�������ʱ�����ؽ�����
		function eat($food)
		{
			$this->weight += $food;
		}
	}
	
	$cat = new Cat("Tom");	//����һ��Cat����
	$cat->eat(0.5);			//����0.5ǧ�˵�ʳ��
	print_r($cat);

	/*������ݣ�weight�����ˣ������2
	Cat Object (
		[name] => Tom
		[weight] => 2
	)
	*/
?>
