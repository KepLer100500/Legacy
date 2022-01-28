<html>
<head>
<title>�������</title>
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
	case "1_1": $(obj).html('<div align=right><img src="close.png" alt="�������"></div>��������, ������������ ��� ������ �����������<br>����� ��������� � ����������, ���������� �������������,<br>����������� ������, � ��� ����� ����������� ����������'); break;
	case "1_2": $(obj).html('<div align=right><img src="close.png" alt="�������"></div>��������� ����������� ���, ���������� ���������������� ����������<br>� ���������� ���������� �������������, � � ��� ���������� �<br>�����������, �������� ����������� ��� �����������,<br>� ����� ���������� �������� ����� ������������ �������������'); break;
	case "1_3": $(obj).html('<div align=right><img src="close.png" alt="�������"></div>��������� ����������� ���, ���������� ���������������� ����������<br>� ���������� ���������� ������������� � ����� �������<br>����������� �������� ������������ �������������.<br>������������ ����� ���������� ������������� ������������<br>� ������������ � �������������� ������������, ��������������� ��������'); break;
	case "1_4": $(obj).html('<div align=right><img src="close.png" alt="�������"></div>������������ ��� ������������ ��������������� ������<br>����� ������������� ������������ ��������� ��� ���������������,<br>�� ������������ � ������ ����������'); break;
	case "1_5": $(obj).html('<div align=right><img src="close.png" alt="�������"></div>���������� ����������-�������������� ��������,<br>������������ ������������ ������������<br>� ���������� ������������� ��������� ������-���� �����,<br>����������� ������ � �������� � ������������� �����������'); break;
	case "1_6": $(obj).html('<div align=right><img src="close.png" alt="�������"></div>��������, ������������ ������� �������� �� ������� ���������� �����<br>� ������������ �����������. �������������� ������������<br>��� ����������� �������� ���������� � �������, ����� ���������,<br>������������ �� ��������, ������� ��������������� ����������'); break;
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
			<font face=times size=6 color=#1C5DA2 style="font-style:italic;">�������������� ������� ����������<br>��������������-���������������� ������������</font>
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
					<li><a href="#main">�������</a></li>
					<li><a href="#AHO">���</a></li>
					<li><a href="#OTIZ">�����</a></li>
					<li><a href="#OK">��</a></li>
				</ul>
				<div id="main">
					<font face=times size=5 color=#1C5DA2>
						<br><br>������ �������������� ������ ������ � ����� ����������������� ����������������� ����������� ���������� � ��� ��� �������� ������ ���������� � ������ ���������� ���������� �� ����������������� ����������� ���������� � ��� ��������, ��������� �������� ���������� ����������, ���������� ���������� ����������� �������������� ���������� � ����������������.
						<br>������ �������� ������� ��������������-���������������� ������������, ������������ � �������������� ������������ ���.
						<br><br>��� ������������� ������� ����������� �������� ��������� ���������� �������� "����������� ������ ������� � ������ ������� �������� ��������������" <img src=R.png><br><br><b>��� ������ ������ �������� ������������ ��� ���������.</b><br>
						<br><br><a href='temp0_1.doc'><img src='word.png'> ���������� �� ���</a>
						<br><br><a href='temp0_2.doc'><img src='word.png'> ����������</a>
					</font>
				</div>
				<div id="AHO">
					<font face=times size=5 color=#1C5DA2 style='font-style:italic;'>
						<br><br><a href='temp1_1.dotx'><img src='template1.png'> ������ (��������� �����������)</a> <img src='Info.png' onclick=show_div("1_1")><div id=my_div1_1 onclick=hide_div("1_1") class=my_div></div>
						<br><br><a href='temp1_2.dotx'><img src='template1.png'> ������ ���</a> <img src='Info.png' onclick=show_div("1_2")><div id=my_div1_2 onclick=hide_div("1_2") class=my_div></div>
						<br><br><a href='temp1_3.dotx'><img src='template1.png'> ������������</a> <img src='Info.png' onclick=show_div("1_3")><div id=my_div1_3 onclick=hide_div("1_3") class=my_div></div>
						<br><br><a href='temp1_4.dotx'><img src='template1.png'> ��������� �������</a> <img src='Info.png' onclick=show_div("1_4")><div id=my_div1_4 onclick=hide_div("1_4") class=my_div></div>
						<br><br><a href='temp1_5.dotx'><img src='template1.png'> ��������� ������� (�� ���)</a> <img src='Info.png' onclick=show_div("1_5")><div id=my_div1_5 onclick=hide_div("1_5") class=my_div></div>
						<br><br><a href='temp1_6.dotx'><img src='template1.png'> ��������������</a> <img src='Info.png' onclick=show_div("1_6")><div id=my_div1_6 onclick=hide_div("1_6") class=my_div></div>
					</font>
				</div>
				<div id="OTIZ">
					<font face=times size=5 color=#1C5DA2 style='font-style:italic;'>
						<br><br><a href='temp2_1.dotx'><img src='template1.png'> ���� ������</a>
						<br><br><a href='temp2_2.dotx'><img src='template1.png'> ������� ���������� ����������� ������������</a>
					</font>
				</div>
				<div id="OK">
					<font face=times size=5 color=#1C5DA2 style='font-style:italic;'>
						<br><br><a href='temp3_1.dotx'><img src='template1.png'> ������������ � ������ � ��������� �������</a>
						<br><br><a href='temp3_2.dotx'><img src='template1.png'> ������������ � � �������������� �����-�������</a>
					</font>
				</div>
			</div>

		</td>
	</tr>
		
</table>
</body>
</html>