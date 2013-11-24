<?
session_start();
include_once "includes/db_connect.php";
include_once"includes/functions.php";
logincheck();

$apply=$_POST['apply'];
$leave=$_POST['leave'];

$user=mysql_fetch_object(mysql_query("SELECT username,crew FROM users WHERE username='$username'"));

$crew=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$user->crew'"));

$crews_query=mysql_query("SELECT * FROM crews ORDER by id ASC");

$opt=mysql_query("SELECT name FROM crews WHERE recruiting='1' ORDER by id DESC");

if($user->crew == "0"){
$name="None";
$boss="None";
$underboss="None";
}

if($crew->name == "0"){
$name="None";
}else{
$name=$crew->name;
}
if($crew->boss == "0"){
$boss="None";
}else{
$boss=$crew->boss;
}
if($crew->underboss == "0"){
$underboss="None";
}else{
$underboss=$crew->underboss;
}

if(($apply) && $user->crew == "0"){
mysql_query("UPDATE users SET apply='$apply' WHERE username='$username'");
print "Application submitted";
}elseif(($apply) && $user->crew != "0"){
print "You must leave your current crew before you can apply for another.";
}

if($leave){
if($crew->boss == $username){
print"You must hand over control of your crew before you can leave.";
}else{
if($crew->underboss == $username){
mysql_query("UPDATE crews SET underboss='0' WHERE crew='$user->crew'");
mysql_query("UPDATE users SET crew='0' AND apply='0' WHERE username='$username'");
print"You left your crew";
}else{
mysql_query("UPDATE users SET crew='0' AND apply='0' WHERE username='$username'");
print"You left your crew";
}}}
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/in.css" rel="stylesheet" type="text/css">


</head>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<table width="300" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr class="header">
    <th background="includes/grad.jpg" scope="col"><span class="style3">Crew Status </span></th>
  </tr>
  <tr>
 <b>   <th bgcolor="#666666" scope="row"><p class="style3">Current Crew: <? print"$name"; ?></p>      <p class="style3">Boss: <? print"$boss"; ?></p>      <p class="style3">Underboss: <? print"$underboss"; ?></p></b>
      <p class="style3"><a href="crew_cp.php">Crew Bosses And Underbosses Click here for the controls for crews </a></p></th>
  </tr>
  <tr>
    <th bgcolor="#666666" scope="row"><form action="" method="post" name="form2" class="style3" id="form2">
	        <input name="leave" type="hidden" value="leave" />
      <input name="Submit2" type="submit" class="button" value="Leave Crew" />
    </form></th>
  </tr>
</table>
<table width="733" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr class="header">
    <th colspan="4" background="includes/grad.jpg" scope="col"><span class="style3">Crews</span></th>
  </tr>
  <tr bgcolor="#999999">
    <th bgcolor="#666666" class="background" scope="row"><span class="style3"><? print "<a href='crewprofile.php?viewcrew=$crews->name'>$crews->name"; ?></span></th>
        <? 
$biatch = mysql_query("SELECT * FROM crews ORDER BY id");
while($fucktard = mysql_fetch_object($biatch)){

echo "<tr><td class=news><a href='crewprofile.php?viewcrew=$fucktard->name'>$fucktard->name</a></td>";


}

?>
<p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="">
<table width="300" border="1" align="center" cellspacing="0" bordercolor="#000000" bgcolor="#999999" class="background">
  <tr class="header">
    <th background="includes/grad.jpg" scope="col"><span class="style3">Crew Aplications </span></th>
  </tr>
  <tr>
    <th bgcolor="#666666" scope="row"><span class="style3">Crew: 
          <select name="apply" class="button">
            <? while($option = mysql_fetch_object($opt)){ ?>
            <option value="<? print"$option->name"; ?>"><? print"$option->name"; ?></option>
            <? } ?>
          </select>
    </span></th>
  </tr>
  <tr>
    <th bgcolor="#666666" scope="row"><input name="Submit" type="submit" class="button " value="Apply" /></th>
  </tr>
</table>
      </form>
<body>
<table width="300" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr class="header">
    <th background="includes/grad.jpg" scope="col"><span class="style3">Donate </span></th>
  </tr>
  <tr>
 <b>   <th bgcolor="#666666" scope="row">
      <p class="style3"><a href="crew_front.php">Donate To Your Crew </a></p></th>
  </tr>
