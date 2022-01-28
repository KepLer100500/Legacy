<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Справочник по охране труда</title>
<LINK REL=StyleSheet HREF="position-fixed.css" TYPE="text/css">
<script src="jquery-1.11.3.js"></script>
<style>
.solidblockmenu{
	margin: 0;
	margin-bottom: 20px;
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
.block a:hover{
	color: white;
	background: transparent url(shadow.png) center center repeat-x;
}
</style>

</head>
<body>

<?
$login = $_REQUEST['login'];
$pass = $_REQUEST['pass'];
$signs = 'signs';
$normativ = 'normativ';
$perech = 'perech';

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
window.onresize=function(){//при загрузке страницы
	//if(document.documentElement.clientHeight<=standartWidth){
	//	img2.style.width
	//}
	//img2.style.maxHeight=document.documentElement.clientHeight/2.5+'px';
}
function shadow(el, href){
	var tl=getOffsetRect(el);
	if(el.id.length==4){
		overlay.style.top=tl.top;
		overlay.style.left=tl.left;
		overlay.style.display='block';
		overlay.onclick=href;
	}
	else{
		tinyoverlay.style.top=tl.top-25;
		tinyoverlay.style.left=tl.left-2;
		tinyoverlay.style.display='block';
		over.href=href;
		tinyoverlay.onclick=href;
	}
}
function nohighlight(id){
	document.getElementById(id).style.display='none';
}
function showOptions(id){
	var tl=getOffsetRect(document.getElementById(id));
	document.getElementById(id+'11').style.top=tl.top;
	document.getElementById(id+'11').style.left=tl.left+2;
	//// document.getElementById(id+'2').style.top=tl.top;
	//// document.getElementById(id+'2').style.left=tl.left+200;
	//// document.getElementById(id+'3').style.top=tl.top;
	//// document.getElementById(id+'3').style.left=tl.left+400;
	//document.getElementById(id+'1').style.display='inline-block';
	//// document.getElementById(id+'2').style.display='block';
	//// document.getElementById(id+'3').style.display='block';
	//document.getElementById(id).style.display='none';
	if((document.body.offsetWidth<1800 && document.body.offsetWidth>1233 && id!='a2' && id!='a1')){
		document.getElementById(id+'11').style.top=tl.top+369;
		document.getElementById(id+'11').style.left=tl.left+17;
	}
	else if(document.body.offsetWidth<=1233 && id!='a1'){
		document.getElementById(id+'11').style.top=tl.top+369;
		document.getElementById(id+'11').style.left=tl.left+17;
	}
	overlayall.style.display='block';
	document.getElementById(id+'11').style.display='block';
}
</script>

<table border=0 width=100%>
	<tr>
		<td width=30%>
			<img src=logo.jpg height=70>
		</td>
		<td width=70%>
			<font face=times size=6 style="font-family: 'Century Gothic', Century Gothic, AppleGothic, sans-serif; font-weight: bold; color: rgb( 0, 52, 102)">Интерактивный класс по охране труда</font>
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
	echo "<li><a href='#' class='current'>Главная страница</a></li>";
	echo "<li><a href='index.php'>Выйти</a></li>";
	echo "</ul>";
	echo "<br><br>";
	echo "<div id=main_div></div>";
	echo "<div style='width: 100%'>";
		echo '<span id="overlayall" buttclick="" onclick="" style="cursor: hand; display:none; width:100%; height:100%; z-index:2; position:absolute; top: 0; left:0px; right:-60px; bottom: 0; background-color: rgb(0,52,100); opacity:0.0; filter: alpha(opacity=0);"></span>';
		echo '<span id="tinyoverlay" buttclick="" onclick="" href="" style="cursor: hand; display:none; width:200px; height:400px; z-index:4; position:absolute; top: 0; left:0px; right:-60px; bottom: 0; background-color: rgb(0,52,100); opacity:0.17; filter: alpha(opacity=17);" onmouseout="nohighlight(this.id)"><a href="" id="over"></a></span>';
		echo '<span id="overlay" buttclick="" onclick="" href="" style="cursor: hand; display:none; width:600px; height:350px; z-index:1; position:absolute; top: 0; left:0px; right:-60px; bottom: 0; background-color: rgb(0,52,100); opacity:0.17; filter: alpha(opacity=17);" onmouseout="nohighlight(this.id)"></span>';
		//echo "<a id='a1' href=main.php?login=$login&pass=$pass class='block'><img id='img1' class='cl' src=button_1.png border=0 style='margin-left: 15px; margin-bottom: 15px' onmouseover='shadow(this, a1.href)'></a>";
	############Знаки?>
		<a id='a1' onclick='showOptions("a1")' href=#><img id='img1' class='cl' src=button_1.png border=0 style='margin-left: 15px; margin-bottom: 15px' onmouseover='shadow(this, a1.onclick)'></a>
		<div id='a111' style='z-index:5; display: none; position:absolute; margin: 0; padding: 0' >
			<a id='a11' onclick='a111.style.display="none"; overlayall.style.display="none"; tinyoverlay.style.display="none";' href=# style='margin-left:-2px;'><img id='img11' class='cl' src=back.png border=0 onmouseover='shadow(this, a11.onclick)'></a>
<?			echo "<a id='a12' href='main.php?login=$login&pass=$pass&signs=main' style='margin-left:-4px;'><img id='img52' class='cl' src=docs.png border=0 onmouseover='shadow(this, a12.href)'></a>";
			echo "<a id='a13' href='main.php?login=$login&pass=$pass&signs=$signs' style='margin-left:0;'><img id='img53' class='cl' src=pers.png border=0 onmouseover='shadow(this, a13.href)'></a>";
		echo "</div>";
	############СИЗы?>
		<a id='a2' onclick='showOptions("a2")' href=#><img id='img2' class='cl' src=button_2.png border=0 style='margin-left: 15px; margin-bottom: 15px' onmouseover='shadow(this, a2.onclick)'></a>
		<div id='a211' style='z-index:5; display: none; position:absolute; margin: 0; padding: 0' >
			<a id='a21' onclick='a211.style.display="none"; overlayall.style.display="none"; tinyoverlay.style.display="none";' href=# style='margin-left:-2px;'><img id='img21' class='cl' src=back.png border=0 onmouseover='shadow(this, a21.onclick)'></a>
<?			echo "<a id='a22' href='siz.php?login=$login&pass=$pass&normativ=$normativ' style='margin-left:-4px;'><img id='img22' class='cl' src=docs.png border=0 onmouseover='shadow(this, a22.href)'></a>";
			echo "<a id='a23' href='siz.php?login=$login&pass=$pass&normativ=$perech' style='margin-left:-4px;'><img id='img23' class='cl' src=sizcat.png border=0 onmouseover='shadow(this, a23.href)'></a></div>";

		echo "<a id='a3' href=#><img id='img3' class='cl' src=button_3.png border=0 style='margin-left: 15px; margin-bottom: 15px' onmouseover='shadow(this, a3.href)'></a>"; //pict1.png Голова

		echo "<a id='a4' href=#><img id='img4' class='cl' src=button_4.png border=0 style='margin-left: 15px; margin-bottom: 15px' onmouseover='shadow(this, a4.href)'></a>";
	############Пожарка?>
		<a id='a5' onclick='showOptions("a5")' href=#><img id='img5' class='cl' src=button_5.png border=0 style='margin-left: 15px; margin-bottom: 15px' onmouseover='shadow(this, a5.onclick)'></a>
		<div id='a511' style='z-index:5; display: none; position:absolute; margin: 0; padding: 0' >
			<a id='a51' onclick='a511.style.display="none"; overlayall.style.display="none"; tinyoverlay.style.display="none";' href=# style='margin-left:-2px;'><img id='img51' class='cl' src=back.png border=0 onmouseover='shadow(this, a51.onclick)'></a>
	<?		echo "<a id='a52' href='pb.php?login=$login&pass=$pass&normativ=$normativ' style='margin-left:-4px;'><img id='img52' class='cl' src=docs.png border=0 onmouseover='shadow(this, a52.href)'></a>";
			echo "<a id='a53' href='pb.php?login=$login&pass=$pass' style='margin-left:-4px;'><img id='img53' class='cl' src=per.png border=0 onmouseover='shadow(this, a53.href)'></a></div>";
			//echo "<a id='a51' href=# style='display: none' ><img class='cl' src=back.png border=0 onmouseover='shadow(this, a51.href)'></a>";

		echo "<a id='a6' href=#><img id='img6' class='cl' src=button_6.png border=0 style='margin-left: 11px; margin-bottom: 15px' onmouseover='shadow(this, a6.href)'></a>";
				
	echo "</div>";


} else {
	echo "<br><br><br><br><center>Пароль неверен!<br><br><a href=index.php>Ввести пароль ещё раз</a></center>";
}

// echo "<table border=0>";
	// echo "<tr>";
		// echo "<td>";
			// echo "<a href=main.php?login=$login&pass=$pass><img src=pict1.jpg border=0 style='min-height:100px; min-width:100px'></a>";
		// echo "<td>";
			// echo "<a href=#><img id='img2' src=button_2.png border=0></a>";
		// echo "<td>";
			// echo "<a href=#><img src=button_3.png border=0></a>";
	// echo "<tr>";
		// echo "<td>";
			// echo "<a href=#><img src=button_4.png border=0></a>";
		// echo "<td>";
			// echo "<a href=#><img src=button_5.png border=0></a>";
		// echo "<td>";
			// echo "<a href=#><img src=button_6.png border=0></a>";
// echo "</table>";

?>




</body>
</html>