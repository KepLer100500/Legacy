<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Справочник по охране труда</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
<script src="jquery-1.11.3.js"></script>
<style>
.solidblockmenu{
	margin: 0;
	padding: 0;
	float: left;
	font: bold 13px Arial;
	width: 100%;
	border: 1px solid #625e00;
	border-width: 1px 0;
	background: black url(blockactive0.jpg) center center repeat-x;//blockdefault.gif
}

.solidblockmenu li{
	display: inline;
}

.solidblockmenu li a{
	float: left;
	color: white;
	padding: 9px 11px;
	text-decoration: none;
	border-right: 1px solid white;
}

.solidblockmenu li a:visited{
	color: white;
}

.solidblockmenu li a:hover, .solidblockmenu li .current{
	color: white;
	background: transparent url(blockactive1.jpg) center center repeat-x;
}
.current{
	color: white;
	background: transparent url(blockactive1.jpg) center center repeat-x;
}
</style>

<style type="text/css">
p.iepara{ /*Conditional CSS- For IE (inc IE7), create 1em spacing between menu and paragraph that follows*/
padding-top: 1em;
}
</style>

</head>
<body>

<?
$login = $_REQUEST['login'];
$pass = $_REQUEST['pass'];

//$login="user";
//$pass ="user"
?>

<script>
function getOffsetRect(elem){
	var box=elem.getBoundingClientRect();
	var body=document.body;
	var docElem=document.documentElement;
	var scrollTop=window.pageYOffset || docElem.scrollTop || body.scrollTop;
	var scrollLeft=window.pageXOffset || docElem.scrollLeft || body.scrollLeft;
	var clientTop=docElem.clientTop || body.clientTop || 0;
	var clientLeft=docElem.clientLeft || body.clientLeft || 0;
	var top=box.top+scrollTop-clientTop;
	var left=box.left+scrollLeft-clientLeft;
	return {top:Math.round(top), left:Math.round(left)}
}
function show_page(page) {
	document.body.innerHTML += "<form action='siz.php' method='post' id='Form1'><input type='hidden' name='page' value=" + page + "><input type='hidden' name='login' value='<?echo $login;?>'><input type='hidden' name='pass' value='<?echo $pass;?>'></form>";
	document.getElementById("Form1").submit();	
}

function check_load_img() {
	if(document.getElementById("userfile").value == "") {
		alert("Вы не выбрали файл для загрузки!");
		return false;		
	} else {
		return true;
	}	
}

function delete_elem(id_del) {
if(confirm("Вы точно хотите удалить выбранный объект?")) {
	document.body.innerHTML += "<form action='' method='post' id='Form2'><input type='hidden' name='mod' value='3'><input type='hidden' name='id_del' value='" + id_del + "'><input type='hidden' name='login' value='<?echo $login;?>'><input type='hidden' name='pass' value='<?echo $pass;?>'><input type='hidden' name='page' value=888></form>";
	document.getElementById("Form2").submit();
	} else {
		return false;
	}	
}

function hand_on(n){
	document.getElementById(n).style.cursor='hand';
	document.getElementById(n).border = '1';
}

function hand_off(n){
	document.getElementById(n).style.cursor='';
	document.getElementById(n).border = '0';
}

function show_large(n){
	$('[id ^= large_]').hide();
	document.getElementById(n).style.display='block';
	document.getElementById(n).style.top = window.screen.height / 2 - 100;
	document.getElementById(n).style.left = window.screen.width / 2 - 100;
}

function hide_large(n){
	document.getElementById(n).style.display='none';
}
function shadow(el, href){
	var tl=getOffsetRect(el);
	tinyoverlay.style.top=tl.top;
	tinyoverlay.style.left=tl.left-2;
	tinyoverlay.style.display='block';
	tinyoverlay.onclick=href;
}
function nohighlight(id){
	document.getElementById(id).style.display='none';
}
</script>

<table border=0 width=100%>
	<tr>
		<td width=30%>
			<? echo "<a href='menu.php?login=$login&pass=$pass' border=0><img border=0 src=logo.jpg height=70></a>" ?>
			<!--<img src=logo.jpg height=70>-->
		</td>
		<td width=50%>
			<!--<font face=times size=6>Справочник по охране труда</font>-->
			<font face=times size=6 style="font-family: 'Century Gothic', Century Gothic, AppleGothic, sans-serif; font-weight: bold; color: rgb( 0, 52, 102)">СИЗ и СИЗОД</font>
		</td>
		<td width=20% align=right>
			<!--<font face=times size=6>Справочник по охране труда</font>-->
			<? echo "<a href='menu.php?login=$login&pass=$pass'><img border=0 src=cooltext196099839269129.png></a>" ?>
		</td>
	</tr>
</table>

<?
$good=0;

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use ot");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `ot_auth`", $link);

while($row = mysql_fetch_array($retval)) {
		$login_good = $row[1];
		$pass_good = $row[2];
		$perm = $row[3];
		if($login==$login_good && $pass==$pass_good){
			$good=1;
			$access=$perm;
		}
}
if($good==1) {

echo "<ul class='solidblockmenu'>";
$dir_name = $_POST['page'];
$normativ = $_REQUEST['normativ'];
if($normativ=="normativ" || $dir_name=="normativ") {echo "<li><a href='#' id='l1' class='current' onclick=show_page('normativ')>Нормативная документация</a></li>";}
else{echo "<li><a href='#' id='l1' onclick=show_page('normativ')>Нормативная документация</a></li>";}
if($normativ!="normativ" && $dir_name!="normativ") {echo "<li><a href='#' id='l2' class='current' onclick=show_page('perech')>Перечень средств</a></li>";}
else{echo "<li><a href='#' id='l2' onclick=show_page('perech')>Перечень средств</a></li>";}

if($access==2) {
	echo "<li><a href='#' onclick=show_page('888') class='current'>Админ</a></li>";
}
echo "</ul>";
echo "<br><br>";
echo "<div id=main_div></div>";


if($normativ=="normativ" || $dir_name=="normativ") {
	echo "<center><table border=0 width=90% cellpadding = 10 style='border-top: 2px solid rgb(0, 52, 102); border-left: 2px solid rgb(0, 52, 102); border-right: 2px solid rgb(0, 52, 102);'>";
		echo "<tr>";
			echo "<td><a id='s1' href='menu.php?login=$login&pass=$pass' style='left:0; top: 0; z-index:10; '><img id='img1' class='cl' src=bw.png border=0 onmouseover=''></a></td>";
			echo "<td align=center>";
?>			<font size=6 style='font-family: "Century Gothic", Century Gothic, AppleGothic, sans-serif; color: rgb( 0, 52, 102)'>Нормативная Документация по пожарной безопасности</font>
<?			echo "</td>";
			// echo "<td align=right>";
				// echo "<br><img src=mini_logo.jpg width=80px>";
			// echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td align=justify colspan=2>";
			echo "<font size=4><a href=siz/ppr.docx>ПРАВИЛА ПРОТИВОПОЖАРНОГО РЕЖИМА В РФ. Постановление от 25 апреля 2012 года N 390</a><br><br></font>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;Настоящие Правила противопожарного режима содержат требования пожарной безопасности, устанавливающие правила поведения людей, порядок организации производства и (или) содержания территорий, зданий, сооружений, помещений организаций и других объектов (далее - объекты) в целях обеспечения пожарной безопасности.";
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td align=justify colspan=2>";
			echo "<font size=4><a href=siz/is.pdf>ИНСТРУКЦИЯ ПО ОРГАНИЗАЦИИ БЕЗОПАСНОГО ПРОВЕДЕНИЯ ОГНЕВЫХ РАБОТ НА ВЗРЫВООПАСНЫХ, ВЗРЫВОПОЖАРООПАСНЫХ ПРОИЗВОДСТВЕННЫХ ОБЪЕКТАХ ООО «ГАЗПРОМ ДОБЫЧА АСТРАХАНЬ» ИС-6-2014 от 08.08.2014г.</a><br><br></font>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;Настоящая инструкция разработана в целях установления единого подхода к организации и проведению огневых работ на всех взрывоопасных и взрывопожароопасных объектах ООО «Газпром добыча Астрахань» и определяет:<br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- порядок организации подготовки и проведения огневых работ на объектах Общества;<br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- порядок оформления необходимых документов на проведение огневых работ на объектах Общества<br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- обязанность и ответственность руководителей и исполнителей огневых работ на объектах Общества;<br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- меры безопасности при подготовке и проведении огневых работ на объектах Общества.";
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td align=justify colspan=2>";
			echo "<font size=4><a href=siz/ot15.doc>ОТ-15 ИНСТРУКЦИЯ ПО ОТ О МЕРАХ ПОЖАРНОЙ БЕЗОПАСНОСТИ ЦЕХА ДОБЫЧИ ГАЗА И ГАЗОВОГО КОНДЕНСАТА № 1 УППГ-1</a><br><br></font>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;Инструкция устанавливает основные требования пожарной безопасности, предъявляемые при эксплуатации зданий, помещений и прилегающей территории в соответствии с нормами пожарной безопасности, обеспечение пожарной безопасности технологического оборудования.";
			echo "</td>";
		echo "</tr>";
	echo "</table><center>";
	echo "<table width=90% style='border-left: 2px solid rgb(0, 52, 102);'>";
	echo "<tr><td style='border-bottom: 2px solid rgb(0, 52, 102);' width=95%>&nbsp;";
	echo "</td><td align=right style='margin:0; padding: 0' width:5%><img src=shadow.png border=0/>";
	echo "</td></tr>";
} else{
	echo "<a id='s1' href='menu.php?login=$login&pass=$pass' style='left:0; top: 0; z-index:10; '><img id='img1' class='cl' src=bw.png border=0 onmouseover=''></a>";
}
if($dir_name=="888") {

$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use ot");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `ot_pages` order by id desc", $link);

echo "<table border=1 width=100% cellspacing=1>";
echo "<form action='' enctype='multipart/form-data' method='post'>";
		echo "<tr bgcolor=#88ff88 valign=top>";
			echo "<td><input type='submit' src=add.png width=20 value='Добавить' name='add_button' onclick='if(!check_load_img())return false;'>";
			echo "<td><input type='file' name='userfile' size=5 value=''>";
			echo "<td><input type='text' name='new_text' value='' style='width: 100%;'>";
			echo "Категория: <select name=category>";
				echo "<option value='01'>Запрещающие знаки</option>";
				echo "<option value='02'>Предупреждающие знаки</option>";
				echo "<option value='03'>Предписывающие знаки</option>";
				echo "<option value='04'>Знаки пожарной безопасности</option>";
				echo "<option value='05'>Эвакуационные знаки</option>";
				echo "<option value='06'>Знаки медицинского и санитарного назначения</option>";
				echo "<option value='07'>Указательные знаки</option>";
			echo "</select>";
			echo "<td><input type='text' name='new_large_text' value='' style='width: 100%;'>";
			echo "<input type='hidden' name='login' value='$login'>";
			echo "<input type='hidden' name='pass' value='$pass'>";
			echo "<input type='hidden' name='page' value=888>";
echo "</form>";

while($row = mysql_fetch_array($retval)) {
	$id = $row[0];
	$image = $row[1];
	$text = $row[2];
	$large_text = $row[3];
		echo "<tr>";
			echo "<td align=center><img src=Delete.png width=50 onclick='delete_elem(\"$id\");'>";
			echo "<td align=center><img src=$image height=100>";
			echo "<td>$text";
			echo "<td>$large_text";
	}
echo "</table>";

if($_POST['add_button']){
//INSERT
$path = array(".php",".php4",".php3",".phtml",".pl",".cgi");
foreach ($path as $item){
  if(preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
   echo "Разрешено загружать, только документы<br />";
   exit();
  }
}
$temp=$_FILES['userfile']['name'];
$new_text = $_POST['new_text'];
$new_large_text = $_POST['new_large_text'];
$category = $_POST['category'];
$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use ot");
mysql_query("SET NAMES cp1251");
$uploaddir = $category;
$ins_category = $category."/".$temp;
mysql_query("insert into `ot_pages` values('','$ins_category','$new_text','$new_large_text')");
//echo "'$ins_category','$new_text','$new_large_text'";
mysql_close($link);	
$uploadfile = $uploaddir."/".$temp;
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
}

if($_POST['mod']==3){
	$id_del = $_POST['id_del'];
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use ot");
	mysql_query("SET NAMES cp1251");
	mysql_query("delete from `ot_pages` where id='$id_del'", $link);
	mysql_close($link);	
}


}


} else {
	echo "<br><br><br><br><center>Пароль неверен!<br><br><a href=index.php>Ввести пароль ещё раз</a></center>";
}
?>




</body>
</html>