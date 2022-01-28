<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Редактор систем</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
</head>
<body background=background2.jpg>
<script>

function edit(name,desc,page,id_e,old_name){
var name_edt = document.getElementById(name).value;
var desc_edt = document.getElementById(desc).value;
var page_edt = document.getElementById(page).value;
var id_edt = document.getElementById(id_e).value;
if(confirm("Вы точно хотите отредактировать объект " + desc_edt + "?")) {
	document.body.innerHTML += "<form action='' method='post' id='Form1'><input type='hidden' name='mod' value='1'><input type='hidden' name='name_edt' value='" + name_edt + "'><input type='hidden' name='desc_edt' value='" + desc_edt + "'><input type='hidden' name='page_edt' value='" + page_edt + "'><input type='hidden' name='id_edt' value='" + id_edt + "'><input type='hidden' name='old_name' value='" + old_name + "'></form>";
	document.getElementById("Form1").submit();
	} else {
		return false;
	}
}

function del(id_del,desc,name){
var id_delete = document.getElementById(id_del).value;
var desc_delete = document.getElementById(desc).value;
var name_delete = document.getElementById(name).value;
if(confirm("Вы точно хотите удалить объект " + desc_delete + "?")) {
	document.body.innerHTML += "<form action='' method='post' id='Form1'><input type='hidden' name='mod' value='2'><input type='hidden' name='id_delete' value='" + id_delete + "'><input type='hidden' name='name_del' value='" + name_delete + "'></form>";
	document.getElementById("Form1").submit();
	} else {
		return false;
	}
}

function check_load_img() {
	if(document.getElementById("userfile").value == "") {
		alert("Вы не выбрали файл для загрузки!");
		return false;		
	} else {
		return true;
	}	
}
/*
function ins(name_ins){
alert(name_ins);
//var name_ins = document.getElementById(new_sys_name).value;

var desc_ins = document.getElementById(new_sys_desc).value;
var page_ins = document.getElementById(new_first_page).value;
if(confirm("Вы точно хотите добавить объект " + desc_edt + "?")) {
	document.body.innerHTML += "<form action='' method='post' id='Form1'><input type='hidden' name='mod' value='3'><input type='hidden' name='name_edt' value='" + name_ins + "'><input type='hidden' name='desc_edt' value='" + desc_ins + "'><input type='hidden' name='page_edt' value='" + page_ins + "'></form>";
	document.getElementById("Form1").submit();
	} else {
		return false;
	}
}
*/

</script>
<center>
<?
$mod = $_POST['mod'];

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

if($mod==1){
//UPDATE
	$name_edt = $_POST['name_edt'];
	$desc_edt = $_POST['desc_edt'];
	$page_edt = $_POST['page_edt'];
	$id_edt = $_POST['id_edt'];
	$old_name = $_POST['old_name'];
	//echo "<script>alert(\"$old_name - $name_edt\")</script>";
	$link_edt = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use UG");
	mysql_query("SET NAMES cp1251");
	mysql_query("update `ug_theory_systems` set name='$name_edt', description='$desc_edt', first_page='$page_edt' where id='$id_edt'", $link_edt);
	mysql_close($link_edt);

	$link_edt = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use UG");
	mysql_query("SET NAMES cp1251");
	mysql_query("ALTER TABLE ug_theory_$old_name RENAME ug_theory_$name_edt", $link_edt);
	mysql_query("ALTER TABLE ug_theory_test_$old_name RENAME ug_theory_test_$name_edt", $link_edt);
	mysql_query("ALTER TABLE ug_theory_options_$old_name RENAME ug_theory_options_$name_edt", $link_edt);
	mysql_close($link_edt);

	echo "<script>document.body.innerHTML += \"<form action='' method='post' id='Reload_Form'></form>\"; document.getElementById('Reload_Form').submit();</script>";	
}

if($mod==2){
//DELETE

	$name_del = $_POST['name_del'];
	$id_delete = $_POST['id_delete'];
	$link_dlt = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use UG");
	mysql_query("SET NAMES cp1251");
	mysql_query("delete from `ug_theory_systems` where id='$id_delete'", $link_dlt);
	mysql_query("DROP TABLE ug_theory_$name_del", $link_dlt);
	mysql_query("DROP TABLE ug_theory_test_$name_del", $link_dlt);
	mysql_query("DROP TABLE ug_theory_options_$name_del", $link_dlt);
	mysql_close($link_dlt);
	echo "<script>document.body.innerHTML += \"<form action='' method='post' id='Reload_Form1'></form>\"; document.getElementById('Reload_Form1').submit();</script>";	
}
/*
if($mod==3){
//INSERT
	$name_edt = $_POST['name_edt'];
	$desc_edt = $_POST['desc_edt'];
	$page_edt = $_POST['page_edt'];
	$link_edt = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use UG");
	mysql_query("SET NAMES cp1251");
	mysql_query("insert into `ug_theory_systems` values ('','$name_edt','$desc_edt','$page_edt')", $link_edt);
	mysql_close($link_edt);			
	echo "<script>document.body.innerHTML += \"<form action='' method='post' id='Reload_Form'></form>\"; document.getElementById('Reload_Form').submit();</script>";	
}
*/
if($_POST['add_button']){
//INSERT

	$name_edt = $_POST['new_sys_name'];
	$desc_edt = $_POST['new_sys_desc'];
	$page_edt = $_POST['new_first_page'];
	//echo "<script>alert(\"$name_edt - $desc_edt - $page_edt\");</script>";

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
mysql_query("insert into `ug_theory_systems` values ('','$name_edt','$desc_edt','$page_edt')", $link);
mysql_close($link);	

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
mysql_query("CREATE TABLE `ug_theory_$name_edt` (`id` int(11) NOT NULL AUTO_INCREMENT, `shema` varchar(100) NOT NULL, `name` varchar(250) NOT NULL, `coords` varchar(100) NOT NULL, `obzor` longtext NOT NULL, `image` varchar(250) NOT NULL DEFAULT '', `parent_img` varchar(250) NOT NULL, `doc` text NOT NULL,  `video` text NOT NULL, `D3` text NOT NULL, PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;", $link);

mysql_query("CREATE TABLE `ug_theory_options_$name_edt` (`shema` varchar(250) NOT NULL, `parent_img` varchar(250) NOT NULL, `name` varchar(250) DEFAULT NULL, PRIMARY KEY (`shema`)) ENGINE=MyISAM DEFAULT CHARSET=utf8;", $link);

mysql_query("CREATE TABLE `ug_theory_test_$name_edt` (`id` int(11) NOT NULL AUTO_INCREMENT, `shema` varchar(100) NOT NULL, `vopros` varchar(250) NOT NULL, `otvet1` varchar(250) NOT NULL, `otvet2` varchar(250) NOT NULL, `otvet3` varchar(250) NOT NULL DEFAULT '', `otvet4` varchar(250) NOT NULL, `verno` int(11) NOT NULL, PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=273 DEFAULT CHARSET=utf8;", $link);

mysql_close($link);	

}

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `ug_theory_systems` order by id", $link);
$i=0;
	echo "<br><br>";
	echo "<table border=1 width=70% cellpadding=2>";
	echo "<tr>";
	echo "<td align=center background=background3.jpg><font color=white size=5>Идентификатор (Без пробелов!)</font></td>";
	echo "<td align=center background=background3.jpg><font color=white size=5>Название</font></td>";
	echo "<td  align=center background=background3.jpg><font color=white size=5>Первая страница (Без пробелов!)</font></td>";
	echo "<td colspan=2 background=background3.jpg> </td>";
	echo "</tr>";
	while($row = mysql_fetch_array($retval)) {
		$sys_id = $row[0];
		$sys_name = $row[1];
		$sys_desc = $row[2];
		$first_page = $row[3];
		
		echo "<input type='hidden' name='id_$i' value='$sys_id'>";
		echo "<tr>";
		echo "<td align=center background=background.jpg><input type='text' name='name_$i' size=50 value='$sys_name' style=\"background:#dddddd;\"></td>";
		echo "<td background=background.jpg><input type='text' name='desc_$i' size=70 value='$sys_desc' ></td>";
		echo "<td background=background.jpg><input type='text' name='page_$i' size=50 value='$first_page' style=\"background:#dddddd;\"></td>";
		echo "<td align=center background=background.jpg><input type='image' src=test.png width=30 value='' name='edit_button' onclick='edit(\"name_$i\",\"desc_$i\",\"page_$i\",\"id_$i\",\"$sys_name\");'></td>";
		echo "<td align=center background=background.jpg><input type='image' src=delete.png width=30 value='' name='delete_button' onclick='del(\"id_$i\",\"desc_$i\",\"name_$i\");'></td>";
		echo "</tr>";
		$i++;
	}
	echo "<form action='' enctype='multipart/form-data' method='post'>";
	echo "<tr bgcolor=#aaffaa>";
	echo "<td align=center><br><input type='text' name='new_sys_name' size=50 value=''><br><br></td>";
	echo "<td><br><input type='text' name='new_sys_desc' size=70 value=''><br><br></td>";
	echo "<td><br><input type='text' name='new_first_page' size=50 value=''><br><br></td>";
	echo "<td colspan=2 align=center><br><input type='submit' src=add.png width=30 value='Добавить' name='add_button' onclick='if(confirm(\"Вы точно хотите добавить новый объект?\")){return true;} else {return false;}'><br><br></td>";
	echo "</tr>";
	echo "</table>";
	echo "</form>";
mysql_close($link);

?>

<br>
<form action='index.php' method='post' style='margin:0;'>
<input type='submit' value='На главную' style="background: url(button_mini.jpg);font-size:20;font-family:Times;color:white;width:202px;height:42px;border:1px solid white;">
</form>
</center>
</body>
</html>