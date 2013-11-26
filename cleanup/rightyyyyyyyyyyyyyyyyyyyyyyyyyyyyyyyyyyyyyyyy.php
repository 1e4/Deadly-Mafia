<?
session_start();
include "includes/db_connect.php"; 
include "includes/functions.php";
include"includes/smile.php";
logincheck();
$forum=$_GET['forum'];
$username=$_SESSION['username'];
$viewtopic = $_GET['viewtopic'];
$forum_look=$_GET['forum_look'];


if (!$viewtopic){
$viewtopic = "1";
}
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
if ($forum == "Crew" && $fetch->crew != "0"){
$crew="1";

}
$owner=mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss='$username' OR underboss='$username'"));


$userlevel=$fetch->userlevel;





$ggee = mysql_query("SELECT locked, sticky, lastreply FROM topics WHERE id='$viewtopic' AND forum='$forum'");
while($dsdsd = mysql_fetch_row($ggee)){
	$lockedornot = $dsdsd[0];
	$stikornot = $dsdsd[1];
$lastreplyit = $dsdsd[2];
}

if ($lockedornot == '1'){
echo "This topic is locked.";
}elseif ($userlevel != '0' || $lockedornot != '1'){

if ($crew == "1"){
$gg = mysql_query("SELECT * FROM topics WHERE id='$viewtopic' AND forum='$forum' AND crew='$fetch->crew'");
}else{
$gg = mysql_query("SELECT * FROM topics WHERE id='$viewtopic' AND forum='$forum'");
}
while($success = mysql_fetch_row($gg)){
	$username1 = $success[1];
	$topictext = $success[3];
$made = $success[8];

	}


	
	
	?>
<table width=100% border=1 cellspacing=0 cellpadding=2  class=thinline bordercolor=black><tr><td  background="includes/grad.jpg" align=left><center class=TableHeading>Topic Made By : <? echo "<a href='profile.php?viewuser=$username1' target=mainFrame>$username1</a>"; ?> On :<?php echo "$made"; ?></center></td></tr>

<tr><td bgcolor=999999>

<? echo replace($topictext); 
if ($topictext == ""){ $topictext = "Main Forum";}?>


</td></tr></table><br>
<p>


<?php

$forum_count = 15;

function index_navigation($index, $count, $num) {
$forum = $_GET['forum'];
$viewtopic = $_GET['viewtopic'];
	if ($index != 0) {
		print "<a href=\"right.php?forum=$forum&viewtopic=$viewtopic&forum_look=" . ($index - $count) . "\">Previous</a> ";
	}
	if ($num == $count) {
		print " <a href=\"right.php?forum=$forum&viewtopic=$viewtopic&forum_look=" . ($index + $count) . "\">Next</a>";
	}
	

}
if (! isset($forum_look) ) {
				$forum_look = 0;
			}
if ($crew == "1"){
$query="SELECT * FROM replys WHERE idto = '$viewtopic' AND forum='$forum' AND crew='$fetch->crew' ORDER by `id` DESC LIMIT $forum_look, $forum_count";
}else{
$query="SELECT * FROM replys WHERE idto = '$viewtopic' AND forum='$forum' ORDER by `id` DESC LIMIT $forum_look, $forum_count";
}


$query=mysql_query("$query");
$num=mysql_num_rows($query);
while($right=mysql_fetch_object($query)){




if ($fetch->userlevel > "0"){


echo "<table width=100% cellspacing=0 cellpadding=2 border=1 class=thinline bordercolor=white><tr><td background=includes/grad.jpg><a href='profile.php?viewuser=$right->username' target=mainFrame>$right->username</a> <b>On:</b> $right->made</td></tr>

<tr> <td bgcolor=999999>";

 echo replace($right->text);


echo "</td></tr></table><br>
<p>";
}elseif ($userlevel == 0){
echo "<table width=100% cellspacing=0 cellpadding=2 border=1 class=thinline bordercolor=white><tr><td background=includes/grad.jpg><a href='profile.php?viewuser=$right->username'>$right->username</a> <b>On:</b> $right->made</td></tr>
<tr><td bgcolor=white height=1></td></tr>
<tr><td bgcolor=999999>";

 echo replace($right->text);


echo "</td></tr></table><br>
<p>";
}



}

if($_GET[clean]) { 
$clean=$_GET[clean];
if($userlevel == '2'){
echo "Error.";
exit;
}else
mysql_query("DELETE FROM replys WHERE id='$clean' AND forum='$forum'") or die ("Cannot delete reply");
echo "Reply Deleted!";
echo "<SCRIPT LANGUAGE='JavaScript'>
window.location='right.php?forum=$forum&viewtopic=$g';
</script>";

}





?>
<?php
	index_navigation($forum_look, $forum_count, $num);	
?>





<br>

<br>


<?

if (!$viewtopic){
$viewtopic = "1";
}

if(strip_tags($_POST['Submit']) && strip_tags($_POST['reply_text']) && $forum && $viewtopic){

$reply_text = addslashes(strip_tags($_POST['reply_text']));

$topic_info=mysql_fetch_object(mysql_query("SELECT * FROM topics WHERE  id='$viewtopic' AND forum='$forum'"));


if ($topic_info->sticky == "1"){
$lastreplytime = $topic_info->lastreply;
}elseif ($stikornot == "0"){
$lastreplytime = time();
}
if ($topic_info->locked == "1"){
echo "This topic is locked.";
exit();
}


$date = gmdate('Y-m-d h:i:s');





if ($crew == "1" && $fetch->crew != "0"){
mysql_query("INSERT INTO `replys` (`id`, `username`, `text`, `forum`, `idto`,`made`,`crew`) VALUES ('', '$username', '$reply_text', '$forum', '$viewtopic','$date','$fetch->crew');") or die (mysql_error());
}else{
mysql_query("INSERT INTO `replys` (`id`, `username`, `text`, `forum`, `idto`,`made`) VALUES ('', '$username', '$reply_text', '$forum', '$viewtopic','$date');") or die (mysql_error());

}
mysql_query("UPDATE `user_info` SET `posts` = `posts`+1 WHERE username='$username'");

			mysql_query("UPDATE topics SET lastreply='$lastreplytime' WHERE id='$viewtopic'");
echo "

<SCRIPT LANGUAGE='JavaScript'>
window.location='right.php?forum=$forum&viewtopic=$viewtopic';
</script>";

}
?>


<script language=JavaScript>
function so(dis)
{
for (i=0;i<dis.elements.length;i++){ 
	if (dis.elements[i].type=='submit')
	   dis.elements[i].style.visibility='hidden';
	}
	if(fs==false){
		 fs=true;
		 return true;
	}else
 		return false;
	}
	function goaway()
{
for(i=0;i<document.forms.length;i++)
 document.forms[i].onsubmit = function() {return so(this);};
}
</script><link href="includes/test.css" rel="stylesheet" type="text/css">
<body onload=goaway();>


<form action='' method=post>
<input name="forumto" type="hidden" value="<?php echo "$forum"; ?>">
        <input name="this" type="hidden" id="this" value="<?php echo "$viewtopic"; ?>">

  <table  width=100% border=1 cellpadding=2 cellspacing=0  bordercolor="#000000" bgcolor="#666666" class=thinline>
    <tr>
<td background="includes/grad.jpg"><center><font color=#FFFFFF>Reply:</font>
</center></td>
</tr>
<tr>
      <td ><center> <div align="center">
          <textarea name="reply_text" cols="" rows="5" id="reply_text" style="width: 90%;"></textarea>
          <br>
        </div></td>
</tr>
<tr>
<td width=33% class=thinline><center><input type=submit value=Submit name=Submit></td>
</tr>
</table>
</form>
<? } ?>
