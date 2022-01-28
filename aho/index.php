<html>
<head>
<title>АХО</title>
	<link rel="stylesheet" href="jquery-ui.css">
	<script src="jquery-1.11.3.js"></script>
	<script src="jquery-ui.js"></script>
	<link rel="stylesheet" href="jquery-ui.theme.css">
</head>
<body bgcolor=#99D9EA oncontextmenu="return false;">

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

h1 {
	color: #000C9C;
	font: bold italic;
}

</style>
<table border=0 width=100%>
	<tr>
		<td align=center width=20%>
			<img src=uprav9.png width=7%><h1>ИС Эксперт АХО</h1>
		</td>
	</tr>
</table>
<table border=0 width=100% height=30%>
	<tr>
		<td align=center>
			<a href="test.php" title="" class="button green">Канцтовары</a>
		</td>
	</tr>
	<tr>
		<td align=center>
			<a href="test_2.php" title="" class="button green">Чистящие средства</a>
		</td>
	</tr>
	<tr>
<?
if($_SERVER['PHP_AUTH_USER']=="aho"){
	echo "<td align=center>";
	echo "<a href='test_3.php' title='' class='button green'>Настройки нормативов</a>";
	echo "</td>";
	
	echo "</tr><tr>";
	
	echo "<td align=center>";
	echo "<a href='test_4.php' title='' class='button green'>Отчёт по списанию</a>";
	echo "</td>";
}
?>
		
			
		
	</tr>
</table>
</body>
</html>