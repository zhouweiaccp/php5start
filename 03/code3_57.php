<?php
	function Factorial($n)
	{
		if($n==0) 						//ÖÕÖ¹µÝ¹éµÄÌõ¼þ
			return 1; 
		else
			return n* Factorial(n-1);		//µÝ¹é²½Öè
	}
?>
