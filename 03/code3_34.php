<?php
	define("PUBLIC_ARTICLE",	1);		//发行文章
	define("CREATE_ARTICLE",	2);		//添加文章
	define("MODIFY_ARTICLE",	4);		//修改文章
	define("DELETE_ARTICLE",	8);		//删除文章
	define("SHARCH_ARTICLE",	16);		//搜索文章
	define("CREATE_COMMENT",	32);		//添加文章评论
	define("DELETE_COMMENT",	64);		//删除文章评论

	//所有的权限
	$final_allow = PUBLIC_ARTICLE | CREATE_ARTICLE | MODIFY_ARTICLE | DELETE_ARTICLE 
		| SHARCH_ARTICLE | CREATE_COMMENT | DELETE_COMMENT;

	echo "管理者拥有的全部权限：" .decbin($final_allow). "<br>";

	$no_shearch_allow = $final_allow ^ SHARCH_ARTICLE;
	echo "仅无法搜索文章的权限：" .decbin($no_shearch_allow). "<br>";

	//编辑人员独有的权限
	$editor_allow = PUBLIC_ARTICLE | MODIFY_ARTICLE | DELETE_ARTICLE;
	$no_editor_allow = $final_allow & ~$editor_allow;
	echo "非编辑人员所有的权限：" .decbin($no_editor_allow). "<br>";
?>
