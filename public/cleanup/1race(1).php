<?
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
////////////////////////////////////////////
//// CODED BY BEN BLAKELEY 05 June 2006 \\\\
//// Please do not remove this commeant. \\\\
////////////////////////////////////////////

$fetch=mysql_fetch_object(mysql_query("SELECT location,money FROM users WHERE username='$username'"));

$race=mysql_fetch_object(mysql_query("SELECT * FROM race WHERE location='$fetch->location'"));

//// bet interface 
$col=$_POST['radiobutton'];
$bet=$_POST['bet'];
$maxbet=$race->max;

//// owner interface
$max=$_POST['max'];
$give=$_POST['give'];
$drop=$_POST['drop'];

//// other 
$action=$_GET['action'];





if(($col) && ($bet)){
$number=rand(1,300);

if($bet > $fetch->money || $bet > $maxbet){ ?>
<div align="center">
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center">Outcome </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFCC00"><div align="center"><? print "You dont have that much money to bet or you have exceded the max bet!"; ?>. </div></td>
    </tr>
</table>
</div>
<?
}else{
mysql_query("UPDATE users SET money=money-'$bet' WHERE username='$username'");
mysql_query("UPDATE users SET money=money+'$bet' WHERE username='$race->owner'");
mysql_query("UPDATE race SET profit=profit+'$bet' WHERE location='$race->location'");
if($col == "red"){
if($number >= 0 && $number <= 150){
$win=$bet*2;
$win_cul="red";
}
}elseif($col == "blue"){
if($number >= 150 && $number <= 200){
$win=$bet*4;
$win_cul="blue";
}
}elseif($col == "green"){
if($number >= 200 && $number <= 245){
$win=$bet*6;
$win_cul="green";
}
}elseif($col == "yellow"){
if($number >= 245 && $number <= 285){
$win=$bet*8;
$win_cul="yellow";
}
}elseif($col == "purple"){
if($number >= 285 && $number <= 300){
$win=$bet*10;
$win_cul="purple";
}
}
if($col == $win_cul){
mysql_query("UPDATE users SET money=money+'$win' WHERE username='$username'");
mysql_query("UPDATE users SET money=money-'$win' WHERE username='$race->owner"); 
mysql_query("UPDATE race SET profit=profit-'$win' WHERE location='$race->location'");
?>
<div align="center">
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center">Outcome </div></td>
  </tr>
  <tr>
    <td bgcolor="#00FF00"><div align="center"><? print "You won, with $col. You won £$win"; ?>. </div></td>
    </tr>
</table>
</div>
<?
}else{ ?>
<div align="center">
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center">Outcome </div></td>
  </tr>
  <tr>
    <td bgcolor="#FF0000"><div align="center"><? print "You lost. Try again next time !"; ?>. </div></td>
    </tr>
</table>
</div>
<?
}

}

}elseif($col){ ?> <div align="center">
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center">Outcome </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFCC00"><div align="center"><? print "Please enter an amount to bet !"; ?>. </div></td>
    </tr>
</table>
</div>

<?
}elseif($bet){ ?> <div align="center">
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center">Outcome </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFCC00"><div align="center"><? print "Please select a colour to bet on !"; ?>. </div></td>
    </tr>
</table>
</div>
<?
}

if($max){
if(ereg('[^0-9]',$max)){
print "Invalid max bet.";
}else{
mysql_query("UPDATE race SET max='$max' WHERE owner='$username' AND location='$fetch->location'");
print "Max bet updated";
}}

if($give){
$query=mysql_query("SELECT username FROM users WHERE username='$give'");
$nums=mysql_num_rows($query);
if($nums == "1"){
mysql_query("UPDATE race SET owner='$give' WHERE owner='$username' AND location='$fetch->location'");
mysql_query("UPDATE race SET max='100' WHERE owner='$give' AND location='$fetch->location'");
print "Race Track given to $give";
}else{
print "That user does not exist";
}}

if($drop == "yes"){
mysql_query("UPDATE race SET owner='0' WHERE owner='$username' AND location='$fetch->location'");
print "Race Track Dropped";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../stylesheets/online.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style3 {color: #FF0000}
.style4 {color: #000000}
-->
</style>
</head>

<body>
<? if($race->owner != "0"){ ?>
<form id="form1" name="form1" method="post" action="">
<table width="352" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr>
    <td colspan="3" background="includes/grad.jpg"><div align="center">Race Track </div></td>
  </tr>
  <tr bgcolor="#999999" class="header">
    <th colspan="2" scope="row">Colour</th>
    <th width="42" scope="row">Odds</th>
  </tr>
  <tr bgcolor="#FF0000">
    <th width="28" bgcolor="#999999" scope="row"><input name="radiobutton" type="radio" value="red" /></th>
    <th width="266" bgcolor="#FF0000" scope="row">Red</th>
    <th bgcolor="#999999" scope="row">1:2</th>
  </tr>
  <tr bgcolor="#0000FF">
    <th bgcolor="#999999" scope="row"><input name="radiobutton" type="radio" value="blue" /></th>
    <th scope="row">Blue</th>
    <th bgcolor="#999999" scope="row">1:4</th>
  </tr>
  <tr bgcolor="#00FF00">
    <th bgcolor="#999999" scope="row"><input name="radiobutton" type="radio" value="green" /></th>
    <th bgcolor="#00FF00" scope="row">Green</th>
    <th bgcolor="#999999" scope="row">1:6</th>
  </tr>
  <tr bgcolor="#FFFF00">
    <th bgcolor="#999999" scope="row"><input name="radiobutton" type="radio" value="yellow" /></th>
    <th scope="row">Yellow</th>
    <th bgcolor="#999999" scope="row">1:8</th>
  </tr>
  <tr bgcolor="#FF00FF">
    <th bgcolor="#999999" scope="row"><input name="radiobutton" type="radio" value="purple" /></th>
    <th scope="row">Purple</th>
    <th bgcolor="#999999" scope="row">1:10</th>
  </tr>
  <tr bgcolor="#999999" class="background">
    <th colspan="2" scope="row">Amount: 
      <input name="bet" type="text" class="button" /></th>
	    <th scope="row"><input name="Submit" type="submit" class="button" value="Bet" /></th>
  </tr>
</table>
</form>
<? }else{ ?>
This race track has no owner click <a href="?action=takeover">here</a> to take it over
<? } ?>
<? if($username == $race->owner){ ?>
<br />
<form id="form2" name="form2" method="post" action="">
<table width="300" border="1" align="center" bordercolor="#000000" class="background">
  <tr class="header">
    <th background="includes/grad.jpg" scope="col">Race Track Control Panel </th>
  </tr>
  <tr>
    <th bgcolor="#999999" scope="row"><span class="style3">Warning: <span class="style4">when sending casino to someone it is CaSe SeNsItIve! </span></span></th>
  </tr>
  <tr>
    <th bgcolor="#999999" scope="row">Max bet: 
      <input name="max" type="text" class="button" /></th>
  </tr>
  <tr>
    <th bgcolor="#999999" scope="row">Give to: 
      <input name="give" type="text" class="button" /></th>
  </tr>
  <tr>
    <th bgcolor="#999999" scope="row">Drop: 
      <select name="drop" class="button">
        <option value="no" selected="selected">Dont Drop</option>
        <option value="yes">Drop</option>
      </select>      </th>
  </tr>
  <tr>
    <th bgcolor="#999999" scope="row">Profit: £<? print"".makecomma($race->profit).""; ?></th>
  </tr>
  <tr>
    <th bgcolor="#999999" scope="row"><input name="Submit2" type="submit" class="button" value="Submit" /></th>
  </tr>
</table>
</form>
<? } ?> 
<p align="center">&nbsp;</p><div align="center">
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center">Max Bet </div></td>
  </tr>
  <tr>
    <td bgcolor="#999999"><div align="center">The max bet is currently set at &pound;<? print"$race->max"; ?>. </div></td>
    </tr>
</table>
<p>&nbsp;</p>
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center">Owner</div></td>
  </tr>
  <tr>
    <td bgcolor="#999999"><div align="center">The casino is owned by <? print"$race->owner"; ?>. </div></td>
  </tr>
</table>
<p>&nbsp;</p>
</div>
<p align="center">&nbsp;</p>
<div align="center"></div>
</body>
</html>
<?php include_once"includes/footer.php"; ?>