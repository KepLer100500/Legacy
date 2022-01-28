<?php
	$id = $_POST['id'];
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES utf8");
	mysql_query("delete from `aho_2` where id='$id'");
	echo "Объект успешно удалён.";
?>
