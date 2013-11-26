<?php
include "functions.php";
logincheck();
$username=$_SESSION['username'];

$unban=$_POST['unban'];

$user=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$unban2=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$unban'"));

$userlevel=$user->userlevel;

if($userlevel != "0"){

if($unban2->status == "Banned"){

mysql_query("UPDATE users SET status='Alive' WHERE username='$unban'");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', '$username unbanned $unban', '$userlevel')");

print "$unban has been unbanned";
}else{

}


}

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
Username To Unban: <input type="text" name="unban">
<input type="submit" value="Unban">
</form>
</html>

<?
$i9n=mysql_query("SELECT * FROM users WHERE status='Banned' ORDER by id DESC");
?>

<DIV align=center><span class="style1"><b>Players Curently Banned</b></span></DIV>
</TD></TR>
  <TR>
    <TD>
      <P><div align=center>
        <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="611" id="AutoNumber1">
  <tr>
    <td width="20">Username:</td>
    <td width="20">Status:</td>

  </tr>
<?php

while($object2 = mysql_fetch_object($i9n)){ 

?>
  <tr>
    <td width="20"><? print"$object2->username";?></td>
    <td width="20"><? print"$object2->status";?></td>
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


