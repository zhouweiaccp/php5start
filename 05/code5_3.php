<?php
	$var_array = array (
		"apple",
		"PI"=>"3.14", 
		"num"=>1000, 
		array('a','b'),
	);
	if (in_array ("apple", $var_array))			//�ַ����ıȽ�
	{
	    print "�ַ���\n";
	}
	if (in_array (3.14, $var_array, true))			//���ֵıȽϣ��ϸ��
	{
	    print "Բ����\n";
	}
	if (in_array (array("b","a"), $var_array))		//����ıȽ�
	{
	    print "����\n";
	}
?>
