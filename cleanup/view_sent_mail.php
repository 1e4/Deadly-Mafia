<?
include "functions.php";
logincheck();

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$username2=$_POST['username'];

$delete=$_GET['del'];

if($delete){
mysql_query("DELETE FROM inbox WHERE id='$delete'");
print "Deleted";
}

if($username2){

if($userlevel != "0"){

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Viewed last msgs sent by $username2', '$userlevel')");

?><style type="text/css">
<!--
body,td,th {
	color: #990000;
}
body {
	background-color: #999999;
}
-->
</style>
      <DIV align=center><span class="style1"><b>Last 30 mails sent</b></span></DIV></TD></TR>
  <TR>
    <TD>
      <P><div align=center>
        <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="611" id="AutoNumber1">
  <tr>
    <td width="72">Date:</td>
    <td width="85">To:</td>
    <td width="373">Message:</td>
    <td width="71">Delete:</td>
  </tr>
<?php


$mysql1 = mysql_query("SELECT * FROM `inbox` WHERE `from`='$username2' ORDER by date DESC");


while($object = mysql_fetch_object($mysql1)){ 

?>
  <tr>
    <td width="72"><? print"$object->date";?></td>
    <td width="85"><? print"$object->to";?></td>
    <td width="373"><? print"$object->message";?></td>
    <td width="71"><? print"<a href='?del=$object->id'>Delete</a>";?></td>
  </tr>
<?php
	}
$num ++
?>
</table>
      </div>
</div>
</div>
</TD>
</TR>
</TABLE>
</div>

<?

}}

?>

<style type="text/css">
<!--
body,td,th {
	color: #990000;
}
body {
	background-color: #999999;
}
-->
</style>

<html>
<form method="post" action="">
Username: <input type="text" name="username">
<input type="submit" value="View Last 30 Emails Sent">
</form>
</html>