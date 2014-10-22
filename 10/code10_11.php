<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html>
<head>
	<title>�����嵥����XML�ĵ� - Taodoor.com</title>
	<style>
		body, td {font-size: 14px}
	</style>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
</head>
<body>
<?php

	//��ʼԪ�صĴ�����
	function start_element($parser, $name, $attrs)
	{
		switch($name)
		{
			case "ORDERID":
				echo "<br><b>�����ţ�</b>\n";
				break;
			case "FIRSTNAME":
				echo "<br><b>�û�������</b>\n";
				break;
			case "SECONDNAME":
				echo " ";
				break;
			case "ADDRESS":
				echo "<br><b>�ջ���ַ��</b>\n";
				break;
			case "ORDEREDPRODUCTS":
				echo '<br><b>��������</b>
<table width="400" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000">
 <tr bgcolor="#FFFFFF">
  <th>��Ʒ��</th>
  <th>��ɫ</th>
  <th>�ߴ�</th>
  <th>����</th>
  <th>����</th>
 </tr>';
				break;
			case "ITEM":
				echo "<tr bgcolor=\"#FFFFFF\">\n";
				break;
			case "PRODUCTNAME":
			case "COLOR":
			case "SCALE":
			case "PRICE":
			case "AMOUNT":
				echo "<TD>";
				break;
			case "TOTALPRICE":
				echo "<br><b>�ϼƼ۸�</b>\n";
		}
	}
	
	//����Ԫ�صĴ�����
	function end_element($parser, $name)
	{
		switch($name)
		{
			case "PRODUCTNAME":
			case "COLOR":
			case "SCALE":
			case "PRICE":
			case "AMOUNT":
				echo "</TD>";
				break;
			case "ITEM":
				echo "</tr>";
				break;
			case "ORDEREDPRODUCTS":
				echo '</table>';
				break;
		}
	}
	
	//�������ݵĴ�����
	function character_data($parser, $data)
	{
		echo $data;
	}
	
	//����ָ��Ĵ�����
	function pi_handler($parser, $type, $data)
	{
		eval($data);
	}

	//����������
	$xml_parser = xml_parser_create();

	//ʹ�ô�Сд�۵�����֤����Ԫ�������б��ҵ�
	xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, true);

	//���Կհ�
	xml_parser_set_option($xml_parser, XML_OPTION_SKIP_WHITE, true);

	//ע��Ԫ���¼��Ĵ�����
	xml_set_element_handler($xml_parser, "start_element", "end_element");

	//ע���������ݵĴ�����
	xml_set_character_data_handler($xml_parser, "character_data");

	//ע�ᴦ��ָ�����
	xml_set_processing_instruction_handler($xml_parser, "pi_handler");
	
	//��XML�ĵ�
	$file = "order.xml";
	if (!($fp = fopen($file, "r"))) {
	    die("�޷���{$file}�ļ�");
	}
	
	//��ȡ������XML�ĵ�
	while ($data = fread($fp, 4096))
	{
	    if (!xml_parse($xml_parser, $data, feof($fp)))
	    {
			//������Ϣ
			$message = sprintf("XML error: %s at line %d\n",
                 xml_error_string(xml_get_error_code($xml_parser)),
                 xml_get_current_line_number($xml_parser)
			);
			die($message);
	    }
	}

	//�ر�XML������
	xml_parser_free($xml_parser);
?>
</body>
</html>
