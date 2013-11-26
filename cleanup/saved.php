<?php 
session_start(); 
include "includes/db_connect.php";
include "includes/functions.php";
include"includes/smile.php";
logincheck();

echo "<link href=includes/in.css rel=stylesheet type=text/css> ";

$username = $_SESSION['username'];
$mysql=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($mysql);

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

if (strip_tags($_POST['Accept_marriage'] && $_GET['accept'] == "marry")){
$marriewhom = $_GET['marrie_who'];

//$lyer = mysql_fetch_object(mysql_query("SELECT * FROM married WHERE starter='$marriewhom' AND other='$username'"));

//if ($lyer->id <> 0 && $lyer->id <> ''){
$misql=mysql_query("SELECT * FROM users WHERE username='$marriewhom");
$fitch=mysql_fetch_object($misql);

$nwa="$fetch->married-$username";
$nwo="$fitch->married-$marriewhom";

mysql_query("UPDATE users SET married='$nwa' WHERE username='$marriewhom'");
mysql_query("UPDATE users SET married='$nwo' WHERE username='$username'");
mysql_query("DELETE FROM married WHERE starter='$marriewhom' AND other='$username'");
echo "Congratulations, you have been officially married with $marriewhom!";
//}else{
//echo "Hmm, for some reason you haven't been asked to marry $marriewhom";
//}
}

if (strip_tags($_POST['join_crew']) && strip_tags($_POST['invite_crew'])){
$invite_crew = strip_tags($_POST['invite_crew']);

if ($invite_crew == "1"){
$shit=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));


$true=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE id='$shit->crew_invite'"));
$numba = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crew='$true->crew'"));
if ($numba >= $true->size){
echo "Sorry that crew is currently full, please wait untill there is space for you.";
}else{


mysql_query("DELETE FROM inbox WHERE event_id='$shit->crew_invite'");
mysql_query("UPDATE users SET crew='$true->name', crew_invite='0'  WHERE username='$username'");
echo "You are now in that crew";
}}

}
if (strip_tags($_POST['Accept_OC'])){
$oc_id=strip_tags($_POST['oc_id']);
if (strip_tags($_POST['place']) == "we"){
$use="we_inv";
$a="we";
$query= "SELECT * FROM oc WHERE we_inv='$username' AND id='$oc_id'";
}elseif (strip_tags($_POST['place']) == "ee"){
$use="ee_inv";
$a="ee";
$query= "SELECT * FROM oc WHERE ee_inv='$username' AND id='$oc_id'";

}elseif (strip_tags($_POST['place']) == "driver"){
$use="driver_inv";
$a="driver";
$query= "SELECT * FROM oc WHERE driver_inv='$username' AND id='$oc_id'";
}

$round=mysql_query($query);
$check=mysql_num_rows($round);
if ($check != "0"){
echo "You are now in that OC";
mysql_query("UPDATE `oc` SET `$a`='$username' WHERE `id`='$oc_id'");
mysql_query("UPDATE `users` SET `oc`='1' WHERE `username`='$username'");
}
}




echo "<form action='' method=POST><table width='68%' border='1' align='center' cellpadding='0' cellspacing='0' class=thinline rules=none>
  <tr> 
    <td><table width='100%' border='0' cellspacing='3' cellpadding='0'>
        <tr> 
          <td width='48%'> <div align='right'>
              <input name='Dall' type='submit' id='Dall' value='Delete All'>
            </div></td>
          <td width='26%'> <div align='left'> 
              <input name='D_s' type='submit' id='Delete_s' value='Delete Selected'>
            </div></td>
          <td width='26%'> <div align='left'> </div></td>
        </tr>
      </table></td>
  </tr>
</table><br></form>";










if ($_GET['del']){
$del=$_GET['del'];
$checker = mysql_query("SELECT * FROM `inbox` WHERE `to` ='$username' AND `id` ='$del' ");
$rows=mysql_num_rows($checker);
if ($rows > "0"){
echo "Message deleted";
mysql_query("DELETE FROM inbox WHERE id='$del'");
}}////END DELETE THERE MSG
if (strip_tags($_POST['Dall'])){
mysql_query("DELETE FROM `inbox` WHERE `saved`='1' AND `to`='$username'");
echo "<center><b>All messages deleted</b></center><br>";
}
if (strip_tags($_POST['D_s'])){
foreach($_POST['select'] as $value) {
    echo "<BR>You clicked checkbox number " . $value , "\n";
} 

}




echo "<center>";
$mysql1 = mysql_query("SELECT * FROM `inbox` WHERE `to`='$username' AND `saved` ='1' ORDER by date DESC");
$num_rows =mysql_num_rows($mysql1);
if ($num_rows == "0"){
echo "You have no saved messages.";
}else{
while($get = mysql_fetch_object($mysql1)){
$t++;
$n++;
echo "

<table width='68%' border='1' align='center' cellpadding='0' cellspacing='0' class=thinline rules=none>
  <tr> 
    <td class=header><center>
        From:<a href='profile.php?viewuser=$get->from'>$get->from</a> On:$get->date</center></td>
  </tr>
  <tr bgcolor=black><td height=1></td></tr>
  <tr> 
    <td><table width='100%' border='0' cellspacing='3' cellpadding='0'>
        <tr> 
          <td colspan='3'>".replace($get->message)."</td>
        </tr>
        <tr> 
          <td width='6%' height='23'> </form> </td>
          <td width='7%'> <form name='form2' method='post' action='?s=$get->id'>
              <input type='submit' name='Submit' value='Save'>
            </form>
            
          </td>
          <td width='87%'> <form name='form1' method='post' action='?del=$get->id'>
              <input name='Delete' type='submit' id='Delete' value='Delete'>
           </form>
            
          </td>
        </tr>
      </table></td>
  </tr>
</table><br>

";



}}
mysql_query("UPDATE `inbox` SET `read`='1' WHERE `to`='$username'");
echo "</center>";
require_once"includes/footer.php"; 
?>