<?php
	/* У���������� */
	function checkZipcode($code)
	{
		//ȥ������ķָ���
		$code = preg_replace("/[\. -]/", "", $code);

		//����һ��6λ����������
		if(preg_match("/^\d{6}$/", $code))
		{
			return true;
		}else{
			return false;
		}
	}

	$rs = checkZipCode("123456");					//������
?>
