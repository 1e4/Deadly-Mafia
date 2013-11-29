<?
session_start();

include_once"includes/functions.php";
logincheck();

$action=$_GET['action'];
$apply=$_GET['apply'];
$userstuff=$_GET['userstuff'];
$acceptall=$_POST['acceptall'];
$declineall=$_POST['declineall'];
$kick=$_GET['kick'];
$rec=$_POST['rec'];
$new_underboss=$_POST['new_underboss'];
$ho_boss=$_POST['ho_boss'];
$ho_underboss=$_POST['ho_underboss'];


$date = gmdate('Y-m-d h:i:s');

$user=mysql_fetch_object(mysql_query("SELECT username,crew FROM users WHERE username='$username'"));
$apps=mysql_query("SELECT username,rank,regged FROM users WHERE apply='$user->crew'");
$crew=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$user->crew'"));
$app_num=mysql_num_rows($apps);

$members=mysql_query("SELECT username FROM users WHERE crew='$user->crew'");
$num_members=mysql_num_rows($members);

if($crew->boss == $username || $crew->underboss == $username){

if(($apply) && ($userstuff)){
$poo=mysql_query("SELECT * FROM users WHERE username='$userstuff' AND apply='$user->crew'");
$rows=mysql_num_rows($poo);
if($rows == "0"){
print "Error. There is no such user please try again.<META HTTP-EQUIV='Refresh' CONTENT='3; URL=?action=aplications'>";
}else{
if($apply == "decline"){
$date = gmdate('Y-m-d h:i:s');
mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `message`, `date`, `read`) VALUES ('', '$userstuff', 'Crew Auto Message', 'Your aplication to join $user->crew was declined by the boss or underboss.', '$date', '0');");
mysql_query("UPDATE users SET apply='0' WHERE username='$userstuff'");
print "User was not accepted to join your crew <META HTTP-EQUIV='Refresh' CONTENT='2; URL=?action=aplications'>";
}else{
$date = gmdate('Y-m-d h:i:s');
mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `message`, `date`, `read`) VALUES ('', '$userstuff', 'Crew Auto Message', 'You have been accepted to join $user->crew . Please logout and log back in if you cannot see your crew options in the menu.', '$date', '0');");
mysql_query("UPDATE users SET apply='0', crew='$user->crew' WHERE username='$userstuff'");
print "User has been accepted to join your crew <META HTTP-EQUIV='Refresh' CONTENT='2; URL=?action=aplications'>";
}}}

if($acceptall){
while($mail = mysql_fetch_object(mysql_query("SELECT username FROM users WHERE apply='$user->crew'"))){
mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `message`, `date`, `read`) VALUES ('', '$mail->username', 'Crew Auto Message', 'You have been accepted to join $user->crew . Please logout and log back in if you cannot see your crew options in the menu.', '$date', '0');");
mysql_query("UPDATE users SET apply='0', crew='$user->crew' WHERE username='$mail->username'");
}
print"All aplications were accepted <META HTTP-EQUIV='Refresh' CONTENT='1; URL=?action=aplications'>";
}

if($declineall){
while($mail = mysql_fetch_object(mysql_query("SELECT username FROM users WHERE apply='$user->crew'"))){
mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `message`, `date`, `read`) VALUES ('', '$mail->username', 'Crew Auto Message', 'Your aplication to join $user->crew was declined by the boss or underboss.', '$date', '0');");
mysql_query("UPDATE users SET apply='0' WHERE username='$mail->username'");
}
print"All aplications were declined <META HTTP-EQUIV='Refresh' CONTENT='1; URL=?action=aplications'>";
}

if($kick){
$kick_query=mysql_query("SELECT username,crew,apply FROM users WHERE username='$kick' AND crew='$user->crew'");
$fit_hummer_m8=mysql_num_rows($kick_query);

if($fit_hummer_m8 == "0"){
print"User Does Not Exist In The Database";
}else{
if($kick == $crew->boss){
print "You cannot kick the crew boss";
}else{
if($kick == $crew->underboss){
print "You cannot kick the crew underboss";
}else{
mysql_query("UPDATE users SET crew='0' WHERE username='$kick'");
mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `message`, `date`, `read`) VALUES ('', '$kick', 'Crew Auto Message', 'You have been kicked from your crew by $username.', '$date', '0');");
print"User Kicked From The Crew <META HTTP-EQUIV='Refresh' CONTENT='2; URL=?action=members'>";
}}}}

if(($rec)){
if($rec == "nup"){
mysql_query("UPDATE crews SET recruiting='0' WHERE name='$crew->name'");
}else{
mysql_query("UPDATE crews SET recruiting='1' WHERE name='$crew->name'");
}
print"Recruiting Status Updated <META HTTP-EQUIV='Refresh' CONTENT='1; URL=?action=aplications'>";
}

if($crew->recruiting == "1"){
$status_crew="Recruiting";
}else{
$status_crew="Not Recruiting";
}

if(($new_underboss)){
$underboss=mysql_query("SELECT username,status FROM users WHERE username='$new_underboss' AND status='Alive' AND crew='$crew->name'");
$num_underboss=mysql_num_rows($underboss);
if($new_underboss == $crew->boss){
print"That user is already the crew boss.";
}else{
if($new_underboss == $crew->underboss){
print "That user is already the crew underboss.";
}else{
if($num_underboss != "0"){
mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `message`, `date`, `read`) VALUES ('', '$crew->underboss', 'Crew Auto Message', 'Your underboss status has been removed by $crew->boss.', '$date', '0');");
mysql_query("UPDATE crews SET underboss='$new_underboss' WHERE id='$crew->id'");
mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `message`, `date`, `read`) VALUES ('', '$crew->underboss', 'Crew Auto Message', 'You have been made into crew underboss for your crew.', '$date', '0');");
print "New Underboss Set.";
}else{
print"No Such User. Please try again. <br>
Note: User must already be in your crew for you to make them underboss.";
}
}}}

if($ho_boss){
$new_boss=mysql_query("SELECT username,status FROM users WHERE username='$ho_boss' AND status='Alive' AND crew='$crew->name'");
$num_boss=mysql_num_rows($new_boss);
if($ho_boss == $crew->boss){
print"That user is already the crew boss.";
}else{
if($ho_boss == $crew->underboss){
mysql_query("UPDATE crews SET boss='$ho_boss' WHERE id='$crew->id'");
mysql_query("UPDATE crews SET underboss='0' WHERE id='$crew->id'");
mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `message`, `date`, `read`) VALUES ('', '$ho_boss', 'Crew Auto Message', 'You have been made into crew boss for your crew. It is recommmended you set a new crew boss as soon as possible.', '$date', '0');");
print "You handed over control of the crew to your underboss.";
}else{
if($num_boss != "0"){
mysql_query("UPDATE crews SET boss='$ho_boss' WHERE id='$crew->id'");
mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `message`, `date`, `read`) VALUES ('', '$ho_boss', 'Crew Auto Message', 'You have been made into crew boss for your crew.', '$date', '0');");
print "New Boss Set.";
}else{
print"No Such User. Please try again. <br>
Note: User must already be in your crew for you to make them boss.";
}}}}

if($ho_underboss){
$new_underboss=mysql_query("SELECT username,status FROM users WHERE username='$ho_boss' AND status='Alive' AND crew='$crew->name'");
$num_underboss=mysql_num_rows($new_underboss);
if($ho_underboss == $crew->underboss){
print"That user is already the crew Underboss.";
}else{
if($ho_underboss == $crew->boss){
print "You cant hand over control to the crew boss. You must find yourself a replacement.";
}else{
if($num_underboss != "0"){
mysql_query("UPDATE crews SET underboss='$ho_underboss' WHERE id='$crew->id'");
mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `message`, `date`, `read`) VALUES ('', '$ho_underboss', 'Crew Auto Message', 'You have been made into crew underboss for your crew.', '$date', '0');");
print "New Underboss Set.";
}else{
print"No Such User. Please try again. <br>
Note: User must already be in your crew for you to make them Underboss.";
}}}}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../stylesheets/online.css" rel="stylesheet" type="text/css" />
</head>
<? if((!$action) || $action == "aplications"){ ?>
<body>
<table width="730" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr bgcolor="#999999" class="header">
    <th width="132" scope="col"><a href="?action=aplications">Aplications</a></th>
    <th width="132" scope="col"><a href="?action=members">Members</a></th>
    <th width="132" scope="col"><a href="crew_profile.php">Profile</a></th>
    <th width="156" scope="col"><a href="crew_front.php">Banks</a></th>
    <th width="156" scope="col"><a href="?action=staff">Staff </a></th>
  </tr>
</table>
<p>&nbsp;</p>
<form id="form2" name="form2" method="post" action="">
  <div align="center">
    <table width="343" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
      <tr class="header">
        <th width="335" background="includes/grad.jpg" scope="col">Recruiting Status: <? print"$status_crew"; ?></th>
      </tr>
      <tr>
        <th bgcolor="#999999" scope="row"><select name="rec" class="button">
          <option value="1" selected="selected">Recruiting</option>
          <option value="nup">Not Recruiting</option>
        </select>
        </th>
      </tr>
      <tr>
        <th bgcolor="#999999" scope="row"><input name="Submit" type="submit" class="button" value="Submit" /></th>
      </tr>
  </table>
</form>
    <p>&nbsp;</p><form id="form1" name="form1" method="post" action="">
    <table width="300" border="1" align="center" cellspacing="0" bordercolor="#000000">
      <tr bgcolor="#999999">
        <th scope="col"><input name="acceptall" type="submit" class="button" value="Accept All" /></th>
        <th scope="col"><input name="declineall" type="submit" class="button" value="Decline All" /></th>
      </tr>
    </table>
    </form>
<table width="668" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr bordercolor="#000000" class="header">
    <th colspan="4" background="includes/grad.jpg" scope="col">Applications</th>
  </tr>
  <tr bgcolor="#999999" class="top_ov_d_table">
    <th width="141" height="16" scope="row"><div align="center">Username</div></th>
    <td width="164"><div align="center">Rank</div></td>
    <td width="190"><div align="center">Accept Application </div></td>
    <td width="155"><div align="center">Decline Application </div></td>
  </tr>
  <? if($app_num != "0"){ ?>
  <? while($app = mysql_fetch_object($apps)){ 
  
  $reg=$app->regged;
$time=time();
$sum=$time-$reg;
if($sum < 86400){
$days=1;
}else{
$days=round(($sum)/(86400));
}
?>
  <tr bgcolor="#999999">
    <th scope="row"><div align="left"><? print"$app->username"; ?></div></th>
    <td><div align="left"><? print"$app->rank"; ?></div></td>
    <td><div align="left"><? print"<a href='?apply=accept&userstuff=$app->username'>Accept</a>"; ?></div></td>
    <td><div align="left"><? print"<a href='?apply=decline&userstuff=$app->username'>Decline</a>"; ?></div></td>
  </tr>
  <? } ?>
  <? }else{ ?>
    <tr bgcolor="#999999">
    <th colspan="4" scope="row">No Applications</th>
  </tr>
  <? } ?>
</table>

<? //// END OV APLICATIONS
} ?>

<? if($action == "members"){ ?>

<table width="706" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr bgcolor="#999999" class="header">
    <th width="132" scope="col"><a href="?action=aplications">Aplications</a></th>
    <th width="132" scope="col"><a href="?action=members">Members</a></th>
    <th width="132" scope="col"><a href="crew_profile.php">Profile</a></th>
    <th width="132" scope="col"><a href="crewowner.php">Banks</a></th>
    <th width="156" scope="col"><a href="?action=staff">Staff </a></th>
  </tr>
</table>
<p>&nbsp;</p>
<table width="331" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr class="header" background="includes/grad.jpg">
    <th colspan="2" scope="col">Members</th>
  </tr>

  <tr bgcolor="#999999">
    <th width="225" class="top_ov_d_table" scope="row"><div align="center">Username</div></th>
    <td width="94" class="top_ov_d_table"><div align="center">Kick</div></td>
  </tr> 
  <? if($num_members != "0"){ ?>
   <? while($mem = mysql_fetch_object($members)){ ?>
  <tr bgcolor="#999999">
    <th class="background" scope="row"><div align="left"><? print"$mem->username"; ?></div></th>
    <td class="background"><div align="left"><? print"<a href='?action=members&kick=$mem->username'>Kick</a>"; ?></div></td>
  </tr>
 <? } 
 }else{?>
  <tr bgcolor="#999999">
    <th colspan="2" scope="row">No Members </th>
  </tr>
  <? } ?>
</table>

<? ///// END OV MEMEBERS 
} ?>

<? if($action == "banks"){ ?>

<table width="706" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr bgcolor="#999999" class="header">
    <th width="132" scope="col"><a href="?action=aplications">Aplications</a></th>
    <th width="132" scope="col"><a href="?action=members">Members</a></th>
    <th width="132" scope="col"><a href="crewowner.php">Banks</a></th>
    <th width="132" scope="col"><a href="crew_profile.php">Profile</a></th>
    <th width="156" scope="col"><a href="?action=staff">Staff </a></th>
  </tr>
</table>

<? ///// END OV BANKS 
} ?>

<? if($action == "staff"){ ?>

<table width="706" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr bgcolor="#999999" class="header">
    <th width="132" scope="col"><a href="?action=aplications">Aplications</a></th>
    <th width="132" scope="col"><a href="?action=members">Members</a></th>
    <th width="132" scope="col"><a href="crewowner.php">Banks</a></th>
    <th width="132" scope="col"><a href="crew_profile.php">Profile</a></th>
    <th width="156" scope="col"><a href="?action=staff">Staff </a></th>
  </tr>
</table>
<p>&nbsp;</p><form id="form3" name="form3" method="post" action="">
<table width="560" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr class="header">
    <th background="includes/grad.jpg" scope="col">Crew Staff Settings </th>
  </tr>
    <? if($crew->boss == $username){ ?>
  <tr>
    <th bgcolor="#999999" scope="row">
      New Underboss:
      <input name="new_underboss" type="text" class="button" />          </th>
  </tr>
  <tr>
    <th bgcolor="#999999" scope="row">Hand Over Boss Status: 
      <input name="ho_boss" type="text" class="button" /></th>
  </tr>
  <? } ?>
  <? if($crew->underboss == $username){ ?>
  <tr>
    <th bgcolor="#999999" scope="row">Hand Over Underboss Status: 
      <input name="ho_underboss" type="text" class="button" /></th>
  </tr>
  <? } ?>
  <tr>
    <th bgcolor="#999999" scope="row"><input name="Submit2" type="submit" class="button" value="Update" /></th>
  </tr>
</table>
</form>
</body>
<? ///// END OV STAFF 
} ?>

<? } ?>
<? include 'includes/footer.php'; ?>