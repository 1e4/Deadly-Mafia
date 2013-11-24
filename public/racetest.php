<?php
include_once "includes/db_connect.php";
include_once "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$fetch=mysql_fetch_object($query);
$check = mysql_query("SELECT * FROM `inbox` WHERE `read`='0' AND `to`='$username'");
$inbox=mysql_num_rows($check);
?>
<center>
<link rel=stylesheet href=includes/test.css type=text/css>

<br>
<br>
<?
$input="Race";



$fetch= mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$Race = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$fetch->location' AND casino='Race'"));
$fetch_owner=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$Race->owner'"));
$ownercash = $fetch_owner->money;

if (strtolower($Race->owner) == strtolower($fetch->username)){
include_once "casinoCP.php";
exit();
}


$pc_number = rand(1,5);

if ($pc_number == 1){
$color=Yellow;
}elseif ($pc_number == 2){
$color=Black;
}elseif ($pc_number == 3){
$color=Blue;
}elseif ($pc_number == 4){
$color=Red;
}elseif ($pc_number == 5){
$color=Cyan;
}elseif ($pc_number == 6){
$color=Green;
}elseif ($pc_number == 7){
$color=White;
}elseif ($pc_number == 8){
$color=Orange;
}elseif ($pc_number == 9){
$color=Pink;
}elseif ($pc_number == 10){
$color=Purple;
}
if (strip_tags(!$_POST['bett']) && $_POST['bet'] == ""){
$ticked="0";
}elseif (strip_tags($_POST['bett']) && $_POST['bet'] != ""){

	$bet=intval(strip_tags($_POST['bet']));
	$radiobutton=strip_tags($_POST['radiobutton']);

	if ($radiobutton == "1" || $radiobutton == "2" || $radiobutton=="3" || $radiobutton=="4" || $radiobutton=="5" || $radiobutton=="6" || $radiobutton=="7" || $radiobutton=="8" || $radiobutton=="9" || $radiobutton=="10" || $radiobutton=="11"){
		if ($bet > "0"){
		if ($bet == 0 || !$bet || ereg('[^0-9]',$bet)){
	print "<font color=white>You cant bet that amount.";
	$ticked="0";
}elseif ($bet != 0 && $bet && !ereg('[^0-9]',$bet)){


if ($bet > $Race->max){
echo "<font color=white>Your bet exceeds the max bet.</font>";
$ticked="0";
}elseif ($bet <= $Race->max){
if ($bet > $fetch->money){
echo "<font color=white>You dont have that much cash.";
$ticked="0";
}elseif ($bet <= $fetch->money){

if ($radiobutton == '1'){

if ($pc_number == 1){
$new_money = $bet * 2;
$n_money = $fetch->money + $new_money;

$owner_money= $ownercash - $new_money;
if ($owner_money <= "0"){
echo "<center>Congratulations <b>Yellow</b> Won!<br> 
You won <b>£".makecomma($new_money)."</b><br>
You Also Won The Horse Racing Event!";
$owner_money=$ownercash - $new_money;
mysql_query("UPDATE casinos SET owner='$username' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
}elseif($owner_money > "0"){
$new_money = $bet * 2;
$n_money = $fetch->money + $new_money;
$owner_money = $ownercash - $new_money;

echo "<center>Congratulations, <b>Yellow</b> Won!<br> 
You won <b>£".makecomma($new_money)."</b></font>";
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
$ear = $Race->profit - $new_money;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$ownername'");
}
}else{
$new_money2 = $ownercash + $bet;
$ear2 = $Race->profit + $bet;
$loose_money=$fetch->money - $bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$Race->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'");
echo "<center>You Lost! £".makecomma($bet)."</b></font>";
}

}elseif ($radiobutton == '2'){
if ($pc_number == 2){
$new_money = $bet * 8;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;
if ($owner_money <= "0"){
$owner_money=$ownercash - $new_money;
echo "<center><font color=white class='text'>Congratulations, <b>Black</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b><br>
You Also Won The Horse Racing Event!";
mysql_query("UPDATE casinos SET owner='$username' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
}elseif($owner_money > "0"){
$new_money = $bet * 8;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;

echo "<center><font color=white class='text'>Congratulations, <b>Black</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b></font>";
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
$ear = $Race->profit - $new_money;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
}
}else{
$new_money2 = $ownercash + $bet;
$ear2 = $Race->profit + $bet;
$loose_money=$fetch->money - $bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$Race->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'");
echo "<center><font color=white class='text'>You picked <b>Black</b>, but <b>$color</b> won!<br>
You lost <b>$".makecomma($bet)."</b></font>";
}
}elseif ($radiobutton == '3'){
if ($pc_number == 3){
$new_money = $bet * 4;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;
if ($owner_money <= "0"){
echo "<center>Congratulations, <b>Blue</b> Won!<br> 
You won <b>£".makecomma($new_money)."</b><br>
You Also Won The Horse Racing Event!";
$owner_money=$ownercash - $new_money;
mysql_query("UPDATE casinos SET owner='$username' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
}elseif($owner_money > "0"){
$new_money = $bet * 4;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;

echo "<center>Congratulations, <b>Blue</b> Won!<br> 
You won <b>£".makecomma($new_money)."</b></font>";
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
$ear = $Race->profit - $new_money;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
}
}else{
$new_money2 = $ownercash + $bet;
$ear2 = $Race->profit + $bet;
$loose_money=$fetch->money - $bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$Race->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'");
echo "<center>You Lost ! <b>£".makecomma($bet)."</b></font>";
}
}elseif ($radiobutton == '4'){
if ($pc_number == 4){
$new_money = $bet * 7;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;
if ($owner_money <= "0"){
$owner_money=$ownercash - $new_money;

echo "<center><font color=white class='text'>Congratulations, <b>Red</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b><br>
You Also Won The Horse Racing Event!";
mysql_query("UPDATE casinos SET owner='$username' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
}elseif($owner_money > "0"){
$new_money = $bet * 7;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;
echo "<center><font color=white class='text'>Congratulations, <b>Red</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b></font>";
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
$ear = $Race->profit - $new_money;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
}
}else{
$new_money2 = $ownercash + $bet;
$ear2 = $Race->profit + $bet;
$loose_money=$fetch->money - $bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$Race->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'");
echo "<center><font color=white class='text'>You picked <b>Red</b>, but <b>$color</b> won!<br>
You lost <b>$".makecomma($bet)."</b></font>";
}
}elseif ($radiobutton == '5'){
if ($pc_number == 5){
$new_money = $bet * 5;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;
if ($owner_money <= "0"){
$owner_money=$ownercash - $new_money;

echo "<center><font color=white class='text'>Congratulations, <b>Cyan</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b><br>
You Also Won The Horse Racing Event!";
mysql_query("UPDATE casinos SET owner='$username' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
}elseif($owner_money > "0"){
$new_money = $bet * 5;
$n_money = $fetch->money + $new_money;
$owner_money=$ownercash - $new_money;
echo "<center><font color=white class='text'>Congratulations, <b>Cyan</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b></font>";
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
$ear = $Race->profit - $new_money;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
}
}else{
$new_money2 = $ownercash + $bet;
$ear2 = $Race->profit + $bet;
$loose_money=$fetch->money - $bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$Race->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'");
echo "<center><font color=white class='text'>You picked <b>Cyan</b>, but <b>$color</b> won!<br>
You lost <b>$".makecomma($bet)."</b></font>";
}
}elseif ($radiobutton == '6'){
if ($pc_number == 6){
$owner_money=$ownercash - $new_money;
$new_money = $bet * 11;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;

if ($owner_money <= "0"){
echo "<center><font color=white class='text'>Congratulations, <b>Green</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b><br>
You Also Won The Horse Racing Event!";
mysql_query("UPDATE casinos SET owner='$username' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
}elseif($owner_money > "0"){
$new_money = $bet * 11;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;
echo "<center><font color=white class='text'>Congratulations, <b>Green</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b></font>";
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
$ear = $Race->profit - $new_money;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
}
}else{
$new_money2 = $ownercash + $bet;
$ear2 = $Race->profit + $bet;
$loose_money=$fetch->money - $bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='Race' AND");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$Race->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'");
echo "<center><font color=white class='text'>You picked <b>Green</b>, but <b>$color</b> won!<br>
You lost <b>$".makecomma($bet)."</b></font>";
}
}elseif ($radiobutton == '7'){
if ($pc_number == 7){
$new_money = $bet * 6;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;

if ($owner_money <= "0"){
$owner_money=$ownercash - $new_money;
echo "<center><font color=white class='text'>Congratulations, <b>White</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b><br>
You Also Won The Horse Racing Event!";
mysql_query("UPDATE casinos SET owner='$username' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
}elseif($owner_money > "0"){
$new_money = $bet * 6;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;
echo "<center><font color=white class='text'>Congratulations, <b>White</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b>";
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
$ear = $Race->profit - $new_money;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
}
}else{
$new_money2 = $ownercash + $bet;
$ear2 = $Race->profit + $bet;
$loose_money=$fetch->money - $bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$Race->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'");
echo "<center><font color=white class='text'>You picked <b>White</b>, but <b>$color</b> won!<br>
You lost <b>$".makecomma($bet)."</b></font>";
}
}elseif ($radiobutton == '8'){
if ($pc_number == 8){
$new_money = $bet * 3;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;

if ($owner_money <= "0"){
$owner_money=$ownercash - $new_money;
echo "<center>Congratulations, <b>Red</b> Won!<br> 
You won <b>£".makecomma($new_money)."</b><br>
You Also Won The Horse Racing Event!";
mysql_query("UPDATE casinos SET owner='$username' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
}elseif($owner_money > "0"){
$new_money = $bet * 3;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;

echo "<center><Congratulations, <b>Red</b> Won!<br> 
You won <b>£".makecomma($new_money)."</b>";
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
$ear = $Race->profit - $new_money;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
}
}else{
$new_money2 = $ownercash + $bet;
$ear2 = $Race->profit + $bet;
$loose_money=$fetch->money - $bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$Race->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'");
echo "<center>You Lost! <b>£".makecomma($bet)."</b></font>";
}
}elseif ($radiobutton == '9'){
if ($pc_number == 9){
$new_money = $bet * 9;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;

if ($owner_money <= "0"){
$owner_money=$ownercash - $new_money;
echo "<center><font color=white class='text'>Congratulations, <b>Pink</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b><br>
You Also Won The Horse Racing Event!";
mysql_query("UPDATE casinos SET owner='$username' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
}elseif($owner_money > "0"){
$new_money = $bet * 9;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;
echo "<center><font color=white class='text'>Congratulations, <b>Pink</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b>";
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
$ear = $Race->profit - $new_money;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
}
}else{
$new_money2 = $ownercash + $bet;
$ear2 = $Race->profit + $bet;
$loose_money=$fetch->money - $bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$Race->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'");
echo "<center><font color=white class='text'>You picked <b>Pink</b>, but <b>$color</b> won!<br>
You lost <b>$".makecomma($bet)."</b></font>";
}
}elseif ($radiobutton == '10'){
if ($pc_number == 10){
$new_money = $bet * 10;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;
if ($owner_money <= "0"){
$owner_money=$ownercash - $new_money;
echo "<center><font color=white class='text'>Congratulations, <b>Purple</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b><br>
You Also Won The Horse Racing Event!";
mysql_query("UPDATE casinos SET owner='$username' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
}elseif($owner_money > "0"){
$new_money = $bet * 10;
$n_money = $fetch->money + $new_money;

$owner_money=$ownercash - $new_money;

echo "<center><font color=white class='text'>Congratulations, <b>Purple</b> Won!<br> 
You won <b>$".makecomma($new_money)."</b>";
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
$ear = $Race->profit - $new_money;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
}
}else{
$new_money2 = $ownercash + $bet;
$ear2 = $Race->profit + $bet;
$loose_money=$fetch->money - $bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$Race->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'");
echo "<center><font color=white class='text'>You picked <b>Purple</b>, but <b>$color</b> won!<br>
You lost <b>$".makecomma($bet)."</b></font>";
}

}else{

$new_money2 = $ownercash + $bet;
$ear2 = $Race->profit + $bet;
$loose_money=$fetch->money - $bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='Race'");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$Race->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'");
echo "<font color=#FF0000 class='text'>$output <br>Sorry you lost $".makecomma($bet).", and you now have $".makecomma($fetch->money - $bet)." </font>";

}
}}
}}}}
?>
<script language=JavaScript>
function so(dis)
{
for (i=0;i<dis.elements.length;i++){
	if (dis.elements[i].type=='submit')
	   dis.elements[i].style.visibility='hidden';
	}
	if(fs==false){
		 fs=true;
		 return true;
	}else
 		return false;
	}
	function goaway()
{
for(i=0;i<document.forms.length;i++)
 document.forms[i].onsubmit = function() {return so(this);};
}
</script>



<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>


<body onload=goaway();>
<html>
<head>
<link rel=stylesheet href=includes/test.css type=text/css>
</head>
<form action="" method=POST>
  <div align="center"><br>
  </div>
  <p>&nbsp;</p>
<table width="500" border="1" bgcolor="#999999">
  <tr>
    <td colspan="3" background="includes/grad.jpg"><div align="center">Race Track </div></td>
    </tr>
  <tr>
    <td>Colour</td>
    <td>Odds</td>
    <td>Select</td>
  </tr>
  <tr>
    <td bgcolor="#FFFF00">Yellow</td>
    <td>1:2</td>
    <td><span class="btext">
      <input type="radio" name="radiobutton" value="1" <?php if ($_POST['radiobutton'] == "1"){ echo "checked"; } ?>>
    </span></td>
  </tr>
  <tr>
    <td bgcolor="#FF0000">Red</td>
    <td>1:3</td>
    <td><span class="btext">
      <input type="radio" name="radiobutton" value="8" <?php if ($_POST['radiobutton'] == "8"){ echo "checked"; } ?>>
    </span></td>
  </tr>
  <tr>
    <td bgcolor="#0000FF">Blue</td>
    <td>1:4</td>
    <td><span class="btext">
      <input type="radio" name="radiobutton" value="3" <?php if ($_POST['radiobutton'] == "3"){ echo "checked"; } ?>>
    </span></td>
  </tr>
  <tr>
    <td bgcolor="#00CC33">Green</td>
    <td>1:6</td>
    <td><span class="btext">
      <input type="radio" name="radiobutton" value="7" <?php if ($_POST['radiobutton'] == "7"){ echo "checked"; } ?>>
    </span></td>
  </tr>
  <tr>
    <td height="32" bgcolor="#CC3399">Pink</td>
    <td>1:8</td>
    <td><span class="btext">
      <input type="radio" name="radiobutton" value="2" <?php if ($_POST['radiobutton'] == "2"){ echo "checked"; } ?>>
    </span></td>
  </tr>
  <tr>
    <td height="48" colspan="3" bgcolor="#999999"><div align="center">
      <input name="bet" class='textbox' size="10" type="text" id="bet">
    </div>
      <br>
      <div align="center">
        <input name="bett" class='button' type="submit" id="bett" value="Bet!">
      </div></td>
    </tr>
</table>
<p align="center">&nbsp;</p>
</form>
<br>
<br>
<center>
<?php if ($Race->owner == "0"){ echo "<a href='states.php?grab=Casinos&location=$fetch->location&casino=Race'> This horse racing event is not owned <a/>"; }else{ echo "This horse racing event is managed by <a

href='profiles.php?viewuser=$Race->owner'><b>$Race->owner</b></a>"; } ?>
<?php echo "<br>The maximum bet is set at <b>£".makecomma($Race->max)."</b>"; ?>
<br>
<br>
 <div align=center><?php include "includes/footer.php"; ?></div>
<p>

</center>