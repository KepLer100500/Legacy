<?php
	$sel_depart = $_POST['sel_depart'];
	echo "<table border=1 width=100%>";
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES utf8");
	$retval = mysql_query("SELECT id FROM `aho_2_podr` where name_podr='$sel_depart'", $link);
	while($row = mysql_fetch_array($retval)) {
		$id_podr = $row[0];
	}
	
	
	$retval = mysql_query("SELECT * FROM `aho_2_factor`", $link);
	while($row = mysql_fetch_array($retval)) {
		$id_factor = $row[0];
		$name_factor = $row[1];
		
			$retval0 = mysql_query("SELECT val_norm FROM `aho_2_norm` where id_podr='$id_podr' and id_factor='$id_factor'", $link);
			while($row0 = mysql_fetch_array($retval0)) {
				$val_norm = $row0[0];
				echo "<tr><td>$name_factor</td><td><input type='text' id='fuck_$id_factor' size='30' value='$val_norm'>&nbsp;&nbsp;&nbsp;<img src=Delete.png width=20px onclick=\"del_factor('$id_factor')\" style='cursor:hand'></td></tr>";
			}
		
		
	}
	

echo "</table>";
	
mysql_close($link);
?>
