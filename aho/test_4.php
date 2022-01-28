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
		width: 500px;
		height: 100px;
		background: #99D9EA;
		border: 1px solid black;
	}
	
	.div_body {
		background: #99D9EA;
		border: 1px solid black;
		overflow-y:scroll;
		height:600px;
		
	}
	
	</style>
</head>
<body bgcolor=#99D9EA oncontextmenu="return false;" onload="fix_position()">
<script>
/*
function change_depart(){
	$("#sel_depart option[value='0']").remove();
	var sel_depart = $("#sel_depart option:selected").text();

	$.post(
		"count_3.php",
		{
			sel_depart: sel_depart
		},
		function onAjaxSuccess(data){
			document.getElementById('div_body').innerHTML = data;
		},
		"html"
	);
}	

function new_factor(){
	if(confirm('Точно хотите добавить новый фактор?')) {
	var new_f = new_fact.value;
	$.post(
		"insert_3.php",
		{
			new_f: new_f
		},
		function onAjaxSuccess(data){
			alert(data);
			window.location.reload();
		},
		"html"
	);
	}
}

function del_factor(id_factor){
	if(confirm('Точно хотите удалить выбранный фактор?')) {
	$.post(
		"delete_3.php",
		{
			id_factor: id_factor
		},
		function onAjaxSuccess(data){
			alert(data);
			window.location.reload();
		},
		"html"
	);
	}
}

function upd_factor(){
if($("#sel_depart option:selected").text()!="Выберите подразделение"){
	if(confirm('Точно хотите обновить все факторы?')) {
		var dep = $("#sel_depart option:selected").text();
		var str = "";
		$("input[id*='fuck']").each(function(i,elem) {
			str+=$(elem).attr('id')+"="+$(elem).val()+"|";
			//alert($(elem).val());
		});

			$.post(
				"update_3.php",
				{
					str: str, dep: dep
				},
				function onAjaxSuccess(data){
					alert(data);
					window.location.reload();
				},
				"html"
			);
		}
} else {
	alert("Выберите подразделение!");
}
}	
*/
function create_otchet(){
var str = "";
	$("input:checkbox:checked").each(function(i,elem) {
		$("#xxx_" + $(elem).val()).val();
		str+=$(elem).val() + "=" + $("#xxx_" + $(elem).val()).val() + "|";

	});
	
//alert(str);

	$("#my_form").html("<form action='otchet.php' method='post' id='GoFolder' target=_blank><input type='hidden' name='str' value='" + str + "'></form>");
	$("#GoFolder").submit();

}

</script>

<input type="hidden" name="current_id" value="">
<div id=my_form></div>
<center><br><br>

<?
echo "<div class=div_body id=div_body>";
	echo "<table border=1 width=100% style='table-layout:fixed;'>";
	echo "<tr style='background: #2CB1D3;'>";
		echo "<td width=10px>#</td>";
		echo "<td width=300px>Наименование МТР</td>";
		echo "<td width=50px>Ед. изм.</td>";
		echo "<td width=50px>Ид. номер МТР</td>";
		echo "<td width=50px>Норматив исользования МТР</td>";
		echo "<td width=200px>Нормообразующий фактор</td>";
		//echo "<td>Нормативное количество МТР на год</td>";
		//echo "<td>Нормативное количество МТР на месяц</td>";
	echo "</tr>";
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES cp1251");
	//$retval = mysql_query("SELECT * FROM `aho`", $link);
	$retval = mysql_query("SELECT * FROM `aho_report`", $link);
	while($row = mysql_fetch_array($retval)) {
		//$name = $row[4];
		//$units_mtr = $row[5];
		//$id = $row[0];
		//$value_norm = $row[9];
		//$norm_factor = $row[8];
		$name = $row[0];
		$units_mtr = $row[1];
		$id = $row[2];
		$value_norm = $row[3];
		$norm_factor = $row[4];
			$xxx = 0;
		$mtr_za_god = $norm_factor * $xxx;
		$mtr_za_mesyc = mtr_za_god / 12;
		
		echo "<tr>";
		echo "<td><input type='checkbox' id='$id' value='$id'></td>";
		echo "<td>$name</td>";
		echo "<td>$units_mtr</td>";
		echo "<td>$id</td>";
		echo "<td>$value_norm</td>";
		echo "<td>$norm_factor ( <input type='text' size='1' id='xxx_$id' value='$xxx'> )</td>";
		//echo "<td>$mtr_za_god</td>";
		//echo "<td>$mtr_za_mesyc</td>";
		echo "</tr>";
		
	}
	mysql_close($link);
	echo "</table>";
echo "</div>";


?>


<br><br><br>
<a href='#' title='' class='button' onclick="create_otchet()">Составить отчёт</a>


<br><br><br><a href='index.php' title='' class='button'>На главную</a>
</body>
</html>