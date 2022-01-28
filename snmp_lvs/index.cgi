#!/usr/bin/perl -w

#use DBI;
use Text::ParseWords;
use User::pwent;

print "Content-type:text/html\n\n";

print <<EOF;
<script>

function edit(n){
	var trTolpa = document.getElementsByTagName('tr');
		for(var i=0;i < trTolpa.length;i++){
			trTolpa[i].style.backgroundColor = 'White';
		}

	var trList = document.getElementById(n);
	trList.style.backgroundColor = '#D2D2FF';
	
	document.getElementById("head_table1").style.backgroundColor = '#B7B7FF';
	document.getElementById("head_table2").style.backgroundColor = '#B7B7FF';
}

function hand_on(n){
	document.getElementById(n).style.cursor='hand';
}

function hand_off(n){
	document.getElementById(n).style.cursor='';
}

function visible_name(){
var main_table = document.getElementById("main_table");
	if(!document.getElementById("c_name_1").checked) {
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[0].style.display='none';
			}
			document.getElementById("head_1_0").style.display='none';
			document.getElementById("head_1_1").style.display='none';
	} else {
		
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[0].style.display='';
			}
			document.getElementById("head_1_0").style.display='';
			document.getElementById("head_1_1").style.display='';
	}
}

function visible_location(){
var main_table = document.getElementById("main_table");
	if(!document.getElementById("c_name_2").checked) {
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[1].style.display='none';
			}
			document.getElementById("head_2_0").style.display='none';
			document.getElementById("head_2_1").style.display='none';
	} else {
		
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[1].style.display='';
			}
			document.getElementById("head_2_0").style.display='';
			document.getElementById("head_2_1").style.display='';
	}
}

function visible_ip(){
var main_table = document.getElementById("main_table");
	if(!document.getElementById("c_name_3").checked) {
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[2].style.display='none';
			}
			document.getElementById("head_3_0").style.display='none';
			document.getElementById("head_3_1").style.display='none';
	} else {
		
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[2].style.display='';
			}
			document.getElementById("head_3_0").style.display='';
			document.getElementById("head_3_1").style.display='';
	}
}

function visible_port_state(){
var main_table = document.getElementById("main_table");
	if(!document.getElementById("c_name_4").checked) {
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[3].style.display='none';
				tdList[4].style.display='none';
				tdList[5].style.display='none';
				tdList[6].style.display='none';
				tdList[7].style.display='none';
				tdList[8].style.display='none';
			}
			document.getElementById("head_4_0").style.display='none';
			
			document.getElementById("head_3").style.display='none';
			document.getElementById("head_4").style.display='none';
			document.getElementById("head_5").style.display='none';
			document.getElementById("head_6").style.display='none';
			document.getElementById("head_7").style.display='none';
			document.getElementById("head_8").style.display='none';
	} else {
		
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[3].style.display='';
				tdList[4].style.display='';
				tdList[5].style.display='';
				tdList[6].style.display='';
				tdList[7].style.display='';
				tdList[8].style.display='';
			}
			document.getElementById("head_4_0").style.display='';
			
			document.getElementById("head_3").style.display='';
			document.getElementById("head_4").style.display='';
			document.getElementById("head_5").style.display='';
			document.getElementById("head_6").style.display='';
			document.getElementById("head_7").style.display='';
			document.getElementById("head_8").style.display='';
	}
}

function visible_port_config(){
var main_table = document.getElementById("main_table");
	if(!document.getElementById("c_name_5").checked) {
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[9].style.display='none';
				tdList[10].style.display='none';
				tdList[11].style.display='none';
				tdList[12].style.display='none';
				tdList[13].style.display='none';
				tdList[14].style.display='none';
			}
			document.getElementById("head_5_0").style.display='none';
			
			document.getElementById("head_12").style.display='none';
			document.getElementById("head_13").style.display='none';
			document.getElementById("head_14").style.display='none';
			document.getElementById("head_15").style.display='none';
			document.getElementById("head_16").style.display='none';
			document.getElementById("head_17").style.display='none';
	} else {
		
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[9].style.display='';
				tdList[10].style.display='';
				tdList[11].style.display='';
				tdList[12].style.display='';
				tdList[13].style.display='';
				tdList[14].style.display='';
			}
			document.getElementById("head_5_0").style.display='';
			
			document.getElementById("head_12").style.display='';
			document.getElementById("head_13").style.display='';
			document.getElementById("head_14").style.display='';
			document.getElementById("head_15").style.display='';
			document.getElementById("head_16").style.display='';
			document.getElementById("head_17").style.display='';
	}
}

function visible_ntp(){
var main_table = document.getElementById("main_table");
	if(!document.getElementById("c_name_6").checked) {
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[15].style.display='none';
				tdList[16].style.display='none';
			}
			document.getElementById("head_6_0").style.display='none';
			
			document.getElementById("head_18").style.display='none';
			document.getElementById("head_19").style.display='none';
	} else {
		
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[15].style.display='';
				tdList[16].style.display='';

			}
			document.getElementById("head_6_0").style.display='';
			
			document.getElementById("head_18").style.display='';
			document.getElementById("head_19").style.display='';

	}
}

function visible_trap_address(){
var main_table = document.getElementById("main_table");
	if(!document.getElementById("c_name_7").checked) {
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[17].style.display='none';
				tdList[18].style.display='none';
				tdList[19].style.display='none';
			}
			document.getElementById("head_7_0").style.display='none';
			
			document.getElementById("head_20").style.display='none';
			document.getElementById("head_21").style.display='none';
			document.getElementById("head_22").style.display='none';
	} else {
		
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[17].style.display='';
				tdList[18].style.display='';
				tdList[19].style.display='';

			}
			document.getElementById("head_7_0").style.display='';
			
			document.getElementById("head_20").style.display='';
			document.getElementById("head_21").style.display='';
			document.getElementById("head_22").style.display='';

	}
}

function visible_trap_enable(){
var main_table = document.getElementById("main_table");
	if(!document.getElementById("c_name_8").checked) {
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[20].style.display='none';
				tdList[21].style.display='none';
				tdList[22].style.display='none';
			}
			document.getElementById("head_8_0").style.display='none';
			
			document.getElementById("head_23").style.display='none';
			document.getElementById("head_24").style.display='none';
			document.getElementById("head_25").style.display='none';
	} else {
		
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[20].style.display='';
				tdList[21].style.display='';
				tdList[22].style.display='';

			}
			document.getElementById("head_8_0").style.display='';
			
			document.getElementById("head_23").style.display='';
			document.getElementById("head_24").style.display='';
			document.getElementById("head_25").style.display='';

	}
}

function visible_version(){
var main_table = document.getElementById("main_table");
	if(!document.getElementById("c_name_9").checked) {
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[23].style.display='none';
			}
			document.getElementById("head_9_0").style.display='none';
			document.getElementById("head_9_1").style.display='none';
	} else {
		
		var trList = main_table.getElementsByTagName('tr');
			for(var i=2;i < trList.length;i++){
				var tdList = trList[i].getElementsByTagName('td');
				tdList[23].style.display='';
			}
			document.getElementById("head_9_0").style.display='';
			document.getElementById("head_9_1").style.display='';
	}
}

</script>



<table border=1 width=10% align=center bordercolor="#B7B7FF">
<tr>
	<td align=center>UPPG</td>
	<td>Location</td>
	<td>Name</td>
	<td align=center>IP</td>
	<td>Port&nbsp;State</td>
	<td>Port&nbsp;Configuration</td>
	<td>NTP</td>
	<td>TRAP&nbsp;Address</td>
	<td>TRAP&nbsp;on/off</td>
	<td>Version</td>
	
</tr>

<tr>
	<td align=center>
		<select id=uppg_sel name=uppg_sel onchange=select_uppg()>
			<option>ALL</option>
			<option disabled>UPPG 1</option>
			<option disabled>UPPG 2</option>
			<option>UPPG 3</option>
			<option>UPPG 4</option>
			<option>UPPG 6</option>
			<option>UPPG 9</option>
		</select>
	<input type='hidden' id='test' name='test' value='ALL'>
	</td>
	<td align=center><input type="checkbox" id="c_name_1" onclick="visible_name()" checked></td>
	<td align=center><input type="checkbox" id="c_name_2" onclick="visible_location()" checked></td>
	<td align=center><input type="checkbox" id="c_name_3" onclick="visible_ip()" checked></td>
	<td align=center><input type="checkbox" id="c_name_4" onclick="visible_port_state()" checked></td>
	<td align=center><input type="checkbox" id="c_name_5" onclick="visible_port_config()" checked></td>
	<td align=center><input type="checkbox" id="c_name_6" onclick="visible_ntp()" checked></td>

	<td align=center><input type="checkbox" id="c_name_7" onclick="visible_trap_address()" checked></td>
	<td align=center><input type="checkbox" id="c_name_8" onclick="visible_trap_enable()" checked></td>
	<td align=center><input type="checkbox" id="c_name_9" onclick="visible_version()" checked></td>
</tr>

</table>
EOF
print "<br>";
open(DD,"/var/apache/cgi-bin/snmp_lvs/uptime.txt");
while (<DD>) {
	chop;
	chop;
	if ($_ ne "") {
		$line = $_;
		print "<center>Last Update is: $line</center>";
	}
}
close(DD);

print "<br>";
print "<table border=1 width=100% align=center bordercolor=#B7B7FF id=main_table>";

print "<tr id=head_table1 style='background:#B7B7FF;'>";
print "<td align=center id=head_1_0>Location</td>";
print "<td align=center id=head_2_0>Name</td>";
print "<td align=center id=head_3_0>IP</td>";
print "<td align=center colspan=6 id=head_4_0>Port State</td>";
print "<td align=center colspan=6 id=head_5_0>Port Configuration</td>";
print "<td align=center colspan=2 id=head_6_0>NTP</td>";
print "<td align=center colspan=3 id=head_7_0>TRAP Address</td>";
print "<td align=center colspan=3 id=head_8_0>TRAP on/off</td>";
print "<td align=center id=head_9_0>Version</td>";
print "</tr>";

print "<tr id=head_table2 style='background:#B7B7FF;'>";
print "<td align=center id=head_1_1>&nbsp;</td>";
print "<td align=center id=head_2_1>&nbsp;</td>";
print "<td align=center id=head_3_1>&nbsp;</td>";
print "<td align=center id=head_3>3</td>";
print "<td align=center id=head_4>4</td>";
print "<td align=center id=head_5>5</td>";
print "<td align=center id=head_6>6</td>";
print "<td align=center id=head_7>7</td>";
print "<td align=center id=head_8>8</td>";
print "<td align=center id=head_12>3</td>";
print "<td align=center id=head_13>4</td>";
print "<td align=center id=head_14>5</td>";
print "<td align=center id=head_15>6</td>";
print "<td align=center id=head_16>7</td>";
print "<td align=center id=head_17>8</td>";
print "<td align=center id=head_18>IP</td>";
print "<td align=center id=head_19>on/off</td>";
print "<td align=center id=head_20>1</td>";
print "<td align=center id=head_21>2</td>";
print "<td align=center id=head_22>3</td>";
print "<td align=center id=head_23>1</td>";
print "<td align=center id=head_24>2</td>";
print "<td align=center id=head_25>3</td>";
print "<td align=center id=head_9_1>&nbsp;</td>";
print "</tr>";



@uppg = (3,4,6,9);
$id = 0;
@select_uppg = (0,0,0,0);

for($j=0;$j<4;$j++){

open(FF,"/var/apache/cgi-bin/snmp_lvs/buffer_uppg$uppg[$j].txt");
while (<FF>) {
	chop;
	chop;
	if ($_ ne "") {
		$line = $_;
		$id++;
		@tolpa = split(";",$line);
		$name = $tolpa[0];
		$location = $tolpa[1];
		$ip = $tolpa[2];
		$port_stat_3 = $tolpa[3];
		$port_stat_4 = $tolpa[4];
		$port_stat_5 = $tolpa[5];
		$port_stat_6 = $tolpa[6];
		$port_stat_7 = $tolpa[7];
		$port_stat_8 = $tolpa[8];
		$port_cfg_3 = $tolpa[9];
		$port_cfg_4 = $tolpa[10];
		$port_cfg_5 = $tolpa[11];
		$port_cfg_6 = $tolpa[12];
		$port_cfg_7 = $tolpa[13];
		$port_cfg_8 = $tolpa[14];
		$ntp_ip = $tolpa[15];
		$ntp_e_d = $tolpa[16];
		$trap_addr_1 = $tolpa[17];
		$trap_addr_2 = $tolpa[18];
		$trap_addr_3 = $tolpa[19];
		$trap_e_d_1 = $tolpa[20];
		$trap_e_d_2 = $tolpa[21];
		$trap_e_d_3 = $tolpa[22];
		$version = $tolpa[23];

print "<tr id=$id onclick=edit($id); onmouseover=hand_on($id); onmouseout=hand_off($id);>";
			print "<td align=center>$location</td>";
			print "<td align=center>$name</td>";
			print "<td align=center bgcolor='#D2D2FF' ondblclick=window.open(\"http://$ip\")>$ip</td>";

			if($port_stat_3 =~m/1/){
				print "<td align=center><img src=/snmp_lvs_images/up.png></td>";
			} else {
				print "<td align=center><img src=/snmp_lvs_images/down.png></td>";
			}
			if($port_stat_4=~m/1/){
				print "<td align=center><img src=/snmp_lvs_images/up.png></td>";
			} else {
				print "<td align=center><img src=/snmp_lvs_images/down.png></td>";
			}
			if($port_stat_5=~m/1/){
				print "<td align=center><img src=/snmp_lvs_images/up.png></td>";
			} else {
				print "<td align=center><img src=/snmp_lvs_images/down.png></td>";
			}
			if($port_stat_6=~m/1/){
				print "<td align=center><img src=/snmp_lvs_images/up.png></td>";
			} else {
				print "<td align=center><img src=/snmp_lvs_images/down.png></td>";
			}
			if($port_stat_7=~m/1/){
				print "<td align=center><img src=/snmp_lvs_images/up.png></td>";
			} else {
				print "<td align=center><img src=/snmp_lvs_images/down.png></td>";
			}
			if($port_stat_8=~m/1/){
				print "<td align=center><img src=/snmp_lvs_images/up.png></td>";
			} else {
				print "<td align=center><img src=/snmp_lvs_images/down.png></td>";
			}


			if($port_cfg_3==1){
				print "<td align=center><img src=/snmp_lvs_images/on.png></td>";
				} else {
					print "<td align=center><img src=/snmp_lvs_images/off.png></td>";
				}
			if($port_cfg_4==1){
				print "<td align=center><img src=/snmp_lvs_images/on.png></td>";
				} else {
					print "<td align=center><img src=/snmp_lvs_images/off.png></td>";
				}
			if($port_cfg_5==1){
				print "<td align=center><img src=/snmp_lvs_images/on.png></td>";
				} else {
					print "<td align=center><img src=/snmp_lvs_images/off.png></td>";
				}
			if($port_cfg_6==1){
				print "<td align=center><img src=/snmp_lvs_images/on.png></td>";
				} else {
					print "<td align=center><img src=/snmp_lvs_images/off.png></td>";
				}
			if($port_cfg_7==1){
				print "<td align=center><img src=/snmp_lvs_images/on.png></td>";
				} else {
					print "<td align=center><img src=/snmp_lvs_images/off.png></td>";
				}
			if($port_cfg_8==1){
				print "<td align=center><img src=/snmp_lvs_images/on.png></td>";
				} else {
					print "<td align=center><img src=/snmp_lvs_images/off.png></td>";
				}

			print "<td align=center>$ntp_ip</td>";
			
			if($ntp_e_d==1){
				print "<td align=center><img src=/snmp_lvs_images/enable.png></td>";
				} else {
					print "<td align=center><img src=/snmp_lvs_images/disable.png></td>";
				}
			
			print "<td align=center>$trap_addr_1 &nbsp;</td>";
			print "<td align=center>$trap_addr_2 &nbsp;</td>";
			print "<td align=center>$trap_addr_3 &nbsp;</td>";
			
			if($trap_e_d_1==1){
				print "<td align=center><img src=/snmp_lvs_images/enable.png></td>";
				} else {
					print "<td align=center><img src=/snmp_lvs_images/disable.png></td>";
				}
			if($trap_e_d_2==1){
				print "<td align=center><img src=/snmp_lvs_images/enable.png></td>";
				} else {
					print "<td align=center><img src=/snmp_lvs_images/disable.png></td>";
				}
			if($trap_e_d_3==1){
				print "<td align=center><img src=/snmp_lvs_images/enable.png></td>";
				} else {
					print "<td align=center><img src=/snmp_lvs_images/disable.png></td>";
				}

			print "<td align=center>$version</td>";
			
		print "</tr>";
		
	}
}

@select_uppg[$j] = $id;
close(FF);
}
print "</table>";	

$select_uppg[0]+=2;
$select_uppg[1]+=2;
$select_uppg[2]+=2;
$select_uppg[3]+=2;


#print "-$select_uppg[0]-$select_uppg[1]-$select_uppg[2]-$select_uppg[3]-<br>";

print <<EOF;

<script>

function select_uppg(){
	var uppg_index = document.getElementById('uppg_sel').options[document.getElementById('uppg_sel').selectedIndex].text;
		
	var main_table = document.getElementById("main_table");
	var trList = main_table.getElementsByTagName('tr');
	
	for(var i=2;i<trList.length;i++){
		trList[i].style.display='none';
	}
	
	if(uppg_index == "UPPG 3"){
		for(var j=2;j<$select_uppg[0];j++){
			trList[j].style.display='';
		}
	}

	if(uppg_index == "UPPG 4"){
		for(j=$select_uppg[0];j<$select_uppg[1];j++){
			trList[j].style.display='';
		}
	}

	if(uppg_index == "UPPG 6"){
		for(j=$select_uppg[1];j<$select_uppg[2];j++){
			trList[j].style.display='';
		}
	}
	
	if(uppg_index == "UPPG 9"){
		for(j=$select_uppg[2];j<$select_uppg[3];j++){
			trList[j].style.display='';
		}
	}
	
	if(uppg_index == "ALL"){
		for(var j=0;j<trList.length;j++){
			trList[j].style.display='';
		}
	}

}


</script>
EOF







