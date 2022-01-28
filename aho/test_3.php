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
		border: 0px solid black;
	}
	
	</style>
</head>
<body bgcolor=#99D9EA oncontextmenu="return false;" onload="fix_position()">
<script>
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

</script>

<input type="hidden" name="current_id" value="">

<center><br><br>

<div class=div_main id=div_main>
<table border=1 width=100%>
	<tr>
		<td align=left colspan=2>
		<select onchange="change_depart();" id=sel_depart style="width: 400px;">
			<?
			print "<option value=0>Выберите подразделение</option>";
			$link = mysql_connect("10.25.8.8", "admin", "conect");
			mysql_query("use aho");
			mysql_query("SET NAMES cp1251");
			$retval = mysql_query("SELECT * FROM aho_2_podr", $link);
				while($row = mysql_fetch_array($retval)) {
					$id_depart = $row[0];
					$depart = $row[1];
					print "<option value=1>$depart</option>";
					}
			mysql_close($link);
			?>
		</select>
		</td>
	</tr>
</table>

<?

echo "<div class=div_body id=div_body>";
	echo "<table border=1 width=100%>";
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES cp1251");
	$retval = mysql_query("SELECT * FROM `aho_2_factor`", $link);
	while($row = mysql_fetch_array($retval)) {
		$id_factor = $row[0];
		$name_factor = $row[1]; 
		echo "<tr><td>$name_factor</td><td><input type='text' size='30' value=''>&nbsp;&nbsp;&nbsp;<img src=Delete.png width=20px onclick=\"del_factor('$id_factor')\" style='cursor:hand'></td></tr>";
	}
	mysql_close($link);
	echo "</table>";
echo "</div>";


?>
</div>
<br>
Добавить фактор <input type='text' size='30' id='new_fact' value=''>&nbsp;&nbsp;&nbsp;<img src=Add.png width=20px onclick="new_factor()" style="cursor:'hand'">


<br><br><br>
<a href='#' title='' class='button' onclick="upd_factor()">Обновить все факторы</a>


<br><br><br><a href='index.php' title='' class='button'>На главную</a>
</body>
</html>