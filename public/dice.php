<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
include_once"casinoCP.php";

$it = 'Dice';
casinocp($it);

$crimes = mysql_query("SELECT money,location FROM users WHERE username='$username'");
while($success = mysql_fetch_row($crimes)){
	$money = $success[0];
$location = $success[1];
	
}
$crimes1 = mysql_query("SELECT owner,max FROM casinos WHERE location='$location' AND casino='Dice'");
while($success1 = mysql_fetch_row($crimes1)){
	$owner = $success1[0];
$max = $success1[1];
$min = $success1[2];
	
}
$crimes3 = mysql_query("SELECT money FROM users WHERE username='$owner'");
while($success3 = mysql_fetch_row($crimes3)){
	$money1 = $success3[0];
	
}
$bet = $_POST['bet'];
$bet=strip_tags($bet);

if ($_POST['Submit']){
echo "$bet"; 
if ($bet > $max){
echo "Your bet exceeds the set max bet.";
}elseif ($bet <= $max){


if ($bet > $money){
echo "You dont have that much money.";
}elseif($bet <= $money){
if  (ereg('[^0-9]',$bet))
   {
     
    echo "Invalid Numbers!";
}elseif (!ereg('[^0-9]',$bet)){
if ($bet < '0') {
echo "Error.";
}elseif ($bet > 0){



$dice = rand(1,6);

$dice2 = rand(1,6);

$imgsrc = "dice/$dice.jpg";
$imgsrc1 = "dice/$dice2.jpg";


if ($dice + $dice2 < 10){
echo "Unlucky you lost £$bet.";


$cmoney = $money1 + $bet;
$fuck = $money - $bet;
$er = $earnings + $bet;
mysql_query("UPDATE casinos SET profit='$er' WHERE location='$fetch->location' AND casino='Dice'");

mysql_query("UPDATE users SET money='$fuck' WHERE username='$username'");
mysql_query("UPDATE users SET money='$cmoney' WHERE username='$owner'");




}elseif ($dice + $dice2 >= 10){

$hahaa = $bet * 4;
if ($hahaa > $money1){
$ownersmoney = $money1;
$lost = 1;
}elseif ($hahaa <= $money1){
$ownersmoney = $money1 - $hahaa;
$lost = 0;
}
if ($lost == '1'){
////CASINO OWNER GOES BROKE???////
echo "The casino owner went broke!";
mysql_query("UPDATE casinos SET owner='0' WHERE casino='Dice' AND location='$fetch->location'");
mysql_query("UPDATE users SET money='0' WHERE username='$owner'");
echo "<br> You did not loose any money.";
////????OR MAYBE NOT????////
}elseif ($lost == '0'){
$hahaa = $bet * 4;
$ownersmoney = $money1 - ($bet * 4);
$winermoney = $money + ($bet * 4);
mysql_query("UPDATE users SET money='$ownersmoney' WHERE username='$owner'");
mysql_query("UPDATE users SET money='$winermoney' WHERE username='$username'");
$er = $money1 - ($bet * 4);
///update casino earnings///
mysql_query("UPDATE casinos SET profit='$er' WHERE location='$location' AND casino='Dice' AND owner !=''");
echo "Congratulations you won!! $".makecomma($hahaa)."";

///Update the casino earnings

////just help//
}
}}}}}}

?>
<html>
<link rel="stylesheet" href="style.css" type="text/css">
<style type="text/css">
<!--
body {
	background-color: #454545;
}
.style1 {font-size: 12px}
-->
</style><center>
<script language="JavaScript"> 
function disableEnterKey() 
{ 
     if (window.event.keyCode == 13) window.event.keyCode = 0; 
} 
</script> 

<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none><tr><td background=includes/grad.jpg align=center><font color=#FFFFFF>You Roled</font></td>
</tr>
<tr><td bgcolor=black height=1></td></tr>
<tr><td>

<center><img src="<?php if ($imgsrc == ""){ echo "dice/1.jpg"; }else{ echo "$imgsrc"; } ?>">&nbsp;&nbsp;&nbsp;<img src="<?php if ($imgsrc1 == ""){ echo "dice/1.jpg"; }else{ echo "$imgsrc1"; } ?>"></center>
</td></tr></table><br>

<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none><tr>
  <td background=includes/grad.jpg and Settings/J/Desktop/dtop/public_html/TheMichaloniFamily/kieran/images/topic.jpg align=center><font color="#FFFFFF">To Win </font></td>
</tr>
<tr><td bgcolor=black height=1></td></tr>
<tr><td>

To win you must role 10 or more on 2 dice, If you role 10 or more you will win 4x the amount you bet.
</td></tr></table>
<table width=25% cellpadding=0 cellspacing=0><tr valign=top><td width=50%>
<table class=thinline width=100% cellspacing=0 cellpadding=2 rules=none>
<tr><td align=center background="includes/grad.jpg" bgcolor=white>Roll The Dice</td>
</tr>
<tr><td height=1 bgcolor=black></td></tr>
<tr valign="top">
<td align=center><table><tr><td width=80><form action='' method=post  onKeyPress="disableEnterKey()">

Place Bet:</td><td><input type=text name="bet"></td></tr>

</table></td>
</tr>
<tr><td align=left><input type=submit value="Roll" name = 'Submit'>

</form>

</td></tr>
</table>
<br>

<table class=thinline width=100% cellspacing=0 cellpadding=2 rules=none><tr><td background=includes/grad.jpg align=center><font color=#FFFFFF>Dice Game Stats</font></td>
</tr>
<tr><td bgcolor=black height=1></td></tr>
<tr><td>

<span class="style1">This Dice Game is Owned By 
<?php if ($owner !=""){ echo "<a href='profile.php?viewuser=$owner'><b>$owner</b></a>"; }elseif ($owner == ""){ echo "<u><b>No one</u></b>"; } ?> 
<br>
The max bet is set at</span> <?php echo "$".makecomma($max).""; ?><br>
</td>
</tr></table><br>

</td>
</tr>
</table>
<br>
<p>













