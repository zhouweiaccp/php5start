<?php
	/* ʹ����ɢ�ġ�==����!=���Ƚ� */
	$str = "123";
	var_dump ($str == 123);			//���Ϊtrue
	var_dump ($str == true);			//���Ϊtrue
	var_dump ($str != null);			//���Ϊtrue

	$zero = "0";
	var_dump ($zero == true);			//���Ϊfalse
	var_dump ($zero == false);		//���Ϊtrue

	var_dump ("0" == 0);				//���Ϊtrue
	var_dump ("0" == null);			//���Ϊfalse��"0"����Ϊ��һ���ַ���
	var_dump (0 == null);			//���Ϊtrue������0��NULL

	/* ʹ���ϸ�ġ�===����!==���Ƚ� */
	var_dump ("0" === 0);			//���Ϊfalse���ַ��������֣����Ͳ�ͬ
	var_dump (TRUE === true);		//���Ϊtrue�����桱�򡰼١��������ִ�Сд
	var_dump (10/2.0 !== 5);			//���Ϊtrue��10/2.0����5.0��һ��������
?>
