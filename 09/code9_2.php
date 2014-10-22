<?php
	$to  = "mary@example.com";			//信件接收者
	$subject = "您的订单信息";			//邮件主题

	$message = '<html>
	<head><title>商城的订单信息</title></head>
	<body>
	<p>亲爱的顾客，下面是你的订单信息：</p>
	<p>用户名：<font color=blue>祝无双</font>
	<br>定单号：<font color=red>M200609241001</font></p>
	<table border=1 width=300>
	<tr>
	  <th>商品名</th><th>数量</th><th>单价</th>
	</tr>	<tr>
	  <td>电熨斗</td><td align=center>1</td><td align=right>￥199.00</td>
	</tr>	<tr>
	  <td>等离子电视</td><td align=center>1</td><td align=right>￥2880.00</td>
	</tr>	<tr>
	  <td>合计</td><td>&nbsp;</td>
		<td align=right><font color=red><b>￥3079.00</b></font></td>
	</tr>
	</table>
	</body>
	</html>';

	//为了发送HTML邮件，必须设置Content-type头信息
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=gb2312\r\n";

	$headers .= "To: $to\r\n";
	$headers .= "From: Order <order@taodoor.com>\r\n";	//送信人
	$headers .= "Bcc: manager@taodoor.com\r\n";			//密送
	$headers .= "Cc: ordercheck@taodoor.com\r\n";		//抄送

	//发送邮件
	mail($to, $subject, $message, $headers);
?>
