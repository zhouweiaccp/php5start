<?php
	//这里用$x，$y，$z表示三张牌的点数，如$x=10，$y=5，$z=6等。
	//用$money代表游戏者的手中的资金

	if($x+$y+$z == 21){						//判断胜利的条件
		$money ++;						//赢得筹码
		echo "Bingo！You are the WINNER.<br>";
	}else{								//否则，执行失败
		$money --;						//失掉赌注
		echo "Sorry！You are a LOSER.<br>";
	}
	
	//更多的处理……
?>
