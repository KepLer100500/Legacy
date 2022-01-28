<?
ini_set("session.use_trans_sid",1);
ini_set("session.use_only_cookies",0);
ini_set("session.use_cookies",0);
session_start();
if (!isset($_SESSION['access'])) {
	header('Location: hello.php');
	exit;
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Тест</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
</head>
<body background=background2.jpg>
<script>

<?
	$systems = $_POST['systems'];

	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use UG");
	mysql_query("SET NAMES cp1251");
	$retval = mysql_query("SELECT * FROM `ug_theory_systems` where description='$systems'", $link);
	while($row = mysql_fetch_array($retval)) {
		$sys_id = $row[0];
		$sys_name = $row[1];
		$sys_desc = $row[2];
	}
?>

function check_otvet(){
	var i = document.getElementById("i").value;
	var j;
	var k=0;
	for(j=0;j<i;j++){
		var name_obj = "o_" + j;
		var tolpa_otvetov = document.getElementsByName(name_obj);
		for(var f = 0; f < tolpa_otvetov.length; f++) {
			if(tolpa_otvetov[f].checked == true) {
				otvet = tolpa_otvetov[f].value;
				true_answer = document.getElementById("o_v_"+j).value;
				if(true_answer==otvet) {
					k++;
				}
			}
		}
	}
	alert("Количество верных ответов: "+k+"\nКоличество вопросов: "+i);
	
	
}


</script>

<center>
<?
$shema = $_POST['shema'];
$shema_name = $_POST['shema_name'];
//$shema = "f1";
$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$i=0;
$j=1;
echo "<table border=0 width=100% background=background2.jpg cellpadding=5>";
echo "<tr>";

$retval = mysql_query("SELECT * FROM `ug_theory_test_$sys_name` where shema = '$shema' order by id", $link);
	while($row = mysql_fetch_array($retval)) {
	
		$id = $row[0];
		//$shema = $row[1];
		$vopros = $row[2];
		$otvet1 = $row[3];
		$otvet2 = $row[4];
		$otvet3 = $row[5];
		$otvet4 = $row[6];
		$verno = $row[7];	
echo "<td width=30%>";
		echo "<table border=1  width=100% height=450 cellpadding=10 background=background.jpg>";
		echo "<tr>";
		echo "<td align=center colspan=2><font size=4>$vopros</font></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align=center width=10%><input type='radio' value='1' name='o_$i'></td>";
		echo "<td align=center><font size=4>$otvet1</font></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align=center width=10%><input type='radio' value='2' name='o_$i'></td>";
		echo "<td align=center><font size=4>$otvet2</font></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align=center width=10%><input type='radio' value='3' name='o_$i'></td>";
		echo "<td align=center><font size=4>$otvet3</font></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align=center width=10%><input type='radio' value='4' name='o_$i'></td>";
		echo "<td align=center><font size=4>$otvet4</font></td>";
		echo "</tr>";
		echo "</table>";
echo "</td>";
		if($j % 3 == 0) {
			echo "</tr>";
			echo "<tr>";
		}	

		echo "<input type='hidden' id='o_v_$i' value='$verno'>";
		
		$i++;
		$j++;
	} 
echo "</tr>";	
echo "</table>";

echo "<input type='hidden' id='i' value='$i'>";
echo "<br><br><br><br>";
mysql_close($link);
?>


</center>
<!---
<div id="menu">
<table bgcolor=white border=0 width=10% bordercolor=#001279>
<tr>
<td bgcolor=white align=center>
<img src=logo.jpg onclick="alert('Команда разработчиков:\n\nРепин Кирилл Геннадьевич\nДьяков Артём Сергеевич\nТарасов Вячеслав Андреевич');">
</td>
</tr>
</table>
</div>
--->
<div id="clock">
<table background=background2.jpg border=0 width=10% cellpadding=10>
<tr>
<td align=center>
<input type='button' name='end' style="background: url(button_mini.jpg);font-size:20;font-family:Times;color:white;width:202px;height:42px;border:1px solid white;" value='Подтвердить ответы' onclick='check_otvet();'>
</td>

<td align=center>
<form action='' method='post' style='margin:0;'>
<input type='button' style='background: url(button_mini.jpg);font-size:20;font-family:Times;color:white;width:202px;height:42px;border:1px solid white;' value='На главную' onclick="window.open('index.php', '_self')">
</form>
</td>

</tr>
</table>
</div>

<div id="exit_b">
<table background=background2.jpg border=0 width=20% cellpadding=10>
<tr>
<td align=center>
<input type='button' name='end' style="background: url(button_mini2.jpg);font-size:20;font-family:Times;color:white;width:412px;height:42px;border:1px solid white;" value='<?echo $shema_name;?>'>
</td>
<td align=center>
<form action='main.php' method='post' style='margin:0;'>
<input type='submit' value='Вернуться к схеме' style="background: url(button_mini.jpg);font-size:20;font-family:Times;color:white;width:202px;height:42px;border:1px solid white;">
<input type='hidden' name='systems' value='<?echo $systems;?>'>
<input type='hidden' name='shema' value='<?echo $shema;?>'>
</form>
</td>
</tr>
</table>
</div>

</body>
</html>