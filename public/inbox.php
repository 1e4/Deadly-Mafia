<?php 
session_start(); 
include "includes/db_connect.php";
include "includes/functions.php";
include"includes/smile.php";
logincheck();

?><link href="includes/test.css" rel="stylesheet" type="text/css">
<?
$username = $_SESSION['username'];
$mysql=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($mysql);

/////START DELETE THERE MSG
if (strip_tags($_POST['Accept_get_away']) && $_GET['accept'] == "oc"){
$oc_id = $_GET['oc_id'];
$abc = mysql_num_rows(mysql_query("SELECT * FROM get_away WHERE id='$oc_id' AND invite_get='$username'"));

if ($abc != "0"){
if ($fetch->get_away == "1"){ echo "Your in a Getaway"; }elseif ($fetch->get_away == "0"){
if ($fetch->get_away_time > time()){ echo "You cant do anouther Getaway yet."; }elseif ($fetch->get_away_time < time()){




mysql_query("UPDATE get_away SET person='$username' WHERE id='$oc_id'");

mysql_query("UPDATE users SET get_away='1' WHERE username='$username'");
echo "You are now in that Getaway";
}
}}
}

if (strip_tags($_POST['Accept_marriage'] && $_GET['accept'] == "marry")){
$marriewhom = strip_tags($_GET['marrie_who']);

$lyegdfgdfgdf = mysql_num_rows(mysql_query("SELECT * 
FROM `married` 
WHERE `starter` = '$username'
OR `other` = '$username' AND `done` = '1'"));
if ($lyegdfgdfgdf != "0"){
echo "Your already married.";
}elseif ($lyegdfgdfgdf == "0"){



mysql_query("UPDATE married SET done='1' WHERE starter='$marriewhom' AND other='$username'");

echo "Congratulations, you have been officially married with $marriewhom!";
//}else{
//echo "Hmm, for some reason you haven't been asked to marry $marriewhom";
//}
}}

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
if (strip_tags($_POST['Yes_street'])){
$race_id=strip_tags($_POST['race_id']);
if ($fetch->street != "0"){ echo "Your in a race."; }elseif ($fetch->street == "0"){

if ($fetch->last_race >= time()){ echo "You cant do another race yet."; }elseif ($fetch->last_race < time()){

$aa=mysql_query("SELECT * FROM street WHERE id='$race_id' AND op_invite='$username'");
$check=mysql_num_rows($aa);
$shit=mysql_fetch_object($aa);
if ($check == "0"){
echo "There has been an error. Get the Leader to resend the invite.";
}elseif ($check != "0"){
if ($shit->prize == "Money"){
$new_money=$fetch->money - $shit->prize_win;
if ($fetch->money < $shit->prize_win){
echo "You cant afford this!";
}elseif ($fetch->money >= $shit->prize_win){

mysql_query("UPDATE users SET street='1', money='$new_money' WHERE username='$username'");
mysql_query("UPDATE street SET op_username='$username' WHERE id='$shit->id'");
echo "Your now in that street race.";
}
}else{

mysql_query("UPDATE street SET op_username='$username' WHERE id='$shit->id'");
mysql_query("UPDATE users SET street='1' WHERE username='$username'");
echo "Your now in that street race.";

}}}





}}



echo "<form action='' method=POST name=f><table width='68%' border='1' align='center' cellpadding='0' cellspacing='0' class=thinline rules=none>
  <tr> 
    <td><table width='100%' border='0' cellspacing='3' cellpadding='0'>
        <tr> 
          <td width='48%'> <div align='right'>
              <input name='Dall' type='submit' id='Dall' value='Delete All'>
            </div></td>
          <td width='26%'> <div align='left'> 
              <input name='D_s' type='submit' id='del' value='Delete Selected'>
            </div></td>
          <td width='26%'> <div align='left'> </div></td>
        </tr>
      </table></td>
  </tr>
</table><br>";










if ($_GET['del']){
$del=$_GET['del'];
$checker = mysql_query("SELECT * FROM `inbox` WHERE `to` ='$username' AND `id` ='$del' ");
$rows=mysql_num_rows($checker);
if ($rows > "0"){
echo "Message deleted";
mysql_query("DELETE FROM inbox WHERE id='$del'");
}}////END DELETE THERE MSG

if (strip_tags($_POST['Dall'])){
mysql_query("DELETE FROM `inbox` WHERE `saved`='0' AND `to`='$username'");
echo "<center><b>All messages deleted</b></center><br>";
}
if (strip_tags($_POST['D_s'])){
foreach($_POST['radio'] as $value) {
   $count++;
mysql_query("DELETE FROM inbox WHERE id='$value'");
} 
echo "$count messages deleted<br>";
}




echo "<center>";
$mysql1 = mysql_query("SELECT * FROM `inbox` WHERE `to`='$username' AND `saved` ='0' ORDER by date DESC");
if ($num_rows == "0"){
echo "You have no mail.";
}else{
while($get = mysql_fetch_object($mysql1)){
$t++;
$n++;
echo "

<table width='68%' border='1' align='center' cellpadding='0' cellspacing='0' class=thinline rules=none>
  <tr> 
              <td background=includes/grad.jpg><input type=\"checkbox\" name=\"radio[]\" value=\"$get->id\"></td><td background=includes/grad.jpg><center>From: <a href='profile.php?viewuser=$get->from'>$get->from</a> |<a href='send.php?fromper=$get->from'><b>Reply</b></a>| Sent On: $get->date</center><tr></a></td>
  </tr>    <td bgcolor=black>
  <tr bgcolor=black>

<table width='68%' border='1' align='center' cellpadding='0' cellspacing='0' class=thinline rules=none>
  <tr> 
              <td bgcolor=black>
        <tr><td bgcolor=black>".replace($get->message)."</td>
        </tr>";
if ($get->witness == "1"){ echo "<tr><td>Witness ID: $get->id</td></tr>"; }
        
echo "<tr> 

            
          </td>
             </td>
          
        </tr>
      </table></td>
  </tr>
</table><br>
";



}}
echo "</form>";
mysql_query("UPDATE `inbox` SET `read`='1' WHERE `to`='$username'");
echo "</center>";
require_once"includes/footer.php"; 
?>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">