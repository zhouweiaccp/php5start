<?php
	//����XML������
	$xml_parser = xml_parser_create();

	//ʹ�ô�Сд�۵�����֤����Ԫ���������ҵ���ЩԪ������
	xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, true);

	//��ȡXML�ļ�
	$xmlfile = "data.xml";
	if (!($fp = fopen($xmlfile, "r")))
	{
	    die("�޷���ȡXML�ļ�$xmlfile");
	}

	//����XML�ļ�
	$has_error = false;			//��־λ
	while ($data = fread($fp, 4096))
	{
		//ѭ���ض���XML�ĵ���ֻ���ĵ���EOF��ͬʱֹͣ����
		if (!xml_parse($xml_parser, $data, feof($fp)))
		{
			$has_error = true;
			break;
		}
	}

	if($has_error)
	{ 
		echo "��XML�ĵ��Ǵ���ģ�<br />";

		//��������У��м��������Ϣ
		$error_line   = xml_get_current_line_number($xml_parser);
		$error_row   = xml_get_current_column_number($xml_parser);
		$error_string = xml_error_string(xml_get_error_code($xml_parser));

		$message = sprintf("�۵�%d�У�%d�Уݣ�%s", 
						$error_line,
						$error_row,
						$error_string);
		echo $message;
	}
	else
	{
		echo "��XML�ĵ��ǽṹ���õġ�";
	}
	
	//�ر�XML������ָ�룬�ͷ���Դ
	xml_parser_free($xml_parser);
?>
