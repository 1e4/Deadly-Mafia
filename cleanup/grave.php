<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$dead=mysql_query("SELECT * FROM users WHERE status='Dead' ORDER by flowers DESC");

$flowers=$_GET['givef'];

if($flowers){
$give_to=$flowers;
///// check if there even dead or if they exist
$find=mysql_num_rows(mysql_query("SELECT * FROM users WHERE status='Dead' AND username='$flowers'"));
if($find != "1"){
print "That user isnt buried in this graveyard";
exit();
}else{
//// check there money
if($fetch->money < "5000"){
?>

<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Error</div></td>
    </tr>
    <tr>
      <td bgcolor="red"><div align="center"><font color="#000000"><? print "You dont have enough money to buy flowers for $give_to";
 ?></font></div></td>
    </tr>
  </table>
</div><?
exit();
}
$fl=mysql_fetch_object(mysql_query("SELECT flowers FROM users WHERE username='$give_to'"));
$current_flowers=$fl->flowers;
$new_f=$current_flowers+1;
$current_money=$fetch->money;
$new_m=$current_money-5000;
mysql_query("UPDATE users SET money='$new_m' WHERE username='$username'");
mysql_query("UPDATE users SET flowers='$new_f' WHERE username='$give_to'");
?>

<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Success</div></td>
    </tr>
    <tr>
      <td bgcolor="lime"><div align="center"><font color="#000000"><? print "You gave $give_to a flower for there grave stone";


 ?></font></div></td>
    </tr>
  </table>
</div><?
echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=grave.php\">";
}
}

$piss=$_GET['piss'];

if($piss){
$give_to=$piss;
///// check if there even dead or if they exist
$find=mysql_num_rows(mysql_query("SELECT * FROM users WHERE status='Dead' AND username='$give_to'"));
if($find != "1"){
print "That user isnt buried in this graveyard";
exit();
}else{
//// check there money
if($fetch->money < "5000"){
?>

<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Error</div></td>
    </tr>
    <tr>
      <td bgcolor="red"><div align="center"><font color="#000000"><? print "You dont have enough money to vandalise the grave of $give_to";
 ?></font></div></td>
    </tr>
  </table>
</div><?
exit();
}
$fl=mysql_fetch_object(mysql_query("SELECT flowers FROM users WHERE username='$give_to'"));
$current_flowers=$fl->flowers;
$new_f=$current_flowers-1;
$current_money=$fetch->money;
$new_m=$current_money-5000;
mysql_query("UPDATE users SET money='$new_m' WHERE username='$username'");
mysql_query("UPDATE users SET flowers='$new_f' WHERE username='$give_to'");
?>

<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Success</div></td>
    </tr>
    <tr>
      <td bgcolor="lime"><div align="center"><font color="#000000"><? print "You vandalised thee of $give_to";

 ?></font></div></td>
    </tr>
  </table>
</div><?
echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=grave.php\">";
}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="/includes/in.css" rel="stylesheet" type="text/css" />
<link href="../stylesheets/online.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #4f4f4f;
}
.style1 {font-weight: bold}
-->
</style></head>

<body>
<table width="80%"  border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#000000" class="background">
  <tr>
    <td colspan="2" class="header"><div align="center">Grave Yard</div></td>
  </tr>
  <tr bgcolor="#999999">
    <td colspan="2"><div align="center"></div></td>
  </tr>
  <tr bgcolor="#999999">
    <td width="50%"><div align="center">It costs &pound;5000 to lay a flower. </div></td>
    <td width="50%"><div align="center">It costs &pound;5000 to vandalise and remove flowers. </div></td>
  </tr>
  <tr bgcolor="#999999">
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<DIV align=center>
  <p class="style1">&nbsp;</p>
</DIV>
<TR>
    <TD><div align=center>
        <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="724" id="AutoNumber1">
  <tr bgcolor="#FFFFFF">
    <td width="106" height="24" bgcolor="#999999" class="header"><div align="center">Username</div></td>
    <td width="90" bgcolor="#999999" class="header"><div align="center">Rank</div></td>
    <td width="140" bgcolor="#999999" class="header"><div align="center">Current Flowers</div></td>
    <td width="92" bgcolor="#999999" class="header"><div align="center">Buy Flowers</div></td>
	<td width="284" bgcolor="#999999" class="header"><div align="center">Vandalise Grave Stone</div></td>
  </tr>
<?php
$number=mysql_num_rows($dead);
if($number != "0"){
while($object2 = mysql_fetch_object($dead)){ 
?>
  <tr class="background">
    <td width="106" height="20" bgcolor="#999999" class="background"><? print"<a href='profile.php?viewuser=$object2->username'>$object2->username</a>";?></td>
    <td width="90" bgcolor="#999999" class="background"><? print"$object2->rank";?></td>
    <td width="140" bgcolor="#999999" class="background"><? print"$object2->flowers";?></td>
    <td width="92" bgcolor="#999999" class="background"><? print"<a href='?givef=$object2->username'>Buy $object2->username Flowers</a>";?></td>
	 <td width="284" bgcolor="#999999" class="background"><? print"<a href='?piss=$object2->username'>Vandalise $object2->username's Grave</a>";?></td>
</tr>
<?php
	}
$num ++
?>
<? }else{ ?>
  <tr class="background">
    <td height="20" colspan="5" bgcolor="#999999" class="background"><div align="center"><strong>There are no gravestones in this graveyard. </strong></div></td>
    </tr>
	<? } ?>
</table>
      </div>
</div>
</div>
</TD>
</TR>
</body>
</html><p>
<? include_once 'includes/footer.php'; ?>