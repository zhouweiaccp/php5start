<?php
	$tracks = array();		//定义个全局栈，以存放状态
	
	//进入时，记录状态
	function enter_track($name)
	{
		global $tracks;
		echo str_repeat("&nbsp; ", count($tracks));	//入栈前，统计栈的长度
		array_push($tracks, $name);				//与$_GLOBALS["tracks"][] = $name相同
		echo "进入 $name (当前栈：" .join("->", $tracks). ")<br>\n";
	}
	
	//退出时，释放状态
	function exit_track()
	{
		global $tracks;
		$ret = array_pop($tracks);
		echo str_repeat("&nbsp; ", count($tracks));	//出栈后，统计栈的长度
		echo "$ret 退出...<br>\n";
	}
	
	//测试函数
	function test_step_one()
	{
		enter_track("One");
		exit_track();
	}
	
	function test_step_two(){
		enter_track("Two");
		test_step_one();
		exit_track();
	}

	function test_step_three()
	{
		enter_track("Three");
		test_step_one();
		test_step_two();
		exit_track();
	}
	
	//执行测试
	enter_track("OuterZero");
	//Do something here ...
	//test_step_one();
	test_step_three();
	exit_track();
?>
