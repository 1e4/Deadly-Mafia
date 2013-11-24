<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
include "includes/smile.php";
logincheck();
$forum=$_GET['forum'];
$username=$_SESSION['username'];
$viewtopic = $_GET['viewtopic'];
$forum_look=$_GET['forum_look'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if($_GET[clean]) { 
$clean=$_GET[clean];
if($fetch->userlevel == "0") { die('You cannot delete this post!'); }
mysql_query("DELETE FROM replys WHERE id='$clean' AND forum='$forum'") or die ("Cannot delete reply");
echo "Reply Deleted!";
echo "<meta http-equiv='refresh' content='1;url=right.php?forum=$forum&viewtopic=$viewtopic'>";
}
if (!$viewtopic){
$viewtopic = "1";
}

if ($forum == "Crew" && $fetch->crew != "0"){
$crew="1";

}
$owner=mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss='$username' OR underboss='$username'"));


$userlevel=$fetch->userlevel;

if ($fetch->fban != "1"){



$ggee = mysql_query("SELECT locked, sticky, lastreply FROM topics WHERE id='$viewtopic' AND forum='$forum'");
while($dsdsd = mysql_fetch_row($ggee)){
	$lockedornot = $dsdsd[0];
	$stikornot = $dsdsd[1];
$lastreplyit = $dsdsd[2];
}



if ($crew == "1"){
$gg = mysql_query("SELECT * FROM topics WHERE id='$viewtopic' AND forum='$forum' AND crews='$fetch->crews'");
}else{
$gg = mysql_query("SELECT * FROM topics WHERE id='$viewtopic' AND forum='$forum'");
}
while($success = mysql_fetch_row($gg)){
	$username1 = $success[1];
$title = $success[2];
	$topictext = $success[3];
        $made = $success[8];

	}


$fetchhim=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username1'"));

?>


	  <div align="center">
  <br>

  <table width="100%" border="1" bordercolor="black" cellpadding="0" cellspacing="0" bgcolor="#666666" class="border">
    
      <th width="400" height="30" valign="top" class="gradient" background="includes/grad.jpg"><span style="font-size:14pt;">
  <?php echo "$title"; ?></span></th>
    </tr>

    <tr>
      <td width="400" height="100%" valign="top" class="post"><div align="left">
<font color='white'><center><BR><? echo replace($topictext);
if ($topictext == ""){ $topictext = "Main Forum";}?>
          <br \>
          <span class="style2"><i><br><BR>Made On
          <?php echo "$made"; ?> By <?php echo"$username1"; ?> </i> </span></span></div></td>
    </tr>

  </table>


<br>
<br>




<?php

$forum_count = 25;

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



if ($fetch->userlevel > "0" || $fetch->userlevel > "2"){

$forumquote = mysql_query("SELECT * FROM users WHERE username = '$right->username'");
$fq = mysql_fetch_object($forumquote);
echo "<table width=100% cellspacing=0 cellpadding=2 border=1 class=thinline bordercolor=black bgcolor=#666666 style=border-collapse: collapse><tr>
  <td background=includes/grad.jpg width=31>&nbsp;</td>
  <td background=includes/grad.jpg width=845><a href='profile.php?viewuser=$right->username' target=middle>$right->username</a> <b>On:</b> $right->made</td></tr>

<tr> <td height='75' width='1' rowspan=2><a href='right.php?clean=$right->id&forum=$forum&viewtopic=$viewtopic'><font color=black><b>Delete This Post</font></a> </td> 
  <td height='75' width=845>";

 echo replace($right->text);

if($fq->forumquote == "") {
echo "</td></tr></table><br></font>
<p>";
}
else {
echo "</td></tr><tr><td width=845>$fq->forumquote</td></tr></table><br>
<p>"; }
}elseif ($userlevel == 0 || $userlevel == 2){


$forumquote = mysql_query("SELECT * FROM users WHERE username = '$right->username'");
$fq = mysql_fetch_object($forumquote);
echo "<table width=100% cellspacing=0 cellpadding=2 border=1 class=thinline bordercolor=black bgcolor=#666666 style=border-collapse: collapse><tr>
  <td background=includes/grad.jpg width=31>&nbsp;</td>
  <td background=includes/grad.jpg width=845><a href='profile.php?viewuser=$right->username' target=middle>$right->username</a> <b>On:</b> $right->made</td></tr>

<tr> <td height='75' width='30' rowspan=2></td> 
  <td height='75' width=845>";

 echo replace($right->text);


if($fq->forumquote == "") {
echo "</td></tr></table><br>
<p>";
}
else {
echo "</td></tr><tr><td width=845>$fq->forumquote</td></tr></table><br>
<p>"; }
}



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
</script>
<script language="javascript" type="text/javascript">
function AddEmoticon(text) {
	var txtarea = document.form.reply_text;
	text = ' ' + text + ' ';
	if (txtarea.createTextRange && txtarea.caretPos) {
		var caretPos = txtarea.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? caretPos.text + text + ' ' : caretPos.text + text;
		txtarea.focus();
	} else {
		txtarea.value  += text;
		txtarea.focus();
	}
}
</script>



<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">


<form action='' method=post>
<input name="forumto" type="hidden" value="<?php echo "$forum"; ?>">
        <input name="this" type="hidden" id="this" value="<?php echo "$viewtopic"; ?>">

  <table class=thinline border=1 cellspacing=0 cellpadding=2  width=100%  bordercolor="black" bgcolor="#DDDDDD" style="border-collapse: collapse">
    <tr><? if ($topic_info->locked == "1"){
echo "<center>Topic Locked!<BR>No more replys can be added!";
exit();
} ?><? if ($lockedornot == '1'){
echo "<font size=2><b><center>Topic Locked!";
}elseif  ($userlevel != '0' || $lockedornot != '1'){ ?>
<td background="includes/grad.jpg"><center><font color=#000000>Reply:</font></center></td>
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













<? if ($fetch->userlevel != "0"){?>
<form action='' method=post>
<input name="forumto" type="hidden" value="<?php echo "$forum"; ?>">
        <input name="this" type="hidden" id="this" value="<?php echo "$viewtopic"; ?>">

  
</form>


<br />





<? } ?><? }} ?>