<?php
	class Cat	{
		var $name;		//猫的名字
		var $weight = 0;	//体重

		//构造器，创建一个是实例
		function Cat($name)
		{
			$this->name = $name;
			$this->weight = 1.5;		//初始的体重是1.5千克
		}
		
		//觅食的方法，这时，体重将增加
		function eat($food)
		{
			$this->weight += $food;
		}
	}
	
	$cat = new Cat("Tom");	//创建一个Cat对象。
	$cat->eat(0.5);			//吃了0.5千克的食物
	print_r($cat);

	/*输出内容，weight增加了，变成了2
	Cat Object (
		[name] => Tom
		[weight] => 2
	)
	*/
?>
