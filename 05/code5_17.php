<?php
	$tracks = array();		//�����ȫ��ջ���Դ��״̬
	
	//����ʱ����¼״̬
	function enter_track($name)
	{
		global $tracks;
		echo str_repeat("&nbsp; ", count($tracks));	//��ջǰ��ͳ��ջ�ĳ���
		array_push($tracks, $name);				//��$_GLOBALS["tracks"][] = $name��ͬ
		echo "���� $name (��ǰջ��" .join("->", $tracks). ")<br>\n";
	}
	
	//�˳�ʱ���ͷ�״̬
	function exit_track()
	{
		global $tracks;
		$ret = array_pop($tracks);
		echo str_repeat("&nbsp; ", count($tracks));	//��ջ��ͳ��ջ�ĳ���
		echo "$ret �˳�...<br>\n";
	}
	
	//���Ժ���
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
	
	//ִ�в���
	enter_track("OuterZero");
	//Do something here ...
	//test_step_one();
	test_step_three();
	exit_track();
?>
