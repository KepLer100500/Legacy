<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Конструктор Объектов</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
</head>
<body background=background2.jpg>
<script>
function defPosition(event) {
    var x = y = 0;
    var event = event || window.event;

    if (document.attachEvent != null) { 
        x = window.event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
        y = window.event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
    } else if (!document.attachEvent && document.addEventListener) { 
        //x = event.clientX + window.scrollX;
       // y = event.clientY + window.scrollY;
        x = window.event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
        y = window.event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);	   
	   
    }
 
    y0=document.getElementById("kartina").offsetTop;
    x0=document.getElementById("kartina").offsetLeft;
	//var r = document.getElementById("kartina").getBoundingClientRect();
	//alert('|' + r.top +'|' + r.left + '|');  
 
    x = x - x0;
    y = y - y0;
    //alert(x+'|'+y);
	
	document.getElementById("x1").value = x;
	document.getElementById("y1").value = y;
}

function point1(event) {
    var x = y = 0;
    var event = event || window.event;
 
    if (document.attachEvent != null) { 
        x = window.event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
        y = window.event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
    } else if (!document.attachEvent && document.addEventListener) { 
        //x = event.clientX + window.scrollX;
        //y = event.clientY + window.scrollY;
        x = window.event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
        y = window.event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);		
		
    }
 
    y0=document.getElementById("kartina").offsetTop;
    x0=document.getElementById("kartina").offsetLeft;
 
    x = x-x0;
    y = y-y0;
     
    //alert(x+'|'+y);
	
	//document.getElementById("p1").value = x+','+y;
	//document.getElementById("p2").value = '';
	
	document.getElementById("x_p1").value = x;
	document.getElementById("y_p1").value = y;
}

function point2(event) {
    var x = y = 0;
    var event = event || window.event;
 
    if (document.attachEvent != null) { 
	
        x = window.event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
        y = window.event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
    } else if (!document.attachEvent && document.addEventListener) { 
	
        //x = event.clientX + window.scrollX;
        //y = event.clientY + window.scrollY;
        x = window.event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
        y = window.event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);		
		
		//alert(x);
    }
     
    y0=document.getElementById("kartina").offsetTop;
    x0=document.getElementById("kartina").offsetLeft;
 
    x = x-x0;
    y = y-y0;
	
	
	if( x > document.getElementById("x_p1").value && y > document.getElementById("y_p1").value) {
		document.getElementById('kvadrat').style.top = document.getElementById("y_p1").value;
		document.getElementById('kvadrat').style.left = document.getElementById("x_p1").value;
		document.getElementById('kvadrat').style.width = x - document.getElementById("x_p1").value;
		document.getElementById('kvadrat').style.height = y - document.getElementById("y_p1").value;
	}
	
	if( x < document.getElementById("x_p1").value && y > document.getElementById("y_p1").value) {
		document.getElementById('kvadrat').style.top = document.getElementById("y_p1").value;
		document.getElementById('kvadrat').style.left = x;
		document.getElementById('kvadrat').style.width = document.getElementById("x_p1").value - x;
		document.getElementById('kvadrat').style.height = y - document.getElementById("y_p1").value;
	}
	
	if( x > document.getElementById("x_p1").value && y < document.getElementById("y_p1").value) {
		document.getElementById('kvadrat').style.top = y;
		document.getElementById('kvadrat').style.left = document.getElementById("x_p1").value;
		document.getElementById('kvadrat').style.width = x - document.getElementById("x_p1").value;
		document.getElementById('kvadrat').style.height = document.getElementById("y_p1").value -y;
	}
	
	if( x < document.getElementById("x_p1").value && y < document.getElementById("y_p1").value) {
		document.getElementById('kvadrat').style.top = y;
		document.getElementById('kvadrat').style.left = x;
		document.getElementById('kvadrat').style.width = document.getElementById("x_p1").value -x;
		document.getElementById('kvadrat').style.height = document.getElementById("y_p1").value -y;
	}

	
	document.getElementById('kvadrat').innerHTML = "<table border=2 bordercolor=red width=100% height=100% style='border-style:dashed'><tr><td></td></tr></table>";
	document.getElementById('kvadrat').style.display = 'block';

	var r = document.getElementById("kartina").getBoundingClientRect();
	
	xx = document.getElementById('kvadrat').offsetLeft - r.left + 1;
	yy = document.getElementById('kvadrat').offsetTop - r.top + 1;
	xxx = document.getElementById('kvadrat').offsetWidth + xx;
	yyy = document.getElementById('kvadrat').offsetHeight + yy;
	
	
	document.getElementById("p1").value = xx +','+ yy;
	document.getElementById("p2").value = xxx+','+yyy;
	document.getElementById("res_coords").value = document.getElementById("p1").value + ',' + document.getElementById("p2").value;
	//--------------
	/*
		document.getElementById('temp123').style.top = 100;
		document.getElementById('temp123').style.left = 100;
		document.getElementById('temp123').style.width = 100;
		document.getElementById('temp123').style.height = 100;
		document.getElementById('temp123').innerHTML = "<table border=2 bordercolor=blue width=100% height=100% style='border-style:dashed'><tr><td></td></tr></table>";
		document.getElementById('temp123').style.display = 'block';
	*/	
}

function hide() {
	document.getElementById('kvadrat').style.display = 'none';
	document.getElementById("x1").value = "";
	document.getElementById("y1").value = "";
	document.getElementById("p1").value = "";
	document.getElementById("p2").value = "";
	document.getElementById("res_coords").value = "";

	//var r = document.getElementById("kartina").getBoundingClientRect();
	//alert('|' + r.top +'|' + r.left + '|'); 	
}

function check_ins() {
	if(document.getElementById("res_coords").value == "" || document.getElementById("opis_dat").value == "" || document.getElementById("name_dat").value == "") {
		alert("Вы заполнили не все поля!");
		return false;
	} else {
		if(confirm("Корректно ли заполнены все поля?")) {
			return true;
			} else {
				return false;
			}
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

function check_load() {
	if(document.getElementById("userfile").value == "" || document.getElementById("name_shema").value == "" || document.getElementById("name_fontanka").value == "") {
		alert("Вы не выбрали файл для загрузки или не заполнили все необходимые поля!");
		return false;		
	} else {
		return true;
	}	 
}
</script>

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


$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");

$count_uuu = 0;
$count_yyy = 0;
//$retval = mysql_query("SELECT distinct shema FROM ug_theory", $link);
$retval = mysql_query("SELECT * FROM ug_theory_options_$sys_name", $link);
while($row = mysql_fetch_array($retval)) {
	$count_uuu++;
}
//echo "-$count_uuu-";
echo "<script>var temp=$count_uuu;</script>";



echo "<script>var temp_m = [];</script>";

$kl=2;
$retval0 = mysql_query("SELECT distinct shema FROM ug_theory_$sys_name order by shema", $link);
while($row0 = mysql_fetch_array($retval0)) {
	$name_sss = $row0[0];
		$retval1 = mysql_query("SELECT id FROM ug_theory_$sys_name where shema='$name_sss'", $link);
		while($row1 = mysql_fetch_array($retval1)) {
			$count_yyy++;
		}
	//echo "*$count_yyy*";
	echo "<script>temp_m[$kl]=$count_yyy;</script>";
	//echo "<script>alert(temp_m[$kl]);</script>";
	$count_yyy=0;
	$kl++;
}


$ret = mysql_query("SELECT parent_img FROM ug_theory_$sys_name order by id", $link);
	while($r = mysql_fetch_array($ret)) {
		$last_img=$r[0];
	}

$ret1 = mysql_query("SELECT count(*) FROM ug_theory_$sys_name where parent_img='$last_img'", $link);
	while($r1 = mysql_fetch_array($ret1)) {
		$last_index=$r1[0];
	}	
	
$last_element = $last_img."_".$last_index;
	
//echo "$last_element";
echo "<script>var last_element = '$last_element';</script>";

?>

<script>
function change_parent(){
	var ttt = document.getElementById('file_p').options[document.getElementById('file_p').selectedIndex].text;
	if(ttt == ""){
		ttt = "empty.jpg";
	}
	document.getElementById('kartina').src = "p_img/" + ttt;
	
	if(document.getElementById(last_element)!=null){
		document.getElementById(last_element).style.display = 'none';	
	}
	/*
	for(var u=2;u<=temp;u++){
	var clear = document.getElementById('file_p').options[u].text;
		for(var y=0;y<temp_m[u];y++){
			clear_name = clear + "_" + y;
			document.getElementById(clear_name).style.display = 'none';
		}
	}
	
	var js_kvadrati_name = ttt;
	for(var l=0;l<500;l++){
		js_kvadrati_name = ttt + "_" + l;
		if(document.getElementById(js_kvadrati_name)!=null){
			document.getElementById(js_kvadrati_name).style.display = 'block';
		}
	}
	*/
	
	var clear = document.getElementsByTagName('div');
	for(var y=0;y<clear.length;y++){
		clear[y].style.display = 'none';
	}
	
	
	var js_kvadrati_name = ttt;
	for(var l=0;l<500;l++){
		js_kvadrati_name = ttt + "_" + l;
		//alert(js_kvadrati_name);
		if(document.getElementById(js_kvadrati_name)!=null){
			document.getElementById(js_kvadrati_name).style.display = 'block';
		}
	}
	
}

function  change_img(){
	var eee = document.getElementById('file_img').options[document.getElementById('file_img').selectedIndex].text;
	if(eee == ""){
		eee = "empty.jpg";
	}
	document.getElementById('info_img').src = "img/" + eee;
}

function go_show() {
	var parent = document.getElementById('file_p').options[document.getElementById('file_p').selectedIndex].text;

	document.body.innerHTML += "<form action='show.php' method='post' id='FormExit2' ><input type='hidden' name='parent' value='" + parent + "'></form>";
	document.getElementById("FormExit2").submit();

}

function go_menu() {
	document.body.innerHTML += "<form action='menu_editor.php' method='post' id='FormExit3'><input type='hidden' name='systems' value='<?echo $systems;?>'></form>";
	document.getElementById("FormExit3").submit();
}

function ins_href() {
	var name_ssilko = document.getElementById("name_ssilko").value;
	var path_ssilko = "/docs/" + document.getElementById('file_doc').options[document.getElementById('file_doc').selectedIndex].title;
	
	
	var i=0;
	var text_ssilko = "[a href=\""+ path_ssilko + "\" target=_blank]" + name_ssilko + "[/a];$$$";

	document.getElementById("ssilko_all").innerHTML += text_ssilko;
	
	//alert(text_all);
}

function del_href() {
	document.getElementById("ssilko_all").innerHTML = "";
}

function ins_href_video() {
	var name_ssilko = document.getElementById("name_ssilko_video").value;
	var path_ssilko = "/video/" + document.getElementById('file_doc_video').options[document.getElementById('file_doc_video').selectedIndex].text;
	
	
	var i=0;
	var text_ssilko = "[a href=\""+ path_ssilko + "\" target=_blank]" + name_ssilko + "[/a];$$$";

	document.getElementById("ssilko_all_video").innerHTML += text_ssilko;
}

function del_href_video() {
	document.getElementById("ssilko_all_video").innerHTML = "";
}

function ins_href_3d() {
	var name_ssilko = document.getElementById("name_ssilko_3d").value;
	var path_ssilko = "/3D/" + document.getElementById('file_doc_3d').options[document.getElementById('file_doc_3d').selectedIndex].text;
	
	
	var i=0;
	var text_ssilko = "[a href=\""+ path_ssilko + "\" target=_blank]" + name_ssilko + "[/a];$$$";

	document.getElementById("ssilko_all_3d").innerHTML += text_ssilko;
}

function del_href_3d() {
	document.getElementById("ssilko_all_3d").innerHTML = "";
}

function show_div (image,id_obj) {
document.getElementById('help').innerHTML = "";
if(image) {
	document.getElementById('help').innerHTML += "<table border=5 width=100% bordercolor=black ><tr><td align=center bgcolor=white></td></tr><tr><td bgcolor=white align=center>Объект id №"+ id_obj +"<br><img width=150px  id=info_img src=\"img/" + image + "\"></td></tr><tr><td bgcolor=white align=center></td></tr></table>";
	} else {
		document.getElementById('help').innerHTML += "<table border=5 width=100% bordercolor=black ><tr><td align=center bgcolor=white></td></tr><tr><td bgcolor=white align=center>Объект id №"+ id_obj +"<br><img id=info_img src=img/empty.jpg></td></tr><tr><td bgcolor=white align=center></td></tr></table>";	
	}
document.getElementById('help').innerHTML += "<table border=5 width=100% bordercolor=black><tr><td align=center bgcolor=white><input type='button' name='del' value='&nbsp;Удалить&nbsp;' onclick=delet(" + id_obj + ")><br><hr><input type='button' id='cmd' value='Закрыть' onclick='hide()'></td></tr></table>";				
document.getElementById('help').style.display = 'block';				
}

function hide(){
	document.getElementById('help').style.display = 'none';
}

function delet(id_what){
		if(confirm("Вы точно хотите удалить выбранный объект?")) {
			document.body.innerHTML += "<form action='action.php' method='post' id='Form1'><input type='hidden' name='parent' value='<?echo $parent_img;?>'><input type='hidden' name='systems' value='<?echo $systems;?>'><input type='hidden' name='act' value='del'><input type='hidden' name='id' value=" + id_what + "></form>";
			document.getElementById("Form1").submit();
		} else {
			return false;
		}

}

</script>


<table border=0 valign=top>
<tr>
<td valign=top>
<form enctype="multipart/form-data" method="post">
<table border=1 background=background.jpg>
<input type="hidden" id="x1" size="10" value="">
<input type="hidden" id="y1" size="10" value="">
<input type="hidden" id="p1" size="10" value="">
<input type="hidden" id="p2" size="10" value="">


<tr><td colspan=2 align=center background=background3.jpg><font color=white size=5>Конструктор</font></td></tr>
<tr background=background.jpg><td>Основа</td><td>
<select id=file_p name=file_p onchange=change_parent();>
<option></option>
<?
/*
foreach (glob("p_img/*") as $filename){
	if(strpos($filename,"jpg") > 0 || strpos($filename,"JPG") > 0 || strpos($filename,"JPEG") > 0 || strpos($filename,"jpeg") > 0){
		$filename = str_replace("p_img/","",$filename);
		echo "<option>$filename</option>";
	}
}
*/

echo "<option>empty.jpg</option>";
$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `ug_theory_options_$sys_name` order by shema", $link);
	while($row = mysql_fetch_array($retval)) {
		$s_image = $row[1];
		echo "<option>$s_image</option>";
	}

?>
</select><!---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="#_#_#" name="show" onclick="go_show();" style="color:red;">--->
</td>
</tr>



<tr background=background.jpg>
<td>Название</td><td><input type="text" id="name_dat" name="name_dat" size="35" value=""></td>
</tr>



<tr background=background.jpg>
<td valign=center>Описание</td><td><textarea rows="5" cols="25" id="opis_dat" name="opis_dat"></textarea></td>
</tr>

<tr background=background.jpg>
<td valign=center><input type="button" value="+ Док" id="ssilka" onclick="ins_href();"></td><td><input type="text" id="name_ssilko" size="10" value="Текст">&nbsp;
<select id=file_doc name=file_doc style="width:160">
<option>Выберите документ</option>
<?
$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use ug");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `ug_theory_documents`", $link);
	while($row = mysql_fetch_array($retval)) {
		$id_doc = $row[0];
		$name_doc = $row[1];
		$desc_doc = $row[2];
		echo "<option title=$name_doc>$desc_doc</option>";
	}

/*
foreach (glob("docs/*") as $filename){
	if(strpos($filename,".doc") > 0 || strpos($filename,".DOC") > 0 || strpos($filename,".docx") > 0 || strpos($filename,".DOCX") > 0 || strpos($filename,".pdf") > 0 || strpos($filename,".PDF") > 0 || strpos($filename,".tif") > 0 || strpos($filename,".TIF") > 0 || strpos($filename,".jpg") > 0 || strpos($filename,".JPG") > 0){
		$filename = str_replace("docs/","",$filename);
		$filename = iconv("koi8-r","cp1251",$filename);
		echo "<option title=$filename>$filename</option>";
	}
}
*/
?>
</select>
</td>
</tr>
<tr background=background.jpg>
<td>Доки</td><td><textarea rows="4" cols="26" id="ssilko_all" name="ssilko_all"></textarea><br><input type="button" value="Очистить" id="minus_ssilka" onclick="del_href();"></td>
</tr>

<tr background=background.jpg>
<td valign=center><input type="button" value="+ Видео" id="ssilka_video" onclick="ins_href_video();"></td><td><input type="text" id="name_ssilko_video" size="10" value="Текст">&nbsp;
<select id=file_doc_video name=file_doc_video style="width:160">
<option>Выберите видеофайл</option>
<?
foreach (glob("video/*") as $filename){
	if(strpos($filename,".wmv") > 0 || strpos($filename,".WMV") > 0 || strpos($filename,".avi") > 0 || strpos($filename,".AVI") > 0){
		$filename = str_replace("video/","",$filename);
		$filename = iconv("koi8-r","cp1251",$filename);
		echo "<option>$filename</option>";
	}
}
?>
</select>
</td>
</tr>
<tr background=background.jpg>
<td>Видео</td><td><textarea rows="4" cols="26" id="ssilko_all_video" name="ssilko_all_video"></textarea><br><input type="button" value="Очистить" id="minus_ssilka_video" onclick="del_href_video();"></td>
</tr>

<tr background=background.jpg>
<td valign=center><input type="button" value="+ 3Д" id="ssilka_3d" onclick="ins_href_3d();"></td><td><input type="text" id="name_ssilko_3d" size="10" value="Текст">&nbsp;
<select id=file_doc_3d name=file_doc_3d style="width:160">
<option>Выберите модель</option>
<?
foreach (glob("3D/*") as $filename){
	if(strpos($filename,".exe") > 0 || strpos($filename,".EXE") > 0){
		$filename = str_replace("3D/","",$filename);
		$filename = iconv("koi8-r","cp1251",$filename);
		echo "<option>$filename</option>";
	}
}
?>
</select>
</td>
</tr>
<tr background=background.jpg>
<td>3Д</td><td><textarea rows="4" cols="26" id="ssilko_all_3d" name="ssilko_all_3d"></textarea><br><input type="button" value="Очистить" id="minus_ssilka_3d" onclick="del_href_3d();"></td>
</tr>

<div id="div_ssilko" style="display:none;" ></div>


<tr background=background.jpg>
<td>Координаты</td><td><input type="text" id="res_coords" name="res_coords" size="30" value="" readonly="readonly"></td>
</tr>

<tr background=background.jpg>
<td>Фото</td><td>

<select id=file_img name=file_img onchange=change_img();>
<option></option>
<?
foreach (glob("img/*") as $filename){
	if(strpos($filename,"jpg") > 0 || strpos($filename,"JPG") > 0){
		$filename = str_replace("img/","",$filename);
		$filename = iconv("koi8-r","cp1251",$filename);
		echo "<option>$filename</option>";
	}
}
?>
</select>
</td>
</tr>

<tr background=background.jpg>
<td colspan=2 align=center><img src="img/empty.jpg" id="info_img" width=200px></td>
</tr>

<input type="hidden" name="systems" value="<?echo $systems;?>">

<tr>
<td colspan=2 align=center><br>
<input type="submit" value="Внести изменения" name="button_ins" onclick="if(!check_ins())return false;" style="background: url(button_mini.jpg);font-size:20;font-family:Times;color:white;width:202px;height:42px;border:1px solid white;">
<br><br>
</td>
</tr>

<tr>
<td colspan=2 align=center>
<br>
<input type="submit" value="Редактор меню" name="menu_editor" onclick="go_menu();" style="background: url(button_mini.jpg);font-size:20;font-family:Times;color:white;width:202px;height:42px;border:1px solid white;">
<br><br>
</td>
</tr>
<tr>
<td colspan=2 align=center><br>
<input type='button' style="background: url(button_mini.jpg);font-size:20;font-family:Times;color:white;width:202px;height:42px;border:1px solid white;" value='На главную' onclick="window.open('index.php', '_self')">
<br><br>
</td>
</tr>



<!---
<tr>
<td colspan=2 align=center><br><br><br>Загрузка изображений на сервер:</td>
</tr>

<tr>
<td colspan=2 align=left><input type="file" name="userfile" /><input type="submit" value="Загрузить объект" name="button_load_img" onclick="if(!check_load_img())return false;"><br><br>
Идентификатор&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name_shema" size="35" value=""><br>
Название в меню <input type="text" name="name_fontanka" size="35" value=""><br>
<input type="submit" value="Загрузить схему" name="button_load" onclick="if(!check_load())return false;">

</td>
</tr>

--->

</table>
</form>
<!---<p align=center><a href=index.php?shema=f1>Перейти в просмотрщик</a>
<br>
<form action='main.php' method='post' id='main' style='margin:0;'>
<input type='submit' value='На главную' style="font-size:15;font-family:Times;">
<input type='hidden' id='shema' value='f0'>
</form>
--->
<?php

if($_POST['button_ins']== true){

$name_dat = $_POST['name_dat'];

$res_coords = $_POST['res_coords'];
$opis_dat = $_POST['opis_dat'];
$file_p = $_POST['file_p'];		//parent image

$ssilko_all = $_POST['ssilko_all'];
$ssilko_all_video = $_POST['ssilko_all_video'];
$ssilko_all_3d = $_POST['ssilko_all_3d'];

$file_img = $_POST['file_img'];

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
/*		???????????
if($_POST['file_img']) {	//foto
	$file_img = "http://10.25.10.4/UG_theory/img/".$_POST['file_img'];
	} else {
		$file_img = "";
	}
*/

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT shema FROM `ug_theory_options_$sys_name` where parent_img='$file_p'", $link);
	while($row = mysql_fetch_array($retval)) {
		$shema = $row[0];
	}

$opis_dat = str_replace("\r\n","$$$",$opis_dat);
$opis_dat = str_replace("'","`",$opis_dat);
$opis_dat = str_replace("\"","``",$opis_dat);

$ssilko_all = str_replace("\r\n","$$$",$ssilko_all);
//$ssilko_all = str_replace("'","`",$ssilko_all);
//$ssilko_all = str_replace("\"","``",$ssilko_all);

$ssilko_all_video = str_replace("\r\n","$$$",$ssilko_all_video);
//$ssilko_all_video = str_replace("'","`",$ssilko_all_video);
//$ssilko_all_video = str_replace("\"","``",$ssilko_all_video);

$ssilko_all_3d = str_replace("\r\n","$$$",$ssilko_all_3d);
//$ssilko_all_3d = str_replace("'","`",$ssilko_all_3d);
//$ssilko_all_3d = str_replace("\"","``",$ssilko_all_3d);

$name_dat = str_replace("'","`",$name_dat);
$name_dat = str_replace("\"","``",$name_dat);

mysql_query("insert into `ug_theory_$sys_name` values('','$shema','$name_dat','$res_coords','$opis_dat','$file_img','$file_p','$ssilko_all','$ssilko_all_video','$ssilko_all_3d')");
mysql_close($link);	

echo "Объект $name_dat добавлен!";

}


if($_POST['button_load'] or $_POST['button_load_img']){
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

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
if($_POST['button_load']) {
$name_shema = $_POST['name_shema'];
$name_fontanka = $_POST['name_fontanka'];
	$uploaddir = "p_img/";
	mysql_query("insert into `ug_theory_options_$sys_name` values('$name_shema','$temp','$name_fontanka')");
} elseif ($_POST['button_load_img']) {
	$uploaddir = "img/";
	mysql_query("insert into `ug_theory_img` values('','$temp')");
}
mysql_close($link);	

$uploadfile = $uploaddir . $temp;
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
echo "<br>Файл ".$_FILES['userfile']['name']." успешно загружен на сервер!";
//header("Location: redaktor.php");
//echo "<script>window.location.reload();</script>";
}

?>


</td>
<td valign=top>
<img id='kartina' name='kartina' src="p_img/empty.jpg" ondblclick="hide();" onmousemove="defPosition(event);" onmousedown="point1(event);" onmouseup="point2(event);" ondragstart="return false" ondragdrop="return false" ondrag="return false">
</td>
</tr>
</table>

<div id="kvadrat" style="display:none;" ></div>

<!---
<div id="temp123" style="display:none;" ></div>
--->
<input type="hidden" id="x_p1" size="10" value="">
<input type="hidden" id="y_p1" size="10" value="">


<?
//echo "<script>alert(document.getElementById('kartina').getBoundingClientRect().left)</script>";
foreach (glob("p_img/*") as $filename){
	if(strpos($filename,"jpg") > 0 || strpos($filename,"JPG") > 0 || strpos($filename,"JPEG") > 0 || strpos($filename,"jpeg") > 0){
		$massiv = str_replace("p_img/","",$filename);
		//---
		$link = mysql_connect("10.25.8.8", "admin", "conect");
		mysql_query("use UG");
		mysql_query("SET NAMES cp1251");
		$retval = mysql_query("SELECT count(*) FROM `ug_theory_$sys_name` where parent_img='$massiv'", $link);
		while($row = mysql_fetch_array($retval)) {
			$count=$row[0];
		}
		
		$retval = mysql_query("SELECT coords,id,image FROM `ug_theory_$sys_name` where parent_img='$massiv' order by id", $link);
			$ddd=0;
			//echo "-$count-";
			//416
			while($row = mysql_fetch_array($retval)) {
				$coords = $row[0];
				$id = $row[1];
				$image = $row[2];
				$sum_coords = explode(",",$coords);
				$l = $sum_coords[0];
				$t = $sum_coords[1];
				$w = $sum_coords[2];
				$h = $sum_coords[3];
				$w = $w - $l;
				$h = $h - $t;
				$kvadrati_name = $massiv."_".$ddd;
				//echo "-$kvadrati_name-";
				if($ddd!=$count-1){
					echo "<div style='display:none;left:$l;top:$t;width:$w;height:$h;position:absolute;' id='$kvadrati_name' ondblclick=show_div('$image','$id')><table border=1 bordercolor=blue width=100% height=100% style='border-style:dashed;opacity: 0.5' bgcolor=0000ff><tr><td></td></tr></table></div>";
					echo "<script>var k_l=document.getElementById('kartina').getBoundingClientRect().left;document.getElementById(\"$kvadrati_name\").style.left=k_l+$l-3;</script>";
					echo "<script>var k_l=document.getElementById('kartina').getBoundingClientRect().top;document.getElementById(\"$kvadrati_name\").style.top=k_l+$t-1;</script>";
				} else {
					echo "<div style='display:none;left:$l;top:$t;width:$w;height:$h;position:absolute;' id='$kvadrati_name' ondblclick=show_div('$image','$id')><table border=1 bordercolor=blue width=100% height=100% style='border-style:dashed;opacity: 0.5' bgcolor=ff0000><tr><td></td></tr></table></div>";
					echo "<script>var k_l=document.getElementById('kartina').getBoundingClientRect().left;document.getElementById(\"$kvadrati_name\").style.left=k_l+$l-3;</script>";
					echo "<script>var k_l=document.getElementById('kartina').getBoundingClientRect().top;document.getElementById(\"$kvadrati_name\").style.top=k_l+$t-1;</script>";
				}
				$ddd++;
				
				// opacity: 0.5
				// filter:alpha(opacity=50)
			}
		mysql_close($link);
		//---
	}
}
//echo "TEST!!";
//$te = echo "<script>a=document.getElementById('kartina').getBoundingClientRect().top;</script>";

?>

<div id="help" style="display:none; width:300px" ></div>

</body>
</html>
