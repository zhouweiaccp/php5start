<?php
	set_time_limit(0);		//Ϊ�˱������ӳ�ʱ�������趨
						//�Գ�������ʱ��δ������
	$remote_url = "http://www.taodoor.com";

	//��Զ���ļ�
	$handdle = fopen($remote_url . "/news.html", "r");

	if($handdle)
	{
		$data = '';

		//��ȡ�ļ�
		while(!feof($handdle))
		{
			$data .= fgets($handdle, 1024);
		}

		//ʹ��������ʽ����ҳ������ӵ�ַ
		preg_match_all('/<a\s+href="?([^>"]+)"?\s*[^>]*>([^>]+)<\/a>/i',$data,$arr);

		//ѭ�����
		for($i=0; $i<count($arr[1]); $i++)
		{
			echo '<li><a href="'.$remote_url.$arr[1][$i].'">'.$arr[2][$i].'</a>';
		}
	}else{
		echo "�޷����ӵ�Զ�̷�������";
	}
?>
