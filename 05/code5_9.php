<?php
	$province = "�㶫";
	$array = array (
		"name" => "�����",
		"province" => "�ӱ�",
		"age" => 25
	);
	//�������
	extract ($array, EXTR_PREFIX_SAME, "user");
	print "$name, $province, $age, $user_province";	//����������, �㶫, 25, �ӱ���
?>
