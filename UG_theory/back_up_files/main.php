<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Информационный блок</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
</head>
<body background=background2.jpg> 
<?
$systems = $_POST['systems'];
//echo "<script>alert(\"---$systems---\");</script>";
///////////////////////////////////////
$shema = $_POST['shema'];
if($shema==""){
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use UG");
	mysql_query("SET NAMES cp1251");
	$retval = mysql_query("SELECT * FROM `ug_theory_systems` where description='$systems'", $link);
	while($row = mysql_fetch_array($retval)) {
		$shema = $row[3];
		//echo "---$sys_first_page---";
	}

	//$shema = "f0";
}


//echo "-$systems-";

	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use UG");
	mysql_query("SET NAMES cp1251");
	$retval = mysql_query("SELECT * FROM `ug_theory_systems` where description='$systems'", $link);
	while($row = mysql_fetch_array($retval)) {
		$sys_id = $row[0];
		$sys_name = $row[1];
		$sys_desc = $row[2];
	}
//echo "-$sys_name-";


?>
<script>


function hide(){
	document.getElementById('help').style.display = 'none';

}

function helpBox(col) {
	document.getElementById('help').innerHTML = "";

	switch (col){
	<?
		$link = mysql_connect("10.25.8.8", "admin", "conect");
		mysql_query("use UG");
		mysql_query("SET NAMES cp1251");
		$retval = mysql_query("SELECT * FROM `ug_theory_$sys_name` where shema='$shema'", $link);
			while($row = mysql_fetch_array($retval)) {
				$id = $row[0];
				$name = $row[2];
				$obzor = $row[4];
				$img = $row[5];
				$parent_img = $row[6];
				$doc = $row[7];
				$video = $row[8];
				$D3 = $row[9];
				
				$obzor = str_replace("[","<",$obzor);
				$obzor = str_replace("]",">",$obzor);
				$obzor = str_replace("$$$","<br>",$obzor);
				
				$doc = str_replace("[","<",$doc);
				$doc = str_replace("]",">",$doc);
				$doc = str_replace("$$$","<br>",$doc);
				$doc = str_replace("/docs/","/UG_theory/docs/",$doc);
				//$doc = rawurlencode($doc);
				//$doc = iconv ( 'UTF-8' , 'CP1251//IGNORE' , $doc );
				//$doc = mb_convert_encoding($doc , 'UTF-8', 'CP1251');
				//$doc = iconv("UTF-8", "CP1251", $doc); 
				//$doc = iconv('CP1252', 'KOI8-R', $doc);
				//$doc = iconv('CP1251', 'KOI8-R', $doc);
				
				$video = str_replace("[","<",$video);
				$video = str_replace("]",">",$video);
				$video = str_replace("$$$","<br>",$video);
				$video = str_replace("/video/","/UG_theory/video/",$video);
				
				$D3 = str_replace("[","<",$D3);
				$D3 = str_replace("]",">",$D3);
				$D3 = str_replace("$$$","<br>",$D3);
				$D3 = str_replace("/3D/","/UG_theory/3D/",$D3);

				if($img!="" && $video!="" && $D3!="") {
					$html1 = "case $id: document.getElementById('help').innerHTML += '<table background=background.jpg border=1 width=100% bordercolor=white><tr><td align=center background=background3.jpg><font color=white size=5><b>$name</b></font></td></tr></table><table background=background.jpg border=1 width=100% bordercolor=white><tr><td width=30% align=center background=background3.jpg><font color=white size=5>Общая информация</font></td><td width=30% align=center background=background3.jpg><font color=white size=5>Документы</font></td><td width=30% align=center background=background3.jpg><font color=white size=5>Изображение</font></td></tr><tr valign=center><td rowspan=\"5\"><div style=\"position:relative;top:0;left:0;overflow-y:scroll;height:365px;\"><font size=5>$obzor</font></div></td><td><div style=\"height:100px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$doc</div></td><td rowspan=\"5\" align=center><a href=\"/UG_theory/img/$img\" target=_blank title=$name><img src=\"/UG_theory/img/$img\" width=250px></a></td></tr><tr valign=top><td align=center background=background3.jpg><font color=white size=5>Видео</font></td></tr><tr><td><div style=\"height:100px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$video</div></td></tr><tr valign=top><td align=center background=background3.jpg><font color=white size=5>3D модель</font></td></tr><tr><td><div style=\"height:100px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$D3</div></td></tr></table>'; break;";
				}
				if($img!="" && $video!="" && $D3=="") {
					$html1 = "case $id: document.getElementById('help').innerHTML += '<table background=background.jpg border=1 width=100% bordercolor=white><tr><td align=center background=background3.jpg><font color=white size=5><b>$name</b></font></td></tr></table><table background=background.jpg border=1 width=100% bordercolor=white><tr><td width=30% align=center background=background3.jpg><font color=white size=5>Общая информация</font></td><td width=30% align=center background=background3.jpg><font color=white size=5>Документы</font></td><td width=30% align=center background=background3.jpg><font color=white size=5>Изображение</font></td></tr><tr valign=center><td rowspan=\"5\"><div style=\"position:relative;top:0;left:0;overflow-y:scroll;height:365px;\"><font size=5>$obzor</font></div></td><td><div style=\"height:160px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$doc</div></td><td rowspan=\"5\" align=center><a href=\"/UG_theory/img/$img\" target=_blank title=$name><img src=\"/UG_theory/img/$img\" width=250px></a></td></tr><tr valign=top><td align=center background=background3.jpg><font color=white size=5>Видео</font></td></tr><tr><td><div style=\"height:160px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$video</div></td></tr></table>'; break;";
				}
				if($img!="" && $video=="" && $D3!="") {
					$html1 = "case $id: document.getElementById('help').innerHTML += '<table background=background.jpg border=1 width=100% bordercolor=white><tr><td align=center background=background3.jpg><font color=white size=5><b>$name</b></font></td></tr></table><table background=background.jpg border=1 width=100% bordercolor=white><tr><td width=30% align=center background=background3.jpg><font color=white size=5>Общая информация</font></td><td width=30% align=center background=background3.jpg><font color=white size=5>Документы</font></td><td width=30% align=center background=background3.jpg><font color=white size=5>Изображение</font></td></tr><tr valign=center><td rowspan=\"5\"><div style=\"position:relative;top:0;left:0;overflow-y:scroll;height:365px;\"><font size=5>$obzor</font></div></td><td><div style=\"height:160px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$doc</div></td><td rowspan=\"5\" align=center><a href=\"/UG_theory/img/$img\" target=_blank title=$name><img src=\"/UG_theory/img/$img\" width=250px></a></td></tr><tr valign=top><td align=center background=background3.jpg><font color=white size=5>3D модель</font></td></tr><tr><td><div style=\"height:160px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$D3</div></td></tr></table>'; break;";
				}
				if($img!="" && $video=="" && $D3=="") {
					$html1 = "case $id: document.getElementById('help').innerHTML += '<table background=background.jpg border=1 width=100% bordercolor=white><tr><td align=center background=background3.jpg><font color=white size=5><b>$name</b></font></td></tr></table><table background=background.jpg border=1 width=100% bordercolor=white><tr><td width=30% align=center background=background3.jpg><font color=white size=5>Общая информация</font></td><td width=30% align=center background=background3.jpg><font color=white size=5>Документы</font></td><td width=30% align=center background=background3.jpg><font color=white size=5>Изображение</font></td></tr><tr valign=center><td rowspan=\"5\"><div style=\"position:relative;top:0;left:0;overflow-y:scroll;height:365px;\"><font size=5>$obzor</font></div></td><td><div style=\"height:365px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$doc</div></td><td rowspan=\"5\" align=center><a href=\"/UG_theory/img/$img\" target=_blank title=$name><img src=\"/UG_theory/img/$img\" width=250px></a></td></tr></table>'; break;";
				}
				if($img=="" && $video!="" && $D3!=""){
					$html1 = "case $id: document.getElementById('help').innerHTML += '<table background=background.jpg border=1 width=100% bordercolor=white><tr><td align=center background=background3.jpg><font color=white size=5><b>$name</b></font></td></tr></table><table background=background.jpg border=1 width=100% bordercolor=white><tr><td width=30% align=center background=background3.jpg><font color=white size=5>Общая информация</font></td><td width=30% align=center background=background3.jpg><font color=white size=5>Документы</font></td></tr><tr valign=center><td rowspan=\"5\"><div style=\"position:relative;top:0;left:0;overflow-y:scroll;height:365px;\"><font size=5>$obzor</font></div></td><td><div style=\"height:100px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$doc</div></td></tr><tr valign=top><td align=center background=background3.jpg><font color=white size=5>Видео</font></td></tr><tr><td><div style=\"height:100px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$video</div></td></tr><tr valign=top><td align=center background=background3.jpg><font color=white size=5>3D модель</font></td></tr><tr><td><div style=\"height:100px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$D3</div></td></tr></table>'; break;";
				}
				if($img=="" && $video!="" && $D3==""){
					$html1 = "case $id: document.getElementById('help').innerHTML += '<table background=background.jpg border=1 width=100% bordercolor=white><tr><td align=center background=background3.jpg><font color=white size=5><b>$name</b></font></td></tr></table><table background=background.jpg border=1 width=100% bordercolor=white><tr><td width=30% align=center background=background3.jpg><font color=white size=5>Общая информация</font></td><td width=30% align=center background=background3.jpg><font color=white size=5>Документы</font></td></tr><tr valign=center><td rowspan=\"5\"><div style=\"position:relative;top:0;left:0;overflow-y:scroll;height:365px;\"><font size=5>$obzor</font></div></td><td><div style=\"height:160px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$doc</div></td></tr><tr valign=top><td align=center background=background3.jpg><font color=white size=5>Видео</font></td></tr><tr><td><div style=\"height:160px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$video</div></td></tr></table>'; break;";
				}
				if($img=="" && $video=="" && $D3!=""){
					$html1 = "case $id: document.getElementById('help').innerHTML += '<table background=background.jpg border=1 width=100% bordercolor=white><tr><td align=center background=background3.jpg><font color=white size=5><b>$name</b></font></td></tr></table><table background=background.jpg border=1 width=100% bordercolor=white><tr><td width=30% align=center background=background3.jpg><font color=white size=5>Общая информация</font></td><td width=30% align=center background=background3.jpg><font color=white size=5>Документы</font></td></tr><tr valign=center><td rowspan=\"5\"><div style=\"position:relative;top:0;left:0;overflow-y:scroll;height:365px;\"><font size=5>$obzor</font></div></td><td><div style=\"height:160px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$doc</div></td></tr><tr valign=top><td align=center background=background3.jpg><font color=white size=5>3D модель</font></td></tr><tr><td><div style=\"height:160px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$D3</div></td></tr></table>'; break;";
				}
				if($img=="" && $video=="" && $D3==""){
					$html1 = "case $id: document.getElementById('help').innerHTML += '<table background=background.jpg border=1 width=100% bordercolor=white><tr><td align=center background=background3.jpg><font color=white size=5><b>$name</b></font></td></tr></table><table background=background.jpg border=1 width=100% bordercolor=white><tr><td width=30% align=center background=background3.jpg><font color=white size=5>Общая информация</font></td><td width=30% align=center background=background3.jpg><font color=white size=5>Документы</font></td></tr><tr valign=center><td rowspan=\"5\"><div style=\"position:relative;top:0;left:0;overflow-y:scroll;height:365px;\"><font size=5>$obzor</font></div></td><td><div style=\"height:365px;position:relative;top:0;left:0;word-break:break-all;overflow-y:scroll;\">$doc</div></td></tr></table>'; break;";
				}
				if($img=="" && $video=="" && $D3=="" && $doc==""){
					$html1 = "case $id: document.getElementById('help').innerHTML += '<table background=background.jpg border=1 width=100% bordercolor=white><tr><td align=center background=background3.jpg><font color=white size=5><b>$name</b></font></td></tr></table><table background=background.jpg border=1 width=100% bordercolor=white><tr><td width=30% align=center background=background3.jpg><font color=white size=5>Общая информация</font></td></tr><tr valign=center><td rowspan=\"5\"><div style=\"position:relative;top:0;left:0;overflow-y:scroll;height:365px;\"><font size=5>$obzor</font></div></td></tr></table>'; break;";
				}
				if($img!="" && $video=="" && $D3=="" && $doc=="") {
					$html1 = "case $id: document.getElementById('help').innerHTML += '<table background=background.jpg border=1 width=100% bordercolor=white><tr><td align=center background=background3.jpg><font color=white size=5><b>$name</b></font></td></tr></table><table background=background.jpg border=1 width=100% bordercolor=white><tr><td width=30% align=center background=background3.jpg><font color=white size=5>Общая информация</font></td><td width=30% align=center background=background3.jpg><font color=white size=5>Изображение</font></td></tr><tr valign=center><td rowspan=\"5\"><div style=\"position:relative;top:0;left:0;overflow-y:scroll;height:365px;\"><font size=5>$obzor</font></div></td><td rowspan=\"5\" align=center><a href=\"/UG_theory/img/$img\" target=_blank title=$name><img src=\"/UG_theory/img/$img\" width=250px></a></td></tr></table>'; break;";
				}

				
				
				print "$html1";
			} 
		mysql_close($link);
	?>	
	}	

	document.getElementById('help').innerHTML += "<table border=0 width=100% bordercolor=#ffffff background=background.jpg><tr><td align=center ><input type='button' name='cmd' value='Закрыть' onclick='hide()' style='background: url(button_mini.jpg);font-size:20;font-family:Times;color:white;width:202px;height:42px;border:1px solid white;'></td></tr></table>";
	document.getElementById('help').style.display = 'block';
}

</script>
<div id="help" style="display:none; width:1200px;top:30%;left:20%;" ></div>
<table width=100% border=0>
<tr>
<td width=1% valign=top>
<!---<h2 align=center>Меню</h2>--->
<center><img src=menu_logo.jpg></center><br>
<?
$back=0;
$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `ug_theory_options_$sys_name` order by shema", $link);
	while($row = mysql_fetch_array($retval)) {
		$shema_opt = $row[0];
		//$parent_img = $row[1];
		$name_opt = $row[2];
		
		if($shema==$shema_opt){
			$name_opt_tek = $name_opt;
			$shema_opt_tek = $shema;
		}
		/*
		if($back==0) {
		//$html = "<li><font size=3><b><a href=main.php?shema=$shema_opt>$name_opt</a><b></font>&nbsp;&nbsp;&nbsp;";
		$html = "<form action='main.php' method='post' style='margin:0;'>";
		$html .= "<input type='submit' value='$name_opt' style='font-size:17;font-family:Times;width:250px;height:45px;background:#bbbbbb;border:1px solid black;'>";
		$html .= "<input type='hidden' name='shema' value='$shema_opt'>";
		$html .= "</form>";
		print "$html";
		}
		*/
		//if($back==1) {
		//$html = "<li><font size=3><b><a href=main.php?shema=$shema_opt>$name_opt</a><b></font>&nbsp;&nbsp;&nbsp;";
		$html = "<form action='main.php' method='post' style='margin:0;'>";
		$html .= "<input type='submit' value='$name_opt' style='background: url(background.jpg);font-size:17;font-family:Times;width:270px;height:45px;border:1px solid white;'>";
		$html .= "<input type='hidden' name='shema' value='$shema_opt'>";
		$html .= "<input type='hidden' name='systems' value='$systems'>";
		$html .= "</form>";
		print "$html";
		//}
		$back=1;
		
	} 
mysql_close($link);
?>

<?

/*
$html = "<br><br><br><hr><br><br><center><h3>Проверка знаний</h3></center><form action='../UG/index.html' method='post' style='margin:0;' target=_blank>";
$html .= "<input type='submit' value='Тест №1' style='font-size:17;font-family:Times;width:250px;height:45px;background:#dfdfdf;'>";
$html .= "<input type='hidden' name='shema' value='$shema_opt'>";
$html .= "</form>";
$html .= "<form action='../UG2/index.html' method='post' style='margin:0;' target=_blank>";
$html .= "<input type='submit' value='Тест №2' style='font-size:17;font-family:Times;width:250px;height:45px;background:#dfdfdf;'>";
$html .= "<input type='hidden' name='shema' value='$shema_opt'>";
$html .= "</form>";
$html .= "<form action='http://10.25.10.4/cgi-bin/department/oot_tb/NewEx_new/index.html' method='post' style='margin:0;' target=_blank>";
$html .= "<input type='submit' value='Тест №3' style='font-size:17;font-family:Times;width:250px;height:45px;background:#dfdfdf;'>";
$html .= "<input type='hidden' name='shema' value='$shema_opt'>";
$html .= "</form>";
print "$html";
*/

?>
<br><br>
<!---
<form action='index.php' method='post' style='margin:0;'>
<input type='submit' value='Главная страница' style='background: url(button_menu2.jpg);font-size:17;font-family:Times;width:270px;height:55px;border:1px solid white;color:white;font-size:25;'>
</form>
--->
<br>

<!---	<p align=center><a href=redaktor.php >Перейти в редактор</a>	--->

</td>

<td valign=top>
<?
if($parent_img==""){
	//echo "<script>alert(\"Данная схема не содержит не одного объекта!\");</script>";
	$parent_img = "empty.jpg";
}
?>
<img src="<?echo "p_img/$parent_img";?>" usemap="#karta1" border=0 id='rrr'>
<map name="karta1">

<?

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use UG");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `ug_theory_$sys_name` where shema='$shema'", $link);
	while($row = mysql_fetch_array($retval)) {
		$id = $row[0];
		$name = $row[2];
		$coords = $row[3];
		$obzor = $row[4];
		$html = "<area shape='rect' coords='$coords' onclick=helpBox($id) title='$name' onmouseover=\"document.getElementById('rrr').style.cursor='hand';\" onmouseout=\"document.getElementById('rrr').style.cursor='';\">";
		print "$html";
	} 
mysql_close($link);

?>

</map>
</td>
</tr>
</table>
<br><br><br><br><br>
<div id="exit_b">
<table background=background2.jpg border=0 width=30% cellpadding=5>
<tr>
<td align=right>
<form action='test.php' method='post' style='margin:0;'>
<input type='submit' value='Тест' style="background: url(button_menu2.jpg);font-size:17;font-family:Times;width:270px;height:55px;border:1px solid white;color:white;font-size:25;">
<input type='hidden' name='shema' value='<?echo $shema_opt_tek;?>'>
<input type='hidden' name='shema_name' value='<?echo $name_opt_tek;?>'>
<input type='hidden' name='systems' value='<?echo $systems;?>'>
</form>
</td>
</tr>
</table>
</div>

<div id="clock">
<table background=background2.jpg border=0 width=80% cellpadding=5>
<tr>
<td align=center>
<form action='index.php' method='post' style='margin:0;'>
<input type='submit' value='Главная страница' style='background: url(button_menu2.jpg);font-size:17;font-family:Times;width:270px;height:55px;border:1px solid white;color:white;font-size:25;'>
</form>
</td>
<td align=center>
<input type='button' value='<?echo $name_opt_tek;?>' style="background: url(button_menu3.jpg);font-size:17;font-family:Times;width:410px;height:55px;border:1px solid white;color:white;font-size:25;">
</td>
</tr>
</table>
</div>

</body>
</html>