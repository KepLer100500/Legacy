<?php
	$id = $_POST['id'];
	$code = $_POST['code'];
	$okp = $_POST['okp'];
	$code_mtr = $_POST['code_mtr'];
	$link_mtr = $_POST['link_mtr'];
	$units_mtr = $_POST['units_mtr'];
	$units_normfact = $_POST['units_normfact'];
	$units_norm = $_POST['units_norm'];
	$norm_factor = $_POST['norm_factor'];
	$value_norm = $_POST['value_norm'];
	$applier = $_POST['applier'];
	$date_begin = $_POST['date_begin'];
	$date_end = $_POST['date_end'];
	$department = $_POST['department'];
	$code_mvz = $_POST['code_mvz'];
	$mvz = $_POST['mvz'];

	//echo "$id|$code|$okp|$code_mtr|$link_mtr|$units_mtr|$units_normfact|$units_norm|$norm_factor|$value_norm|$applier|$date_begin|$date_end|$department|$code_mvz|$mvz";
	
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES utf8");
	
	mysql_query("insert into aho (id,code,okp,code_mtr,link_mtr,units_mtr,units_normfact,units_norm,norm_factor,value_norm,applier,date_begin,date_end,department,code_mvz,mvz) values ('$id','$code','$okp','$code_mtr','$link_mtr','$units_mtr','$units_normfact','$units_norm','$norm_factor','$value_norm','$applier','$date_begin','$date_end','$department','$code_mvz','$mvz')");
	echo "Объект $link_mtr успешно добавлен.";
?>
