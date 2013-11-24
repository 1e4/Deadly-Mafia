<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
echo "$style";
$username=$_SESSION['username'];
$mysql=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($mysql);

$username=$_SESSION['username'];
$grab = strip_tags($_GET['grab']);
$location=strip_tags($_GET['location']);

if (($grab == "Ammo") || ($grab == "Airport") || ($grab == "Bank") || ($grab == "Casinos") || ($grab == "Dealership") || ($grab == "Restu")|| ($grab == "Bar")|| ($grab == "Shop")){


if ($grab == "Ammo"){

$check = mysql_query("SELECT * FROM bf WHERE owner= '0' AND location='$fetch->location'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){

mysql_query("UPDATE bf SET owner='$username', profit='0' WHERE location='$fetch->location'");
echo "You got the Ammo hut!";
}}}

elseif ($grab == "Airport"){

$check = mysql_query("SELECT * FROM airport WHERE owner= '0' AND location='$fetch->location'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){

mysql_query("UPDATE airport SET owner='$username', profit='0-0-0-0-0-0' WHERE location='$fetch->location'");
echo "You got the Airport!";
}}}

elseif ($grab == "Bank"){

$check = mysql_query("SELECT * FROM bank WHERE owner= '0' AND location='$fetch->location'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){

mysql_query("UPDATE bank SET owner='$username', profit='0' WHERE location='$fetch->location'");
echo "You got the bank!";
}}}
elseif ($grab == "Shop"){

$check = mysql_query("SELECT * FROM shop WHERE owner= '0' AND location='$fetch->location'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){

mysql_query("UPDATE shop SET owner='$username', profit='0' WHERE location='$fetch->location'");
echo "You got the shop!";
}}}

////START CASINOS


elseif ($grab == "Casinos"){
$the_get=$_GET['casino'];

if ($the_get == "Slots" || $the_get == "RPS" || $the_get=="Race"){

$check = mysql_query("SELECT * FROM casinos WHERE owner= '0' AND location='$fetch->location' AND casino='$the_get'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){

mysql_query("UPDATE casinos SET owner='$username', profit='0' WHERE location='$fetch->location' AND casino='$the_get'");
echo "You got the casino!";
}}}}





//////END CASINOS

elseif ($grab == "Dealership"){
$check = mysql_query("SELECT * FROM dealership WHERE owner= '0' AND location='$fetch->location'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){

mysql_query("UPDATE dealership SET owner='$username', profit='0' WHERE location='$fetch->location'");
echo "You got the dealership!";
}}}


elseif ($grab == "Restu"){

$check = mysql_query("SELECT * FROM rest WHERE owner= '0' AND location='$fetch->location'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){

mysql_query("UPDATE rest SET owner='$username', profit='0' WHERE location='$fetch->location'");
echo "You got the Restaurant!";
}}}

elseif ($grab == "Bar"){
$check = mysql_query("SELECT * FROM bar WHERE owner= '0' AND location='$fetch->location'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){

mysql_query("UPDATE bar SET owner='$username', profit='0' WHERE location='$fetch->location'");
echo "You got the Bar!";
}}


}


}
?>






<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php  $locations = array('England', 'Japan', 'Colombia', 'Usa', 'South Africa', 'Mexico');
$i =0;
$count = count($locations);
while ($i < $count){

$airport = mysql_fetch_object(mysql_query("SELECT * FROM airport WHERE location='$locations[$i]'"));
$ammo_hut = mysql_fetch_object(mysql_query("SELECT * FROM bf WHERE location='$locations[$i]'"));
$bank = mysql_fetch_object(mysql_query("SELECT * FROM bank WHERE location='$locations[$i]'"));
$people_in = mysql_num_rows(mysql_query("SELECT * FROM users WHERE location='$locations[$i]'"));
////$resturant = mysql_fetch_object(mysql_query("SELECT * FROM restur WHERE location='$locations[$i]'"));
$dealer=mysql_fetch_object(mysql_query("SELECT * FROM dealership WHERE location='$locations[$i]'"));
$rest=mysql_fetch_object(mysql_query("SELECT * FROM rest WHERE location='$locations[$i]'"));
$casino_slots = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$locations[$i]' AND casino='Slots'"));
$rest=mysql_fetch_object(mysql_query("SELECT * FROM rest WHERE location='$locations[$i]'"));
$casino_rps = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$locations[$i]' AND casino='RPS'"));
$casino_race = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$locations[$i]' AND casino='Race'"));
$bar = mysql_fetch_object(mysql_query("SELECT * FROM bar WHERE location='$locations[$i]'"));
$shop = mysql_fetch_object(mysql_query("SELECT * FROM shop WHERE location='$locations[$i]'"));


?>

<table width="1090" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td height="19" colspan="6" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="139">&nbsp;</td>
  </tr>
  <tr>
    <td width="159" height="19" valign="top"><div align="center">Countrys</div></td>
    <td width="161" valign="top"><div align="center">Airport owner</div></td>
    <td width="148" valign="top"><div align="center">Ammo hut owner</div></td>
    <td width="161" valign="top"><div align="center">Bank owner</div></td>
    <td width="161" valign="top"><div align="center">Resturant owner</div></td>
    <td width="161" valign="top"><div align="center">Dealership owner</div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="19" valign="top">England</td>
    <td valign="top"><?php if ($airport->owner == "0"){ echo "No owner-<a href='?grab=Airport&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$airport->owner'>$airport->owner</a>"; } ?></td>
    <td valign="top"><?php if ($ammo_hut->owner == "0"){ echo "No owner-<a href='?grab=Ammo&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$ammo_hut->owner'>$ammo_hut->owner</a>"; } ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="19" valign="top">Japan</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="19" valign="top">Colombia</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="19" valign="top">Usa</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="19" valign="top">South Africa</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="19" valign="top">Mexico</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="263">&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

<?php $i++; } ?>
</body>
</html>
