<?php
session_start(); 
include_once "includes/db_connect.php";
include_once "includes/functions.php";

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
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<table width="100%" border="0" cellpadding="0" cellspacing="3">
  <!--DWLayoutTable-->
   
  <?php 
  
$locations = array('England', 'Japan', 'Colombia', 'Usa', 'South Africa', 'Mexico');
$i =0;
$count = count($locations);
while ($i < $count){
if ($i == "2"){ echo "<tr>"; }
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
    <td >
	<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline>
        <!--DWLayoutTable-->
        <tr > 
          <td background="includes/grad.jpg" colspan="3" valign="top"> <div align="center"><?php echo "<center>$locations[$i]</center>"; ?></div></td>
        </tr>
        <tr bgcolor=white> 
          <td width="304" height="9" valign="top" class=tip><div align="center">Buisness</div></td>
          <td width="184" class=tip><div align="center">Owner </div></td>
          <td width="233" class=tip><div align="center">Max bet </div></td>
        </tr>
        <tr> 
          <td height="10" valign="top">Airport</td>
          <td width="184"> 
            <?php if ($airport->owner == "0"){ echo "No owner-<a href='?grab=Airport&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$airport->owner'>$airport->owner</a>"; } ?>
          </td>
          <td width="233"><!--DWLayoutEmptyCell-->&nbsp;</td>
        </tr>
        <tr> 
          <td height="19" valign="top">Bank</td>
          <td width="184"> 
            <?php if ($bank->owner == "0"){ echo "No owner-<a href='?grab=Bank&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$bank->owner'>$bank->owner</a>";  } ?>
          </td>
          <td width="233"><!--DWLayoutEmptyCell-->&nbsp;</td>
        </tr>
        <tr> 
          <td height="19" valign="top">Resturant</td>
          <td width="184"> 
            <?php if ($rest->owner == "0"){ echo "No owner-<a href='?grab=Restu&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$rest->owner'>$rest->owner</a>";  } ?>
          </td>
          <td width="233"><!--DWLayoutEmptyCell-->&nbsp;</td>
        </tr>
        <tr> 
          <td height="19" valign="top">Dealership</td>
          <td width="184"> 
            <?php if ($dealer->owner == "0"){ echo "No owner-<a href='?grab=Dealership&location=$locations[$i]'>Grab it</a></td>"; }else{ echo "<a href='profile.php?viewuser=$dealer->owner'>$dealer->owner</a>";} ?>
          </td>
          <td width="233"><!--DWLayoutEmptyCell-->&nbsp;</td>
        </tr>
        <tr> 
          <td height="19" valign="top">Slots</td>
          <td width="184"> 
            <?php if ($casino_slots->owner == "0"){ echo "No owner-<a href='?grab=Casinos&location=$locations[$i]&casino=Slots'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$casino_slots->owner'>$casino_slots->owner</a>";  } ?>
          </td>
          <td width="233"><? echo "£".makecomma($casino_slots->max).""; ?></td>
        </tr>
        <tr> 
          <td height="19" valign="top">RPS</td>
          <td width="184"> 
            <?php if ($casino_rps->owner == "0"){ echo "No owner-<a href='?grab=Casinos&location=$locations[$i]&casino=RPS'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$casino_rps->owner'>$casino_rps->owner</a>";  } ?>
          </td>
          <td width="233"> <? echo "£".makecomma($casino_rps->max).""; ?></td>
        </tr>
        <tr> 
          <td height="19" valign="top">Race track</td>
          <td width="184"> 
            <?php if ($casino_race->owner == "0"){ echo "No owner-<a href='?grab=Casinos&location=$locations[$i]&casino=Race'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$casino_race->owner'>$casino_race->owner</a>";  } ?>
          </td>
          <td width="233"> <? echo "£".makecomma($casino_race->max).""; ?></td>
        </tr>
        <tr> 
          <td height="19" valign="top">Bar</td>
          <td width="184"> 
            <?php if ($bar->owner == "0"){ echo "No owner-<a href='?grab=Bar&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$bar->owner'>$bar->owner</a>";  } ?>
          </td>
          <td width="233"><!--DWLayoutEmptyCell-->&nbsp;</td>
        </tr>
        <tr> 
          <td width="304" height="19" valign="top">Underground</td>
          <td width="184"> 
            <?php if ($shop->owner == "0"){ echo "No owner-<a href='?grab=Shop&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$shop->owner'>$shop->owner</a>";  } ?>
          </td>
          <td width="233"><!--DWLayoutEmptyCell-->&nbsp;</td>
        </tr>
        <tr>
          <td height="19" valign="top">Fight Zone </td>
          <td><?php if ($casino_race->owner == "0"){ echo "No owner-<a href='?grab=Casinos&location=$locations[$i]&casino=Race'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$casino_race->owner'>$casino_race->owner</a>";  } ?></td>
          <td><? echo "&pound;".makecomma($casino_race->max).""; ?></td>
        </tr>
        <tr> 
          <td height="19" valign="top">Bullet Factory </td>
          <td><?php if ($ammo_hut->owner == "0"){ echo "No owner-<a href='?grab=Ammo&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$ammo_hut->owner'>$ammo_hut->owner</a>"; } ?></td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
	  
	  <?php 
	 if ($i == "3"){ echo "</tr>"; } 
	  
	  $i++; } ?>

</table>
<p>
<p>&nbsp; </p>
<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline>
  <!--DWLayoutTable-->
  <tr >
    <td background="includes/grad.jpg" colspan="11" valign="top"><div align="center">Countrys</div></td>
  </tr>
  <tr bgcolor=white>
    <td width="123" height="9" valign="top" class=tip>Country</td>
    <td width="47" height="9" valign="top" class=tip><div align="center">Airport</div></td>
    <td width="39" valign="top" class=tip>Bank</td>
    <td width="64" valign="top" class=tip>Restaraunt</td>
    <td width="69" valign="top" class=tip>Dealership</td>
    <td width="59" valign="top" class=tip>Slots</td>
    <td width="16" valign="top" class=tip>R P S </td>
    <td width="81" valign="top" class=tip>Race Track </td>
    <td width="33" valign="top" class=tip>Bar</td>
    <td width="98" valign="top" class=tip>Underground</td>
    <td width="81" height="9" valign="top" class=tip>Bullet Factory </td>
  </tr>
  <tr>
    <td valign="top"><?php echo "<center>$locations[$i]</center>"; ?></td>
    <td valign="top"><?php if ($airport->owner == "0"){ echo "No owner-<a href='?grab=Airport&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$airport->owner'>$airport->owner</a>"; } ?>
&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><?php echo "<center>$locations[$i]</center>"; ?></td>
    <td valign="top"><?php if ($airport->owner == "0"){ echo "No owner-<a href='?grab=Airport&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$airport->owner'>$airport->owner</a>"; } ?></td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><?php echo "<center>$locations[$i]</center>"; ?></td>
    <td valign="top"><?php if ($airport->owner == "0"){ echo "No owner-<a href='?grab=Airport&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$airport->owner'>$airport->owner</a>"; } ?></td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><?php echo "<center>$locations[$i]</center>"; ?></td>
    <td valign="top"><?php if ($airport->owner == "0"){ echo "No owner-<a href='?grab=Airport&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$airport->owner'>$airport->owner</a>"; } ?></td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><?php echo "<center>$locations[$i]</center>"; ?></td>
    <td valign="top"><?php if ($airport->owner == "0"){ echo "No owner-<a href='?grab=Airport&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$airport->owner'>$airport->owner</a>"; } ?></td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><?php echo "<center>$locations[$i]</center>"; ?></td>
    <td valign="top"><?php if ($airport->owner == "0"){ echo "No owner-<a href='?grab=Airport&location=$locations[$i]'>Grab it</a>"; }else{ echo "<a href='profile.php?viewuser=$airport->owner'>$airport->owner</a>"; } ?></td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
</table>
</body>
</html>
