<html>
<head>
	<META http-equiv=Content-Type content="text/html; charset=windows-1251">
	<script src="jquery-1.11.3.js"></script>
	<title>Профсоюз</title>
	<style>
	.div_add_window {
		width: 500px;
		height: 250px;
		background: #FFFFFF;
		border: 1px solid black;
		display: none;
		top: 50;
		left: 50;
		position:absolute;
	}
	</style>
	
</head>
<body bgcolor=#B9D1FF>

<script>
function find_chuvak(let,log,pas){
	document.body.innerHTML += "<form action='main.php' method='post' id='Form1'><input type='hidden' name='input_letter' value='" + let + "'><input type='hidden' name='login' value='" + log + "'><input type='hidden' name='pass' value='" + pas + "'></form>";
	document.getElementById("Form1").submit();
}

function chuvak(id,fio,log,pas,let){
	document.body.innerHTML += "<form action='main.php' method='post' id='Form2'><input type='hidden' name='tab_num' value='" + id + "'><input type='hidden' name='fio' value='" + fio + "'><input type='hidden' name='login' value='" + log + "'><input type='hidden' name='pass' value='" + pas + "'><input type='hidden' name='input_letter' value='" + let + "'></form>";
	document.getElementById("Form2").submit();
}

function edit(n){
	
	var tb_body = document.getElementById("table_body1");
	var trTolpa = tb_body.getElementsByTagName('tr');
		for(var i=0;i < trTolpa.length;i++){
			trTolpa[i].style.backgroundColor = '#B9D1FF';
		}
	var tb_body = document.getElementById("table_body2");
	var trTolpa = tb_body.getElementsByTagName('tr');
		for(var i=0;i < trTolpa.length;i++){
			trTolpa[i].style.backgroundColor = '#B9D1FF';
		}
	var tb_body = document.getElementById("table_body3");
	var trTolpa = tb_body.getElementsByTagName('tr');
		for(var i=0;i < trTolpa.length;i++){
			trTolpa[i].style.backgroundColor = '#B9D1FF';
		}

	var trList = document.getElementById(n);
	trList.style.backgroundColor = '#6464FF';
	
	document.getElementById('current_id').value = n;
	document.getElementById('add_window').style.display = 'none';
}

function hand_on(n){
	document.getElementById(n).style.cursor='hand';
}

function hand_off(n){
	document.getElementById(n).style.cursor='';
}

function show_delete(){
	var n = document.getElementById('current_id').value;
	
	if(n!="") {
		if(confirm('Точно хотите удалить эту запись?')) {
			
			
			var i = document.getElementById('input_letter').value;
			var l = document.getElementById('login').value;
			var p = document.getElementById('pass').value;
			var t = document.getElementById('tab_num').value;
			var f = document.getElementById('fio').value;

			$.post(
				"delete.php",
				{
					id: n
				},
				function onAjaxSuccess(data){
					//alert(data);
					//window.location.reload();
				},
				"text"
			);
			document.body.innerHTML += "<form action='main.php' method='post' id='Form3'><input type='hidden' name='tab_num' value='" + t + "'><input type='hidden' name='fio' value='" + f + "'><input type='hidden' name='login' value='" + l + "'><input type='hidden' name='pass' value='" + p + "'><input type='hidden' name='input_letter' value='" + i + "'></form>";
			document.getElementById("Form3").submit();

		}
	}
	//hide_menu();
}

function show_add(){
	w = window.screen.width;
	n_w = (w - 800) / 2;
	
	var newdate;
    date = new Date();
	Day = date.getDate();
	Month = date.getMonth() + 1;
	Year = date.getFullYear();
	if (Day <= 9) {
		Day = "0" + Day;
	}
	if (Month <= 9) {
		Month = "0" + Month;
	}
	
    newdate = Year + '-' + Month + '-' + Day;
    $("#DateRec_add").val(newdate);

	document.getElementById('add_window').style.Top = 300;
	document.getElementById('add_window').style.Left = n_w;
	document.getElementById('add_window').style.display = 'block';
}

function do_insert(){
	if(confirm('Точно хотите добавить новую запись?')) {
	
	var input = document.getElementById('input_letter').value;
	var login = document.getElementById('login').value;
	var pass = document.getElementById('pass').value;
	var tab_num = document.getElementById('tab_num').value;
	var fio = document.getElementById('fio').value;
	var direction_add = $("#direction_add").val();;
	var event_add = document.getElementById('event_add').value;
	var DateRec_add = document.getElementById('DateRec_add').value;
	var cost_add = document.getElementById('cost_add').value;

	$.post(
		"insert.php",
		{
			tab_num: tab_num, fio: fio, direction_add: direction_add, event_add: event_add, DateRec_add: DateRec_add, cost_add: cost_add
		},
		function onAjaxSuccess(data){
			//
		},
		"text"
	);
	document.body.innerHTML += "<form action='main.php' method='post' id='Form4'><input type='hidden' name='tab_num' value='" + tab_num + "'><input type='hidden' name='fio' value='" + fio + "'><input type='hidden' name='login' value='" + login + "'><input type='hidden' name='pass' value='" + pass + "'><input type='hidden' name='input_letter' value='" + input + "'></form>";
	document.getElementById("Form4").submit();
	}
}

function close_button(){
	document.getElementById('add_window').style.display = 'none';
}
</script>
<input type="hidden" name="current_id" value="">
<table border=0 width=100%>
	<tr>
		<td align=center width=10%>
			<a href=index.html><img width=100 src=logotip.jpg border=0></a>
		</td>
		<td align=center>
			<img src=log.png width=30%>
		</td>
	</tr>
</table>
<hr>
<?
$YYYY = date("Y");
$letters = array('А','Б','В','Г','Д','Е','Ж','З','И','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Э','Ю','Я');
$letters_count = count($letters);

$input_letter = $_POST['input_letter'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$tab_num = $_POST['tab_num'];
$fio = $_POST['fio'];

print "<input type='hidden' name='input_letter' value='$input_letter'>";
print "<input type='hidden' name='login' value='$login'>";
print "<input type='hidden' name='pass' value='$pass'>";
print "<input type='hidden' name='tab_num' value='$tab_num'>";
print "<input type='hidden' name='fio' value='$fio'>";

$access = 0;
$link = mysql_connect("10.25.8.8", "admin", "conect");
mysql_query("use trade_union");
mysql_query("SET NAMES cp1251");
$retval = mysql_query("SELECT * FROM `profsouz_auth`", $link);
while($row = mysql_fetch_array($retval)) {
	$login_base = $row[1];
	$pass_base = $row[2];
	if($login==$login_base && $pass==$pass_base){
		$access=1;
	}
}
mysql_close($link);

if($access==1) {
	print "<table border=0 cellpadding=10 width=100%>";
		print "<tr valign=top>";
			print "<td width=10%>";
				print "&nbsp;";
				for ($i=0;$i<$letters_count;$i++) {
					print "<a href='#$letters[$i]' onclick='find_chuvak(\"$letters[$i]\",\"$login\",\"$pass\")'>$letters[$i]</a>&nbsp;";
				}
				print "<br><br><hr><br>";
				if($input_letter!="") {
					print "<div style='overflow-y:scroll;height: 710px;'>";
					$link = mysql_connect("10.25.8.8", "admin", "conect");
					mysql_query("use db_gpu");
					mysql_query("SET NAMES cp1251");
					$retval = mysql_query("SELECT * FROM `tab_users` where FullName like '$input_letter%' order by FullName", $link);
					while($row = mysql_fetch_array($retval)) {
						$Id = $row[0];
						$FullName = $row[6]; // 6
						if(($FullName!="" && $Id < 30000) || ($FullName!="" && $Id > 40000)) {
							print "<a href='#' onclick='chuvak(\"$Id\",\"$FullName\",\"$login\",\"$pass\",\"$input_letter\")'>$FullName</a><br>";
						}
					}
					mysql_close($link);
					print "</div>";
				}
			print "</td>";
			print "<td>";
			if($tab_num!=""){
			print "<table border=0 style='font-size:16; background-color:#B9D1FF' cellpadding=5 width=100%>";
			print "<tr valign=top>";
			print "<td width=1%>";
				print "<font size=5>$fio</font>&nbsp;&nbsp;&nbsp;<img id=img_add width=20 src=Add.png onclick=show_add(); onmouseover=hand_on('img_add'); onmouseout=hand_off('img_add');>&nbsp;&nbsp;&nbsp;<img id=img_del width=20 src=Delete.png onclick=show_delete(); onmouseover=hand_on('img_del'); onmouseout=hand_off('img_del');><br><br>";
					print "<div style='overflow-y:scroll;height: 700px; width=100%'>";
					print "<font size=5 color=Blue>Культмасс</font>";
					print "<table border=1 style='font-size:16; background-color:#B9D1FF'>";
						print "<tr>";
							print "<td width=20px align=center>";
								print "№";
							print "</td>";
							print "<td width=450px align=center>";
								print "Мероприятие";
							print "</td>";
							print "<td width=320px align=center>";
								print "Дата";
							print "</td>";
							print "<td width=200px align=center>";
								print "Цена";
							print "</td>";
						print "</tr>";
					print "</table>";
					print "<table id=table_body1 border=1 style='font-size:16; background-color:#B9D1FF'>";
						$c = 1;
						$dengi = 0;
						$link = mysql_connect("10.25.8.8", "admin", "conect");
						mysql_query("use trade_union");
						mysql_query("SET NAMES cp1251");
						$retval = mysql_query("SELECT * FROM `profsouz` where tab_num='$tab_num%' and direction = 'Культмасс' and DateRec > '$YYYY' order by id", $link);
						while($row = mysql_fetch_array($retval)) {
							print "<tr id='$row[0]' onclick=edit('$row[0]'); onmouseover=hand_on('$row[0]'); onmouseout=hand_off('$row[0]');>";
								print "<td width=20px>";
									print "$c";
								print "</td>";
								print "<td width=450px>";
									print "$row[5]";
								print "</td>";
								print "<td width=320px>";
									print "$row[3]";
								print "</td>";
								print "<td width=200px>";
									print "$row[6]";
									$dengi += $row[6];
								print "</td>";
							print "</tr>";
							$c++;
						}
					
					print "</table>";
					print "<font size=5 color=black>Уже было получено: $dengi руб.</font>";
					$dengi = 2000 - $dengi;
					if($dengi>0) {
							print "&nbsp;&nbsp;&nbsp;<font size=5 color=black>Осталось на балансе: </font><font size=5 color=Green>$dengi руб.</font>";
						} else {
							print "&nbsp;&nbsp;&nbsp;<font size=5 color=black>Осталось на балансе: </font><font size=5 color=Red>$dengi руб.</font>";
						}
					print "<br><br><hr><br>";

					print "<font size=5 color=Blue>Спорт</font>";
					print "<table border=1 style='font-size:16; background-color:#B9D1FF'>";
						print "<tr>";
							print "<td width=20px align=center>";
								print "№";
							print "</td>";
							print "<td width=450px align=center>";
								print "Мероприятие";
							print "</td>";
							print "<td width=320px align=center>";
								print "Дата";
							print "</td>";
							print "<td width=200px align=center>";
								print "Цена";
							print "</td>";
						print "</tr>";
					print "</table>";
					print "<table id=table_body2 border=1 style='font-size:16; background-color:#B9D1FF'>";
						$c=1;
						$dengi = 0;
						$link = mysql_connect("10.25.8.8", "admin", "conect");
						mysql_query("use trade_union");
						mysql_query("SET NAMES cp1251");
						$retval = mysql_query("SELECT * FROM `profsouz` where tab_num='$tab_num%' and direction = 'Спорт' and DateRec > '$YYYY' order by id", $link);
						while($row = mysql_fetch_array($retval)) {
							print "<tr id='$row[0]' onclick=edit('$row[0]'); onmouseover=hand_on('$row[0]'); onmouseout=hand_off('$row[0]');>";
								print "<td width=20px>";
									print "$c";
								print "</td>";
								print "<td width=450px>";
									print "$row[5]";
								print "</td>";
								print "<td width=320px>";
									print "$row[3]";
								print "</td>";
								print "<td width=200px>";
									print "$row[6]";
									$dengi += $row[6];
								print "</td>";
							print "</tr>";
							$c++;
						}
					
					print "</table>";
					print "<font size=5 color=black>Уже было получено: $dengi руб.</font>";
					$dengi = 2500 - $dengi;	//29.05.2020. Sum changed by LOV. Old - 2000
					if($dengi>0) {
							print "&nbsp;&nbsp;&nbsp;<font size=5 color=black>Осталось на балансе: </font><font size=5 color=Green>$dengi руб.</font>";
						} else {
							print "&nbsp;&nbsp;&nbsp;<font size=5 color=black>Осталось на балансе: </font><font size=5 color=Red>$dengi руб.</font>";
						}
					print "<br><br><hr><br>";
					
					$itog_kult = 0;
					$retval = mysql_query("SELECT cost FROM `profsouz` where direction = 'Культмасс' and DateRec > '$YYYY' order by id", $link);
						while($row = mysql_fetch_array($retval)) {
						$itog_kult += $row[0];
					}
					$itog_sport = 0;
					$retval = mysql_query("SELECT cost FROM `profsouz` where direction = 'Спорт' and DateRec > '$YYYY' order by id", $link);
						while($row = mysql_fetch_array($retval)) {
						$itog_sport += $row[0];
					}
					$itog = $itog_kult + $itog_sport;
					
					print "<font size=5 color=Blue>Сводная информация</font>";
					print "<table border=1 style='font-size:20; background-color:#B9D1FF' width=30%>";
						print "<tr>";
							print "<td>";
								print "Всего было отдано по Культмассу:";
							print "</td>";
							print "<td>";
								print "$itog_kult";
							print "</td>";
						print "</tr>";
						print "<tr>";
							print "<td>";
								print "Всего было отдано по Спорту:";
							print "</td>";
							print "<td>";
								print "$itog_sport";
							print "</td>";
						print "</tr>";
						print "<tr>";
							print "<td>";
								print "Общая сумма возвратов за $YYYY:";
							print "</td>";
							print "<td>";
								print "$itog";
							print "</td>";
						print "</tr>";
					print "</table>";

	print "<br><br>";
	print "<font size=5 color=Blue>Архив</font>";
	print "<table id=table_body3 border=1 style='font-size:20; background-color:#B9D1FF' width=30%>";
		print "<tr>";
			print "<td>";
				print "Дата";
			print "</td>";
			print "<td>";
				print "Тип мероприятия";
			print "</td>";
			print "<td>";
				print "Цена";
			print "</td>";
		print "</tr>";
	$retval = mysql_query("SELECT * FROM `profsouz` where tab_num='$tab_num%' and DateRec < '$YYYY' order by id", $link);
		while($row = mysql_fetch_array($retval)) {
		//print "<tr>";
		print "<tr id='$row[0]' onclick=edit('$row[0]'); onmouseover=hand_on('$row[0]'); onmouseout=hand_off('$row[0]');>";
			print "<td>";
				print "$row[3]";
			print "</td>";
			print "<td>";
				print "$row[4]";
			print "</td>";
			print "<td>";
				print "$row[6]";
			print "</td>";
		print "</tr>";
		}
	print "</table>";	


					
							
							
				print "</div>";
		print "</td>";
		print "</tr>";
		print "</table>";
				print "</td>";
		print "</tr>";
	print "</table>";
	

	
	
	}
} else {
	print "В доступе отказано!";
}

?>
<hr>
<div class=div_add_window id=add_window align=center>
	<table width=100% border=0 bgcolor='#9393FF'>
		<tr>
			<td width=99% align=center>
				Новая запись
			</td>
			<td>
				<img id=close_button_add src=close_new.png width=30 onclick='close_button()' onmouseover=hand_on('close_button_add'); onmouseout=hand_off('close_button_add');>
			</td>
		</tr>
	</table>
<br>
	<table border=0 width=90%>
		<tr>
			<td>
				Направление
			</td>
			<td>
				<select id='direction_add' style='width:326'>
					<option>Культмасс</option>
					<option>Спорт</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Мероприятие
			</td>
			<td>
				<input type='text' id='event_add' size='50' value='-' style='background-color: #FFFFFF'>
			</td>
		</tr>
		<tr>
			<td>
				Дата
			</td>
			<td>
				<input type='text' id='DateRec_add' size='50' value='' style='background-color: #FFFFFF'>
			</td>
		<tr>
			<td>
				Цена
			</td>
			<td>
				<input type='text' id='cost_add' size='50' value='' style='background-color: #FFFFFF'>
			</td>
		</tr>
	</table>
	<br><input type='button' value='Добавить' onclick='do_insert();'>
</div>

</body>
</html>