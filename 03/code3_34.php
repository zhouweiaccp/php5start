<?php
	define("PUBLIC_ARTICLE",	1);		//��������
	define("CREATE_ARTICLE",	2);		//�������
	define("MODIFY_ARTICLE",	4);		//�޸�����
	define("DELETE_ARTICLE",	8);		//ɾ������
	define("SHARCH_ARTICLE",	16);		//��������
	define("CREATE_COMMENT",	32);		//�����������
	define("DELETE_COMMENT",	64);		//ɾ����������

	//���е�Ȩ��
	$final_allow = PUBLIC_ARTICLE | CREATE_ARTICLE | MODIFY_ARTICLE | DELETE_ARTICLE 
		| SHARCH_ARTICLE | CREATE_COMMENT | DELETE_COMMENT;

	echo "������ӵ�е�ȫ��Ȩ�ޣ�" .decbin($final_allow). "<br>";

	$no_shearch_allow = $final_allow ^ SHARCH_ARTICLE;
	echo "���޷��������µ�Ȩ�ޣ�" .decbin($no_shearch_allow). "<br>";

	//�༭��Ա���е�Ȩ��
	$editor_allow = PUBLIC_ARTICLE | MODIFY_ARTICLE | DELETE_ARTICLE;
	$no_editor_allow = $final_allow & ~$editor_allow;
	echo "�Ǳ༭��Ա���е�Ȩ�ޣ�" .decbin($no_editor_allow). "<br>";
?>
