#!/usr/bin/perl -w

#use DBI;
use Text::ParseWords;
use User::pwent;

($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime();

#printf("Time Format - HH:MM:SS\n");
#printf("%02d:%02d:%02d", $hour, $min, $sec);

$hour = sprintf("%02d", $hour);
$min = sprintf("%02d", $min);
$sec = sprintf("%02d", $sec);
$mon++;
$year+=1900;

$uptime = "$mday-$mon-$year $hour:$min:$sec \n";
print "Last Update: $uptime";
open(SS, '>', "uptime.txt");
print SS $uptime;
close(SS);

#exit;

@uppg=(3,4,6,9);

for($j=0;$j<4;$j++){

print "---$uppg[$j]---\n";
$filename = "buffer_uppg$uppg[$j].txt";
print "---$filename---\n";
open(SS, '>', $filename);
print SS "";
close(SS);

open(FF,"/var/apache/cgi-bin/snmp_lvs/Ip_uppg$uppg[$j].txt");
while (<FF>) {
	chop;
	chop;
	if ($_ ne "") {
		$Address = $_;
		#print "$Address";


#$Address = "";
#$Address = "10.26.110.249";

open(CCC,"/usr/sfw/bin/./snmpwalk -v 2c -c public01 $Address 1.3.6.1.2.1.1.5 |");
$str=<CCC>;
if($str=~"") {
    chomp($str);
    $str=~m/STRING\: (.+)/;
    $name=$1;
    }
close(CCC);

if($name ne "") {

open(CCC,"/usr/sfw/bin/./snmpwalk -v 2c -c public01 $Address 1.3.6.1.2.1.1.6 |");
$str=<CCC>;
if($str=~"") {
    chomp($str);
    $str=~m/STRING\: (.+)/;
    $location=$1;
    }
close(CCC);

for($i=1;$i<=8;$i++) {
    open(CCC,"/usr/sfw/bin/./snmpwalk -v 2c -c public01 $Address 1.3.6.1.4.1.248.15.1.2.13.1.6.$i |");
    $str=<CCC>;
    if($str=~"") {
        chomp($str);
        $str=~m/INTEGER\: (.+)/;
        $PortConfig[$i]=$1;
        }
    close(CCC);
}

open(CCC,"/usr/sfw/bin/./snmpwalk -v 2c -c public01 $Address 1.3.6.1.2.1.4.20.1.3 |");
$str=<CCC>;
if($str=~"") {
    chomp($str);
    $str=~m/IpAddress\: (.+)/;
    $Netmask=$1;
    }
close(CCC);

open(CCC,"/usr/sfw/bin/./snmpwalk -v 2c -c public01 $Address 1.3.6.1.4.1.248.14.2.3.30.2 |");
$str=<CCC>;
if($str=~"") {
    chomp($str);
    $str=~m/IpAddress\: (.+)/;
    $IPNTP=$1;
    }
close(CCC);

open(CCC,"/usr/sfw/bin/./snmpwalk -v 2c -c public01 $Address 1.3.6.1.4.1.248.14.2.3.30.1 |");
$str=<CCC>;
if($str=~"") {
    chomp($str);
    $str=~m/INTEGER\: (.+)/;
    $NTP_e_d=$1;
    }
close(CCC);

for($i=0;$i<=2;$i++) {
    open(CCC,"/usr/sfw/bin/./snmpwalk -v 2c -c public01 $Address 1.3.6.1.4.1.248.14.2.13.4.1.3.$i |");
    $str=<CCC>;
    if($str=~"") {
        chomp($str);
        $str=~m/IpAddress\: (.+)/;
        $Trap[$i]=$1;
        }
    close(CCC);
}

for($i=0;$i<=2;$i++) {
    open(CCC,"/usr/sfw/bin/./snmpwalk -v 2c -c public01 $Address 1.3.6.1.4.1.248.14.2.13.4.1.4.$i |");
    $str=<CCC>;
    if($str=~"") {
        chomp($str);
        $str=~m/INTEGER\: (.+)/;
        $Trap_e_d[$i]=$1;
        }
    close(CCC);
}

open(CCC,"/usr/sfw/bin/./snmpwalk -v 2c -c public01 $Address 1.3.6.1.4.1.248.14.1.1.9.1.5 |");
$str=<CCC>;
if($str=~"") {
    chomp($str);
    $str=~m/STRING\: (.+)/;
    $version=$1;
    $version=~s/\"//g;
    @version=split(" ",$version);
    $version=$version[0]." ".$version[1];
    
    }
close(CCC);

for($i=1;$i<=8;$i++) {
    open(CCC,"/usr/sfw/bin/./snmpwalk -v 2c -c public01 $Address 1.3.6.1.2.1.2.2.1.7.$i |");
    $str=<CCC>;
    if($str=~"") {
        chomp($str);
        $str=~m/INTEGER\: (.+)/;
        $PortStatus[$i]=$1;
        }
    close(CCC);
}

open(SS, '>>', $filename);
print SS "$name;$location;$Address;$PortStatus[3];$PortStatus[4];$PortStatus[5];$PortStatus[6];$PortStatus[7];$PortStatus[8];$PortConfig[3];$PortConfig[4];$PortConfig[5];$PortConfig[6];$PortConfig[7];$PortConfig[8];$IPNTP;$NTP_e_d;$Trap[1];$Trap[2];$Trap[3];$Trap_e_d[1];$Trap_e_d[2];$Trap_e_d[3];$version\n";

close(SS);

print "$Address\n";


		}
	}
}
close(FF);
}







