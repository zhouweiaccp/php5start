<?php
	/* У��绰���� */
	function checkTelno($tel)
	{
		//ȥ������ķָ���
		$tel = ereg_replace("[\(\)\. -]", "", $tel);
	
		//���������֣�����ӦΪһ��6λ�ĵ绰�ţ���û�����ţ�
		if(ereg("^\d+$", $tel))
		{
			return true;
		}else{
			return false;
		}
	}
	
	$rs = checkTelno("(086)-0411-12345678");			//������
?>
