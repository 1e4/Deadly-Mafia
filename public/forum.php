<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
include"includes/smile.php";
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;
$forum_look=$_GET['forum_look'];

$forum_count = 15;

function index_navigation($index, $count, $num) {
$forum = $_GET['forum'];
	if ($index != 0) {
		print "<a href=\"forum.php?forum=".$forum."&forum_look=" . ($index - $count) . "\"><<<Last</a> ";
	}
	if ($num == $count) {
		print "<a href=\"forum.php?forum=".$forum."&forum_look=" . ($index + $count) . "\">Next>>></a>";
	}
	

}
if (! isset($forum_look) ) {
				$forum_look = 0;
			}
?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<body>

<table width=551 border=1 align="center" cellpadding=2 cellspacing=0 class=thinline rules=none>
  <tr> 
    <td colspan=4 class=header><div align="center">Forum</div></td>
  </tr>
  <tr> 
    <td bgcolor=black height=1 colspan=4></td>
  </tr>
  <tr bgcolor=white> 
    <td align=center width=41% class=tip>Topics:</td>
    <td align=center width=21% class=tip>Replies</td>
    <td align=center width=18% class=tip>Topicstarter</td>
    <td align=center width=20% class=tip>Last reply</td>
  </tr>
  <tr> 
    <td bgcolor=black height=2 colspan=4></td>
  </tr>
  <? $query=mysql_query("SELECT * FROM `topics` WHERE `forum`='$forum' ORDER BY `lastreply` DESC LIMIT $forum_look, $forum_count");
while($select=mysql_fetch_object($query)){
$num=mysql_num_rows($query);
$total=mysql_num_rows(mysql_query("SELECT * FROM replys WHERE idto='$select->id'"));
$last=mysql_fetch_object(mysql_query("SELECT * FROM replys WHERE idto='$select->id' ORDER by id DESC LIMIT 1"));
if ($select->sticky == "1"){
$typo = "<img src=images/forum/sticky.gif border=0>";
}else{
$typo = "<img src=images/topic.jpg border=0>";
}
?>
  <tr> 
    <td height="41"><a href="forum_view.php?viewtopic=<?php echo "$select->id"; ?>&forum=<?php echo "$forum"; ?>"><?php echo "$typo"; ?> 
      <?php echo "$select->title"; ?></a></td>
    <td align=center><?php echo "$total"; ?></td>
    <td align=center><a href="profile.php?viewuser=<?php echo "$select->username"; ?>"><?php echo "$select->username"; ?></a></td>
    <td align=center><a href="profile.php?viewuser=<?php echo "$select->username"; ?>"><?php echo "$last->username"; ?></a></td>
  </tr>  <? } ?>
  <tr> 
    <td bgcolor=black height=2 colspan=4></td>
  </tr>

  <tr bgcolor=white> 
    <td align=right colspan=4 ><a href='topic.php?viewtopic=<?php echo "$viewtopic"; ?>&forum=<?php echo"$forum"; ?>'><font color="#000000">New 
      topic</font></a></td>
  </tr>
</table>

<div align="center"><br>
  <br>
  <?php
	index_navigation($forum_look, $forum_count, $num);	
?>
</div>
</body>
</html>
