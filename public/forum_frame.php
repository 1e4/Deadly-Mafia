<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$forum = $_GET['forum'];
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title>Forum</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/test.css" rel="stylesheet" type="text/css">

</head>

<frameset rows="*" framespacing="0" frameborder="no" border="0">
  <frameset cols="420,*" framespacing="0" frameborder="no" border="0">
  <frame src="left.php?forum=<? print $forum; ?>" name="leftFrame" scrolling="auto" noresize>
  <frame src="right.php?forum=<? print $forum; ?>&viewtopic=1" name="frameright">
	</frameset>
</frameset>
<noframes><body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
</body></noframes>
</html>
