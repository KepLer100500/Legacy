<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Редактор Объектов ЦРПО</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
</head>
<body>

<script>
function edit(n){
	document.getElementById('construct').selectedIndex = 0;
	
	var trTolpa = document.getElementsByTagName('tr');
		for(var i=0;i < trTolpa.length;i++){
			trTolpa[i].style.backgroundColor = 'White';
		}

	var trList = document.getElementById(n);
	trList.style.backgroundColor = '#D4D4D4';

	var tdList = trList.getElementsByTagName('td');
		document.getElementById("new_construct").value = tdList[1].innerHTML;
		document.getElementById("new_value").value = tdList[2].innerHTML;
		
		// for SQL queries
		document.getElementById('post_skv').value = tdList[0].innerHTML;
		document.getElementById('post_id').value = n;
		document.getElementById('skv_index').value = document.getElementById('nameSkv').selectedIndex;
		// /for SQL queries
}

function check_ins() {
		
	if(document.getElementById('nameSkv').options[document.getElementById('nameSkv').selectedIndex].text == "" || document.getElementById("new_value").value == "" || (document.getElementById("new_construct").value == "" && document.getElementById('construct').options[document.getElementById('construct').selectedIndex].text == "")){
		alert("Вы заполнили не все поля!");
		return false;
		} else {
		if(confirm("Добавить новую запись?")) {
				return true;
			} else {
				return false;
			}
	}
}

function check_edt() {

	if(document.getElementById('nameSkv').options[document.getElementById('nameSkv').selectedIndex].text == "" || document.getElementById("new_value").value == "" || (document.getElementById("new_construct").value == "" && document.getElementById('construct').options[document.getElementById('construct').selectedIndex].text == "")){
		alert("Вы заполнили не все поля!");
		return false;
		} else {
		if(confirm("Редактировать выделенную запись?")) {
				return true;
			} else {
				return false;
			}
	}
}

function enable_construct(){
	var construct = document.getElementById('construct').options[document.getElementById('construct').selectedIndex].text;
	if(construct != "") {
		document.getElementById("new_construct").readOnly = true;
		document.getElementById("new_construct").value = "";
	} else {
		document.getElementById("new_construct").readOnly = false;
	}
}

function change_skv(){
	var viborka = document.getElementById('nameSkv').options[document.getElementById('nameSkv').selectedIndex].text;
	var skv_index = document.getElementById('nameSkv').selectedIndex;
	
	document.body.innerHTML += "<form action='decr.php' method='post' id='FormExit2' ><input type='hidden' name='viborka' value='"+viborka+"'><input type='hidden' name='skv_index' value='"+skv_index+"'></form>";
	document.getElementById("FormExit2").submit();	
}

function hand_on(n){
	document.getElementById(n).style.cursor='hand';
}

function hand_off(n){
	document.getElementById(n).style.cursor='';
}

function go_away(){
	var viborka = document.getElementById('nameSkv').options[document.getElementById('nameSkv').selectedIndex].text;
	var skv_index = document.getElementById('nameSkv').selectedIndex;
	
	document.body.innerHTML += "<form action='history.php' method='post' id='Reload_Form'><input type='hidden' name='post_skv' value=" + viborka + "><input type='hidden' name='skv_index' value=" + skv_index + "></form>";
	document.getElementById('Reload_Form').submit();

}



</script>
<?
	
if($_POST['viborka']!=""){
	$post_skv = $_POST['viborka'];
	$viborka = "where skv = '".$_POST['viborka']."'";
}
if($_POST['post_skv']!=""){
	$post_skv = $_POST['post_skv'];
	$viborka = "where skv = '".$_POST['post_skv']."'";
}

if($_POST['post_skv']=="" && $_POST['viborka']==""){
	$viborka = "where skv = '1-РФ'";
}

$skv_index = $_POST['skv_index'];

$color_alarm="";
$cur_date = date('d-m-Y');
$cur_date = strtotime($cur_date);
$cur_date -= 15768000;

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use crpo");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `history` order by skv", $link);
while($row = mysql_fetch_array($retval)) {
	$alarm_date = $row[2];
	$alarm_date1 = strtotime($alarm_date);
	$crit = $row[5];
	if($cur_date > $alarm_date1 && $crit==1){
		$color_alarm="style='border:3px solid #ff0000;'";
	}
}

?>

<div id="menu">
	<form form action='napominalka.php' method='post'>
		<input type="submit" value="Просрочки" <?echo $color_alarm;?>>
	</form>
</div>

<form enctype="multipart/form-data" method="post">

<br><br>

<table border=1 width=70% align=center bordercolor=black>

	<tr>
		<td width=10% align=center>
		№ скважины <select onchange="change_skv();" id=nameSkv name=nameSkv>
			
			<?
			//$link = mysql_connect("10.25.10.10", "admin", "conect");
			//mysql_query("use ias");
			//mysql_query("SET NAMES cp1251");
			//$retval = mysql_query("SELECT distinct nameSkv FROM `infoWells` where nameSkv like 'СКВ%'", $link);
			$link = mysql_connect("10.25.8.8", "admin", "conect");
			mysql_query("use crpo");
			mysql_query("SET NAMES cp1251");
			$retval = mysql_query("SELECT * FROM `skv_descr` order by skv", $link);
				while($row = mysql_fetch_array($retval)) {
					$nameSkv = $row[1];
					//$skv_new_descr = $row[2];
					
					print "<option style=\"Color:Black;\">$nameSkv</option>";
				}
			mysql_close($link);
			?>
		</select>
		</td>
		
<?
echo "<script>document.getElementById('nameSkv').selectedIndex = \"$skv_index\"</script>";
?>

		<td width=10%>
		<input type="text" id=new_construct name=new_construct style="width:300px;" value="">
		<select id=construct name=construct onchange=enable_construct(); style="width:300px;">
			<option></option>
			<?
			$link = mysql_connect("10.25.8.8", "admin", "conect");
			mysql_query("use crpo");
			mysql_query("SET NAMES cp1251");
			$retval = mysql_query("SELECT distinct construct FROM `description` order by value", $link);
				while($row = mysql_fetch_array($retval)) {
					$construct = $row[0];
					print "<option>$construct</option>";
				} 
			mysql_close($link);
			?>
		</select>
		</td>
		<td width=10% align=center>
			<input type="text" name="new_value" size="20" value="">
		</td>
		<td width=10% align=center>
			<input type="submit" value="Добавить" name="button_ins" onclick="if(check_ins()) {return true;} else {return false;}">
		</td>
		<td width=10% align=center>
			<input type="submit" value="Редактировать" name="button_edt" onclick="if(check_edt()) {return true;} else {return false;}">
		</td>
		<td width=10% align=center>
			<input type="submit" value="Удалить" name="delete_button" onclick="if(confirm('Удалить выделенную запись?')) {return true;} else {return false;}">
		</td>
	</tr>	
	
</table>



<!--- For SQL queries --->
<input type="hidden" name="post_id" value="">
<input type="hidden" name="post_skv" value="">
<input type="hidden" name="skv_index" value="">
<!--- /For SQL queries --->
<br>
<?
echo "<script>document.getElementById('skv_index').value = \"$skv_index\"</script>";

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use crpo");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `skv_descr` where skv = '$post_skv'", $link);
while($row = mysql_fetch_array($retval)) {
	$nameSkv = $row[1];
	$skv_new_descr = $row[2];
	// 
	echo "<center><input type=text style='font-size:25;font-family:Times;text-align:center' name='new_descr' size=80 value='$skv_new_descr'>&nbsp;&nbsp;&nbsp;<input style='width:32;height:32;background: url(\"Edit.bmp\");'  type='submit' value=' ' name='button_edit_descr' onclick='if(confirm(\"Изменить описание?\")) {return true;} else {return false;}'><center><br>";
	}
mysql_close($link);

if($skv_index!=0){
	echo "<center><input type=submit style=\"font-size:15;font-family:Times;\" value=\"Работы проводимые на скважине № $post_skv\" name=button_go onclick=\"go_away();\"><center>";
	} else {
		echo "<center><input type=submit style=\"font-size:15;font-family:Times;\" value=\"Работы проводимые на скважине № 1-РФ\" name=button_go onclick=\"go_away();\"><center>";
	}
?>
<br>

<table border=1 width=70% align=center bordercolor=black>
<tr>
<td>


<div style="position:relative;height:500px;overflow-y:scroll;width=100%;">
<table border=1 width=100% align=center bordercolor=black>

		<?
			$link = mysql_connect("10.25.8.8", "admin", "conect");
			mysql_query("use crpo");
			mysql_query("SET NAMES cp1251");
			$retval = mysql_query("SELECT * FROM `description` $viborka", $link);
				while($row = mysql_fetch_array($retval)) {
					$id = $row[0];
					$skv = $row[1];
					$construct = $row[2];
					$value = $row[3];
					echo "<tr id=$id onclick=edit($id); onmouseover=hand_on($id); onmouseout=hand_off($id);>";
						echo "<td width=30% align=center style='display:none;'>";
							echo "$skv";
						echo "</td>";
						echo "<td width=30%>";
							echo "$construct";
						echo "</td>";
						echo "<td width=30% align=center>";
							echo "$value";
						echo "</td>";
					echo "</tr>";
				} 
			mysql_close($link);
		?>
</table>
</div>


</td>
</tr>
</table>

</form>

<?
if($_POST['delete_button']== true){
	$post_id = $_POST['post_id'];
	$post_skv = $_POST['post_skv'];
	$skv_index = $_POST['skv_index'];
	
	if($post_id!="") {
		$link_del = mysql_connect("10.25.8.8", "admin", "conect");
		mysql_query("use crpo");
		mysql_query("SET NAMES cp1251");
		mysql_query("delete from `description` where id='$post_id'", $link_del);
		mysql_close($link_del);	
	} else {
		echo "<script>alert(\"Вы не выбрали не одной записи!\");</script>";
		echo "<script>document.body.innerHTML += \"<form action='decr.php' method='post' id='Reload_Form'><input type='hidden' name='post_skv' value=$post_skv><input type='hidden' name='skv_index' value=0></form>\"; document.getElementById('Reload_Form').submit();</script>";
	}
	echo "<script>document.body.innerHTML += \"<form action='decr.php' method='post' id='Reload_Form'><input type='hidden' name='post_skv' value=$post_skv><input type='hidden' name='skv_index' value=$skv_index></form>\"; document.getElementById('Reload_Form').submit();</script>";
}

if($_POST['button_ins']== true){
	$post_id = $_POST['post_id'];
	$skv_index = $_POST['skv_index'];
	
	//echo "<script>alert(\"$skv_index\");</script>";
	
	if($_POST['post_skv']!=""){
		$post_skv = $_POST['post_skv'];
	}
	if($_POST['nameSkv']!=""){
		$post_skv = $_POST['nameSkv'];
	}
	
	if($_POST['construct']!="") {
		$construct = $_POST['construct'];
	}
	if($_POST['new_construct']!=""){
		$construct = $_POST['new_construct'];
	}
	$value = $_POST['new_value'];
	
	//echo "<script>alert(\"$post_id - $post_skv\");</script>";
	
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use crpo");
	mysql_query("SET NAMES cp1251");
	$retval = mysql_query("SELECT * FROM `description` where construct='$construct' and skv='$post_skv'", $link);
	$col = 0;
	while($row = mysql_fetch_array($retval)) {
			$col++;
		}
	mysql_close($link);	
	
	//echo "<script>alert(\"$col\");</script>";
	
	if($col == 0){
		$link_ins = mysql_connect("10.25.8.8", "admin", "conect");
		mysql_query("use crpo");
		mysql_query("SET NAMES cp1251");
		mysql_query("insert into `description` values (0,'$post_skv','$construct','$value')", $link_ins);
		mysql_close($link_ins);	
	} else {
		echo "<script>alert(\"Запись с таким описанием уже существует!\");</script>";
	}
	
	
	echo "<script>document.body.innerHTML += \"<form action='decr.php' method='post' id='Reload_Form'><input type='hidden' name='post_skv' value=$post_skv><input type='hidden' name='skv_index' value=$skv_index><input type='hidden' name='skv_index' value=$skv_index></form>\"; document.getElementById('Reload_Form').submit();</script>";
}

if($_POST['button_edt']== true){
	$post_id = $_POST['post_id'];
	$skv_index = $_POST['skv_index'];
	if($post_id!="") {
	
		if($_POST['post_skv']!=""){
			$post_skv = $_POST['post_skv'];
		}
		if($_POST['nameSkv']!=""){
			$post_skv = $_POST['nameSkv'];
		}

		if($_POST['construct']!="") {
			$construct = $_POST['construct'];
		}
		if($_POST['new_construct']!=""){
			$construct = $_POST['new_construct'];
		}
		$value = $_POST['new_value'];
	
		//echo "<script>alert(\"$post_id - $post_skv\");</script>";
	
		$link_edt = mysql_connect("10.25.8.8", "admin", "conect");
		mysql_query("use crpo");
		mysql_query("SET NAMES cp1251");
		mysql_query("update `description` set skv='$post_skv',construct='$construct',value='$value' where id = $post_id", $link_edt);
		mysql_close($link_edt);	
	} else {
		echo "<script>alert(\"Вы не выбрали не одной записи!\");</script>";
		echo "<script>document.body.innerHTML += \"<form action='decr.php' method='post' id='Reload_Form'><input type='hidden' name='post_skv' value=$post_skv><input type='hidden' name='skv_index' value=0></form>\"; document.getElementById('Reload_Form').submit();</script>";
	}

		echo "<script>document.body.innerHTML += \"<form action='decr.php' method='post' id='Reload_Form'><input type='hidden' name='post_skv' value=$post_skv><input type='hidden' name='skv_index' value=$skv_index></form>\"; document.getElementById('Reload_Form').submit();</script>";
}


if($_POST['button_edit_descr']== true){
	//echo "<script>alert(\"TEST!!!\");</script>";
	$post_id = $_POST['post_id'];
	$skv_index = $_POST['skv_index'];
	if($_POST['post_skv']!=""){
		$post_skv = $_POST['post_skv'];
	}
	if($_POST['nameSkv']!=""){
		$post_skv = $_POST['nameSkv'];
	}
	$new_descr = $_POST['new_descr'];	
	
	//echo "<script>alert(\"$post_id - $post_skv - $new_descr\");</script>";
	
	$link_edt = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use crpo");
	mysql_query("SET NAMES cp1251");
	mysql_query("update `skv_descr` set descr='$new_descr' where skv = '$post_skv'", $link_edt);

	echo "<script>document.body.innerHTML += \"<form action='decr.php' method='post' id='Reload_Form'><input type='hidden' name='post_skv' value=$post_skv><input type='hidden' name='skv_index' value=$skv_index></form>\"; document.getElementById('Reload_Form').submit();</script>";
}

?>



</body>
</html>
