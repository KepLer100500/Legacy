<?php
	$tab_num = $_POST['tab_num'];
	$fio = $_POST['fio'];
	$direction_add = $_POST['direction_add'];
	$event_add = $_POST['event_add'];
	$DateRec_add = $_POST['DateRec_add'];
	$cost_add = $_POST['cost_add'];
	
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use trade_union");
	mysql_query("SET NAMES utf8");
	
	mysql_query("insert into profsouz (id,tab_num,fio,direction,event,DateRec,cost) values (0,'$tab_num','$fio','$direction_add','$event_add','$DateRec_add','$cost_add')");
	echo "Новая запись успешна внесена!";
?>
