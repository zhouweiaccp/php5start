<?php
	function hello_teens ($name, $age=10, $sex="M")
	{
		echo "$name is a";				//����
		if($sex == "M")					//�Ա�
			echo " boy. He is ";
		else
			echo " girl. She is ";
		echo "$age years old.\n";			//����
	}
	
	hello_teens ("Ailce", 9, "F");			//�����Ailce is a girl. She is 9 years old.��
	hello_teens ("Jack", 8);				//�����Jack is a boy. He is 8 years old.��
	hello_teens ("Tom");					//�����Tom is a boy. He is 10 years old.��
?>
