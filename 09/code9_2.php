<?php
	$to  = "mary@example.com";			//�ż�������
	$subject = "���Ķ�����Ϣ";			//�ʼ�����

	$message = '<html>
	<head><title>�̳ǵĶ�����Ϣ</title></head>
	<body>
	<p>�װ��Ĺ˿ͣ���������Ķ�����Ϣ��</p>
	<p>�û�����<font color=blue>ף��˫</font>
	<br>�����ţ�<font color=red>M200609241001</font></p>
	<table border=1 width=300>
	<tr>
	  <th>��Ʒ��</th><th>����</th><th>����</th>
	</tr>	<tr>
	  <td>���ٶ�</td><td align=center>1</td><td align=right>��199.00</td>
	</tr>	<tr>
	  <td>�����ӵ���</td><td align=center>1</td><td align=right>��2880.00</td>
	</tr>	<tr>
	  <td>�ϼ�</td><td>&nbsp;</td>
		<td align=right><font color=red><b>��3079.00</b></font></td>
	</tr>
	</table>
	</body>
	</html>';

	//Ϊ�˷���HTML�ʼ�����������Content-typeͷ��Ϣ
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=gb2312\r\n";

	$headers .= "To: $to\r\n";
	$headers .= "From: Order <order@taodoor.com>\r\n";	//������
	$headers .= "Bcc: manager@taodoor.com\r\n";			//����
	$headers .= "Cc: ordercheck@taodoor.com\r\n";		//����

	//�����ʼ�
	mail($to, $subject, $message, $headers);
?>
