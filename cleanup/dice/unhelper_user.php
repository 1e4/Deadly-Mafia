<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$helper=$_POST['helper'];
if($helper){
if($userlevel == 0 || $userlevel == 1){

}else{

mysql_query("UPDATE users SET helper='0' WHERE username='$helper'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', '$helper', 'AdminCP', 'You are no longer a helper', '$date', '0', '0', '')");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Removed helper status from $helper.', '$userlevel')");

print "You removed helper status from $helper";

}}

?>

<html><style type="text/css">
<!--
body,td,th {
	color: #990000;
}
body {
	background-color: #999999;
}
-->
</style><br>
<form method="post" action="">
  <div align="center">Username To Remove Helper Status From: 
    <input type="text" name="helper">
    <br>
    <input type="submit" value="Remove Helper Status">
  </div>
</form>
<div align="center">
  </html>
  
  
  <?
$p=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if($p->userlevel == 0){

}else{


?>
  <span class="style1"><b>Users Currently Helpers</b></span>
  </TD>
  </TR>
</div>
<TR>
  <TD>
    <P align="center">
    <div align="center">
  <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="611" id="AutoNumber1">
    <tr>
      <td width="20">ID:</td>
        <td width="50">Username:</td>
        <td width="92">Status:</td>
      </tr>
    <?php


$mysql1 = mysql_query("SELECT * FROM `users` WHERE `helper`='1' ORDER by id ASC");


while($object = mysql_fetch_object($mysql1)){ 

?>
    <tr>
      <td width="20"><? print"$object->id";?></td>
        <td width="50"><? print"$object->username";?></td>
        <td width="92"><? print"$object->status";?></td>
      </tr>
    <?php
	}
$num ++
?>
  </table>
  </div>
  </div>
        </div></TD>
</TR>
<div align="center">
  </TABLE>
  </div>
  
  <?

}

?>
</div>
