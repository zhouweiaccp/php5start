<?php
	//��ǰ�Ķ��У�����ÿ����Ա�����������ֺ�ִ�в�������Ϣ��
	$queues = array(
		array("Tom", "�����"),
		array("Jack", "�˻�"),
		array("Kitty", "��ѯ����"),
	);

	//������еĲ���
	function enter_queue($name, $doing)
	{
		global $queues;
		$queues[] = array($name, $doing);				//�����ݲ����β
		echo $name."�����˶�β��<br>";
	}

	//���еĲ������
	function insert_queue($name, $doing)
	{
		global $queues;
		$object = array($name, $doing);
		array_unshift ($queues, $object);				//�����ݲ����ͷ
		echo $name."����˶��С�<br>";
	}
	
	//�˳����еĲ���
	function exit_queue()
	{
		global $queues;
		if($queues)
		{
			$object = array_shift($queues);				//�����ݴӶ�ͷɾ��
			echo $object[0]."����ˡ�" .$object[1]. "���Ĳ������˳��˶��С�<br>";
		}else{
			echo "����Ϊ�ա�<br>";
		}
	}

	//ִ�в��Գ���
	exit_queue();
	enter_queue("Tailer", "��㿴��");					//�������
	exit_queue();
	insert_queue("Police", "ִ��");						//�������
	exit_queue();
	exit_queue();
	exit_queue();									//��ʱ�����Ѿ�Ϊ��
	exit_queue();
?>
