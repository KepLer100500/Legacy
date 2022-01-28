<?php

	$id = $_POST['id'];

	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	//mysql_query("SET NAMES cp1251");
	mysql_query("SET NAMES utf8");
	
	$retval = mysql_query("SELECT * FROM `aho_2` where id = $id", $link);
	while($row = mysql_fetch_array($retval)) {

		$code = $row[1];
		$okp = $row[2];
		$code_mtr = $row[3];
		$link_mtr = $row[4];
		$units_mtr = $row[5];
		$units_normfact = $row[6];
		$units_norm = $row[7];
		$norm_factor = $row[8];
		$value_norm = $row[9];
		$applier = $row[10];
		$date_begin = $row[11];
		$date_end = $row[12];
		$department = $row[13];
		$code_mvz = $row[14];
		$mvz = $row[15];
	}
		
		
//echo "$id|$code|$okp|$code_mtr|$link_mtr|$units_mtr|$units_normfact|$units_norm|$norm_factor|$value_norm|$applier|$date_begin|$date_end|$department|$code_mvz|$mvz";

echo "<table width=100% border=0 bgcolor='#2CB1D3'><tr><td width=99% align=center>Добавить новый элемент по шаблону</td><td><img id=close_button_add src=close_new.png width=30 onclick='close_button()' onmouseover=hand_on('close_button_add'); onmouseout=hand_off('close_button_add');></td></tr></table><br><table border=1 width=100%><tr><td>Ид. номер</td><td><input type='text' name='id_add' size='70' value='' style='background-color: #FFAAAA'></td></tr><tr><td>Код норматива</td><td><input type='text' name='code_add' size='70' value='$code'></td></tr><tr><td>ОКП</td><td><input type='text' name='okp_add' size='70' value='$okp'></td></tr><tr><td>Код МТР</td><td><input type='text' name='code_mtr_add' size='70' value='$code_mtr'></td></tr><tr><td>Связанный МТР</td><td><input type='text' name='link_mtr_add' size='70' value='$link_mtr'></td></tr><tr><td>Ед. изм. МТР</td><td><input type='text' name='units_mtr_add' size='70' value='$units_mtr'></td></tr><tr><td>Ед. изм. нормофактора</td><td><input type='text' name='units_normfact_add' size='70' value='$units_normfact'></td></tr><tr><td>Единицы измерения норм (выбор)</td><td><input type='text' name='units_norm_add' size='70' value='$units_norm'></td></tr><tr><td>Нормообразуюший фактор</td><td><input type='text' name='norm_factor_add' size='70' value='$norm_factor'></td></tr><tr><td>Значение норматива</td><td><input type='text' name='value_norm_add' size='70' value='$value_norm'></td></tr><tr><td><b>Объект применения</b></td><td>";

//echo "<input type='text' name='applier_add' size='70' value='$applier'>";
	echo "<select name=applier_add id=applier_add>";
	$link2 = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES utf8");
	$retval2 = mysql_query("SELECT * FROM `aho_2_factor`", $link2);
	while($row2 = mysql_fetch_array($retval2)) {
		$id_factor = $row2[0];
		$name_factor = $row2[1];
			if($name_factor == $applier){
				echo "<option value=$id_factor selected>$name_factor</option>";
			} else {
				echo "<option value=$id_factor>$name_factor</option>";			
			}
	}
	mysql_close($link2);
	echo "</select>";

echo "</td></tr><tr><td>Период действия||Начало</td><td><input type='text' name='date_begin_add' size='70' value='$date_begin'></td></tr><tr><td>Период действия||Конец</td><td><input type='text' name='date_end_add' size='70' value='$date_end'></td></tr><tr><td>Подразделение</td><td><input type='text' name='department_add' size='70' value='$department'></td></tr><tr><td>Код МВЗ</td><td><input type='text' name='code_mvz_add' size='70' value='$code_mvz'></td></tr><tr><td>МВЗ</td><td><input type='text' name='mvz_add' size='70' value='$mvz'></td></tr></table><br><center><input type='button' value='Добавить' onclick='do_insert();'></center>";

?>
