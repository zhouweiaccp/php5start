<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html>
<head>
	<title>购物清单解析XML文档 - Taodoor.com</title>
	<style>
		body, td {font-size: 14px}
	</style>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
</head>
<body>
<?php

	//开始元素的处理函数
	function start_element($parser, $name, $attrs)
	{
		switch($name)
		{
			case "ORDERID":
				echo "<br><b>订单号：</b>\n";
				break;
			case "FIRSTNAME":
				echo "<br><b>用户姓名：</b>\n";
				break;
			case "SECONDNAME":
				echo " ";
				break;
			case "ADDRESS":
				echo "<br><b>收货地址：</b>\n";
				break;
			case "ORDEREDPRODUCTS":
				echo '<br><b>订单内容</b>
<table width="400" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000">
 <tr bgcolor="#FFFFFF">
  <th>商品名</th>
  <th>颜色</th>
  <th>尺寸</th>
  <th>数量</th>
  <th>单价</th>
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
				echo "<br><b>合计价格：</b>\n";
		}
	}
	
	//结束元素的处理函数
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
	
	//文字数据的处理函数
	function character_data($parser, $data)
	{
		echo $data;
	}
	
	//处理指令的处理函数
	function pi_handler($parser, $type, $data)
	{
		eval($data);
	}

	//创建解析器
	$xml_parser = xml_parser_create();

	//使用大小写折叠来保证能在元素数组中被找到
	xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, true);

	//忽略空白
	xml_parser_set_option($xml_parser, XML_OPTION_SKIP_WHITE, true);

	//注册元素事件的处理函数
	xml_set_element_handler($xml_parser, "start_element", "end_element");

	//注册文字数据的处理函数
	xml_set_character_data_handler($xml_parser, "character_data");

	//注册处理指令处理函数
	xml_set_processing_instruction_handler($xml_parser, "pi_handler");
	
	//打开XML文档
	$file = "order.xml";
	if (!($fp = fopen($file, "r"))) {
	    die("无法打开{$file}文件");
	}
	
	//读取并解析XML文档
	while ($data = fread($fp, 4096))
	{
	    if (!xml_parse($xml_parser, $data, feof($fp)))
	    {
			//错误信息
			$message = sprintf("XML error: %s at line %d\n",
                 xml_error_string(xml_get_error_code($xml_parser)),
                 xml_get_current_line_number($xml_parser)
			);
			die($message);
	    }
	}

	//关闭XML解析器
	xml_parser_free($xml_parser);
?>
</body>
</html>
