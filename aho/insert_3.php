<?php
	$name_factor = $_POST['new_f'];
	
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES utf8");
	mysql_query("insert into aho_2_factor values (0,'$name_factor')");
	
	$retval = mysql_query("SELECT id FROM `aho_2_factor` where name_factor='$name_factor'", $link);
	while($row = mysql_fetch_array($retval)) {
		$id_factor = $row[0];
	}
	
	$retval = mysql_query("SELECT id FROM `aho_2_podr`", $link);
	while($row = mysql_fetch_array($retval)) {
		$id_podr = $row[0];
		mysql_query("insert into aho_2_norm values ('$id_podr','$id_factor',0)");
	}	
	
	mysql_close($link);
	echo "Объект $name_factor успешно добавлен.";
?>
