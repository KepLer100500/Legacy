<?php
	$id = $_POST['id'];
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use trade_union");
	mysql_query("SET NAMES utf8");
	mysql_query("delete from `profsouz` where id='$id'");
	echo "Объект успешно удалён.";
?>
