<?
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');
//require_once 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
?>

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
	echo "<table border=1 width=100%>";
	echo "<tr style='background: #2CB1D3;'>";
		echo "<td>#</td>";
		echo "<td>Наименование МТР</td>";
		echo "<td>Ед. изм.</td>";
		echo "<td>Ид. номер МТР</td>";
		echo "<td>Норматив исользования МТР</td>";
		echo "<td>Нормообразующий фактор</td>";
	echo "</tr>";
echo "</table>";	

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
//$objReader->setReadFilter( new MyReadFilter() );
$objPHPExcel = $objReader->load("template.xlsx");

/*	
$objPHPExcel = PHPExcel_IOFactory::load("template.xlsx");
    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
    {
        //Имя таблицы
        $Title              = $worksheet->getTitle();
        //Последняя используемая строка
        $lastRow         = $worksheet->getHighestRow();
        //Последний используемый столбец
        $lastColumn      = $worksheet->getHighestColumn();
        //Последний используемый индекс столбца
        $lastColumnIndex = PHPExcel_Cell::columnIndexFromString($lastColumn);
        echo $Title.'<table border="1" cellspacing="0"><tr>';
        for ($row = 1; $row <= $lastRow; ++$row)
        {
            echo '<tr>';
            for ($col = 0; $col < $lastColumnIndex; ++ $col) 
            {
                $val = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                echo '<td>'.$val.'&nbsp;</td>';
            };
            echo '</tr>';
        };
        echo '</table>';
    };	
*/
	
echo "</div>";


?>


<br><br><br>
<a href='#' title='' class='button' onclick="create_otchet()">Составить отчёт</a>


<br><br><br><a href='index.php' title='' class='button'>На главную</a>
</body>
</html>