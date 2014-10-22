<?php
	//当前的队列，其中每个成员都包含了名字和执行操作的信息。
	$queues = array(
		array("Tom", "买面包"),
		array("Jack", "退货"),
		array("Kitty", "咨询事务"),
	);

	//进入队列的操作
	function enter_queue($name, $doing)
	{
		global $queues;
		$queues[] = array($name, $doing);				//将数据插入队尾
		echo $name."进入了队尾。<br>";
	}

	//队列的插入操作
	function insert_queue($name, $doing)
	{
		global $queues;
		$object = array($name, $doing);
		array_unshift ($queues, $object);				//将数据插入队头
		echo $name."插进了队列。<br>";
	}
	
	//退出队列的操作
	function exit_queue()
	{
		global $queues;
		if($queues)
		{
			$object = array_shift($queues);				//将数据从队头删除
			echo $object[0]."完成了“" .$object[1]. "”的操作，退出了队列。<br>";
		}else{
			echo "队列为空。<br>";
		}
	}

	//执行测试程序
	exit_queue();
	enter_queue("Tailer", "随便看看");					//进入队列
	exit_queue();
	insert_queue("Police", "执法");						//插入队列
	exit_queue();
	exit_queue();
	exit_queue();									//此时队列已经为空
	exit_queue();
?>
