<?php
	$data = "<root><line /><content language=\"gb2312\">�򵥵�XML����</content></root>";
	$parser = xml_parser_create();						//����������
	xml_parse_into_struct($parser, $data, $values, $index);	//����������
	xml_parser_free($parser);							//�ͷ���Դ
	
	//��ʾ����ṹ
	echo "\n��������\n";
	print_r($index);
	echo "\n��������\n";
	print_r($values);
?>
