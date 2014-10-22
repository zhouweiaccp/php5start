<?php
	function getCity() {
		$city_name = $_COOKIE["city_name"];
		$city_id = $_COOKIE["city_id"];
		if(!$city_name  || !$city_id ) {
			$city_name = "大连";
			$city_id = "4";
			setcookie("city_name","大连",time()+3600*24*365);
			setcookie("city_id","4",time()+3600*24*365);
		}
		return array($city_id,$city_name);
	}
	function setCity($id,$name) {
		setcookie("city_name",$name,time()+3600*24*365);
		setcookie("city_id",$id,time()+3600*24*365);
	}
?>