<?php
session_start();
?>
<script type="text/javascript" src="includes/overlib.js"></script></head><div id=overDiv style="position:absolute; visibility:hidden; z-index:1000;"></div>
<?
include "includes/db_connect.php";
include "includes/functions.php";
$username=$_SESSION['username'];
logincheck();
$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);
echo "<center>";
if (strip_tags($_GET['l'])){
$l=strip_tags($_GET['l']);
$select=mysql_query("SELECT * FROM turf WHERE id='$l'");
$n=mysql_fetch_object($select);
$num=mysql_num_rows($select);
if ($num == "0"){ echo "There has been an error."; exit(); }
if (strip_tags($_POST['bomb_button']) && strip_tags($_POST['bomb_amount'])){
$bomb_amount=intval(strip_tags($_POST['bomb_amount']));
		if ($bomb_amount == 0 || !$bomb_amount || ereg('[^0-9]',$bomb_amount)){
	print "You cant use that amount.";
	
}elseif ($bomb_amount != 0 && $bomb_amount && !ereg('[^0-9]',$bomb_amount)){
$select=mysql_query("SELECT * FROM turf WHERE id='$l'");
$n=mysql_fetch_object($select);
$num=mysql_num_rows($select);
if ($num == "0"){
echo "Invalid choice.";
exit();
}
$bomb=strip_tags($_GET['l']);
$cost=$bomb_amount*100000;
if ($cost > $fetch->money){
echo "You dont have enough money.";
}elseif ($cost <= $fetch->money){
$bombs=$bomb_amount*rand(5,20);
$dam=$n->damage + $bombs;
if ($dam >= "100"){

mysql_query("UPDATE turf SET damage='0', owner='$username', profit='0' WHERE id='$bomb'");
echo "You threw the petrol bombs and took over the turf!";
}else{
echo "You damaged the turf but did not take it over!";
$dam=$n->damage + $bombs;

mysql_query("UPDATE turf SET damage='$dam' WHERE id='$bomb'");
}
$new_money=$fetch->money-$cost;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
}

}}
?>
<table width="59%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
  <tr> 
    <td colspan="2" background="includes/grad.jpg"> <div align="center">Crew Territory</div></td>
  </tr>
  <tr> 
    <td width="50%">Owner:</td>
    <td width="50%"><? if ($n->owner == "0"){ echo "Not owned"; }else{ ?><a href="profile.php?viewuser=<?php echo "$n->owner"; ?>"><?php echo "$n->owner"; ?> <? } ?></a></td>
  </tr>
 
  <?php $ownercheck=mysql_query("SELECT * FROM turf WHERE id='$l' AND owner='$username'");
  $numa=mysql_num_rows($ownercheck);
  $fek=mysql_fetch_object($ownercheck);
  if ($numa == "0"){
  ?>
   <tr bgcolor=white> 
    <td colspan=2 class=tip><center>It costs £100,000 for you and your people to through molotov cocktails onto the territory</center></td>

  </tr>
  <tr> 
    <td>Number of Molotov Cocktail's to throw</td>
    <td><form action="?l=<?php echo "$l"; ?>" method=POST><input type=text name=bomb_amount><input value=Bombard type=submit name=bomb_button></form></td>
  </tr>
  <?
  }elseif ($numa != "0"){
  $it=$fek->damage * 1000;
  $repair=strip_tags($_GET['repair']);
 
  if ($repair && $it > "0"){
   $k=mysql_num_rows(mysql_query("SELECT * FROM turf WHERE id='$repair'"));
  if ($k == "0"){  echo "Invalid turf id."; exit(); } 
  
  echo "<tr bgcolor=white> 
    <td colspan=2 class=tip>You successfully repaired this.</td>
    </tr>";
  if ($it > $fetch->money){ echo "You dont have enough money to repair this."; }elseif ($it <= $fetch->money){
  $new_money=$fetch->money - $it;
  mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
  mysql_query("UPDATE turf SET damage='0' WHERE id='$repair'");
  
  }
  
  
  }
  if ($it > "0"){
  ?>
   <tr bgcolor=white> 
    <td colspan=2 class=tip>It will cost you <?php echo "$it"; ?> to repair this.</td>
  </tr>
	<? 
	
	
	?>
	
  <tr> 
    <td>Repair this</td>
    <td><a href="?repair=<? echo "$l"; ?>&l=<? echo "$l"; ?>">Repair this</a></td>
  </tr><?
  
  
  }}
  ?>
</table>


<?
exit();
}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="59%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
  <tr> 
    <td background="includes/grad.jpg" > <div align="center" class="style1">Territory</div></td>
  </tr>
  <tr bgcolor=white>
    <td class=tip><div align="center">Current establishment.</div></td>
  </tr>
  <tr> 
    <td><center>
        <table width="120" border="1" cellspacing="0" cellpadding="2" bordercolor=black class=thinline>
          <?

  $i=1;
$colours = array('g','b');

  while ($i < 40){
  $c=$colours[rand(0,1)];
if ($i == "6" || $i == "17" || $i == "21" || $i == "36"){
echo "<tr>";
}
$loca=mysql_query("SELECT * FROM turf WHERE location='$fetch->location'");
while ($loc = mysql_fetch_object($loca)){
$query=mysql_fetch_object(mysql_query("SELECT * FROM turf WHERE id='$loc->id'"));

if ($query->owner == "0"){

  echo "<td width=40><a href='?l=$loc->id' onmouseover=\"return overlib('Turf ID: $query->id<br>This turf is not owned.<br>Damage: $query->damage%', STICKY, CAPTION, 'This turf is not owned.<br>', CENTER);\" onmouseout=\"nd();\"><img src=create.php?c=g border=0></a></td>";
  }else{
    echo "<td width=40><a href='?l=$loc->id' onmouseover=\"return overlib('Turf ID: $query->id<br>Owned by: <a href=profile.php?viewuser=$query->owner>$query->owner</a><br>Damage: $query->damage%', STICKY, CAPTION, 'Turf ID: $query->id', CENTER);\" onmouseout=\"nd();\"><img src=create.php?c=b border=0></a></td>";

  }

if ($i == "11" || $i == "19" || $i == "29" || $i == "40"){
echo "</tr>";
}

  $i++;
  }

}
$ko=mysql_fetch_object(mysql_query("SELECT * FROM site_stats WHERE id='1'"));
if ($ko->terr <= time()){
$charge=mysql_query("SELECT * FROM turf");
while($gay=mysql_fetch_object($charge)){
if ($gay->owner != "0"){
$user=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$gay->owner'"));
$new_money=$user->money + 10000;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$gay->owner'");
$new_pro=$gay->profit+10000;
mysql_query("UPDATE turf SET profit='$new_pro' WHERE id='$gay->id'");
}
}
$new_time=time()+387687876876786876600;
mysql_query("UPDATE site_stats SET terr='$new_time' WHERE id='1'");
}

  ?>
        </table>
      </center></td>
  </tr>
</table>
<p><br>
  <br>
</p><?php $h=mysql_query("SELECT * FROM turf WHERE owner='$username' AND location='$fetch->location'");
$ha=mysql_query("SELECT SUM(profit)AS profita FROM turf WHERE owner='$username' AND location='$fetch->location'");
$fec=mysql_fetch_object($ha);
$a=mysql_num_rows($h);
if ($a == "0"){
$makes="10000";
}else{
$makes=$a * 10000;
}
if ($a != "0"){
?>
<?php $querya=mysql_query("SELECT * FROM turf WHERE owner='$username' AND damage != '0'");
$rows=mysql_num_rows($querya);
if ($rows != "0"){
echo"Turf under attack:<br>";
}
while($while=mysql_fetch_object($querya)){
echo "<a  onmouseover=\"return overlib('Turf ID: $query->id<br>Location: $while->location<br>Damage: $while->damage%', STICKY, CAPTION, 'Turf ID: $while->id', CENTER);\" onmouseout=\"nd();\">$while->id</a> ,";



}
?>
<p>
<table width="59%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
  <tr> 
    <td colspan="2" background="includes/grad.jpg"> <div align="center" class="style1">Territory-Owned</div></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td colspan="2" class=tip > <div align="center">You currently own <?php echo "$a"; ?>Sq/m 
        of land in this country.<br>
        To repair a Territory click on the Territory and click repair</div></td>
  </tr>
  <tr> 
    <td width="50%">Makes per hour:</td>
    <td width="50%"><?php echo "£".makecomma($makes).""; ?></td>
  </tr>
  <tr> 
    <td>Profit so far:</td>
    <td><?php echo "£".makecomma($fec->profita).""; ?></td>
  </tr>
  <tr> 
    <td>Reset</td>
    <td><a href="?reset=true">Click here</a></td>
  </tr>
</table>
<br>
<p>&nbsp;</p>
<? } ?>

<table width="23%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
  <tr> 
    <td background="includes/grad.jpg"> <div align="center">The key</div></td>
  </tr>
  <tr> 
    <td><div align="left"><img src=create.php?c=g border=0> Not owned<br>
        <img src=create.php?c=b border=0> Owned</div></td>
  </tr>
</table> 
<br>
<br>
<p><br>
  <br>
</p>
</body>
</html>
<? echo "</center>"; ?>
