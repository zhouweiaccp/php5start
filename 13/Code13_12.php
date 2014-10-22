<?php
	//包含ADODB类库
	include('adodb.inc.php');

	//连接数据库
	$conn = &NewADOConnection("mysql");
	$conn->PConnect("test");

	//数据数组
	$record = array(
		"product" => "吸尘器",
		"code" => "SM002501",
	);

	$conn->AutoExecute($table, $record, "INSERT");
	//执行“INSERT INTO $table (product, code) values ('吸尘器', 'SM002501')”

	$record = array(
		"product" => "吸尘器",
		"code" => "XP002501",
		"another" => "Some thing here …",		//这是一条多余字段数据，
												//将会被忽略。
	);

	$conn->AutoExecute($table, $record, "UPDATE", "code like 'SM%'");
	//执行“UPDATE $table SET product ='吸尘器', code=' XP002501'
	//	   WHERE lastname like 'SM%'”
?>
