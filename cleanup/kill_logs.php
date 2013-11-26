<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;


$i8n=mysql_query("SELECT * FROM attempts WHERE outcome='Dead' AND username!='BOMB SQUAD' ORDER by id DESC LIMIT 200");


?><style type="text/css">
<!--
body,td,th {
	color: #990000;
}
body {
	background-color: #363636;
}
-->
</style>

<body>
<table width="300" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr class="header">
    <th background="includes/grad.jpg" scope="col"><span class="style3"><font color=white><h4>Kill Logs</color></span></th>
  </tr>
  <TR>
    <TD>
      <P><div align=center>
        <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="611" id="AutoNumber1">
  <tr bgcolor="#FFFFFF">
    <td width="19"><font color=red><b><h3>ID:</color></b></td>
    <td width="39"><font color=red><b><h3>Killed:</color></b></td>
    <td width="154"><font color=red><b><h3>Killer:</color></b></td>
    <td width="389"><font color=red><b><h3>Date:</color></b></td>
  </tr>
<?php

while($object = mysql_fetch_object($i8n)){ 

?>
  <tr>
    <td width="19"><font color=red><b><h4><? print"$object->id";?></color></b></td>
    <td width="39"><font color=white><b><h4><? print"$object->target";?></color></b></td>
    <td width="154"><font color=white><b><h4><? print"$object->username";?></color></b></td>
    <td width="389"><font color=white><b><h4><? print"$object->date";?></color></b></td>
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