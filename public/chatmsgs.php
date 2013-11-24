<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];

echo "$style"; 
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/in.css" rel="stylesheet" type="text/css">
</head>
<BODY bgcolor=#666666 text=black link=#33f333 vlink=#33f3f3 alink=#f3f3f3>
<?php

$p=chat;
$ctime = time();
$stat = mysql_fetch_array(mysql_query("select * from users where username='$username'"));
$config = mysql_fetch_array(mysql_query("select * from site_stats where id='1'"));
mysql_query("update users set lpv=$ctime where id=$stat[id]");
$ip = "$HTTP_SERVER_VARS[REMOTE_ADDR]";
mysql_query("update users set l_ip='$ip' where id=$stat[id]");
mysql_query("update users set page='chat' where id=$stat[id]");

if ($config[CS] == "0" || $config[CS] == "1" && $stat[userlevel] =="2"){


if ($action == chat) {
	if ($msg) {
		if ($stat[id] == '145' ) {
			$starter = "<font color=#FF00FF>$username</font>";
		} elseif ($stat[id] == '1' ) {
			//$starter = "<font color=#1A9122>$username</font>";
			$starter = "<font color=red>$username</font>";
		} elseif ($stat[id] == '2' ) {
			$starter = "<font color=red>$username</font>";
		} elseif ($stat[userlevel] == 1) {
			$starter = "<font color=#4d4dff>$username</font>";
		} elseif ($stat[userlevel] == 2) {
			$starter = "<font color=#ff700>$username</font>";
		} else {
			$starter = "$username";
		}


$msg = str_replace("'","&#39;",$msg);
$msg = str_replace("<","&#139;",$msg);
$msg = str_replace(">","&#155;",$msg);
$msg = str_replace("(C)","&#169;",$msg);
$msg = str_replace("(c)","&#169;",$msg);
$msg = str_replace("  "," &nbsp;",$msg);
$msg = str_replace("[move]", "<marquee>", $msg);
$msg = str_replace("[/move]", "</marquee>", $msg);
$msg = str_replace("[b]" , "<b>" , $msg);
$msg = str_replace("[u]" , "<u>" , $msg);
$msg = str_replace("[i]" , "<i>" , $msg);
$msg = str_replace("[s]" , "<s>" , $msg);
$msg = str_replace("[/b]" , "</b>" , $msg);
$msg = str_replace("[/u]" , "</u>" , $msg);
$msg = str_replace("[/i]" , "</i>" , $msg);
$msg = str_replace("[/s]" , "</s>" , $msg);
$msg = str_replace("[hl]" , "<font face=\"courier new\" color=darkblue style=\"background:white\">" , $msg);
$msg = str_replace("[/hl]" , "</font>" , $msg);
$msg = str_replace("[f" , "<font" , $msg);
$msg = str_replace("]" , ">" , $msg);
$msg = str_replace("size=" , "size is" , $msg);

//////////////////////////////smilies\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

$msg = str_replace(":sup:", "<img src=\"Smiles/thumbsup.gif\">", $msg);
$msg = str_replace(":D", "<img src=\"Smiles/v.happy.gif\">", $msg);
$msg = str_replace(":P", "<img src=\"Smiles/tongue.gif\">", $msg);
$msg = str_replace(":%", "<img src=\"Smiles/pukeface.gif\">", $msg);
$msg = str_replace(":!:", "<img src=\"Smiles/!.gif\">", $msg);
$msg = str_replace(":)", "<img src=\"Smiles/smile.gif\">", $msg);
$msg = str_replace(":(", "<img src=\"Smiles/sad.gif\">", $msg);
$msg = str_replace(":8", "<img src=\"Smiles/cool.gif\">", $msg);
$msg = str_replace(":chair:", "<img src=\"Smiles/chair.gif\">", $msg);
$msg = str_replace(":ha:", "<img src=\"Smiles/laugh.gif\">", $msg);
$msg = str_replace(":hm:", "<img src=\"Smiles/wacko.gif\">", $msg);
$msg = str_replace(";)", "<img src=\"Smiles/wink2.gif\">", $msg);
$msg = str_replace(":lmao:", "<img src=\"Smiles/lmao.gif\">", $msg);
$msg = str_replace(":|", "<img src=\"Smiles/roll.gif\">", $msg);
$msg = str_replace(":hang:", "<img src=\"Smiles/hang.gif\">", $msg);
$msg = str_replace(":tut:", "<img src=\"Smiles/naughty.gif\">", $msg);
$msg = str_replace(":beer:", "<img src=\"Smiles/burp.gif\">", $msg);
$msg = str_replace(":buck:", "<img src=\"Smiles/buckfush.gif\">", $msg);
$msg = str_replace(":dry:", "<img src=\"Smiles/dry.gif\">", $msg);
$msg = str_replace(":omg:", "<img src=\"Smiles/ohmy.gif\">", $msg);
$msg = str_replace(":oops:", "<img src=\"Smiles/oops.gif\">", $msg);
$msg = str_replace(":cheers:", "<img src=\"Smiles/cheers.gif\">", $msg);
$msg = str_replace(":blush:", "<img src=\"Smiles/blush.gif\">", $msg);
$msg = str_replace(":boxer:", "<img src=\"Smiles/box.gif\">", $msg);
$msg = str_replace(":coffee:", "<img src=\"Smiles/coffee.gif\">", $msg);
$msg = str_replace(":hug:", "<img src=\"Smiles/hug.gif\">", $msg);
$msg = str_replace(":ninja:", "<img src=\"Smiles/ninja.gif\">", $msg);
$msg = str_replace(":alcoholic:", "<img src=\"Smiles/alcoholic.gif\">", $msg);
$msg = str_replace(":bnna:", "<img src=\"Smiles/bnna.gif\">", $msg);
$msg = str_replace(":banned:", "<img src=\"Smiles/banned.gif\">", $msg);
$msg = str_replace(":bastard:", "i pee my pants :D", $msg);
$msg = str_replace(":beye:", "<img src=\"Smiles/beye.gif\">", $msg);
$msg = str_replace(":freinds:", "<img src=\"Smiles/freinds.gif\">", $msg);
$msg = str_replace(":fuk:", "<img src=\"Smiles/fuk.gif\">", $msg);
$msg = str_replace(":help:", "<img src=\"Smiles/help.gif\">", $msg);
$msg = str_replace(":huh:", "<img src=\"Smiles/huh.gif\">", $msg);
$msg = str_replace(":nono:", "<img src=\"Smiles/nono.gif\">", $msg);
$msg = str_replace(":spite:", "<img src=\"Smiles/spite.gif\">", $msg);
$msg = str_replace(":superman:", "<img src=\"Smiles/superman.gif\">", $msg);
$msg = str_replace(":taunt:", "<img src=\"Smiles/taunt.gif\">", $msg);
$msg = str_replace(":wacko:", "<img src=\"Smiles/wacko.gif\">", $msg);
$msg = str_replace(":yahoo:", "<img src=\"Smiles/yahoo.gif\">", $msg);

/////////Racist Block's////////////

$msg = str_replace("Black Basterd", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("black basterd", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("BLACK BASTERD", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("Black BASTERD", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("BLACK basterd", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("Black Cunt", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("BLACK CUNT", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("Black CUNT", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("BLACK Cunt", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("black cunt", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("Paki", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("Packi", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("PAKI", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("PaKi", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("paki", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("PaKi", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("pAkI", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("Nigger", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("nigger", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("NIGGER", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("NiGGer", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("Nigga", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("NiGGa", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("NIGGA", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("nigga", "<font color=darkred><b><a href=racist.php>Violation</a></b></font>", $msg);
$msg = str_replace("ceptic", "<font color=darkred>ceptic</font>", $msg);
$msg = str_replace("Ceptic", "<font color=darkred>ceptic</font>", $msg);
$msg = str_replace("Kieran", "<font color=darkred>Kieran</font>", $msg);
$msg = str_replace("kieran", "<font color=darkred>Kieran</font>", $msg);



////////////////////////////////////funny\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


if ($config[CS] == "0" || $stat[userlevel] == "2"){
$c = explode(" ",$msg);
if ($c[0] == "/shutup" && $stat[userlevel] == 2) {
mysql_query("update site_stats set CS='1' where id=1");
mysql_query("insert into chat (user,chat) values('<font color=red>SILENCE</font>','$stat[username] has turned silence mode ON.')");
}elseif ($c[0] == "/talk" && $stat[userlevel] == 2) {
mysql_query("update site_stats set CS='0' where id=1");
mysql_query("insert into chat (user,chat) values('<font color=red>SILENCE</font>','$stat[username] has turned silence mode OFF.')");
}elseif ($c[0] == "/me") {
$action = str_replace("$c[0]","",$msg);
$bang="1";
}elseif ($c[0] == "/reset" && $stat[userlevel] ==2) {
mysql_query("update site_stats set CS='0' where id=1");
mysql_query("TRUNCATE TABLE chat");
mysql_query("insert into chat (user,chat) values('<font color=red>RESET</font>','$stat[username] Reset the chat')");
}}




$timeh = strftime ("%H");
$timem = strftime ("%M");

if ($bang == "1"){
mysql_query("insert into chat (user,chat) values(' ','<font class=me><i>$stat[username] $action</i></font>')");
}else{

	
	mysql_query("insert into chat (user, chat, timeh, timem) values('$starter', '$msg </b> </u> </i> </s> </font> </a>', $timeh, $timem)");
	}
}
print"<META HTTP-EQUIV=Refresh CONTENT=\"0;url=chatmsgs.php\">";
exit;
}else{
print"<META HTTP-EQUIV=Refresh CONTENT=\"15;url=chatmsgs.php\">";
}
}

$csel = mysql_query("select * from chat order by id desc limit 15");

while ($chat = mysql_fetch_array($csel)) {
if($chat[user]<>''){
	print "<i>$chat[timeh]:$chat[timem]</i> <b>$chat[user]</b>: $chat[chat]<br>";
}else{
	print " $chat[chat]<br>";
}
}

$psel = mysql_query("select * from users where page='chat'");
$ctime = time();

while ($pl = mysql_fetch_array($psel)) {
	$span = ($ctime - $pl[lpv]);
		if ($span <= 180) {
		if ($pl[id] == '145' ) {
			$on = "$on [<font color=#FF00FF>$pl[tag]$pl[username]($pl[id])</font>] ";
		} elseif($pl[id] == '1') {
			$on = "$on [<font color=red>!$pl[tag]$pl[username]($pl[id])</font>] ";
 				//$on = "$on [<font color=1A9122>!$pl[tag]$pl[username]($pl[id])</font>] ";
		} elseif($pl[id] == '2') {
			$on = "$on [<font color=red>!$pl[tag]$pl[username]($pl[id])</font>] ";
		} elseif($pl[userlevel] == 2) {
			$on = "$on [<font color=ff700>!$pl[tag]$pl[username]($pl[id])</font>] ";
		} elseif ($pl[userlevel] == 1) {
			$on = "$on [<font color=4d4dff>$pl[tag]$pl[username]($pl[id])</font>] ";
		} else {
			$on = "$on [$pl[tag]$pl[username]($pl[id])] ";
		}	
	}
}
print "<center><br><br>$on";



?>
</html>