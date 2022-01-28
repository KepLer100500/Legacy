<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Редактор Объектов</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
</head>
<body id=ddd leftmargin=0 topmargin=0>
<?
$parent_img = $_POST['parent'];
?>

<script>
function  change_img(){
	var eee = document.getElementById('file_img').options[document.getElementById('file_img').selectedIndex].text;
	/*
	if(eee == ""){
		eee = "empty.jpg";
	}
	*/
	document.getElementById('info_img').src = "img/" + eee;
}


function show_div (coords,image,id_obj) {

//obzor = obzor.replace(new RegExp("\r\n",'g'),"\n");
//alert(obzor);

document.getElementById('help').innerHTML = "";

if(image) {
	document.getElementById('help').innerHTML += "<table border=5 width=100% bordercolor=black ><tr><td align=center bgcolor=white></td></tr><tr><td bgcolor=white align=center>Объект id №"+ id_obj +"<br><img width=150px  name=info_img src=\"img/" + image + "\"></td></tr><tr><td bgcolor=white align=center></td></tr></table>";
	} else {
		document.getElementById('help').innerHTML += "<table border=5 width=100% bordercolor=black ><tr><td align=center bgcolor=white></td></tr><tr><td bgcolor=white align=center>Объект id №"+ id_obj +"<br><img name=info_img src=img/empty.jpg></td></tr><tr><td bgcolor=white align=center></td></tr></table>";	
	}

document.getElementById('help').innerHTML += "<table border=5 width=100% bordercolor=black><tr><td align=center bgcolor=white><input type='button' name='del' value='&nbsp;Удалить&nbsp;' onclick=delet(" + id_obj + ")><br><hr><input type='button' name='cmd' value='Закрыть' onclick='hide()'></td></tr></table>";				
document.getElementById('help').style.display = 'block';				
}

function hide(){
	document.getElementById('help').style.display = 'none';
}

function delet(id_what){
		if(confirm("Вы точно хотите удалить выбранный объект?")) {
			document.body.innerHTML += "<form action='action.php' method='post' id='Form1'><input type='hidden' name='parent' value='<?echo $parent_img;?>'><input type='hidden' name='act' value='del'><input type='hidden' name='id' value=" + id_what + "></form>";
			document.getElementById("Form1").submit();
		} else {
			return false;
		}

}

function edit(id_what){
	var name_dat = document.getElementById("name_dat").value;
	var opis_dat = document.getElementById("opis_dat").value;
	var file_img = document.getElementById('file_img').options[document.getElementById('file_img').selectedIndex].text;
	
	opis_dat = opis_dat.replace(new RegExp("\r\n",'g'),"&nbsp;");
	opis_dat = opis_dat.replace(new RegExp(" ",'g'),"&nbsp;");
	name_dat = name_dat.replace(new RegExp(" ",'g'),"&nbsp;");
	
//opis_dat = opis_dat.replace(new RegExp("&nbsp;",'g')," ");
//name_dat = name_dat.replace(new RegExp("&nbsp;",'g')," ");
	
	file_img = "http://10.25.10.4/UG_theory/img/" + file_img;
	
	//alert(name_dat+'|'+opis_dat+'|'+file_img);
		if(confirm("Вы точно хотите отредактировать выбранный объект?")) {
			document.body.innerHTML += "<form action='action.php' method='post' id='Form1'><input type='hidden' name='parent' value='<?echo $parent_img;?>'><input type='hidden' name='act' value='edt'><input type='hidden' name='id' value=" + id_what + "><input type='hidden' name='name_dat' value=" + name_dat + "><input type='hidden' name='opis_dat' value=" + opis_dat + "><input type='hidden' name='file_img' value=" + file_img + "></form>";
			document.getElementById("Form1").submit();
		} else {
			return false;
		}

}

function go_back() {
	document.body.innerHTML += "<form action='redaktor.php' method='post' id='FormExit2'></form>";
	document.getElementById("FormExit2").submit();

}

</script>


<?

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT shema,name,coords,obzor,image,id FROM `ug_theory` where parent_img='$parent_img'", $link);
	while($row = mysql_fetch_array($retval)) {
		$shema = $row[0];
		$name = $row[1];
		$coords = $row[2];
		$obzor = $row[3];
		
		//$obzor = str_replace("<br>","\n",$obzor);
		
		$image = $row[4];
		$id = $row[5];
		$sum_coords = explode(",",$coords);
		$l = $sum_coords[0];
		$t = $sum_coords[1];
		$w = $sum_coords[2];
		$h = $sum_coords[3];
		
		$w = $w - $l;
		$h = $h - $t;
		
		echo "<div style='display:block;left:$l;top:$t;width:$w;height:$h;position:absolute;' ondblclick=show_div('$coords','$image','$id')><table border=1 bordercolor=blue width=100% height=100% style='border-style:dashed;filter:alpha(opacity=80)' bgcolor=0000ff><tr><td> </td></tr></table></div>";

	} 
mysql_close($link);

?>



<table border=0 cellpadding=0 cellspacing=0>
<tr>
<td>
<img id='kartina' src="p_img/<?echo "$parent_img";?>">
</td>
</tr>
</table>

<div id="help" style="display:none; width:300px" ></div>

<div id="go_back">
<table border=5 bordercolor=#001279 cellpadding=5 cellspacing=5>
<tr>
<td>
<input type="button" value="Назад" name="back" onclick="go_back();">
</td>
</tr>
</table>
<div>

</body>
</html>
