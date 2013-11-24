<?php 
session_start(); 
header("Cache-control: private"); 
include "includes/db_connect.php";
include "includes/functions.php";
echo "$style";
logincheck();
$username = $_SESSION['username'];
/////START DELETE THERE MSG
if (strip_tags($_POST['Accept_get_away']) && $_GET['accept'] == "oc"){
$oc_id = $_GET['oc_id'];
$abc = mysql_num_rows(mysql_query("SELECT * FROM get_away WHERE id='$oc_id' AND invite_get='$username'"));

if ($abc != "0"){
mysql_query("UPDATE get_away SET person='$username' WHERE id='$oc_id'");

mysql_query("UPDATE users SET get_away='1' WHERE username='$username'");
echo "You are now in that Getaway";
}
}

if ($_GET['del']){
$del=$_GET['del'];
$checker = mysql_query("SELECT * FROM `inbox` WHERE `to` ='$username' AND `id` ='$del'");
$rows=mysql_num_rows($checker);
if ($rows > "0"){
echo "Message deleted";
mysql_query("DELETE FROM inbox WHERE id='$del'");
}}////END DELETE THERE MSG
echo "<center>";
$mysql1 = mysql_query("SELECT * FROM `inbox` WHERE `to`='$username'");
$num_rows =mysql_num_rows($mysql1);
if ($num_rows == "0"){
echo "You have no mail.";
}else{
while($get = mysql_fetch_object($mysql1)){


echo "
<table width=98% border=1 cellpadding=0 cellspacing=0 bordercolor=$td_border bgcolor=$td_bg>
<td height=22 background=$gradient>
   <strong><font size=4><b>From:</b> $get->from    <b>On:</b> $get->date</font></strong></td>
  </tr>
  <tr>
    <td>$get->message <p>


<center><form action=inbox.php?del=$get->id method=POST><input type=submit value=Delete></form>
<form action=send.php?rep=$get->id method=POST> <input type=submit value=Reply></form>
</center>
</td>
  </tr>
</table><p>
";

}}
echo "</center>";
require_once"includes/footer.php"; 
?>