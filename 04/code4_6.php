<?php
	$this_year = 2006;
	$text = <<< EOT
ף��˫,F,1982,�㶫,��ְͨԱ
�����,M,1981,�ӱ�,��ְͨԱ
١����,F,1980,ɽ��,��Ŀ����
EOT;
	$lines = explode("\n", $text);				//���������ݷֿ�
	foreach($lines as $userinfo)
	{
		$info = explode(",", $userinfo, 3);		//���ָ�ǰ��������
		$name = $info[0];
		$sex = ($info[1] == "F") ? "Ů" : "��";
		$age = $this_year - $info[2];

		echo "������$name $sex ���䣺$age<br>";		//���
	}

/* ��������
	������ף��˫ Ů ���䣺24
	����������� �� ���䣺25
	������١���� Ů ���䣺26
*/
?>
