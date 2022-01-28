<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Редактор Объектов</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
</head>
<body id=ddd leftmargin=0 topmargin=0>
<?
////////////////////////////////////////////////////////////////
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
//	$sys_name

$parent_img = $_POST['parent'];
$act = $_POST['act'];
$id = $_POST['id'];

$name_dat = $_POST['name_dat'];
$opis_dat = $_POST['opis_dat'];
$file_img = $_POST['file_img'];

$opis_dat = str_replace("\r\n","&nbsp;",$opis_dat);
$opis_dat = str_replace(" ","&nbsp;",$opis_dat);
$name_dat = str_replace(" ","&nbsp;",$name_dat);
$opis_dat = str_replace("'","`",$opis_dat);
$name_dat = str_replace("'","`",$name_dat);
$opis_dat = str_replace("\"","``",$opis_dat);
$name_dat = str_replace("\"","``",$name_dat);

//echo "$parent_img --- $id --- $act";

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
if($act=="del") {
	mysql_query("delete from `ug_theory_$sys_name` where id=$id");		
}
if($act=="edt") {
	mysql_query("update `ug_theory` set name='$name_dat',obzor='$opis_dat',image='$file_img' where id=$id");		
}
echo "<form action='redaktor.php' method='post' id='Form1'><input type='hidden' name='parent' value='$parent_img'><input type='hidden' name='systems' value='$systems'></form>";
echo "<script>document.getElementById(\"Form1\").submit()</script>";
////////////////////////////////////////////////////////////////

mysql_close($link);



?>

</body>
</html>
