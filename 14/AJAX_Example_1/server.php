<?php
/**
 * 服务器端处理程序，必须使用utf-8编码
 */

//获得的请求
$playPos = $_GET["playPos"];

//数组数据
$posArray['pos_1'] = array(
	'总经理',
	'副总经理'
);
$posArray['pos_2'] = array(
	'总工程师',
	'测试工程师',
	'软件工程师',
);
$posArray['pos_3'] = array(
	'财务主任',
	'会计',
	'出纳',
	'审计',
);

//返回数据
if($playPos) 
{
	if(is_array($posArray[$playPos]))
	{
		foreach($posArray[$playPos] as $pos)
		{
			echo "<li>$pos</li>\r\n";
		}
	}
}
?>
