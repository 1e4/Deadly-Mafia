<?php

session_start();

$ip = $_SESSION['ip'];
$username = $_SESSION['username'];

$ipcheck = $_SERVER['REMOTE_ADDR'];
?>
<html>
<body bgcolor="#000000" text="#ffffff" link="#ffffff" vlink="#ffffff" alink="#ffffff">
<?php
if($ip !== $ipcheck)
{
session_unset();
session_destroy();
die("Please Login here: <a href=\"index.php\">Login</a>");
}

include("dbconnect.php");
$admin_check = "SELECT modlvl FROM users WHERE username = '$username'";
$admin_result = mysql_query($admin_check);
$admin_final = mysql_result($admin_result, 0);

$reply=$_GET[reply];
$delt=$_GET[delt];
$delr=$_GET[delr];
$topic=$_GET[topic];
$tpage=$_GET[tpage];
$rep=$_POST[rep];

if(!$view&&!$topic&&!$action&&!$delt&&!$delr&&!$delt1&&!$delr1&&!$reply){
$nwst = mysql_fetch_array(mysql_query("select * from topics order by id asc limit 1"));
$topic=$nwst[id];
}

if ($delt){

if ($admin_final > 0) {
mysql_fetch_array(mysql_query("delete from topics where id=$delt"));
mysql_fetch_array(mysql_query("delete from replies where topic_id=$delt"));
print "Topic Deleted.";
exit;
} else {
print "You have no power to delete stuff";
}
}
if ($delr){
if ($admin_final > 0) {
mysql_fetch_array(mysql_query("delete from replies where id=$delr"));
print "Reply Deleted.";

exit;
} else {
print "You have no power to delete stuff";
}
}

if ($topic) {

	$topicinfo = mysql_fetch_array(mysql_query("select * from topics where id=$topic"));
	if (empty ($topicinfo[id])) {
		print "No such topic. $topic";
		
		exit;
	}

if (!$tpage1 || $tpage1<1){
$tpage1=0;
}

$tshow=15;
$tpage2=$tpage1+$tshow;

$tpage3=($tpage2+$tshow);
$tpage0=($tpage1-$tshow);
print"<center><a href=forum_r.php?topic=$topicinfo[id]&tpage1=$tpage0>(prev page)</a> $tpage1 to $tpage2 <a href=forum_r.php?topic=$topicinfo[id]&tpage1=$tpage2>(next page)</a></center><br> ";
print"
<table bgcolor=#222222 width=100% border=1 bordercolor=#555555>
  <tr>
    <th scope=col>Made by $topicinfo[username] On $topicinfo[datetime]";
if ($admin_final>0) {
    print"<a href=forum_r.php?delt=$topic><font color=red>x</font></a>";
}
print"
    </th>
  </tr>
  <tr>
    <td>$topicinfo[topictext]</td>
  </tr>
</table>";


	$rsel = mysql_query("select * from replies where topic_id=$topicinfo[id] order by id desc limit $tpage1 , $tshow");
	while ($reply = mysql_fetch_array($rsel)) {
		print"
<br>
<table bgcolor=#222222 width=100% border=1 bordercolor=#555555>
  <tr>
    <td bordercolor=#555555 bgcolor=#222222>Written by $reply[starter] @ $date $time";
if ($admin_final > 0) {
    print"<a href=forum_r.php?delr=$reply[id]><font color=red>x</font></a>";
}
print"
     </td>
  </tr>
  <tr>
    <td>$reply[body]</td>
  </tr>
</table>";
	}
print"
<p>&nbsp;</p>
<hr>
<form name=form1 method=post action=forum_r.php?reply=$topicinfo[id]>
    <td bordercolor=#555555 bgcolor=#222222>
    Written by $reply[starter] @ $topicinfo[datetime]
    <tr>
      <td bordercolor=#FFFFFF bgcolor=#999999>Add reply: <br></td>
    </tr>
    <tr>
      <td><textarea name=rep cols=65 rows=10></textarea></td>
    </tr>
	<tr>
      <td><input name=nah type=submit value=Post reply!>
      <input type=reset name=Reset value=Clear text!></td>
    </tr>
  </table>
</form>
<p>&nbsp;
</p>
</body>
</html>";
}
if ($reply) {
print"$reply! | $rep";
$exists = mysql_num_rows(mysql_query("select * from topics where id=$reply"));
	if ($exists <= 0) {
		print "No such topic.";

		exit;
	}
	if (empty ($rep)) {
		print "You must fill out all fields.";

		exit;
	}

$rep = str_replace("'","&#39;",$rep);
$rep = str_replace("
","<br>",$rep);
$rep = str_replace("  "," &nbsp;",$rep);

//$rep = addslashes($rep);
$rep = str_replace("[back]" , "<img border=0 src=img/back.gif>" , $rep);
$rep = str_replace("[bigsmile]" , "<img border=0 src=img/bigsmile.gif>" , $rep);
$rep = str_replace("[cry]" , "<img border=0 src=img/cry.gif>" , $rep);
$rep = str_replace("[forward]" , "<img border=0 src=img/forward.gif>" , $rep);
$rep = str_replace("[frown]" , "<img border=0 src=img/frown.gif>" , $rep);
$rep = str_replace("[frustrated]" , "<img border=0 src=img/frustrated.gif>" , $rep);
$rep = str_replace("[mad]" , "<img border=0 src=img/mad.gif>" , $rep);
$rep = str_replace("[pause]" , "<img border=0 src=img/pause.gif>" , $rep);
$rep = str_replace("[play]" , "<img border=0 src=img/play.gif>" , $rep);
$rep = str_replace("[smile]" , "<img border=0 src=img/smile.gif>" , $rep);
$rep = str_replace("[stop]" , "<img border=0 src=img/stop.gif>" , $rep);
$rep = str_replace("[suprised]" , "<img border=0 src=img/suprised.gif>" , $rep);
$rep = str_replace("[tongue]" , "<img border=0 src=img/tongue.gif>" , $rep);
$rep = str_replace("[b]" , "<b>" , $rep);
$rep = str_replace("[u]" , "<u>" , $rep);
$rep = str_replace("[i]" , "<i>" , $rep);
$rep = str_replace("[s]" , "<s>" , $rep);
$rep = str_replace("[/b]" , "</b>" , $rep);
$rep = str_replace("[/u]" , "</u>" , $rep);
$rep = str_replace("[/i]" , "</i>" , $rep);
$rep = str_replace("[/s]" , "</s>" , $rep);
$rep = str_replace("[hl]" , "<font face=\"courier new\" color=darkblue style=\"background:white\">" , $rep);
$rep = str_replace("[/hl]" , "</font>" , $rep);
$date = gmdate('Y-m-d h:i:s');
mysql_query("insert into replies (id, starter, body, topic_id, datetime) values('','$username', '$rep', '$reply', '$date')") or die("<br>Could not add reply.");
$lpctime = time();
mysql_query("update topics set lastreply=$lpctime where id=$reply");
print "<meta http-equiv='refresh' content='0; url=forum_r.php?topic=$reply'>";
}

?>
