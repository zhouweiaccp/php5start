<?php
	$lines = array(						//定义一个数组
		"两个黄鹂鸣翠柳，",
		"一行白鹭上青天。",
		"窗含西岭千秋雪，",
		"门泊东吴万里船。",
	);

	for($i=0; $i<count($lines); $i++){
		if($i%2==0)					//使用取余的方法，产生间隔的颜色
			$color="red";
		else
			$color="green";
		echo '<font color="' .$color. '">' .$lines[$i]. '</font>';
		echo "<br>\n";
	}
?>
