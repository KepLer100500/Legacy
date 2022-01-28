<?php
	$str = $_POST['str'];
	$sel_depart = $_POST['dep'];

	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES utf8");
	$retval = mysql_query("SELECT id FROM `aho_2_podr` where name_podr='$sel_depart'", $link);
	while($row = mysql_fetch_array($retval)) {
		$id_podr = $row[0];
	}
	
	$cout_tags = substr_count($str,"|");
	$str = str_replace(",", ".", $str);
	$kusochek = explode("|", $str);
	
	for($i=0;$i<$cout_tags;$i++){
		$kusochek[$i] = str_replace("fuck_", "", $kusochek[$i]);
		$val = explode("=", $kusochek[$i]);
		$sql = "update aho_2_norm set val_norm='$val[1]' where id_factor='$val[0]' and id_podr='$id_podr'";
		//echo "$sql";
		mysql_query($sql);
	}
	echo "Факторы подразделения $sel_depart успешно изменены!";
	mysql_close($link);

	//echo "$id|$code|$okp|$code_mtr|$link_mtr|$units_mtr|$units_normfact|$units_norm|$norm_factor|$value_norm|$applier|$date_begin|$date_end|$department|$code_mvz|$mvz";
	/*
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES utf8");
	mysql_query("update aho_2_norm set code='$code', okp='$okp', code_mtr='$code_mtr', link_mtr='$link_mtr', units_mtr='$units_mtr', units_normfact='$units_normfact', units_norm='$units_norm', norm_factor='$norm_factor', value_norm='$value_norm', applier='$applier', date_begin='$date_begin', date_end='$date_end', department='$department', code_mvz='$code_mvz', mvz='$mvz' where id='$id'");
	echo "Объект $link_mtr успешно изменён.";
	*/
?>
