<?php
	$province = "广东";
	$array = array (
		"name" => "李大嘴",
		"province" => "河北",
		"age" => 25
	);
	//解析输出
	extract ($array, EXTR_PREFIX_SAME, "user");
	print "$name, $province, $age, $user_province";	//输出“李大嘴, 广东, 25, 河北”
?>
