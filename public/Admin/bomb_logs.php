<?
include "functions.php";
logincheck();

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;


$i8n=mysql_query("SELECT * FROM attempts WHERE username='BOMB SQUAD' ORDER by id DESC LIMIT 200");


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

<DIV align=center><span class="style1"><b>Bomb Squad Logs </b></span></DIV>
</TD></TR>
  <TR>
    <TD>
      <P><div align=center>
        <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="611" id="AutoNumber1">
  <tr bgcolor="#FFFFFF">
    <td width="19">ID:</td>
    <td width="39">Killed:</td>
    <td width="226">Killer:</td>
    <td width="317">Date:</td>
  </tr>
<?php

while($object = mysql_fetch_object($i8n)){ 

?>
  <tr>
    <td width="19"><? print"$object->id";?></td>
    <td width="39"><? print"$object->target";?></td>
    <td width="226"><? print"$object->username";?></td>
    <td width="317"><? print"$object->date";?></td>
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
