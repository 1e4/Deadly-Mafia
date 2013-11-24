<?php 
session_start(); 
header("Cache-control: private"); 
include "includes/db_connect.php";
include "includes/functions.php"; ?><link href="includes/test.css" rel="stylesheet" type="text/css">

<? logincheck();
$username = $_SESSION['username'];


$del = strip_tags($_GET['del']);
$title=strip_tags($_POST['title']);
$description = strip_tags($_POST['description']);

if($del){
	mysql_query("DELETE from ticket where id=$del");
	print"Ticket has been cleared!<br>";
}

if($Send){
	if($title){
		if($description){
mysql_query("INSERT INTO `ticket` (`title` , `description` , `answer`, `open`, `started`) 
VALUES 
('$title' , '$description' , 'None yet!', '1', '$username')") or die("<br>Could not add ticket!");
print"Ticket has been added!<br>";

		}else{
		print"You have to describe your problem!<br>";
		}
	}else{
		print"You have to enter a title first!<br>";
	}
}

print"
	
<form method=POST action=ticket.php>
<table width=100% border=1 cellspacing=0 bordercolor=black>
  <tr>
    <td width=50%>
    <tr bordercolor=000000>
      <td colspan=2 align=right background=includes/grad.jpg><div align=center>HelpDesk</div></td>
    </tr>
    <tr bordercolor=000000>
        <td width=50% align=right bgcolor=999999><font SIZE=2>&nbsp;</font>Problem Title</td>
        <td width=50% bgcolor=999999><input type=text name=title size=57></td>
    </tr>
      <tr>
        <td width=50% align=right bgcolor=999999>Problem descripiton</td>
        <td width=50% bgcolor=999999><textarea rows=14 name=description cols=48></textarea></td>
      </tr>
  </table>
  <p align=center><input type=submit value=Open ticket name=Send><input type=reset value=Reset name=Reset></p>
</form>
<p align=center>All your tickets:</p>"
;
$selects = mysql_query("SELECT * FROM ticket WHERE started = '$username'");
while ($is = mysql_fetch_object($selects)){

print "
<table width=100% border=1 cellspacing=0 bordercolor=000000 bgcolor=999999>
  <tr bordercolor=000000>
    <td width=50%>
    <p align=right>Title:</td>
    <td width=50%>$is->title</td>
  </tr>
  <tr bordercolor=000000>
    <td width=50%>
    <p align=right>Problem:</td>
    <td width=50%>$is->description</td>
  </tr>
  <tr bordercolor=000000>
    <td width=50%>
    <p align=right>Answer:</td>
    <td width=50%>$is->answer</td>
  </tr>
    </tr>
  <tr bordercolor=000000>
    <td width=50%>
    <p align=right>Options:</td>
    <td width=50%><a href=ticket.php?del=$is->id>Delete ticket!</a></td>
  </tr>
</table>";
}
?>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">