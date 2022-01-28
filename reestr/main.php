<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Перечень рацпредложений службы автоматизации телемеханизации и метрологии</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
</head>
<body background=background.jpg>
<script>
<?
$login = $_REQUEST['login'];
$pass = $_REQUEST['pass'];
?>

function edit(id,r_date,r_name,r_answer,r_answer_date,r_author){
var n_id = document.getElementById(id).value;
var n_date = document.getElementById(r_date).value;
var n_name = document.getElementById(r_name).value;
var n_answer = document.getElementById(r_answer).value;
var n_answer_date = document.getElementById(r_answer_date).value;
var n_author = document.getElementById(r_author).value;

if(confirm("Вы точно хотите отредактировать рацпредложение №" + n_id + "?")) {
	document.body.innerHTML += "<form action='' method='post' id='Form1'><input type='hidden' name='mod' value='1'><input type='hidden' name='n_id' value='" + n_id + "'><input type='hidden' name='n_date' value='" + n_date + "'><input type='hidden' name='n_name' value='" + n_name + "'><input type='hidden' name='n_answer' value='" + n_answer + "'><input type='hidden' name='n_answer_date' value='" + n_answer_date + "'><input type='hidden' name='n_author' value='" + n_author + "'><input type='hidden' name='login' value='<?echo $login;?>'><input type='hidden' name='pass' value='<?echo $pass;?>'></form>";
	document.getElementById("Form1").submit();
	} else {
		return false;
	}
}

function del(id){
var n_id = document.getElementById(id).value;

if(confirm("Вы точно хотите удалить рацпредложение №" + n_id + "?")) {
	document.body.innerHTML += "<form action='' method='post' id='Form1'><input type='hidden' name='mod' value='2'><input type='hidden' name='n_id' value='" + n_id + "'><input type='hidden' name='login' value='<?echo $login;?>'><input type='hidden' name='pass' value='<?echo $pass;?>'></form>";
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

function vis_on(id_row) {
	var edt = "edit_button_" + id_row;
	var del = "delete_button_" + id_row;
	document.getElementById(edt).style.visibility="visible";
	document.getElementById(del).style.visibility="visible";
}

function vis_off(id_row) {
	var edt = "edit_button_" + id_row;
	var del = "delete_button_" + id_row;
	document.getElementById(edt).style.visibility="hidden";
	document.getElementById(del).style.visibility="hidden";
}


</script>
<center>
<br>
<font face=times size=6>Перечень рацпредложений службы автоматизации телемеханизации и метрологии</font>
<br><br><br>
<?

$good=0;

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use reestr");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `reestr_login`", $link);

while($row = mysql_fetch_array($retval)) {
		$login_good = $row[0];
		$pass_good = $row[1];
		$perm = $row[2];
		
		if($login==$login_good && $pass==$pass_good){
			$good=1;
			$access=$perm;
		}
}
//
if($good==1) {
//
$mod = $_POST['mod'];

if($mod==1){
//UPDATE

	$n_id = $_POST['n_id'];
	$n_date = $_POST['n_date'];
	$n_name = $_POST['n_name'];
	$n_answer = $_POST['n_answer'];
	$n_answer_date = $_POST['n_answer_date'];
	$n_author = $_POST['n_author'];

	$r_name = str_replace("\"","",$r_name);
	$r_author = str_replace("\"","",$r_author);
	
	$link_edt = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use reestr");
	mysql_query("SET NAMES cp1251");
	mysql_query("update `reestr` set r_date='$n_date', r_name='$n_name', r_answer='$n_answer', r_answer_date='$n_answer_date', r_author='$n_author' where id='$n_id'", $link_edt);
	mysql_close($link_edt);			
	echo "<script>document.body.innerHTML += \"<form action='' method='post' id='Reload_Form'><input type='hidden' name='login' value='$login'><input type='hidden' name='pass' value='$pass'></form>\"; document.getElementById('Reload_Form').submit();</script>";	
}

if($mod==2){
//DELETE
	$n_id = $_POST['n_id'];

	$link_dlt = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use reestr");
	mysql_query("SET NAMES cp1251");
	mysql_query("delete from `reestr` where id='$n_id'", $link_dlt);
	mysql_close($link_dlt);

	echo "<script>document.body.innerHTML += \"<form action='' method='post' id='Reload_Form1'><input type='hidden' name='login' value='$login'><input type='hidden' name='pass' value='$pass'></form>\"; document.getElementById('Reload_Form1').submit();</script>";	
}

if($_POST['add_button']){
//INSERT
$path = array(".php",".php4",".php3",".phtml",".pl",".cgi");
foreach ($path as $item){
  if(preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
   echo "Ошибка! Неверное расщирение файла!<br />";
   exit();
  }
}


$temp=$_FILES['userfile']['name'];
$id = $_POST['new_id'];
$r_date = $_POST['new_date'];
$r_name = $_POST['new_name'];
$r_answer = $_POST['new_answer'];
$r_answer_date = $_POST['new_answer_date'];
$r_author = $_POST['new_author'];

$r_name = str_replace("\"","",$r_name);
$r_author = str_replace("\"","",$r_author);


$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use reestr");
mysql_query("SET NAMES cp1251");
$uploaddir = "files/";
mysql_query("insert into `reestr` values('$id','$r_date','$r_name','$r_answer','$r_answer_date','$r_author','$temp')");
mysql_close($link);	
$uploadfile = $uploaddir . $temp;
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
echo "<script>alert(\"Рацпредложение №$id успешно добавлено в общий реестр.\");</script>";
}


$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use reestr");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `reestr` order by id", $link);

$i=0;
	echo "<table border=1 width=80% cellpadding=2>";
	echo "<tr style='background:#dddddd;'>";
	echo "<td align=center width=1%>№</td>";
	echo "<td align=center width=1%>Дата</td>";
	echo "<td align=center>Название</td>";
	echo "<td align=center>Решение</td>";
	echo "<td align=center>Дата решения</td>";
	echo "<td align=center>Авторы</td>";
	echo "<td align=center>Ссылка</td>";
	if($access==2){
		echo "<td colspan=2>&nbsp;</td>";
	}
	echo "</tr>";
	while($row = mysql_fetch_array($retval)) {
		$id = $row[0];
		$r_date = $row[1];
		$r_name = $row[2];
		$r_answer = $row[3];
		$r_answer_date = $row[4];
		$r_author = $row[5];
		$r_file = $row[6];
		
		if($access==1) {
			$r_author = str_replace("\r\n","<br>",$r_author);
			$r_name = str_replace("\r\n","<br>",$r_name);
				
			echo "<tr>";
			echo "<td>$id</td>";
			echo "<td>$r_date</td>";
			echo "<td>$r_name</td>";
			echo "<td>$r_answer</td>";
			echo "<td>$r_answer_date</td>";
			echo "<td width=250px>$r_author</td>";
			echo "<td align=center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='files/$r_file' target=_blank>Скачать</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";		
		}
		
		if($access==2) {
			echo "<tr onMouseOver='vis_on(\"$i\")' onMouseOut='vis_off(\"$i\")'>";
			echo "<td><input type='text' name='id_$i' size=5 value='$id' readonly></td>";
			echo "<td><input type='text' name='date_$i' size=15 value='$r_date'></td>";
			echo "<td><textarea rows=5 cols=40 name='name_$i'>$r_name</textarea></td>";
			echo "<td><input type='text' name='answer_$i' size=20 value='$r_answer'></td>";
			echo "<td><input type='text' name='answer_date_$i' size=15 value='$r_answer_date'></td>";
			echo "<td><textarea rows=5 cols=30 name='author_$i'>$r_author</textarea></td>";
			echo "<td align=center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='files/$r_file' target=_blank>Скачать</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
		
			echo "<td align=center><input type='image' src=Edit.png width=30 value='' name='edit_button_$i' id='edit_button_$i' onclick='edit(\"id_$i\",\"date_$i\",\"name_$i\",\"answer_$i\",\"answer_date_$i\",\"author_$i\");' style='visibility:hidden'></td>";
			echo "<td align=center><input type='image' src=Delete.png width=30 value='' name='delete_button_$i' id='delete_button_$i' onclick='del(\"id_$i\");' style='visibility:hidden'></td>";
		}
		echo "</tr>";
		$i++;
	} 
	
	if($access==2) {
		echo "<form action='' enctype='multipart/form-data' method='post' id='Input_Form' name='Input_Form'>";
		echo "<tr bgcolor=#ddffdd>";
		echo "<td><br><input type='text' name='new_id' size=5 value=''><br><br></td>";
		echo "<td><br><input type='text' name='new_date' size=15 value=''><br><br></td>";
		echo "<td><br><textarea rows=5 cols=40 name='new_name'></textarea><br></td>";
		echo "<td><br><input type='text' name='new_answer' size=20 value=''><br><br></td>";
		echo "<td><br><input type='text' name='new_answer_date' size=15 value=''><br><br></td>";
		echo "<td><br><textarea rows=5 cols=30 name='new_author'></textarea><br></td>";
		echo "<td><br><input type='file' name='userfile' size=5 value=''><br><br></td>";
		echo "<input type='hidden' name='login' value='$login'><input type='hidden' name='pass' value='$pass'>";
		echo "<td colspan=2 align=center><br><input type='submit' src=add.png width=30 value='Добавить' name='add_button' onclick='if(!check_load_img())return false;'><br><br></td>";
		//echo "<td colspan=2 align=center><br><input type='image' src=Add.png width=30 name='add_button' onclick='if(!check_load_img())return false;'><br><br></td>";
		echo "</tr>";
		echo "</form>";
	}
	echo "</table>";
	
mysql_close($link);
//
} else {
	echo "<br><br><br><br>Пароль неверен!<br><br><a href=index.php>Ввести пароль ещё раз</a>";
}
//

?>

<br>

</center>
</body>
</html>