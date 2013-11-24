<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];


$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$musername=$_POST['musername'];
if($musername){
if($userlevel == 0){

}else{

mysql_query("UPDATE users SET editor='0' WHERE username='$musername'");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Unmade $musername a newspaper editor.', '$userlevel')");

print "$musername is no longer a newspaper editor";

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
</style>
<form method="post" action="">
  <div align="center">
    <p>Username To Remove Editor Status From: 
      <input type="text" name="musername">
      </p>
    <p>
      <input type="submit" value="Remove Newspaper Editor Status">
        </p>
  </div>
</form>
<div align="center">
  </html>
  
  <?

$username=$_SESSION['username'];

$p=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if($p->userlevel == 0){

}else{


?>
  <span class="style1"><b>Users Currently Editors</b></span>
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


$mysql1 = mysql_query("SELECT * FROM `users` WHERE `editor`='1' ORDER by id ASC");


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
