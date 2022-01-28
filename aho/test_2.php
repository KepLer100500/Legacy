<html>
<head>
<title>АХО</title>
	<link rel="stylesheet" href="jquery-ui.css">
	<script src="jquery-1.11.3.js"></script>
	<script src="jquery-ui.js"></script>
	<link rel="stylesheet" href="jquery-ui.theme.css">
	<style>
	.button {
		cursor:pointer;
		display:block;
		height:52px;
		width:296px;
		line-height:52px;
		text-align:center;
		background-image:url('button1.png');
		background-repeat:no-repeat;

	}

	a { 
		text-decoration: none;
		color:black;
	}
	
	.div_main {
		width: 100px;
		height: 100px;
		background: #99D9EA;
		border: 1px solid black;
	}
	
	.div_head {
		width: 1000px;
		height: 30px;
		background: #99D9EA;
		border: 0px solid black;
	}
	
	.div_body {
		width: 1000px;
		height: 429px;
		background: #99D9EA;
		border: 0px solid black;
		overflow-y:scroll;
	}
	
	.div_menu {
		width: 170px;
		height: 90px;
		background: #FFFFFF;
		border: 0px solid black;
		display: none;
		position:absolute;
	}
	
	.div_edit_window {
		width: 800px;
		height: 600px;
		background: #FFFFFF;
		border: 1px solid black;
		display: none;
		top: 50;
		left: 50;
		position:absolute;
	}
	
	.div_add_window {
		width: 800px;
		height: 600px;
		background: #FFFFFF;
		border: 1px solid black;
		display: none;
		top: 50;
		left: 50;
		position:absolute;
	}
		
		
	</style>
</head>
<body bgcolor=#99D9EA oncontextmenu="return false;" onload="fix_position()">

<script>
/*
$( function() {
    $("#add_window").dialog();
});
*/


function edit(n){
	var tb_body = document.getElementById("table_body");
	var trTolpa = tb_body.getElementsByTagName('tr');
		for(var i=0;i < trTolpa.length;i++){
			trTolpa[i].style.backgroundColor = '#99D9EA';
		}

	var trList = document.getElementById(n);
	trList.style.backgroundColor = '#69C9E0';
	
	document.getElementById("trHead").style.backgroundColor = '#2CB1D3';
	document.getElementById('menu').style.display = 'none';
	document.getElementById('edit_window').style.display = 'none';
	document.getElementById('add_window').style.display = 'none';
}

function hide_menu(){
	document.getElementById('menu').style.display = 'none';
	//document.getElementById('edit_window').style.display = 'none';
	//document.getElementById('add_window').style.display = 'none';
}

function close_button(){
	//document.getElementById('menu').style.display = 'none';
	document.getElementById('edit_window').style.display = 'none';
	document.getElementById('add_window').style.display = 'none';
}

function hand_on(n){
	document.getElementById(n).style.cursor='hand';
}

function hand_off(n){
	document.getElementById(n).style.cursor='';
}

function right_click(n){
	var tb_body = document.getElementById("table_body");
	var trTolpa = table_body.getElementsByTagName('tr');
		for(var i=0;i < trTolpa.length;i++){
			trTolpa[i].style.backgroundColor = '#99D9EA';
		}
	var trList = document.getElementById(n);
	trList.style.backgroundColor = '#69C9E0';
	document.getElementById("trHead").style.backgroundColor = '#2CB1D3';

    var x = y = 0;
    var event = event || window.event;
    if (document.attachEvent != null) { 
        x = window.event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
        y = window.event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
    } else if (!document.attachEvent && document.addEventListener) { 
        x = event.clientX + window.scrollX;
        y = event.clientY + window.scrollY;
    }
	document.getElementById('menu').style.Top = y;
	document.getElementById('menu').style.Left = x;
	document.getElementById('menu').style.display = 'block';
	document.getElementById('edit_window').style.display = 'none';
	document.getElementById('add_window').style.display = 'none';
	
	document.getElementById('current_id').value = n;
	
	return false;
}

function show_add(){
	n = document.getElementById('current_id').value;

	$.post(
		"select_add_2.php",
		{
			id: n
		},
		function onAjaxSuccess(data){
			document.getElementById('add_window').innerHTML = data;
		},
		"text"
	);

	w = window.screen.width;
	n_w = (w - 800) / 2;

	document.getElementById('add_window').style.Top = 100;
	document.getElementById('add_window').style.Left = n_w;
	document.getElementById('add_window').style.display = 'block';
	document.getElementById('menu').style.display = 'none';
}

function show_edit(){
	n = document.getElementById('current_id').value;
	$.post(
		"select_update_2.php",
		{
			id: n
		},
		function onAjaxSuccess(data){
			document.getElementById('edit_window').innerHTML = data;
		},
		"text"
	);

	w = window.screen.width;
	n_w = (w - 800) / 2;

	document.getElementById('edit_window').style.Top = 100;
	document.getElementById('edit_window').style.Left = n_w;
	document.getElementById('edit_window').style.display = 'block';
	document.getElementById('menu').style.display = 'none';

}

function do_update(){
	if(confirm('Точно хотите отредактировать выделенную запись?')) {

	var id = document.getElementById('id_edit').value;
	var code = document.getElementById('code_edit').value;
	var okp = document.getElementById('okp_edit').value;
	var code_mtr = document.getElementById('code_mtr_edit').value;
	var link_mtr = document.getElementById('link_mtr_edit').value;
	var units_mtr = document.getElementById('units_mtr_edit').value;
	var units_normfact = document.getElementById('units_normfact_edit').value;
	var units_norm = document.getElementById('units_norm_edit').value;
	var norm_factor = document.getElementById('norm_factor_edit').value;
	var value_norm = document.getElementById('value_norm_edit').value;
	//var applier = document.getElementById('applier_edit').value;
	var applier = $("#applier_edit option:selected").text();
	var date_begin = document.getElementById('date_begin_edit').value;
	var date_end = document.getElementById('date_end_edit').value;
	var department = document.getElementById('department_edit').value;
	var code_mvz = document.getElementById('code_mvz_edit').value;
	var mvz = document.getElementById('mvz_edit').value;

	$.post(
		"update_2.php",
		{
			id: id, code: code, okp: okp, code_mtr: code_mtr, link_mtr: link_mtr, units_mtr: units_mtr, units_normfact: units_normfact, units_norm: units_norm, norm_factor: norm_factor, value_norm: value_norm, applier: applier, date_begin: date_begin, date_end: date_end, department: department, code_mvz: code_mvz, mvz: mvz
		},
		function onAjaxSuccess(data){
			alert(data);
			window.location.reload();
		},
		"text"
	);
	
	}
}

function do_insert(){
	if(confirm('Точно хотите добавить новую запись?')) {

	var id = document.getElementById('id_add').value;
	var code = document.getElementById('code_add').value;
	var okp = document.getElementById('okp_add').value;
	var code_mtr = document.getElementById('code_mtr_add').value;
	var link_mtr = document.getElementById('link_mtr_add').value;
	var units_mtr = document.getElementById('units_mtr_add').value;
	var units_normfact = document.getElementById('units_normfact_add').value;
	var units_norm = document.getElementById('units_norm_add').value;
	var norm_factor = document.getElementById('norm_factor_add').value;
	var value_norm = document.getElementById('value_norm_add').value;
	//var applier = document.getElementById('applier_add').value;
	var applier = $("#applier_add option:selected").text();
	var date_begin = document.getElementById('date_begin_add').value;
	var date_end = document.getElementById('date_end_add').value;
	var department = document.getElementById('department_add').value;
	var code_mvz = document.getElementById('code_mvz_add').value;
	var mvz = document.getElementById('mvz_add').value;

	$.post(
		"insert_2.php",
		{
			id: id, code: code, okp: okp, code_mtr: code_mtr, link_mtr: link_mtr, units_mtr: units_mtr, units_normfact: units_normfact, units_norm: units_norm, norm_factor: norm_factor, value_norm: value_norm, applier: applier, date_begin: date_begin, date_end: date_end, department: department, code_mvz: code_mvz, mvz: mvz
		},
		function onAjaxSuccess(data){
			alert(data);
			window.location.reload();
		},
		"text"
	);
	
	}
}

function show_delete(){
	if(confirm('Точно хотите удалить эту запись?')) {
		n = document.getElementById('current_id').value;
		$.post(
			"delete_2.php",
			{
				id: n
			},
			function onAjaxSuccess(data){
				alert(data);
				window.location.reload();
			},
			"text"
		);
	}
	hide_menu();
}

function change_depart(){
		var sel_depart = $("#sel_depart option:selected").text();

		$.post(
			"count_2.php",
			{
				sel_depart: sel_depart
			},
			function onAjaxSuccess(data){
				document.getElementById('div_body').innerHTML = data;
			},
			"html"
		);
	
}



</script>

<input type="hidden" name="current_id" value="">

<center>
<div class=div_main id=main_window>

<div class=div_head>
<table border=0 width=100%>
	<tr>
		<td align=left>
		<select onchange="change_depart();" id=sel_depart style="width: 990px;">
			<?
			print "<option>Все подразделения</option>";
			$link = mysql_connect("10.25.8.8", "admin", "conect");
			mysql_query("use aho");
			mysql_query("SET NAMES cp1251");
			$retval = mysql_query("SELECT * FROM aho_2_podr", $link);
				while($row = mysql_fetch_array($retval)) {
					$id_depart = $row[0];
					$depart = $row[1];
					print "<option value=$n_count>$depart</option>";
					}
			mysql_close($link);
			?>
		</select>
		</td>
		<td align=right>
			<!--- <input type='text' id='koef' size='10' value=0> --->
		</td>
	</tr>
</table>



<table border=1 width=100% style='table-layout:fixed;'>
<tr id=trHead bgColor=#2CB1D3>
	<td width=60px align=center>
		№
	</td>
	<td width=400px align=center>
		Связанный МТР
	</td>
	<td width=200px align=center>
		Объект применения
	</td>
	<td width=100px align=center>
		Норматив (месяц)
	</td>
	<td width=120px align=center>
		Итого (месяц)
	</td>
	<td width=100px align=center>
		Норматив (квартал)
	</td>
	<td width=120px align=center>
		Итого (квартал)
	</td>
	<td width=100px align=center>
		Норматив (год)
	</td>
	<td width=120px align=center>
		Итого (год)
	</td>
</tr>
</table>
</div>

<div class=div_body id=div_body onscroll=hide_menu();>
	<?
	
	print "<table border=1 width=100% id='table_body' style='table-layout:fixed;'>";
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES cp1251");
	$retval = mysql_query("SELECT * FROM `aho_2`", $link);
	while($row = mysql_fetch_array($retval)) {
		$id = $row[0];
		$code = $row[1];
		$okp = $row[2];
		$code_mtr = $row[3];
		$link_mtr = $row[4];
		$units_mtr = $row[5];
		$units_normfact = $row[6];
		$units_norm = $row[7];
		$norm_factor = $row[8];
		$value_norm = $row[9];
		$applier = $row[10];
		$date_begin = $row[11];
		$date_end = $row[12];
		$department = $row[13];
		$code_mvz = $row[14];
		$mvz = $row[15];
		
		$link2 = mysql_connect("10.25.8.8", "admin", "conect");
		mysql_query("use aho");
		mysql_query("SET NAMES cp1251");
		$retval2 = mysql_query("SELECT id FROM `aho_2_factor` where name_factor='$applier'", $link2);
		while($row2 = mysql_fetch_array($retval2)) {
			$n_factor = $row2[0];
		}
		mysql_close($link2);
		
		$all_count = 0;
		$link1 = mysql_connect("10.25.8.8", "admin", "conect");
		mysql_query("use aho");
		mysql_query("SET NAMES cp1251");
		$retval1 = mysql_query("SELECT val_norm FROM `aho_2_norm` where id_factor='$n_factor'", $link1);
		while($row1 = mysql_fetch_array($retval1)) {
			$all_count += $row1[0];
		}
		mysql_close($link1);
		
		$itog = $value_norm * $all_count;
		$itog_kvartal = $itog / 4;
		$value_norm_kvartal = $value_norm / 4;
		
		$itog_mes = $itog / 12;
		$value_norm_mes = $value_norm / 12;
		$itog_mes = round($itog_mes, 3);
		$value_norm_mes = round($value_norm_mes, 3);
		
		if($_SERVER['PHP_AUTH_USER']=="aho"){
			print "<tr id='$id' onclick=edit('$id'); onmouseover=hand_on('$id'); onmouseout=hand_off('$id'); oncontextmenu=right_click('$id');>";
		} else {
			print "<tr id='$id' onclick=edit('$id'); onmouseover=hand_on('$id'); onmouseout=hand_off('$id'); >";
		}
		
		print "<td width=60px>$id</td>";
		print "<td width=400px>$link_mtr</td>";
		print "<td width=200px>$applier</td>";
		
		print "<td  width=100px>$value_norm_mes</td>";
		print "<td  width=120px>$itog_mes $units_mtr</td>";
		
		print "<td  width=100px>$value_norm_kvartal</td>";
		print "<td  width=120px>$itog_kvartal $units_mtr</td>";
		print "<td  width=100px>$value_norm</td>";
		print "<td  width=120px>$itog $units_mtr</td>";
		print "</tr>";
	}
	mysql_close($link);
	print "</table>";
?>
</div>

</div>
<?
	print "<br><br><br><a href='index.php' title='' class='button green'>На главную</a>";
?>
</center>


<div class=div_menu id=menu>
<table width=100% border=1 bgcolor="#DDDDDD">
	<tr id=add onmouseover=hand_on('add'); onmouseout=hand_off('add'); onclick=show_add();>
		<td unselectable="on"><img src=Add.png width=30px align="top">&nbsp;&nbsp;Добавить</td>
	</tr>
	<tr id=edit onmouseover=hand_on('edit'); onmouseout=hand_off('edit'); onclick=show_edit();>
		<td unselectable="on"><img src=Edit.png width=30px align="top">&nbsp;&nbsp;Редактировать</td>
	</tr>
	<tr id=delete onmouseover=hand_on('delete'); onmouseout=hand_off('delete'); onclick=show_delete();>
		<td unselectable="on"><img src=Delete.png width=30px align="top">&nbsp;&nbsp;Удалить</td>
	</tr>
</table>
</div>

<div class=div_edit_window id=edit_window>
</div>

<div class=div_add_window id=add_window>
</div>

</body>
</html>