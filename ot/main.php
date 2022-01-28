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
function onsubmitform(){
	document.getElementById('l'+Form1.page.value).className='current';
	alert(document.getElementById('l'+Form1.page.value).className);
}
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
	document.body.innerHTML += "<form action='main.php' onsubmit='onsubmitform()' method='post' id='Form1'><input id='page' type='hidden' name='page' value=" + page + "><input type='hidden' name='login' value='<?echo $login;?>'><input type='hidden' name='pass' value='<?echo $pass;?>'></form>";
	document.getElementById("Form1").submit();
}
//window.onload=function(){
//	document.getElementById('l'+page.value).className='current';
//	alert(document.getElementById('l'+page.value).className);
//}
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
	document.getElementById(n).style.left = window.screen.width / 2 - 250;
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
			<img src=cooltext179386612375132.png height=70>
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

	$dir_name = $_POST['page'];
	$signs = $_REQUEST['signs'];

	echo "<ul class='solidblockmenu'>";
	if(($dir_name=='main' || $dir_name=='') && $signs!='signs'){
		echo "<li><a href='#' id='lmain' class='current' onclick=show_page('main')>Нормативная документация</a></li>";
		echo "<li><a href='#' id='lsigns' onclick=show_page('signs')>Перечень знаков</a></li>";
	}
	else{
		echo "<li><a href='#' id='lmain' onclick=show_page('main')>Нормативная документация</a></li>";	
		if($dir_name!='888'){
			echo "<li><a href='#' id='lsigns' class='current' onclick=show_page('signs')>Перечень знаков</a></li>";}
		else{
			echo "<li><a href='#' id='lsigns' onclick=show_page('signs')>Перечень знаков</a></li>";}
	}

	if($dir_name=='01'){echo "<li><a href='#' class='current' id='l01' onclick=show_page('01')>Запрещающие знаки</a></li>";}
	else{echo "<li><a href='#' id='l01' onclick=show_page('01')>Запрещающие знаки</a></li>";}
	if($dir_name=='02'){echo "<li><a href='#' id='l02' class='current' onclick=show_page('02')>Предупреждающие знаки</a></li>";}
	else{echo "<li><a href='#' id='l02' onclick=show_page('02')>Предупреждающие знаки</a></li>";}
	if($dir_name=='03'){echo "<li><a href='#' id='l03' class='current' onclick=show_page('03')>Предписывающие знаки</a></li>";}
	else{echo "<li><a href='#' id='l03' onclick=show_page('03')>Предписывающие знаки</a></li>";}
	if($dir_name=='04'){echo "<li><a href='#' id='l04' class='current' onclick=show_page('04')>Знаки пожарной безопасности</a></li>";}
	else{echo "<li><a href='#' id='l04' onclick=show_page('04')>Знаки пожарной безопасности</a></li>";}
	if($dir_name=='05'){echo "<li><a href='#' id='l05' class='current' onclick=show_page('05')>Эвакуационные знаки</a></li>";}
	else{echo "<li><a href='#' id='l05' onclick=show_page('05')>Эвакуационные знаки</a></li>";}
	if($dir_name=='06'){echo "<li><a href='#' id='l06' class='current' onclick=show_page('06')>Знаки медицинского и санитарного назначения</a></li>";}
	else{echo "<li><a href='#' id='l06' onclick=show_page('06')>Знаки медицинского и санитарного назначения</a></li>";}
	if($dir_name=='07'){echo "<li><a href='#' id='l07' class='current' onclick=show_page('07')>Указательные знаки</a></li>";}
	else{echo "<li><a href='#' id='l07' onclick=show_page('07')>Указательные знаки</a></li>";}
	if($access==2) {
		echo "<li><a href='#' onclick=show_page('888') class='current'>Админ</a></li>";
	}
	echo "</ul>";
	echo "<br><br>";
	echo "<div id=main_div></div>";


	if($dir_name!="" and $dir_name!="main" and $signs!="signs" and $dir_name!="signs") {
		echo "<a id='s1' href='#' onclick=show_page('signs') style='left:0; top: 0; z-index:10; '><img id='img1' class='cl' src=bw.png border=0 onmouseover=''></a>";
		$link = mysql_connect("10.25.8.8", "admin", "conect");
		mysql_query("use ot");
		mysql_query("SET NAMES cp1251");
		$retval = mysql_query("SELECT * FROM `ot_pages` where img like '%$dir_name/%'", $link);
		$i=0;

		echo "<table border=0 width=100% cellspacing=10 cellpadding=10>";

		while($row = mysql_fetch_array($retval)) {
			$id = $row[0];
			$image = $row[1];
			$text = $row[2];
			$large_text = $row[3];
			if($i % 5 == 0 || $i ==0) {
				echo "<tr><td align=center width=20%><img id='sign_$i' src=$image height=100 onmouseover=hand_on('sign_$i'); onmouseout=hand_off('sign_$i'); onclick=show_large('large_$i');><br>$text";
			} else {
				echo "<td align=center width=20%><img id='sign_$i' src=$image height=100 onmouseover=hand_on('sign_$i'); onmouseout=hand_off('sign_$i'); onclick=show_large('large_$i');><br>$text";
			}
			echo "<div id=\"large_$i\" style='display:none;width:400px;height:200px;position:absolute;background:rgb(227, 239, 253);border: solid 2px rgb(0, 52, 102);'>
					<table border=0 cellspacing=0 >
						<tr>
							<td width=99%>
								<img src=blockactive0.jpg height=30 width=100%>
							</td>
							<td onclick=hide_large('large_$i')>
								<img src=closeblack.png width=30 style='cursor: hand'>
							</td>
						</tr>
						<tr>
							<td colspan=2 align=center>
								<br>$large_text
							</td>
						</tr>
					</table>
				</div>";
			$i++;
		}

		echo "</table>";

	} else if($signs!="signs" and $dir_name!="signs") {
		echo "<center><table border=0 width=90% cellpadding = 10 style='border-top: 2px solid rgb(0, 52, 102); border-left: 2px solid rgb(0, 52, 102); border-right: 2px solid rgb(0, 52, 102);'>";
			echo "<tr>";
				echo "<td><a id='s1' href='menu.php?login=$login&pass=$pass' style='left:0; top: 0; z-index:10; '><img id='img1' class='cl' src=bw.png border=0 onmouseover=''></a></td>";
				echo "<td align=center>";
?>				<font size=6 style='font-family: "Century Gothic", Century Gothic, AppleGothic, sans-serif; color: rgb( 0, 52, 102)'>Нормативная Документация системы стандартов безопасности труда</font>
<?
				echo "</td>";
				echo "<td align=right>";
					echo "<br><img src=mini_logo.jpg width=80px>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align=justify colspan=3>";
				echo "<font size=4><a href=gost.docx>ГОСУДАРСТВЕННЫЙ СТАНДАРТ РОССИЙСКОЙ ФЕДЕРАЦИИ. СИСТЕМА СТАНДАРТОВ БЕЗОПАСНОСТИ ТРУДА. ЦВЕТА СИГНАЛЬНЫЕ, ЗНАКИ БЕЗОПАСНОСТИ И РАЗМЕТКА СИГНАЛЬНАЯ. НАЗНАЧЕНИЕ И ПРАВИЛА ПРИМЕНЕНИЯ. ОБЩИЕ ТЕХНИЧЕСКИЕ ТРЕБОВАНИЯ И ХАРАКТЕРИСТИКИ. МЕТОДЫ ИСПЫТАНИЙ. ГОСТ Р 12.4.026-2001</a><br><br></font>";
					
					echo "&nbsp;&nbsp;&nbsp;&nbsp;Настоящий стандарт распространяется на сигнальные цвета, знаки безопасности и сигнальную разметку для производственной, общественной и иной хозяйственной деятельности людей, производственных, общественных объектов и иных мест, где необходимо обеспечение безопасности. Стандарт разработан в целях предотвращения несчастных случаев, снижения травматизма и профессиональных заболеваний, устранения опасности для жизни, вреда для здоровья людей, опасности возникновения пожаров или аварий.
	Стандарт не распространяется на:
	- цвета, применяемые для световой сигнализации всех видов транспорта, транспортных средств и дорожного движения;
	- цвета, знаки и маркировочные щитки баллонов, трубопроводов, емкостей для хранения и транспортирования газов и жидкостей;
	- дорожные знаки и разметку, путевые и сигнальные знаки железных дорог, знаки для обеспечения безопасности движения всех видов транспорта (кроме знаков безопасности для подъемно-транспортных механизмов, внутризаводского, пассажирского и общественного транспорта);
	- знаки и маркировку опасных грузов, грузовых единиц, требующих специальных условий транспортирования и хранения;
	- знаки для электротехники.
	Стандарт устанавливает:
	- назначение, правила применения и характеристики сигнальных цветов;
	- назначение, правила применения, виды и исполнения, цветографическое изображение, размеры, технические требования и характеристики, методы испытаний знаков безопасности;
	- назначение, правила применения, виды и исполнения, цветографическое изображение, размеры, технические требования и характеристики, методы испытаний сигнальной разметки.
	Применение сигнальных цветов, знаков безопасности и сигнальной разметки обязательно для всех организаций на территории Российской Федерации независимо от их форм собственности и организационно-правовых форм.
	";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align=justify colspan=3>";
					echo "<font size=4><a href=npb.docx>НОРМЫ ПОЖАРНОЙ БЕЗОПАСНОСТИ. ЦВЕТА СИГНАЛЬНЫЕ. ЗНАКИ ПОЖАРНОЙ БЕЗОПАСНОСТИ. ВИДЫ, РАЗМЕРЫ, ОБЩИЕ ТЕХНИЧЕСКИЕ ТРЕБОВАНИЯ. НПБ 160-97</a><br><br></font>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;Настоящие нормы распространяются на сигнальные цвета и знаки пожарной безопасности, которые предназначены для регулирования поведения человека в целях предотвращения возникновения пожара и (или) выполнения им определенных действий при пожаре для обеспечения собственной безопасности и снижения размера потерь от пожара.
	Нормы устанавливают разновидности знаков, форму, параметрические ряды типоразмеров, требования к фотометрическим и колориметрическим характеристикам, устойчивости к воздействию факторов внешней среды.
	Нормы не распространяются на знаки для маркирования транспортных средств и грузовых единиц (тары), предназначенных для доставки и упаковки пожароопасных грузов, на цвет окраски трубопроводов систем автоматического пожаротушения, а также трубопроводов, баллонов и иных емкостей для хранения или транспортирования горючих газов, легковоспламеняющихся и горючих жидкостей.
	Нормы в части номенклатуры знаков, их цвета и графики полностью соответствуют международному стандарту ИСО 6309.
	";
				echo "</td>";
			echo "</tr>";
		echo "</table><center>";
		echo "<table width=90% style='border-left: 2px solid rgb(0, 52, 102);'>";
			echo "<tr><td style='border-bottom: 2px solid rgb(0, 52, 102);' width=95%>&nbsp;";
			echo "</td><td align=right style='margin:0; padding: 0' width:5%><img src=shadow.png border=0/>";
			echo "</td></tr>";
	} else{
		echo "<a id='s1' href='menu.php?login=$login&pass=$pass' style='left:0; top: 0; z-index:10; '><img id='img1' class='cl' src=bw.png border=0 onmouseover=''></a>";
		echo "<div style='width: 100%'>";
				echo '<span id="overlayall" buttclick="" onclick="" style="cursor: hand; display:none; width:100%; height:100%; z-index:2; position:absolute; top: 0; left:0px; right:-60px; bottom: 0; background-color: rgb(0,52,100); opacity:0.0; filter: alpha(opacity=0);"></span>';
				echo '<span id="tinyoverlay" buttclick="" onclick="" href="" style="cursor: hand; display:none; width:225px; height:300px; z-index:4; position:absolute; top: 0; left:0px; right:-60px; bottom: 0; background-color: rgb(0,52,100); opacity:0.17; filter: alpha(opacity=17);" onmouseout="nohighlight(this.id)"><a href="" id="over"></a></span>';
				echo '<span id="overlay" buttclick="" onclick="" href="" style="cursor: hand; display:none; width:600px; height:350px; z-index:1; position:absolute; top: 0; left:0px; right:-60px; bottom: 0; background-color: rgb(0,52,100); opacity:0.17; filter: alpha(opacity=17);" onmouseout="nohighlight(this.id)"></span>';
				echo "<table align=center><tr><td align=center>";
					echo "<a id='a1' href='#' onclick=show_page('01') style='margin-left:-4px;z-index:3; '><img id='img1' class='cl' src=pictSigns/signstop.png border=0 onmouseover='shadow(this, a1.onclick)'></a>";
					echo "<a id='a2' href='#' onclick=show_page('02') style='margin-left:-4px;z-index:3; '><img id='img1' class='cl' src=pictSigns/signalarm.png border=0 onmouseover='shadow(this, a2.onclick)'></a>";
					echo "<a id='a3' href='#' onclick=show_page('03') style='margin-left:-4px;z-index:3; '><img id='img1' class='cl' src=pictSigns/signshould.png border=0 onmouseover='shadow(this, a3.onclick)'></a>";
				echo "</td></tr><tr><td align=center>";
					echo "<a id='a4' href='#' onclick=show_page('04') style='margin-left:-4px;z-index:3; '><img id='img1' class='cl' src=pictSigns/signfire.png border=0 onmouseover='shadow(this, a4.onclick)'></a>";
					echo "<a id='a5' href='#' onclick=show_page('05') style='margin-left:-4px;z-index:3; '><img id='img1' class='cl' src=pictSigns/signevac.png border=0 onmouseover='shadow(this, a5.onclick)'></a>";
					echo "<a id='a6' href='#' onclick=show_page('06') style='margin-left:-4px;z-index:3; '><img id='img1' class='cl' src=pictSigns/signmed.png border=0 onmouseover='shadow(this, a6.onclick)'></a>";
					echo "<a id='a7' href='#' onclick=show_page('07') style='margin-left:-4px;z-index:3; '><img id='img1' class='cl' src=pictSigns/signwhere.png border=0 onmouseover='shadow(this, a7.onclick)'></a>";
				echo "</td></tr></table>";
		echo "</div>";
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
				echo "<td align=center style='cursor: hand'><img src=closered.png width=50 onclick='delete_elem(\"$id\");'>";
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