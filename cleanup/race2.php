<?php
session_start(); 
include_once "includes/db_connect.php";
include_once "includes/functions.php";

$it = 'Race';

$bet = $_POST['bet'];

$fetch= mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$race = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$fetch->location' AND casino='Race'"));
$fetch_owner=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$race->owner'"));

if (strtolower($race->owner) == strtolower($fetch->username)){
exit();
}

$race=$_POST['race'];
$bet = $_POST['bet'];
if ($_POST['submit']){
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
if ($race == '1'){
$win = $bet * 2;
$car = rand(1,2);
}elseif ($race == '2'){
$win = $bet * 3;
$car = rand(1,6);
}elseif ($race == '3'){
$win = $bet * 4;
$car = rand(1,8);
}elseif ($race == '4'){
$win = $bet * 5;
$car = rand(1,11);
}elseif ($race == '5'){
$win = $bet * 6;
$car = rand(1,14);
}elseif ($race == '6'){
$win = $bet * 7;
$car = rand(1,17);
}	

if ($car == '1'){



if ($win > $money1){
$ownersmoney = $money1;
$lost = 1;
}elseif ($win <= $money1){
$ownersmoney = $money1 - $win;
$lost = 0;
}
if ($lost == '1'){
////CASINO OWNER GOES BROKE???////
echo "The casino owner went broke!";
mysql_query("UPDATE casino SET owner='0', maxbet='0', earnings = '0', minoffer = '0' WHERE  location='$location' AND casino='Race'");
mysql_query("UPDATE users SET money='0' WHERE username='$owner'");
echo "<br> You did not loose any money.";
////????OR MAYBE NOT????////
}elseif ($lost == '0'){
$ownersmoney = $money1 - $win;
$winermoney = $money + $win;
mysql_query("UPDATE users SET money='$ownersmoney' WHERE username='$owner'");
mysql_query("UPDATE users SET money='$winermoney' WHERE username='$username'");


///Update the casino earnings
$er = $earnings - $win;
mysql_query("UPDATE casino SET earnings='$er' WHERE location='$location' AND casino='Race' AND owner !=''");
echo "Congratulations you won!! $".makecomma($win)."";
}
}







//////DO NOT NEED THIS BIT/////ITS IF THEY LOOSE////
elseif ($car != '1'){
echo "You lost. $".makecomma($bet)."";

$fuck = $money - $bet;
$er = $earnings + $bet;
$ownersmoney = $money1 + $bet;
mysql_query("UPDATE casino SET earnings='$er' WHERE location='$location' AND casino='Race' AND owner !=''");
mysql_query("UPDATE users SET money='$fuck' WHERE username='$username'");
mysql_query("UPDATE users SET money='$ownersmoney' WHERE username='$owner'");
}}}}}}




?>
<script language="JavaScript"> 
function disableEnterKey() 
{ 
     if (window.event.keyCode == 13) window.event.keyCode = 0; 
} 
</script> 
<html>
<link rel="stylesheet" href="file:///C|/Documents%20and%20Settings/J/Desktop/dtop/public_html/TheMichaloniFamily/kieran/add/style.css" type="text/css">
<center>

<table width=25% cellpadding=0 cellspacing=0><tr valign=top><td width=50%>
<table class=thinline width=100% cellspacing=0 cellpadding=2 rules=none><tr><td background=file:///C|/Documents%20and%20Settings/J/Desktop/dtop/public_html/TheMichaloniFamily/kieran/images/topic.jpg align=center><font color=#FFFFFF>Race Track</font>
<tr><td height=1 bgcolor=black colspan=2></td></tr>
<tr><td bgcolor=white align=center>Bet On Your Car</td></tr>
<tr><td height=1 bgcolor=black></td></tr>
<tr valign="top">

<tr valign="top"><td align=left><form action="" method=post onKeyPress="disableEnterKey()">
<input type=radio name=race value=1 checked> Red<br>
<input type=radio name=race value=2> Blue<br>
<input type=radio name=race value=3> Yellow<br>
<input type=radio name=race value=4> Green<br>
<input type=radio name=race value=5> Pink<br>
<input type=radio name=race value=6> Black<br>
</td>
</tr>

<td align=center><table><tr><td width=180>
Bet Amount:</td><td><input type=dice name=bet maxlength="10"></td></tr>

<tr><td align=center><input type=submit value="Submit" name='submit'></td></tr>
</form></td></tr>
</table></tr></td>
<br>


<table class=thinline width=100% cellspacing=0 cellpadding=2 rules=none><tr><td background=file:///C|/Documents%20and%20Settings/J/Desktop/dtop/public_html/TheMichaloniFamily/kieran/images/topic.jpg align=center><font color=#FFFFFF>Race Track Stats</font></td></tr>
<tr><td bgcolor=black height=1></td></tr>
<tr><td>

This Race Track Game is Owned By <?php if ($owner !=""){ echo "<a href='profile.php?viewuser=$owner'><b>$owner</b></a>"; }elseif ($owner == ""){ echo "<u><b>No one</u></b>"; } ?> <br>
The max bet is set at <?php echo "$".makecomma($max).""; ?><br>
The minimum offer to take over this game is set at <?php echo "$".makecomma($minoff).""; ?><p>
<a href="file:///C|/Documents%20and%20Settings/J/Desktop/dtop/public_html/TheMichaloniFamily/kieran/offer.php?type=Race">You can make an offer to take over the dice game here</a>
</td></tr></table><br>

</td>
</tr>
</table>
<br>
<p>
<table class=thinline width=25% cellspacing=0 cellpadding=2 rules=none><tr><td background=file:///C|/Documents%20and%20Settings/J/Desktop/dtop/public_html/TheMichaloniFamily/kieran/images/topic.jpg align=center><font color=#FFFFFF>Money</font></td></tr>
<tr><td bgcolor=black height=1></td></tr>
<tr><td>
<?php echo "<center>Your money To Bet: $".makecomma($usersmoney)."</td></tr></table><br><p>";



















