<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Редактор меню</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
</head>
<body background=background2.jpg>
<script>

<?
$systems = $_POST['systems'];
?>

function edit(s,p,n){
var shema = document.getElementById(s).value;
var parent_img = document.getElementById(p).value;
var name = document.getElementById(n).value;

if(confirm("Вы точно хотите отредактировать объект " + shema + "?")) {
	document.body.innerHTML += "<form action='' method='post' id='Form1'><input type='hidden' name='mod' value='1'><input type='hidden' name='shema' value='" + shema + "'><input type='hidden' name='systems' value='<?echo $systems;?>'><input type='hidden' name='parent_img' value='" + parent_img + "'><input type='hidden' name='name' value='" + name + "'></form>";
	document.getElementById("Form1").submit();
	} else {
		return false;
	}
}

function del(s,p){
var shema = document.getElementById(s).value;
var parent_img = document.getElementById(p).value;
if(confirm("Вы точно хотите удалить объект " + shema + "?")) {
	document.body.innerHTML += "<form action='' method='post' id='Form1'><input type='hidden' name='mod' value='2'><input type='hidden' name='shema' value='" + shema + "'><input type='hidden' name='systems' value='<?echo $systems;?>'><input type='hidden' name='parent_img' value='" + parent_img + "'></form>";
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


</script>
<center>
<?
$mod = $_POST['mod'];

	
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
	$shema = $_POST['shema'];
	$parent_img = $_POST['parent_img'];
	$name = $_POST['name'];
	$link_edt = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use UG");
	mysql_query("SET NAMES cp1251");
	mysql_query("update `ug_theory_options_$sys_name` set shema='$shema', name='$name', parent_img='$parent_img' where shema='$shema'", $link_edt);
	mysql_close($link_edt);			
	echo "<script>document.body.innerHTML += \"<form action='' method='post' id='Reload_Form'><input type='hidden' name='systems' value='$systems'></form>\"; document.getElementById('Reload_Form').submit();</script>";	
}

if($mod==2){
//DELETE
	$shema = $_POST['shema'];
	$parent_img = $_POST['parent_img'];
	$link_dlt = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use UG");
	mysql_query("SET NAMES cp1251");
	mysql_query("delete from `ug_theory_options_$sys_name` where shema='$shema'", $link_dlt);
	mysql_close($link_dlt);
	$path = "p_img/$parent_img";
	unlink($path);	
	echo "<script>document.body.innerHTML += \"<form action='' method='post' id='Reload_Form1'><input type='hidden' name='systems' value='$systems'></form>\"; document.getElementById('Reload_Form1').submit();</script>";		
}

if($_POST['add_button']){
//INSERT
$path = array(".php",".php4",".php3",".phtml",".pl",".cgi");
foreach ($path as $item){
  if(preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
   echo "Разрешено загружать, только картинки<br />";
   exit();
  }
}
if($_FILES["userfile"]["size"] > 1024*2*1024) {
	echo "Размер файла превышает три мегабайта!";
	exit;
	}
$temp=$_FILES['userfile']['name'];
$shema = $_POST['s_add'];
$name = $_POST['n_add'];
$parent_img = $shema."_".$temp;
$temp = $parent_img;
$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$uploaddir = "p_img/";
mysql_query("insert into `ug_theory_options_$sys_name` values('$shema','$parent_img','$name')");
mysql_close($link);	
$uploadfile = $uploaddir . $temp;
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
echo "<br>Файл ".$_FILES['userfile']['name']." успешно загружен на сервер!";
}

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

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `ug_theory_options_$sys_name` order by shema", $link);
$i=0;
	echo "<table border=1 width=20% cellpadding=5>";
	echo "<tr>";
	echo "<td background=background3.jpg align=center><font color=white size=5>ID</font></td>";
	echo "<td background=background3.jpg align=center><font color=white size=5>Имя файла</font></td>";
	echo "<td nowrap background=background3.jpg align=center><font color=white size=5>Название в меню</font></td>";
	echo "<td colspan=2 background=background3.jpg> </td>";
	echo "</tr>";
	while($row = mysql_fetch_array($retval)) {
		$shema = $row[0];
		$parent_img = $row[1];
		$name = $row[2];
		echo "<tr>";
		echo "<td background=background.jpg><input type='text' id='s_$i' size=5 value='$shema' readonly style=\"background:#cccccc;\"></td>";
		echo "<td background=background.jpg><input type='text' id='p_$i' size=40 value='$parent_img' style=\"background:#cccccc;\"></td>";
		echo "<td nowrap background=background.jpg><input type='text' id='n_$i' size=40 value='$name'></td>";
		echo "<td align=center background=background.jpg><input type='image' src=test.png width=30 value='' name='edit_button' onclick='edit(\"s_$i\",\"p_$i\",\"n_$i\")'></td>";
		echo "<td align=center background=background.jpg><input type='image' src=delete.png width=30 value='' name='delete_button' onclick='del(\"s_$i\",\"p_$i\");'></td>";
		echo "</tr>";
		$i++;
	} 
	echo "<form action='' enctype='multipart/form-data' method='post'>";
	echo "<tr bgcolor=#aaffaa>";
	echo "<td><br><input type='text' name='s_add' size=5 value=''><br><br></td>";
	echo "<td><br><input type='file' name='userfile' size=25 value=''><br><br></td>";
	echo "<td nowrap><br><input type='text' name='n_add' size=40 value=''><br><br></td>";
	echo "<input type='hidden' name='systems' value='$systems'>";
	echo "<td colspan=2 align=center><br><input type='submit' src=add.png width=30 value='Добавить' name='add_button' onclick='if(!check_load_img())return false;'><br><br></td>";
	echo "</tr>";
	echo "</table>";
	echo "</form>";
mysql_close($link);

?>

<br>
<form action='redaktor.php' method='post' style='margin:0;'>
<input type='submit' value='В конструктор' style="background: url(button_mini.jpg);font-size:20;font-family:Times;color:white;width:202px;height:42px;border:1px solid white;">
<input type='hidden' name='systems' value='<?echo $systems;?>'>
</form>
</center>
</body>
</html>