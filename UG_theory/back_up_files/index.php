<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>�������������-��������� ������� �������, ���� � ��������� ��� �� ���ǻ</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
</head>
<script>
function check_pass() {
	x = prompt("�������������","");
	if(x == "www") {
		//good
	} else {
		alert("������ �������!");
		document.body.innerHTML += "<form id='FormPass' action='bad.php' method='post'></form>";
		document.getElementById("FormPass").submit();
	}

}
</script>


<body oncontextmenu="return false" background=background2.jpg onload=check_pass()> 
<!--- <br><center><h1>�������������-��������� ������� �������, ���� � ��������� ��� �� ���ǻ</h1></center><br> --->
<table background=background.jpg border=0 width=70% align=center>
<tr>
<td>
<table background=background.jpg border=0 width=100% bordercolor=#001279 cellpadding=5 align=center>
<tr>
<td colspan=2 background=background3.jpg align=center height=100px>
<font size=6 color=white><b>����������� ������-������������ ������ �� �����������<br>�������� �������� � �������� ������</b></font>
</td>
</tr>
<tr>
<td align=left colspan=2><br>
<!--- <center><h3>�������������-��������� ������� �������, ���� � ��������� ��� �� ���ǻ ������������� ���:</h3><center> --->
<!--- <center><img src=logo.jpg></center> --->
<p align=left><font size=6>
����������� ������� ������������ ��� �������� ������-������������ ������ � ����� ����������� �������� ��������� � ������ ���������������-����������� ������, ���������������� �������� � �������� ������ (������������, �������� �� ������� �����������).
<br><br>
�� �������� ������ ��������� ���������� �� ����������� �������:<br>
vatarasov@astrakhan-dobycha.gazprom.ru;<br>
repin@astrakhan-dobycha.gazprom.ru<br>
<br>
</font>

</td>
</tr>
<tr>
<td align=center>
<form action='' method='post' style='margin:0;'>
<input type='submit' style='background: url(button.jpg);font-size:25;font-family:Times;width:537px;height:59px;border:1px solid white;color:white' value='����������' onclick="window.open('video/Instruction.mp4', '_blank')">
</form>
</td>
<td align=center>
<form action='' method='post' style='margin:0;'>
<input type='submit' style='background: url(button.jpg);font-size:25;font-family:Times;width:537px;height:59px;border:1px solid white;color:white' value='���������������' onclick="window.open('video/main.avi', '_blank')">
</form>
</td>
</tr>
<tr>
<td align=center style="border:1px solid #0000FF">
<br>
<form action='main.php' method='post' style='margin:0;'>
<input type='submit' style='background: url(button.jpg);font-size:25;font-family:Times;width:537px;height:59px;border:1px solid white;color:white' value='������-������������ ���� (��������)'>
<?
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
?>
<br>
<br>
</form>
</td>
<td align=center style="border:1px solid #0000FF">
<br>
<form action='redaktor.php' method='post' style='margin:0;'>
<input type='submit' style='background: url(button.jpg);font-size:25;font-family:Times;width:537px;height:59px;border:1px solid white;color:white' value='�����������' >
<?
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
?>
</form>
<br>
<br>
</td>
</tr>

<tr>
<td align=center>
<form action='' method='post' style='margin:0;'>
<input type='button' style='background: url(button.jpg);font-size:25;font-family:Times;width:537px;height:59px;border:1px solid white;color:white' value='�������� ������' onclick="window.open('system_editor.php', '_self')">
</form>
</td>
<td align=center>
<form action='' method='post' style='margin:0;'>
<input type='button' style='background: url(button.jpg);font-size:25;font-family:Times;width:537px;height:59px;border:1px solid white;color:white' value='�������� ����������' onclick="window.open('document_editor.php', '_self')">
</form>
</td>
</tr>



<tr>
<td align=center>
<form action='' method='post' style='margin:0;'>
<input type='button' style='background: url(button.jpg);font-size:25;font-family:Times;width:200px;height:59px;border:1px solid white;color:white' value='���� �1' onclick="window.open('../UG/index.html', '_blank')">
&nbsp;&nbsp;&nbsp;
<input type='button' style='background: url(button.jpg);font-size:25;font-family:Times;width:200px;height:59px;border:1px solid white;color:white' value='���� �2' onclick="window.open('../UG2/index.html', '_blank')">
</form>
</td>
<td align=center>
<form action='' method='post' style='margin:0;'>
<input type='button' style='background: url(button.jpg);font-size:25;font-family:Times;width:537px;height:59px;border:1px solid white;color:white' value='���������' onclick="window.open('foto.php', '_self')">
</form>
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
</body>
</html>