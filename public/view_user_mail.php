<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$username2=$_POST['search_username'];

if($userlevel == 0){

}else{


?>
      <DIV align=center><span class="style1"><b>Last 30 Messages Sent</b></span></DIV></TD></TR>
  <TR>
    <TD>
      <P><div align=center>
        <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="611" id="AutoNumber1">
  <tr>
    <td width="50">Date:</td>
    <td width="92">To:</td>
    <td width="469">Message:</td>
  </tr>
<?php


$mysql1 = mysql_query("SELECT * FROM `inbox` WHERE `from`='$username2' ORDER by date DESC");


while($object = mysql_fetch_object($mysql1)){ 

?>
  <tr>
    <td width="50"><? print"$object->date";?></td>
    <td width="92"><? print"$object->to";?></td>
    <td width="469"><? print"$object->message";?></td>
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

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Viewed the last mails sent by $username2.', '$userlevel')");


}

?>