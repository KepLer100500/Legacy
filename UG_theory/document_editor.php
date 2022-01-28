<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Редактор документов</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
</head>
<body background=background2.jpg><br><br>
<script>

function del(id_d){
	
var id_del = document.getElementById(id_d).value;
if(confirm("Вы точно хотите удалить объект " + id_del + "?")) {
	document.body.innerHTML += "<form action='' method='post' id='Form1'><input type='hidden' name='mod' value='2'><input type='hidden' name='id_del' value='" + id_del + "'></form>";
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

if($mod==2){
//DELETE
	$id_del = $_POST['id_del'];
	$link_dlt = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use UG");
	mysql_query("SET NAMES cp1251");
	$retval = mysql_query("SELECT * FROM `ug_theory_documents` where id='$id_del'", $link_dlt);
	while($row = mysql_fetch_array($retval)) {
		$name = $row[1];
	}
	
	mysql_query("delete from `ug_theory_documents` where id='$id_del'", $link_dlt);
	mysql_close($link_dlt);
	$path = "docs/$name";
	unlink($path);	
	echo "<script>document.body.innerHTML += \"<form action='' method='post' id='Reload_Form1'></form>\"; document.getElementById('Reload_Form1').submit();</script>";	
}

if($_POST['add_button']){
//INSERT
$path = array(".php",".php4",".php3",".phtml",".pl",".cgi");
foreach ($path as $item){
  if(preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
   echo "Разрешено загружать, только документы<br />";
   exit();
  }
}
/*
if($_FILES["userfile"]["size"] > 1024*9*1024) {
	echo "Размер файла превышает три мегабайта!";
	exit;
	}
*/	
$temp=$_FILES['userfile']['name'];
$new_description = $_POST['new_description'];
//$name = $_POST['n_add'];
//$parent_img = $shema."_".$temp;
//$temp = $parent_img;
$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$uploaddir = "docs/";
mysql_query("insert into `ug_theory_documents` values('','$temp','$new_description')");
mysql_close($link);	
$uploadfile = $uploaddir . $temp;
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
echo "<br>Файл ".$_FILES['userfile']['name']." успешно загружен на сервер!";
}

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `ug_theory_documents` order by id", $link);
$i=0;
	echo "<table border=1 width=90% cellpadding=2>";
	echo "<tr>";
	echo "<td align=center background=background3.jpg><font color=white size=5>ID</font></td>";
	echo "<td align=center background=background3.jpg><font color=white size=5>Название документа</font></td>";
	echo "<td align=center background=background3.jpg><font color=white size=5>Описание документа</font></td>";
	echo "<td colspan=2 background=background3.jpg> </td>";
	echo "</tr>";
	while($row = mysql_fetch_array($retval)) {
		$id = $row[0];
		$name = $row[1];
		$description = $row[2];
		echo "<tr>";
		echo "<td background=background.jpg><input type='text' name='id_$i' size=5 value='$id' readonly></td>";
		echo "<td background=background.jpg><input type='text' name='name_$i' size=100 value='$name' readonly></td>";
		echo "<td nowrap background=background.jpg><input type='text' name='n_$i' size=100 value='$description' readonly></td>";
		//echo "<td align=center background=background.jpg><input type='image' src=test.png width=30 value='' name='edit_button' onclick='edit(\"s_$i\",\"p_$i\",\"n_$i\");'></td>";
		echo "<td colspan=2 align=center background=background.jpg><input type='image' src=delete.png width=30 value='' name='delete_button' onclick='del(\"id_$i\");'></td>";
		echo "</tr>";
		$i++;
	} 
	echo "<form action='' enctype='multipart/form-data' method='post'>";
	echo "<tr bgcolor=#aaffaa>";
	//echo "<td><br><input type='text' name='new_id' size=5 value=''><br><br></td>";
	echo "<td></td>";
	echo "<td><br><input type='file' name='userfile' size=85 value=''><br><br></td>";
	echo "<td nowrap><br><input type='text' name='new_description' size=100 value=''><br><br></td>";
	//echo "<input type='hidden' name='systems' value='$systems'>";
	echo "<td colspan=2 align=center><br><input type='submit' src=add.png width=30 value='Добавить' name='add_button' onclick='if(!check_load_img())return false;'><br><br></td>";
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