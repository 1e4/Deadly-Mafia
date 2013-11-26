<?php 
session_start(); 
header("Cache-control: private"); 
include "includes/db_connect.php";
include "includes/functions.php";
echo "$style";
logincheck();
$username = $_SESSION['username'];
$del = strip_tags($_GET['del']);
$title=strip_tags($_POST['title']);
$description = strip_tags($_POST['description']);

if($del){
	mysql_query("DELETE from ticket2 where id=$del");
	print"Request has been cleared!<br>";
}

if($Send){
	if($title){
		if($description){
mysql_query("INSERT INTO `ticket2` (`title` , `description` , `answer`, `open`, `started`) 
VALUES 
('$title' , '$description' , 'None yet!', '1', '$username')") or die("<br>Could not add ticket!");
print"Points request submited!<br>";

		}else{
		print"You have to enter your code!<br>";
		}
	}else{
		print"You have to enter your username!<br>";
	}
}

print"
	
<form method=POST action=ticket2.php>
<table width=100%>
  <tr>
    <td width=50%>
      <tr>
        <td width=50% align=right><font SIZE=2>&nbsp;</font>Username</td>
        <td width=50%><input type=text name=title size=57></td>
      </tr>
      <tr>
        <td width=50% align=right>SMS Codes you have successfully entered</td>
        <td width=50%><textarea rows=14 name=description cols=48></textarea></td>
      </tr>
    </table>
  <p align=center><input type=submit value=Open ticket name=Send><input type=reset value=Reset name=Reset></p>
</form>
<p align=center>All your points requests</p>"
;
$selects = mysql_query("SELECT * FROM ticket2 WHERE started = '$username'");
while ($is = mysql_fetch_object($selects)){

print "
<table width=100%>
  <tr>
    <td width=50%>
    <p align=right>Point type:</td>
    <td width=50%>$is->title</td>
  </tr>
  <tr>
    <td width=50%>
    <p align=right>Code</td>
    <td width=50%>$is->description</td>
  </tr>
    
    
    <tr>
    <td width=50%>
    <p align=right>Options:</td>
    <td width=50%><a href=ticket2.php?del=$is->id>Delete request!</a></td>
  </tr>
</table>";
}
?>