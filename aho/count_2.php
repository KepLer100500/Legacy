<?php
	$sel_depart = $_POST['sel_depart'];

	//echo "$id|$code|$okp|$code_mtr|$link_mtr|$units_mtr|$units_normfact|$units_norm|$norm_factor|$value_norm|$applier|$date_begin|$date_end|$department|$code_mvz|$mvz";
	print "<table border=1 width=100% id='table_body' style='table-layout:fixed;'>";
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES utf8");
	$retval = mysql_query("SELECT * FROM `aho_2`", $link);
	while($row = mysql_fetch_array($retval)) {
		$id = $row[0];
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
	
		$link0 = mysql_connect("10.25.8.8", "admin", "conect");
		mysql_query("use aho");
		mysql_query("SET NAMES utf8");
		$retval0 = mysql_query("SELECT id FROM `aho_2_podr` where name_podr='$sel_depart'", $link0);
		while($row0 = mysql_fetch_array($retval0)) {
			$id_podr = $row0[0];
		}
		mysql_close($link0);
		
		$link2 = mysql_connect("10.25.8.8", "admin", "conect");
		mysql_query("use aho");
		mysql_query("SET NAMES utf8");
		$retval2 = mysql_query("SELECT id FROM `aho_2_factor` where name_factor='$applier'", $link2);
		while($row2 = mysql_fetch_array($retval2)) {
			$id_factor = $row2[0];
		}
		mysql_close($link2);
		
		$link1 = mysql_connect("10.25.8.8", "admin", "conect");
		mysql_query("use aho");
		mysql_query("SET NAMES utf8");
		$retval1 = mysql_query("SELECT val_norm FROM `aho_2_norm` where id_podr='$id_podr' and id_factor='$id_factor'", $link1);
		while($row1 = mysql_fetch_array($retval1)) {
			$val_norm = $row1[0];
		}
		mysql_close($link1);		
		
		if($sel_depart == "Все подразделения"){
			$val_norm = 0;
			$link4 = mysql_connect("10.25.8.8", "admin", "conect");
			mysql_query("use aho");
			mysql_query("SET NAMES cp1251");
			$retval4 = mysql_query("SELECT val_norm FROM `aho_2_norm` where id_factor='$id_factor'", $link4);
			while($row4 = mysql_fetch_array($retval4)) {
				$val_norm += $row4[0];
			}
			mysql_close($link4);
		}
		
		$itog = $value_norm * $val_norm;
		$itog_kvartal = $itog / 4;
		$value_norm_kvartal = $value_norm / 4;
		
		if($_SERVER['PHP_AUTH_USER']=="aho"){
			print "<tr id='$id' onclick=edit('$id'); onmouseover=hand_on('$id'); onmouseout=hand_off('$id'); oncontextmenu=right_click('$id');>";
		} else {
			print "<tr id='$id' onclick=edit('$id'); onmouseover=hand_on('$id'); onmouseout=hand_off('$id'); >";
		}
		
		print "<td width=60px>$id</td>";
		print "<td width=400px>$link_mtr</td>";
		print "<td width=200px>$applier</td>";
		print "<td  width=100px>$value_norm_kvartal</td>";
		print "<td  width=120px>$itog_kvartal $units_mtr</td>";
		print "<td  width=100px>$value_norm</td>";
		print "<td  width=120px>$itog $units_mtr</td>";
		print "</tr>";
	}
	print "</table>";
	mysql_close($link);

	//echo "Объект $link_mtr успешно изменён.";
?>
