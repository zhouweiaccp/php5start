<?php
	//数组，项目支出=>费用
	$prices = array(
		"人员工资" => 42840,  "房租" => 4000,  维修费" => 925,
	);
	$sum = 0;

	//分项输出
	foreach($prices as $title=>$pay)
	{
		$sum += $pay;
		echo str_pad($title, 10, " ");					//在$title后补齐
		echo str_pad($pay, 10, "*", STR_PAD_LEFT);		//在$pay前补齐
		echo "￥\n";
	}
	
	echo str_repeat("-", 30), "\n";						//输出横线
	
	//合计输出
	echo str_pad("总支出", 10, " ");
	echo str_pad($sum, 10, "*", STR_PAD_LEFT);
	echo "￥\n";
?>
