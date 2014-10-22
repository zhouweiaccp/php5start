<?php
	$i = 0;
	while ($i++ < 4) {
		echo "外部<br>\n";
    		for (;;) {
			echo "&nbsp; for循环的内部<br>\n";
			do {
				echo "&nbsp; do-while循环的内部<br>\n";
				continue 3;				//跳出三层循环到while($i++<4)
			}while(1);
			echo "这行不会输出<br>\n";
		}
		echo "从未运行到这<br>\n";
	}
?>
