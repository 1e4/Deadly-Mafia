<?
session_start();
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
include "includes/db_connect.php";

?>

 <?
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;
$forumm=$fetch->forumm;
if ($fetch->fban == "1"){
	
	echo "<h1><font color='white'>Your Banned From The Forum</h1>
<br>
<h3>You Could Be Banned For:
<br>
- Spaming<br>- Making Stupid Topics 

";
	die();
}

$forum=$_GET['forum'];

if ($forum == "Crew" && $fetch->crew != "0"){
$crew="1";

}
$owner=mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss='$username' OR underboss='$username'"));




$forum_look=$_GET['forum_look'];
echo "";





$forum_count = 30;

function index_navigation($index, $count, $num) {
$forum = $_GET['forum'];
	if ($index != 0) {
		print "<a href=\"left.php?forum=".$forum."&forum_look=" . ($index - $count) . "\">Previous</a> ";
	}
	if ($num == $count) {
		print " <a href=\"left.php?forum=".$forum."&forum_look=" . ($index + $count) . "\">Next</a>";
	}


}
if (! isset($forum_look) ) {
				$forum_look = 0;
			}
?>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg" link="#FFFFFF">


<table border="1" cellspacing="0" cellpadding="2" class=thinline width="100%" bordercolor=black>
  <tr><td background="includes/grad.jpg" colspan="2">
	<a href="topic.php?forum=<? echo "$forum"; ?>" <center ?>" <center ?>" <center ?><center>New Topic
    </center></a></td></tr>
	<?
if ($crew == "1"){
$query="SELECT * FROM `topics` WHERE `forum`='$forum' AND crew='$fetch->crew' ORDER BY `lastreply` DESC LIMIT $forum_look, $forum_count";
}else{
$query="SELECT * FROM `topics` WHERE `forum`='$forum' ORDER BY `lastreply` DESC LIMIT $forum_look, $forum_count";
}


$query=mysql_query("$query");
$num=mysql_num_rows($query);
$col="0";
while($fo=mysql_fetch_object($query)){
if ($col=="0"){ $td="#444444"; $col="1"; }else{ $td="#444444"; $col="0"; }

$hehe=mysql_num_rows(mysql_query("SELECT * FROM replys WHERE idto='$fo->id'"));






if ($fetch->userlevel >= 1 || $fetch->forumm >= 1 || strtolower($by) == strtolower($username) || $crew == "1" && $owner != "00"){
echo "<tr bgcolor=$td><td width='92%'>"; if ($fo->sticky == "1" ){ echo"<font color='black'><b><font color='red'><h5>Sticky:<font color='black'>"; } 
if ($fo->sticky == "1" ) {
echo "<a href='right.php?viewtopic=$fo->id&forum=$forum' target='frameright'><b>$fo->title</b></a>  </td><td>"; }
elseif ($fo->sticky == "1" && $fo->locked == "1") {
echo "<a href='right.php?viewtopic=$fo->id&forum=$forum' target='frameright'><b>$fo->title</b></a><font color=blue>(locked)</font></td><td>"; }
elseif ($fo->sticky == "0" ) {
echo "<a href='right.php?viewtopic=$fo->id&forum=$forum' target='frameright'>$fo->title</a>  </td><td>"; }
if ($fo->locked == "1" ) {
echo "<a title='Unlock'  href='left.php?unlock=$fo->id&forum=$forum'><font color=blue>[UL]</font></a>"; } elseif($fo->locked == "0" ) {
echo "<a title='Lock' href='left.php?lock=$fo->id&forum=$forum'><font color=blue>[L]</font></a>"; }
if ($fo->sticky == "1" ) {
echo "</td><td><a title='Unsticky'  href='left.php?unstick=$fo->id&forum=$forum'><font color=green>[US]</font></a>"; }
elseif ($fo->sticky == "0") {
echo "</td><td><a title='Sticky'  href='left.php?stick=$fo->id&forum=$forum'><font color=green>[S]</font></a>"; }
echo "</td><td><a title='Delete' href='left.php?clean=$fo->id&forum=$forum'><font color=red>[D]</font></a></td>";
}else{
echo "<tr  bgcolor=$td><td width='92%'>"; if ($fo->sticky == "1" ){ echo"<font color=red><b>Sticky: "; } 
if ($fo->sticky == "1" ){ 
echo "<a href='right.php?viewtopic=$fo->id&forum=$forum' target='frameright'><b>$fo->title</b></a></td>"; }
elseif ($fo->sticky == "0" ){ 
echo "<a href='right.php?viewtopic=$fo->id&forum=$forum' target='frameright'>$fo->title</a></td>"; }
}




}

if($_GET[lock]) {
$lock = $_GET[lock];
if($fetch->userlevel == "0") { die('You cannot lock this topic'); }
$locked =mysql_num_rows(mysql_query("SELECT * FROM topics WHERE username='$username' AND id='$lock'"));




$check1=mysql_query("SELECT * FROM topics WHERE id='$lock'");
$chech=mysql_fetch_object($check1);




if($userlevel > 0 || $userlevel > 2 || $forumm > 1 || $lock != "0" ){
if ($forum == "Crew" && $crew == "1"){
mysql_query("UPDATE topics SET locked='1' WHERE id='$lock' AND crew = '$fetch->crew' ");

}else{
mysql_query("UPDATE topics SET locked='1' WHERE id='$lock'");
}


echo "This topic is now Locked!";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=left.php?forum=$forum'>";
}
}
if($_GET[unlock]) {
$lock = $_GET[unlock];
if($fetch->userlevel == "0") { die('You cannot unlock this topic'); }
$locked =mysql_num_rows(mysql_query("SELECT * FROM topics WHERE username='$username' AND id='$lock'"));

$check1=mysql_query("SELECT * FROM topics WHERE id='$lock'");
$chech=mysql_fetch_object($check1);


if($userlevel > 0 || $userlevel > 2 || $forumm > 1 || $lock != "" ){
if ($forum == "Crew" && $crew == "1"){
mysql_query("UPDATE topics SET locked='0' WHERE id='$lock' AND crew = '$fetch->crew' ");
mysql_query("UPDATE topics SET title='$new_tit2' WHERE id='$lock'");

}else{
mysql_query("UPDATE topics SET locked='0' WHERE id='$lock'");
}

echo "This topic is now Unlocked";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=left.php?forum=$forum'>";
}
}
if($_GET[stick]) {
if($fetch->userlevel == "0") { die('You cannot sticky this topic'); }
$stick = $_GET[stick];
$check1=mysql_query("SELECT * FROM topics WHERE id='$stick'");
$chech=mysql_fetch_object($check1);
$new_tit=" <b>$chech->title</b>";
$sticky =mysql_num_rows(mysql_query("SELECT * FROM topics WHERE username='$username' AND id='$stick'"));

if($userlevel > 0 || $userlevel > 2 || $forumm > 1 || $stick != "0" ){
if ($forum == "Crew" && $crew == "1"){
mysql_query("UPDATE topics SET sticky='1', lastreply='999999999999999' WHERE id='$stick' AND crew = '$fetch->crew'");
} else {
mysql_query("UPDATE topics SET sticky='1', lastreply='999999999999999' WHERE id='$stick'");


echo "This topic is now a Sticky!";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=left.php?forum=$forum'>";
}
}
if($_GET[unstick]) {
if($fetch->userlevel == "0") { die('You cannot unstick this topic'); }
$stick = $_GET[unstick];
$check1=mysql_query("SELECT * FROM topics WHERE id='$stick'");
$chech=mysql_fetch_object($check1);
$new_tit="<b>$chech->title</b>";
$sticky =mysql_num_rows(mysql_query("SELECT * FROM topics WHERE username='$username' AND id='$stick'"));

if($userlevel > 0 || $userlevel > 2 || $forumm > 1 || $stick != "0" ){
if ($forum == "Crew" && $crew == "1"){
mysql_query("UPDATE topics SET sticky='0', lastreply='10' WHERE id='$stick' AND crew = '$fetch->crew'");
} else {
mysql_query("UPDATE topics SET sticky='0', lastreply='10' WHERE id='$stick'");
}
}
echo "This topic is no longer a Sticky";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=left.php?forum=$forum'>";
}
}
if($_GET[stick]) {
if($fetch->userlevel == "0") { die('You cannot make this topic important!'); }
$imp = $_GET[imp];
$check1=mysql_query("SELECT * FROM topics WHERE id='$imp'");
$chech=mysql_fetch_object($check1);
$new_tit=" <b>$chech->title</b>";
$sticky =mysql_num_rows(mysql_query("SELECT * FROM topics WHERE username='$username' AND id='$stick'"));

if($userlevel > 0 || $userlevel > 2 || $forumm > 1 || $stick != "0" ){
if ($forum == "Crew" && $crew == "1"){
mysql_query("UPDATE topics SET imp='1', lastreply='999999999999999' WHERE id='$imp' AND crew = '$fetch->crew'");
} else {
mysql_query("UPDATE topics SET imp='1', lastreply='999999999999999' WHERE id='$imp'");


echo "This topic is now Important!";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=left.php?forum=$forum'>";
}
}
if($_GET[unimp]) {
if($fetch->userlevel == "0") { die('You cannot unimportant this topic'); }
$unimp = $_GET[unimp];
$check1=mysql_query("SELECT * FROM topics WHERE id='$unimp'");
$chech=mysql_fetch_object($check1);
$new_tit="<b>$chech->title</b>";
$sticky =mysql_num_rows(mysql_query("SELECT * FROM topics WHERE username='$username' AND id='$unimp'"));

if($userlevel > 0 || $userlevel > 2 || $forumm > 1 || $stick != "0" ){
if ($forum == "Crew" && $crew == "1"){
mysql_query("UPDATE topics SET imp='0', lastreply='10' WHERE id='$unimp' AND crew = '$fetch->crew'");
} else {
mysql_query("UPDATE topics SET imp='0', lastreply='10' WHERE id='$unimp'");
}
}
echo "This topic is no longer a Important topic";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=left.php?forum=$forum'>";
}
}
if($_GET[clean]) {
if($fetch->userlevel == "0") { die('You cannot delete this topic'); }
$clean = $_GET[clean];
$cc=mysql_num_rows(mysql_query("SELECT * FROM topics WHERE username='$username' AND id='$clean'"));

if($userlevel > 0 || $userlevel > 2 || $forumm > 1 || $clean != "0" ){
if ($forum == "Crew" && $crew == "1"){
mysql_query("DELETE FROM topics WHERE id='$clean' AND crew='$fetch->crew'");
mysql_query("DELETE FROM replys WHERE idto='$clean' AND crew='$fetch->crew'");
}else{
mysql_query("DELETE FROM topics WHERE id='$clean'");
mysql_query("DELETE FROM replys WHERE idto='$clean'");
}

echo "Topic Deleted.";
echo "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=left.php?forum=$forum'>";
}
}

?>
</table><br>

<META HTTP-EQUIV="Refresh"
      CONTENT="60; URL=left.php?forum=main">

<?php
	index_navigation($forum_look, $forum_count, $num);
?>