<?

include "functions.php";

logincheck();

$username=$_SESSION['username'];

$p=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if($p->userlevel == 0){

}else{


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
      <DIV align=center><span class="style1"><b>Donaters</b></span></DIV></TD></TR>
  <TR>
    <TD>
      <P><div align=center>
        <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="611" id="AutoNumber1">
  <tr>
    <td width="20">ID:</td>
    <td width="50">Username:</td>
    <td width="20">Points Bought:</td>
	    <td width="20">Current Points:</td>
  </tr>
<?php


$mysql1 = mysql_query("SELECT * FROM `donaters` ORDER by donater_id ASC");


while($object = mysql_fetch_object($mysql1)){ 
$z=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$object->username'"));
?>
  <tr>
    <td width="20"><? print"$object->donater_id";?></td>
    <td width="50"><? print"$object->username";?></td>
    <td width="20"><? print"$object->amount";?></td>
	    <td width="20"><? print"$z->points";?></td>
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

}

?>