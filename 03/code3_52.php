<?php
	function hello_teens ($name, $age=10, $sex="M")
	{
		echo "$name is a";				//名字
		if($sex == "M")					//性别
			echo " boy. He is ";
		else
			echo " girl. She is ";
		echo "$age years old.\n";			//年龄
	}
	
	hello_teens ("Ailce", 9, "F");			//输出“Ailce is a girl. She is 9 years old.”
	hello_teens ("Jack", 8);				//输出“Jack is a boy. He is 8 years old.”
	hello_teens ("Tom");					//输出“Tom is a boy. He is 10 years old.”
?>
