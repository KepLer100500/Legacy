<html>
<head>
<title>Шаблоны</title>
	<link rel="stylesheet" href="jquery-ui.css">
	<script src="jquery-1.11.3.js"></script>
	<script src="jquery-ui.js"></script>
	<link rel="stylesheet" href="jquery-ui.theme.css">
</head>
<body>

<style>
	.my_div {
		display: none;
		width: 900px;
		height: 100px;
		background: white;
		border: 1px solid black;
		padding:5px; 
		margin:5px;
	}
</style>

<script>

$(function() {
	$("#tabs").tabs();
});

function show_div(doc) {
obj = "#my_div" + doc;
switch (doc) { 
	case "1_1": $(obj).html('<div align=right><img src="close.png" alt="Закрыть"></div>Документ, используемый для обмена информацией<br>между Обществом и системными, сторонними организациями,<br>физическими лицами, в том числе зарубежными адресатами'); break;
	case "1_2": $(obj).html('<div align=right><img src="close.png" alt="Закрыть"></div>Локальный нормативный акт, являющийся распорядительным документом<br>и издаваемый единолично руководителем, а в его отсутствие –<br>сотрудником, временно исполняющим его обязанности,<br>в целях разрешения основных задач деятельности подразделения'); break;
	case "1_3": $(obj).html('<div align=right><img src="close.png" alt="Закрыть"></div>Локальный нормативный акт, являющийся распорядительным документом<br>и издаваемый единолично руководителем в целях решения<br>оперативных вопросов деятельности подразделения.<br>Распоряжения могут издаваться заместителями руководителя<br>в соответствии с распределением обязанностей, устанавливаемым приказом'); break;
	case "1_4": $(obj).html('<div align=right><img src="close.png" alt="Закрыть"></div>Используются для оперативного информационного обмена<br>между заместителями генерального директора или подразделениями,<br>не находящимися в прямом подчинении'); break;
	case "1_5": $(obj).html('<div align=right><img src="close.png" alt="Закрыть"></div>Внутренний оперативно-информационный документ,<br>адресованный вышестоящему руководителю<br>и содержащий обстоятельное изложение какого-либо факта,<br>результатов работы с выводами и предложениями составителя'); break;
	case "1_6": $(obj).html('<div align=right><img src="close.png" alt="Закрыть"></div>Документ, передаваемый речевым способом по каналам телефонной связи<br>и записываемый получателем. Телефонограммы используются<br>для оперативной передачи информации в случаях, когда сообщения,<br>передаваемые по телефону, требуют документального оформления'); break;
}
	
	
	$(obj).show("drop", 1000);
}

function hide_div(doc) {
	obj = "#my_div" + doc;
	$(obj).hide("drop", {direction:"left"}, "slow");
}


</script>


<table border=0 width=100%>
	<tr>
		<td align=left width=20%>
			<img src="logo1.png">
		</td>
		<td align=center width=60%>
			<font face=times size=6 color=#1C5DA2 style="font-style:italic;">Информационная система оформления<br>организационно-распорядительной документации</font>
		</td>
		<td align=right width=20%>
			<img src="logo2.png">
		</td>
	</tr>
	<tr>
		<td colspan=3>
			<hr color=#1C5DA2 size=3>
		</td>
	</tr>
		<tr>
		<td colspan=3>
			<div id="tabs">
				<ul>
					<li><a href="#main">Главная</a></li>
					<li><a href="#AHO">АХО</a></li>
					<li><a href="#OTIZ">ООТиЗ</a></li>
					<li><a href="#OK">ОК</a></li>
				</ul>
				<div id="main">
					<font face=times size=5 color=#1C5DA2>
						<br><br>Данный информационный ресурс создан в целях совершенствования документационного обеспечения управления в ГПУ ООО «Газпром добыча Астрахань» с учетом требований Инструкции по документационному обеспечению управления в ПАО «Газпром», повышения качества подготовки документов, расширения применения современных информационных технологий в делопроизводстве.
						<br>Ресурс содержит шаблоны организационно-распорядительной документации, используемой в управленческой деятельности ГПУ.
						<br><br>Для использования полного функционала шаблонов программы необходимо включить "Отображение знаков абзацев и других скрытых символов форматирования" <img src=R.png><br><br><b>Для начала работы выберите интересующую Вас категорию.</b><br>
						<br><br><a href='temp0_1.doc'><img src='word.png'> Инструкция по ДОУ</a>
						<br><br><a href='temp0_2.doc'><img src='word.png'> Приложения</a>
					</font>
				</div>
				<div id="AHO">
					<font face=times size=5 color=#1C5DA2 style='font-style:italic;'>
						<br><br><a href='temp1_1.dotx'><img src='template1.png'> Письмо (сторонние организации)</a> <img src='Info.png' onclick=show_div("1_1")><div id=my_div1_1 onclick=hide_div("1_1") class=my_div></div>
						<br><br><a href='temp1_2.dotx'><img src='template1.png'> Приказ ГПУ</a> <img src='Info.png' onclick=show_div("1_2")><div id=my_div1_2 onclick=hide_div("1_2") class=my_div></div>
						<br><br><a href='temp1_3.dotx'><img src='template1.png'> Распоряжение</a> <img src='Info.png' onclick=show_div("1_3")><div id=my_div1_3 onclick=hide_div("1_3") class=my_div></div>
						<br><br><a href='temp1_4.dotx'><img src='template1.png'> Служебная записка</a> <img src='Info.png' onclick=show_div("1_4")><div id=my_div1_4 onclick=hide_div("1_4") class=my_div></div>
						<br><br><a href='temp1_5.dotx'><img src='template1.png'> Докладная записка (по ГПУ)</a> <img src='Info.png' onclick=show_div("1_5")><div id=my_div1_5 onclick=hide_div("1_5") class=my_div></div>
						<br><br><a href='temp1_6.dotx'><img src='template1.png'> Телефонограмма</a> <img src='Info.png' onclick=show_div("1_6")><div id=my_div1_6 onclick=hide_div("1_6") class=my_div></div>
					</font>
				</div>
				<div id="OTIZ">
					<font face=times size=5 color=#1C5DA2 style='font-style:italic;'>
						<br><br><a href='temp2_1.dotx'><img src='template1.png'> План работы</a>
						<br><br><a href='temp2_2.dotx'><img src='template1.png'> Справка выполнения показателей премирования</a>
					</font>
				</div>
				<div id="OK">
					<font face=times size=5 color=#1C5DA2 style='font-style:italic;'>
						<br><br><a href='temp3_1.dotx'><img src='template1.png'> Командировка – Приказ и служебное задание</a>
						<br><br><a href='temp3_2.dotx'><img src='template1.png'> Командировка – О предоставлении счета-фактуры</a>
					</font>
				</div>
			</div>

		</td>
	</tr>
		
</table>
</body>
</html>