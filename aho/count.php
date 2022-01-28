<?php
	$count = $_POST['count'];

	//echo "$id|$code|$okp|$code_mtr|$link_mtr|$units_mtr|$units_normfact|$units_norm|$norm_factor|$value_norm|$applier|$date_begin|$date_end|$department|$code_mvz|$mvz";
	print "<table border=1 width=100% id='table_body' style='table-layout:fixed;'>";
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES utf8");
	$retval = mysql_query("SELECT * FROM `aho`", $link);
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
		
		$itog = $value_norm * $count;
		$itog_kvartal = $itog / 4;
		$value_norm_kvartal = $value_norm / 4;

		if($_SERVER['PHP_AUTH_USER']=="aho"){
			print "<tr id='$id' onclick=edit('$id'); onmouseover=hand_on('$id'); onmouseout=hand_off('$id'); oncontextmenu=right_click('$id');>";
		} else {
			print "<tr id='$id' onclick=edit('$id'); onmouseover=hand_on('$id'); onmouseout=hand_off('$id'); >";
		}
		
		print "<td width=60px>$id</td>";
		print "<td width=500px>$link_mtr</td>";
		print "<td  width=100px>$value_norm_kvartal</td>";
		print "<td  width=120px>$itog_kvartal $units_mtr</td>";
		print "<td  width=100px>$value_norm</td>";
		print "<td  width=120px>$itog $units_mtr</td>";
		print "</tr>";
	}
	print "</table>";
	
	//echo "Объект $link_mtr успешно изменён.";
?>
