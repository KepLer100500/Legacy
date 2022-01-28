#!/usr/bin/perl -w

use DBI;
use User::pwent;
use Text::ParseWords;
use Time::Local;
use IO::Socket;
use Mail::Sendmail;
use Time::localtime;
use Date::Calc qw(Delta_DHMS);

use Net::SMTP;
use MIME::Base64;        #для кодирования авторизационных параметров, темы и тела письма
use Text::Iconv;         #для перекодирования текста
use Encode qw(encode decode is_utf8);

use Mail::Sender;

&InitDB;
&new_site;

######################################################################################

sub InitDB {
	$dbh=DBI->connect("DBI:mysql:profcom:10.25.8.8:3306","admin","conect",{RaiseError => 1}) or die "connecting: $DBI::errstr\n";
}

sub new_site {

$id_i=0;
	$sth2=$dbh->prepare ("select id from profcom order by id");
	$sth2->execute;	
	while ($ref1=$sth2->fetchrow_hashref()) {
		$Id_b=$ref1->{'id'};
		$id_old[$id_i] = $Id_b;
		$id_i++;
	}	
	
	$for_id = $id_old[$id_i-1];
	$for_id = 2000;
$break = 0;
$message="";
for ($id=$for_id;$break < 250;$id++) {
	$in_base=$dbh->do("select id from profcom where id='$id'");
	if($in_base == 0){
	
	$link = "http://aus017/AskMe/Search/ReplyAcquired?QuestionNumber=$id";
	$query="/usr/local/bin/wget -p --http-user='ASTRAKHAN-DB\\repin' --http-password='qwe-678' --save-cookies cookies.txt --output-document=1.htm --output-file=log.txt $link";
	$hlp=system("$query");
	$hlp=open(FF,"1.htm");
	
	if(<FF>=~m/\<\!DOCTYPE html\>/) {
	$break = 0;
	foreach (1..2) {
		while (not(<FF>=~m/col\-md\-11/)) {
		}
	}
	$str=<FF>;
	$user = $str;
	$user =~m/\[(.+)\],/;
	$user =  $1;
	print "$user\n";
	
	$str =~m/категория \[(.+)\]/;
	$category = $1;
	print "$category\n";
	
	$str =~m/\<h4\>(.+)\, пользователь/;
	$q_time = $1;
	print "$q_time\n";

	$question = "";
	while (not(<FF>=~m/col\-md\-11 col\-md\-offset\-1/)) {
	}
	$str=<FF>;
	$fl=1;
	if ($str=~m|\<\/p\>|) {
		$question=~s/\<\/p\>//;
		$question=~s/\<p\>//;
		$question .= $str;
	} else {

	while ($fl) {
		$question .= $str;
		$str=<FF>;
		if ($str=~m/p\>/) {
			$fl=0;
		}
	}
	$question .= $str;
	$question=~s/\<\/p\>//;
	$question=~s/\<p\>//;
	}
	$question=~s/\<\/p\>//;
	$question=~s/\<p\>//;
	print "$question\n";
	
	
	while (not(<FF>=~m/col\-md\-11/)) {
	}
	$str=<FF>;
	$str =~m/\<h4\>(.+)\, ответ эксперта/;
	$a_time = $1;
	print "$a_time\n";
	
	$str =~m/\[(.+)\]/;
	$expert =  $1;
	print "$expert\n";	

	$answer = "";
	while (not(<FF>=~m/col\-md\-11 col\-md\-offset\-1/)) {
	}
	$str=<FF>;
	$fl=1;
	if ($str=~m|\<\/p\>|) {
		$answer=~s/\<\/p\>//;
		$answer=~s/\<p\>//;
		$answer .= $str;
	} else {

	while ($fl) {
		$answer .= $str;
		$str=<FF>;
		if ($str=~m/p\>/) {
			$fl=0;
		}
	}
	$answer .= $str;
	$answer=~s/\<\/p\>//;
	$answer=~s/\<p\>//;
	}
	$answer=~s/\<\/p\>//;
	$answer=~s/\<p\>//;
	print "$answer\n";
	
	$answer=~s/\x0A\x0D/<br>/g;
	$answer=~s/\x0D\x0A/<br>/g;
	$answer=~s/\x0A/<br>/g;
	$answer=~s/\x0D/<br>/g;
	$answer=~s|\<br\/\>|<br>|g;
	$answer=~s/\<br\>\<br\>/<br>/g;
	$answer=~s/\<br\>\<br\>/<br>/g;
	$answer=~s/        //g;

	$question=~s/\x0A\x0D/<br>/g;
	$question=~s/\x0D\x0A/<br>/g;
	$question=~s/\x0A/<br>/g;
	$question=~s/\x0D/<br>/g;
	$question=~s|\<br\/\>|<br>|g;
	$question=~s/\<br\>\<br\>/<br>/g;
	$question=~s/\<br\>\<br\>/<br>/g;
	$question=~s/        //g;	
	
	$dbh->do("set names utf8");
	$dbh->do("insert into profcom (id_old,id,question,answer,question_date,answer_date,name_exp,name_cat,name_user) values ('0','$id','$question','$answer','$q_time','$a_time','$expert','$category','$user')");
	
	$green_key_col = @green_key = ("промыс", "Промыс");
	for($k=0;$k<$green_key_col;$k++) {
		$answer=~s/$green_key[$k]/\<font style\=\'background\: \#00BF18\;\'>$green_key[$k]\<\/font\>/g;
		$question=~s/$green_key[$k]/\<font style\=\'background\: \#00BF18\;\'>$green_key[$k]\<\/font\>/g;
	}
	
	$message = $message."<font color='#6a00ec' size='4'><a href=$link>Вопрос №$id</a> был задан пользователем \"$user\" $q_time из категории \"$category\":</font><br>$question<br>--------------------------------------------------------------------------------------------------------------<br><br><font color='#009f9f' size='4'>Ответ был получен $a_time. Ответил $expert:</font><br>$answer<br>===============================================================<br><br>";
	} else {
		print "Bad Page! №$break\n";
		$break++;
	}
	
	} else {
		print "In base! id $id $\n";
	}

}


$new_message = "";
$key_col = @key_words = ("ГПУ","УПТР","УППГ","ГКП","газоконденсатопровод","ГЖС","скважин","домик","промыс","ЦНИПР","ЦУОП","газожидкост","Екотов");
$key = 0;

@all_pages = ("dfdf5c6a-7513-4bec-b668-d56af530b42d","955ca63b-3d62-44f9-896a-e2dcbfcb51a2","52b7e710-d1d1-4faf-b999-2822867bf3e6","af7d62d9-e9c9-41b1-99dd-44e57e654ac1","b188b90c-7c04-4e07-86ea-738527ee68aa","8ce080f9-58ce-4e0c-834e-1888c3e0c8e7");


$error=0;
for($ppp=0;$ppp<6;$ppp++){
for($page=1;$page<=2;$page++){
$link = "http://aus017/AskMe/Question/Show/$all_pages[$ppp]?num=$page";
$query="/usr/local/bin/wget -p --http-user='ASTRAKHAN-DB\\repin' --http-password='qwe-678' --save-cookies cookies.txt --output-document=1.htm --output-file=log.txt $link";
$hlp=system("$query");
$hlp=open(FF,"1.htm");
	
while (not(<FF>=~m/a href/)) {
}

foreach (1..5) {
	while (not(<FF>=~m/a href/)) {
	}
	$str=<FF>;
	$str =~m/Обращение # (.+)/;
	$new_number =  $1;
	print "$new_number\n";
	
	while (not(<FF>=~m/\<\/a\>/)) {
	}
	$str=<FF>;
	$str =~m/\<em\>(.+)\<\/em\>/;
	$new_user =  $1;
	print "$new_user\n";
	
	while (not(<FF>=~m/col\-md\-2/)) {
	}
	$str=<FF>;
	$str =~m/\<\/span\> (.+)/;
	$new_time =  $1;
	print "$new_time\n";	
	
	while (not(<FF>=~m/col\-md\-2/)) {
	}
	$str=<FF>;
	$str =~m/\<\/span\> (.+)/;
	$yes_no =  $1;
	print "$yes_no\n";	
	
	$new_question = "";
	while (not(<FF>=~m/col\-md\-12/)) {
	}
	$str=<FF>;
	$fl=1;
	if ($str=~m|\<\/p\>|) {
		$new_question .= $str;
	} else {

	while ($fl) {
		$new_question .= $str;
		$str=<FF>;
		if ($str=~m/p\>/) {
			$fl=0;
		}
	}
	$new_question .= $str;
	}
	$new_question=~s/\<\/p\>//;
	$new_question=~s/\<p\>//;
	$new_question=~s/                        //;
	$new_question=~s/                    //;
	$new_question=~s/\r\n//;
	#print "$new_question\n";
	
	$key=0;
	for($k=0;$k<$key_col;$k++) {
		if($new_question=~m/$key_words[$k]/) {
			$key=1;
			$new_question=~s/$key_words[$k]/\<font color\=red\>$key_words[$k]\<\/font\>/;
		}
	}
	
	if($yes_no=~m/ответ не предоставлен/) {
		print "$new_number\n";
		print "$new_user\n";
		print "$new_time\n";
		print "$yes_no\n";
		print "$new_question\n";
		
		$col = 0;
		$sth = $dbh->prepare("select * from profcom_new_message where id = '$new_number'");
		$sth->execute;
		while ($ref=$sth->fetchrow_hashref()) {
				$count=$ref->{'id'};
				$col++;
			}
		
		if($col eq 0) {
			$dbh->do("set names utf8");
			$dbh->do("insert into profcom_new_message (id_old,id,name_user,question_date,question) values ('0','$new_number','$new_user','$new_time','$new_question')");
			if($key == 1) {
				$new_message = $new_message."<font color='#6a00ec' size='4' style='background: #FF6F72;'>Вопрос №$new_number был задан пользователем \"$new_user\" $new_time:</font><br>$new_question<br><br>===============================================================<br><br>";
				$key=0;
			} else {
				$new_message = $new_message."<font color='#6a00ec' size='4'>Вопрос №$new_number был задан пользователем \"$new_user\" $new_time:</font><br>$new_question<br><br>===============================================================<br><br>";
			}			
		}
	$key=0;

	} else {
		if(not($yes_no=~m/ответ предоставлен/)) {
			$error++;
		}
	}
}
}
}

if($error > 0) {
	for($p=0;$p<20;$p++){
		print "error!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
	}

}

	my $message_fin = "";
	$sth=$dbh->prepare ("select * from profcom_personal");
	$sth->execute;	
	while ($ref=$sth->fetchrow_hashref()) {
		$name=$ref->{'name'};
		$e_mail=$ref->{'mail'};
	$message_logo = "<font color='#3f48cc' size='5'><i>Здравствуйте, $name.</i></font> <br>";
	$flag_ok = 0;
	
	if($new_message ne "") {
		$message_fin = $message_fin."<br><font color='#3f48cc' size='5'><i>$message_logo Новые обращения, поступившие в обработку:</i></font><br><br><br>".$new_message;
		$flag_ok = 1;
	}	
	
	if($message ne "") {
		if($flag_ok == 1) {
			$message_fin = $message_fin."<font color='#3f48cc' size='5'><i>Изменения в портале предложений и обращений работников Общества:</i></font><br><br>".$message;
		} else {
			$message_fin = $message_logo."<font color='#3f48cc' size='5'><i>Изменения в портале предложений и обращений работников Общества:</i></font><br><br>".$message;
		}
		$flag_ok = 2;
	}
		
	if($flag_ok != 0) {
		
		my $sender = new Mail::Sender {from => 'repin@astrakhan-dobycha.gazprom.ru', smtp => 'aus101'};
		
		my $result = $sender->MailMsg({
			from => 'repin@astrakhan-dobycha.gazprom.ru',
			skip_bad_recipients => '1',
			auth=>'LOGIN',
			authid=>'repin@astrakhan-dobycha.gazprom.ru',
			authpwd=>'qwe-678',
			ctype => 'text/html; charset=utf-8',  
			to => $e_mail,
			subject => 'Портал предложений и обращений работников Общества',
			msg => $message_fin});
		if ( $result ) {
			print "Goood!"; 
		} else {
			print "Bad!";
			print $sender->{'error_msg'}
		}
	
	}
	
	
	
	$message_fin = "";
			
	
	}
	
}

