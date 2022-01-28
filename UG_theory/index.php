<?
ini_set("session.use_trans_sid",1);
ini_set("session.use_only_cookies",0);
ini_set("session.use_cookies",0);
session_start();

$login = $_POST['login'];
$pass = $_POST['pass'];

if (!isset($_SESSION['access'])) {
	
$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT count(*),permission FROM `ug_logins` where login='$login' and pass='$pass'", $link);
	while($row = mysql_fetch_array($retval)) {
		$yes_no = $row[0];
		$perm = $row[1];
	}

if($yes_no == 0){
	$_SESSION['access'] = 0;
}
if($perm == 1){
	$_SESSION['access'] = 1;
	}
if($perm == 2){
	$_SESSION['access'] = 2;
	}
}

//echo "<script>alert($t);</script>";
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Информационно-обучающая система «Добыча, сбор и транспорт ГЖС на АГПЗ»</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
</head>
<body oncontextmenu="return false" background=background2.jpg > 
<!--- <br><center><h1>Информационно-обучающая система «Добыча, сбор и транспорт ГЖС на АГПЗ»</h1></center><br> --->
<table background=background.jpg border=0 width=70% align=center>
<tr>
<td>
<table background=background.jpg border=0 width=100% bordercolor=#001279 cellpadding=5 align=center>
<tr>
<td colspan=2 background=background3.jpg align=center height=100px>
<font size=7 color=white><b>Конструктор учебно-методических и информационных блоков</b></font>
</td>
</tr>
<tr>
<td align=left colspan=2><br>
<!--- <center><h3>Информационно-обучающая система «Добыча, сбор и транспорт ГЖС на АГПЗ» предназначена для:</h3><center> --->
<!--- <center><img src=logo.jpg></center> --->
<p align=left><font size=6 color=#000064>
Программный продукт предназначен для создания учебно-методических и информационных блоков с целью обучения персонала в рамках производственно-технических курсов или самостоятельного обучения, создания презентационных или справочных материалов.
<br><br>
</font>

</td>
</tr>

<tr>



<?
if($_SESSION['access']==1){
	echo "<td align=center style='border:1px solid #0000FF' colspan=2>";
} else {
	echo "<td align=center style='border:1px solid #0000FF'>";
}


if($_SESSION['access']>=1){
echo "<br><form action='main.php' method='post' style='margin:0;' id='form1' target=_self>";
echo "<input type='submit' style='background: url(button.jpg);font-size:25;font-family:Times;width:537px;height:59px;border:1px solid white;color:white' value='Выбор блока' id='obuch'>";

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `ug_theory_systems` order by id", $link);
echo "<br><br><select id=systems name=systems style='width:537px;font-size:17pt;font-family:times'>";
	while($row = mysql_fetch_array($retval)) {
		$sys_id = $row[0];
		$sys_name = $row[1];
		$sys_desc = $row[2];
		echo "<option>$sys_desc</option>";
	}
	echo "</select>";

echo "<br><br></form>";	
}
?>

</td>

<?
if($_SESSION['access']==2){
	echo "<td align=center style='border:1px solid #0000FF'>";
echo "<br>";
echo "<form action='redaktor.php' method='post' style='margin:0;' id='form2' target=_blank>";
echo "<input type='submit' style='background: url(button.jpg);font-size:25;font-family:Times;width:537px;height:59px;border:1px solid white;color:white' value='Конструктор' id='konstr'>";

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `ug_theory_systems` order by id", $link);
echo "<br><br><select id=systems name=systems style='width:537px;font-size:17pt;font-family:times'>";
	while($row = mysql_fetch_array($retval)) {
		$sys_id = $row[0];
		$sys_name = $row[1];
		$sys_desc = $row[2];
		echo "<option>$sys_desc</option>";
	}
	echo "</select>";
echo "</form>";
} else {
	//echo "<td></td>";
}
?>

<br>
<br>

</tr>

<tr>
<td align=center>
<?
if($_SESSION['access']==2){
	echo "<form action='' method='post' style='margin:0;'>";
	echo "<input type='button' style='background: url(button.jpg);font-size:25;font-family:Times;width:537px;height:59px;border:1px solid white;color:white' value='Редактор блоков' onclick=\"window.open('system_editor.php', '_blank')\" id='editor'>";
	echo "</form>";
}
?>
</td>
<td align=center>
<?
if($_SESSION['access']==2){
	echo "<form action='' method='post' style='margin:0;'>";
	echo "<input type='button' style='background: url(button.jpg);font-size:25;font-family:Times;width:537px;height:59px;border:1px solid white;color:white' value='Редактор документов' onclick=\"window.open('document_editor.php', '_blank')\" id='edt_doc'>";
	echo "</form>";
}
?>
</td>

</tr>

<tr>
	<td align=center colspan=2><br><br><br>
		<form action='' method='post' style='margin:0;'>
		<input type='button' style='background: url(button.jpg);font-size:25;font-family:Times;width:537px;height:59px;border:1px solid white;color:white' value='Выйти из системы' onclick="window.open('hello.php', '_self')">
		</form><br><br>
	</td>
</tr>

<tr>

<tr>
<td colspan=2>
<center><img src=footer.jpg></center>
</td>
</tr>

</table>
</td>
</tr>
</table>
<?
	if($_SESSION['access']==0) {
		header('Location: hello.php');
		exit;
	}
	
?>
</body>
</html>

