<?php
	$id_factor = $_POST['id_factor'];
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES utf8");
	mysql_query("delete from `aho_2_factor` where id='$id_factor'");
	mysql_query("delete from `aho_2_norm` where id_factor='$id_factor'");
	echo "Объект успешно удалён.";
?>
