<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

if($userlevel == "3"){

if($_GET['extra'] == "yes"){

$i8n=mysql_query("SELECT * FROM log ORDER by id DESC");

}else{

$i8n=mysql_query("SELECT * FROM log ORDER by id DESC LIMIT 200");

}

if(!$_GET['detail']){

$i8n=mysql_query("SELECT * FROM log ORDER by id DESC LIMIT 200");

}else{
$ddd=$_GET['detail'];
$i8n=mysql_query("SELECT * FROM log WHERE by='$ddd' ORDER by id DESC");

}

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

<DIV align=center><span class="style1"><b>Admin Logs</b></span></DIV></TD></TR>
  <TR>
    <TD>
      <P><div align=center>
        <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="611" id="AutoNumber1">
  <tr>
    <td width="20">ID:</td>
    <td width="20">Username:</td>
    <td width="1000">Action:</td>
    <td width="50">Userlevel:</td>
  </tr>
<?php

while($object = mysql_fetch_object($i8n)){ 

?>
  <tr>
    <td width="20"><? print"$object->id";?></td>
    <td width="50"><? print"$object->by";?></td>
    <td width="1000"><? print"$object->action";?></td>
    <td width="50"><? 
if($object->level == "0"){
print "Player";
}elseif($object->level == "2"){
print "Mod";
}elseif($object->level == "3"){
print "Admin";
} ?></td>
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
<a href="admin_logs.php?extra=yes">CLICK HERE TO VIEW ALL LOGS</a>
<? } ?>
