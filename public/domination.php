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

if (($grab == "Ammo") || ($grab == "Airport") || ($grab == "bj") || ($grab == "Casinos") || ($grab == "Dealership") || ($grab == "bjh")|| ($grab == "race")|| ($grab == "Shop")){


if ($grab == "Ammo"){

$check = mysql_query("SELECT * FROM bf WHERE owner= '0' AND location='$fetch->location'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){
$cost="10000000";

if ($cost > $fetch->money){
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="red"><div align="center"><font color="#000000"><? echo "You need £10,000,000 To pick up a Bullet Factory";  ?></font></div></td>
    </tr>
  </table>
</div>
<?

}else{
mysql_query("UPDATE bf SET owner='$username', profit='0' WHERE location='$fetch->location'");
mysql_query("UPDATE users SET money=money-10000000 WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Success!</div></td>
    </tr>
    <tr>
      <td bgcolor="lime"><div align="center"><font color="#000000"><? echo "You got the Bullet Factory!";  ?></font></div></td>
    </tr>
  </table>
</div>
<?
}}}}

elseif ($grab == "Airport"){

$check = mysql_query("SELECT * FROM airport WHERE owner= '0' AND location='$fetch->location'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){
$cost="3,5000,000";

if ($cost > $fetch->money){
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="red"><div align="center"><font color="#000000"><? echo "You need £3,500,000 to pick up an Airport";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?
}else{
mysql_query("UPDATE airport SET owner='$username', profit='0-0-0-0-0-0' WHERE location='$fetch->location'");
mysql_query("UPDATE users SET money=money-3500000 WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Success!</div></td>
    </tr>
    <tr>
      <td bgcolor="lime"><div align="center"><font color="#000000"><? echo "You got the Airport!";  ?></font></div></td>
    </tr>
  </table>
</div>
<?
}}}}

elseif ($grab == "bj"){

$check = mysql_query("SELECT * FROM bj WHERE bjowner= '0' AND country='$fetch->location'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){
$cost="150000";

if ($cost > $fetch->money){
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="red"><div align="center"><font color="#000000"><? echo "You need £150,000 to pick up a Casino";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?
}else{
mysql_query("UPDATE bj SET bjowner='$username', bjearnings='0' WHERE country='$fetch->location'");
mysql_query("UPDATE users SET money=money-150000 WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Success!</div></td>
    </tr>
    <tr>
      <td bgcolor="lime"><div align="center"><font color="#000000"><? echo "You got the casino!";  ?></font></div></td>
    </tr>
  </table>
</div>
<?
}}}}
elseif ($grab == "Shop"){

$check = mysql_query("SELECT * FROM shop WHERE owner= '0' AND location='$fetch->location'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){
$cost="100000";

if ($cost > $fetch->money){
echo "You dont have enough Money";
}else{
mysql_query("UPDATE shop SET owner='$username', profit='0' WHERE location='$fetch->location'");
mysql_query("UPDATE users SET money=money-100000 WHERE username='$username'");

echo "You got the underground!!";
}}}}

////START CASINOS


elseif ($grab == "Casinos"){
$the_get=$_GET['casino'];

if ($the_get == "Slots" || $the_get == "RPS" || $the_get=="Race" || $the_get == "Roulette" || $the_get=="Keno" || $the_get=="Dice"){

$check = mysql_query("SELECT * FROM casinos WHERE owner= '0' AND location='$fetch->location' AND casino='$the_get'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){
$cost="150000";

if ($cost > $fetch->money){
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="red"><div align="center"><font color="#000000"><? echo "You need £150,000 to pick up a casino";  ?></font></div></td>
    </tr>
  </table>
</div>
<?

}else{
mysql_query("UPDATE casinos SET owner='$username', profit='0' WHERE location='$fetch->location' AND casino='$the_get'");
mysql_query("UPDATE users SET money=money-150000 WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Success!</div></td>
    </tr>
    <tr>
      <td bgcolor="lime"><div align="center"><font color="#000000"><? echo "You got the casino!";  ?></font></div></td>
    </tr>
  </table>
</div>
<?
}}}}}





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

elseif ($grab == "race"){
$check = mysql_query("SELECT * FROM race WHERE owner= '0' AND location='$fetch->location'");
$num_rows = mysql_num_rows($check);

if ($num_rows != "0"){

if ($fetch->location == $location){

$cost="150000";

if ($cost > $fetch->money){
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="red"><div align="center"><font color="#000000"><? echo "You need £150,000 to pick up a casino";  ?></font></div></td>
    </tr>
  </table>
</div>
<?
}else{
mysql_query("UPDATE race SET owner='$username', profit='0' WHERE location='$fetch->location'");
mysql_query("UPDATE users SET money=money-150000 WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Success!</div></td>
    </tr>
    <tr>
      <td bgcolor="lime"><div align="center"><font color="#000000"><? echo "You got the casino!";  ?></font></div></td>
    </tr>
  </table>
</div>
<?
}}


}

}
}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/test.css" rel="stylesheet" type="text/css">


</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">

<table width="100%" border="0" cellpadding="0" cellspacing="3">
  <!--DWLayoutTable-->
   
  <?php 
  
$locations = array('London', 'New York', 'Beijing', 'Rome', 'Moscow', 'Bogota');
$i =0;
$count = count($locations);
while ($i < $count){
if ($i == "2"){ echo "<tr>"; }
$airport = mysql_fetch_object(mysql_query("SELECT * FROM airport WHERE location='$locations[$i]'"));
$ammo_hut = mysql_fetch_object(mysql_query("SELECT * FROM bf WHERE location='$locations[$i]'"));
$bj = mysql_fetch_object(mysql_query("SELECT * FROM bj WHERE country='$locations[$i]'"));
$people_in = mysql_num_rows(mysql_query("SELECT * FROM users WHERE location='$locations[$i]'"));
////$resturant = mysql_fetch_object(mysql_query("SELECT * FROM restur WHERE location='$locations[$i]'"));
$dealer=mysql_fetch_object(mysql_query("SELECT * FROM dealership WHERE location='$locations[$i]'"));
$rest=mysql_fetch_object(mysql_query("SELECT * FROM rest WHERE location='$locations[$i]'"));
$casino_slots = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$locations[$i]' AND casino='Slots'"));
$rest=mysql_fetch_object(mysql_query("SELECT * FROM rest WHERE location='$locations[$i]'"));
$casino_rps = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$locations[$i]' AND casino='RPS'"));
$casino_roulette = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$locations[$i]' AND casino='Roulette'"));
$casino_keno = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$locations[$i]' AND casino='Keno'"));
$casino_dice = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$locations[$i]' AND casino='Dice'"));

$race = mysql_fetch_object(mysql_query("SELECT * FROM race WHERE location='$locations[$i]'"));
$shop = mysql_fetch_object(mysql_query("SELECT * FROM shop WHERE location='$locations[$i]'"));

  ?>
    <td >
	<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="000000" class=thinline>
        <!--DWLayoutTable-->
        <tr > 
          <td height="20" colspan="3" valign="top" background="includes/grad.jpg"> <div align="center"><?php echo "<center>$locations[$i]</center>"; ?></div></td>
        </tr>
        <tr bgcolor=#666666> 
          <td width="304" height="9" valign="top" bgcolor="#999999" class=tip><div align="center" class="style9">Property</div></td>
          <td width="184" bgcolor="999999" class=tip><div align="center" class="style9">Owner </div></td>
          <td width="233" bgcolor="999999" class=tip><div align="center" class="style9">Maximum Bet </div></td>
        </tr>
        <tr bgcolor="#999999"> 
          <td height="10" valign="top" bgcolor="999999"><span class="style3">Airport</span></td>
          <td width="184" bgcolor="999999"> 
            <span class="style3">
            <?php if ($airport->owner == "0"){ echo "<a href='?grab=Airport&location=$locations[$i]'>No owner Pick Up!</a>"; }else{ echo "<a href='profile.php?viewuser=$airport->owner'>$airport->owner</a>"; } ?>
          </span>          </td>
          <td width="233" bgcolor="999999">&nbsp;</td>
        </tr>
        <tr bgcolor="#999999">
          <td height="19" valign="top" bgcolor="999999"><span class="style3">Bullet Factory </span></td>
          <td bgcolor="999999"><span class="style3">
            <?php if ($ammo_hut->owner == "0"){ echo "<a href='?grab=Ammo&location=$locations[$i]'>No owner Pick Up!</a>"; }else{ echo "<a href='profile.php?viewuser=$ammo_hut->owner'>$ammo_hut->owner</a>"; } ?>
          </span></td>
          <td width="233" bgcolor="999999">&nbsp;</td>
        </tr>
        <tr bgcolor="#999999">
          <td height="19" valign="top" bgcolor="999999"><span class="style3">Blackmarket </span></td>
          <td bgcolor="999999"><span class="style3">
            <?php if ($shop->owner == "0"){ echo "<a href='?grab=Shop&location=$locations[$i]'>No owner Pick Up!</a>"; }else{ echo "<a href='profile.php?viewuser=$shop->owner'>$shop->owner</a>"; } ?>
          </span></td>
          <td bgcolor="999999">&nbsp;</td>
        </tr>
        <tr bgcolor="#999999">
          <td height="19" valign="top" bgcolor="999999"><span class="style8">Blackjack </span></td>
          <td bgcolor="999999"><span class="style3">
            <?php if ($bj->bjowner == "0"){ echo "<a href='?grab=bj&location=$locations[$i]'>No owner Pick Up!</a>"; }else{ echo "<a href='profile.php?viewuser=$bj->bjowner'>$bj->bjowner</a>";  } ?>
          </span></td>
          <td bgcolor="999999"><span class="style3"><? echo "&pound;".makecomma($bj->bjmaxbet).""; ?></span></td>
        </tr>
        <tr bgcolor="#999999">
          <td height="19" valign="top" bgcolor="999999"><span class="style8">Keno</span></td>
          <td bgcolor="999999"><span class="style3">
            <?php if ($casino_keno->owner == "0"){ echo "<a href='?grab=Casinos&location=$locations[$i]&casino=Keno'> No owner Pick Up!</a>"; }else{ echo "<a href='profile.php?viewuser=$casino_keno->owner'>$casino_keno->owner</a>";  } ?>
          </span></td>
          <td bgcolor="999999"><span class="style3"><? echo "&pound;".makecomma($casino_keno->max).""; ?></span></td>
        </tr>
        </tr>
        <tr bgcolor="#999999">
          <td height="19" valign="top" bgcolor="999999"><span class="style8">Race track</span></td>
          <td bgcolor="999999"><span class="style3">
            <?php if ($race->owner == "0"){ echo "<a href='?grab=race&location=$locations[$i]'>No owner Pick Up!</a>"; }else{ echo "<a href='profile.php?viewuser=$race->owner'>$race->owner</a>";  } ?>
          </span>          </td>
          <td bgcolor="999999"><span class="style3"><? echo "&pound;".makecomma($race->max).""; ?></span></td>
        </tr>
        <tr bgcolor="#999999">
          <td height="19" valign="top" bgcolor="999999"><span class="style8">Roulette</span></td>
          <td bgcolor="999999"><span class="style3">
            <?php if ($casino_roulette->owner == "0"){ echo "<a href='?grab=Casinos&location=$locations[$i]&casino=Roulette'>No owner Pick Up!</a>"; }else{ echo "<a href='profile.php?viewuser=$casino_roulette->owner'>$casino_roulette->owner</a>";  } ?>
          </span>          </td>
          <td bgcolor="999999"><span class="style3"><? echo "&pound;".makecomma($casino_roulette->max).""; ?></span></td>
        </tr>
        <tr bgcolor="#999999">
          <td height="19" valign="top" bgcolor="999999"><font color="#FFFFFF">Slots</font></td>
          <td bgcolor="999999"><span class="style3">
            <?php if ($casino_slots->owner == "0"){ echo "<a href='?grab=Casinos&location=$locations[$i]&casino=Slots'>No owner Pick Up!</a>"; }else{ echo "<a href='profile.php?viewuser=$casino_slots->owner'>$casino_slots->owner</a>";  } ?>
          </span> </td>
          <td bgcolor="999999"><span class="style3"><? echo "&pound;".makecomma($casino_slots->max).""; ?></span></td>
        </tr>
      </table></td>
	  
	  <?php 
	 if ($i == "3"){ echo "</tr>"; } 
	  
	  $i++; } ?>

</table>
<p>
<p>&nbsp; </p>
</body>
</html>
<?php require_once "includes/footer.php"; ?>