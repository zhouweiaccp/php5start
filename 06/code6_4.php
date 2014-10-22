<?php
	//���ܣ����ı��е����ӵ�ַת��HTML
	//���룺�ַ���
	//������ַ���
	function url2html($text)
	{
		//ƥ��һ��URL��ֱ�����ֿհ�Ϊֹ
		preg_match_all("/http:\/\/?[^\s]+/i", $text, $links);

		//����ҳ����ʾURL��ַ�ĳ���
		$max_size = 40;
		foreach($links[0] as $link_url)
		{
			//����URL�ĳ��ȡ��������$max_size�����ã������̡�
			$len = strlen($link_url);

			if($len > $max_size) 
			{
				$link_text = substr($link_url, 0, $max_size)."...";
			} else {
				$link_text = $link_url;
			}

			//����HTML����
			$text = str_replace($link_url,"<a href='$link_url'>$link_text</a>",$text);
		}
		return $text;
	}
	
	//����ʵ��
	$str = ������һ���������URL���ӵ�ַ�Ķ������֡���ӭ����http://www.taoboor.com��;
	print url2html($str);

	/*������
		����һ���������URL���ӵ�ַ�Ķ������֡���ӭ����<a href='http://www.taoboor.com'>
		http://www.taoboor.com</a>
	*/
?>
