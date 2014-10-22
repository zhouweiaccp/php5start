<?php
	$numbers = range (1,20);					//array(1,2, …, 19, 20)
	srand ((float)microtime()*1000000); 		//设置随机发生器种子
	shuffle ($numbers);							//打乱数组的顺序
	
	//循环输出
	while (list (, $number) = each ($numbers)) 
	{
    		echo "$number ";
	}
?>
