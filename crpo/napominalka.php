<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Редактор Объектов ЦРПО</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
</head>
<body>

<div id="menu">
	<form form action='history.php' method='post'>
		<input type="submit" value="Назад">
	</form>
</div>

<?
echo "<br><br><br><table border=1 width=70% align=center bordercolor=black cellpadding=5>";
echo "<tr>";
	echo "<td colspan=4 align=center><font size=5>Перечень просроченных работ</font></td>";
echo "</tr>";

$cur_date = date('d-m-Y');
$cur_date = strtotime($cur_date);
$cur_date -= 15768000;
$cur_date_new = $cur_date + 15768000;

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use crpo");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `history` order by skv", $link);
while($row = mysql_fetch_array($retval)) {
	$skv = $row[1];
	$alarm_date = $row[2];
	$person = $row[3];
	$work = $row[4];
	$crit = $row[5];
	
	
	$alarm_date1 = strtotime($alarm_date);
	
	if($cur_date > $alarm_date1 && $crit==1){
		$cur_date_new1 = $cur_date_new - $alarm_date1;
		$cur_date_new1 = $cur_date_new1 / (24*60*60);
		echo "<tr>";
			echo "<td>";
				echo "$skv";
			echo "</td>";
			echo "<td>";
				echo "$alarm_date <font color=red>($cur_date_new1 дней)</font>";
			echo "</td>";
			echo "<td>";
				echo "$person";
			echo "</td>";
			echo "<td>";
				echo "$work";
			echo "</td>";			
			
		echo "</tr>";
	}
}



echo "</table>";

?>

</body>
</html>