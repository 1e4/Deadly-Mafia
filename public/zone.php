<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once"casinoCP.php";
logincheck();
$username=$_SESSION['username'];
$input="Race";



$fetch= mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$race = mysql_fetch_object(mysql_query("SELECT * FROM casinos WHERE location='$fetch->location' AND casino='Race'"));
$fetch_owner=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$race->owner'"));

if (strtolower($race->owner) == strtolower($fetch->username)){
casinoCP($input);
exit();
}



if (strip_tags(!$_POST['race_go']) && $_POST['bet'] == ""){
$ticked="0";
}elseif (strip_tags($_POST['race_go']) && $_POST['bet'] != ""){

	$bet=intval(strip_tags($_POST['bet']));
	$radiobutton=strip_tags($_POST['radiobutton']);

	if ($radiobutton == "1" || $radiobutton == "2" || $radiobutton=="3" || $radiobutton=="4"){
		if ($bet > "0"){
		if ($bet == 0 || !$bet || ereg('[^0-9]',$bet)){
	print "You cant bet that amount.";
	$ticked="0";
}elseif ($bet != 0 && $bet && !ereg('[^0-9]',$bet)){


if ($bet > $race->max){
echo "Your bet exceeds the max bet.";
$ticked="0";
}elseif ($bet <= $race->max){
if ($bet > $fetch->money){
echo "You dont have that much cash.";
$ticked="0";
}elseif ($bet <= $fetch->money){

if ($radiobutton == '1'){
$player_chance = 1;
$img="images/rps/rock_you.jpg";

}elseif ($radiobutton == '2'){
$player_chance = 2;
$img="images/race/paper_you.jpg";

}elseif ($radiobutton == '3'){
$player_chance = 3;
$img="images/rps/scis_you.jpg";
}elseif ($radiobutton == '4'){
$player_chance = 4;
$img="images/rps/scis_you.jpg";
}
$pc_number=rand(1,4);

if ($pc_number == $player_chance){

////NOW UPDATE STATS
$new_money = $bet * 2;
$n_money = $fetch->money + $new_money;

$owner_money=$fetch_owner->money - $new_money;
if ($owner_money <= "0"){
echo "The casino owner went broke and had to drop the casino, check the countries page to pick it up!";
mysql_query("UPDATE casinos SET owner='0' WHERE location='$fetch->location' AND casino='Race'");
}elseif($owner_money > "0"){


echo "<font color=#CC0000>$output <br> Congratulations you won £".makecomma($new_money)."</font>";
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
$ear = $race->profit - $new_money;
mysql_query("UPDATE casinos SET profit='$ear' WHERE location='$fetch->location' AND casino='Race' AND owner !='0'");
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$Race->owner'");
}
}elseif ($pc_number != $player_chance){
//////NOT GETTING BROKE AND IF THEY LOOOOOOOOOOOOOSE//////

$new_money2 = $fetch_owner->money + $bet;
$ear2 = $race->profit + $bet;
$loose_money=$fetch->money-$bet;
mysql_query("UPDATE casinos SET profit='$ear2' WHERE location='$fetch->location' AND casino='Race' AND owner !='0'");
mysql_query("UPDATE users SET money='$new_money2' WHERE username='$Race->owner'");
		mysql_query("UPDATE users SET money='$loose_money' WHERE username='$username'"); 
echo "$output <br>Sorry you lost £".makecomma($bet).", and you now have £".makecomma($fetch->money - $bet)." ";


}}}

if ($pc_number == '1'){
$img="includes/race/red_win.swf";

}elseif ($pc_number == '2'){
$img="includes/race/blue_win.swf";

}elseif ($pc_number == '3'){
$img="includes/race/green_win.swf";


}elseif ($pc_number == '4'){
$img="includes/race/yellow_win.swf";
}




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
</head><form action="" method=POST>

<body onload=goaway();>
<br>
<table width="56%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
  <tr> 
    <td  colspan="2" background="includes/grad.jpg"><center class=bold>
        <strong>Race track</strong> </center></td>
  </tr>
  <tr> 
    <td height="24" colspan="2"> <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2"><center class=bold>
              <strong>Car:</strong></center></td>
        </tr>
        <tr> 
          <td width="6%"><input type="radio" name="radiobutton" value="1" <?php if ($_POST['radiobutton'] == "1"){ echo "checked"; } ?>></td>
          <td width="94%">Car #1 (Red)</td>
        </tr>
        <tr> 
          <td width="6%"><input type="radio" name="radiobutton" value="2" <?php if ($_POST['radiobutton'] == "2"){ echo "checked"; } ?>></td>
          <td>Car #2 (Blue)</td>
        </tr>
        <tr> 
          <td width="6%"><input type="radio" name="radiobutton" value="3" <?php if ($_POST['radiobutton'] == "3"){ echo "checked"; } ?>></td>
          <td>Car #3 (Green)</td>
        </tr>
        <tr> 
          <td width="6%"><input type="radio" name="radiobutton" value="4" <?php if ($_POST['radiobutton'] == "4"){ echo "checked"; } ?>></td>
          <td>Car #4 (Yellow)</td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="43%" height="11">Bet:</td>
    <td width="57%"><input name="bet" type="text" id="bet"></td>
  </tr><?php if ($img){ echo <<<EOF
  <tr> 
    <td height=10 colspan=2><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4,0,2,0" WIDTH="550" HEIGHT="400">       <param name=movie value="$img">       <param name=quality value=high>       <param name="SCALE" value="noborder">		 <param name="LOOP" value="false">       <embed src="$img" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" scale="noborder" loop="false" WIDTH="550" HEIGHT="400">       </embed>    	 </object>

</td>
  </tr>
EOF;
  }
   ?>
  <tr> 
    <td height="26" colspan="2"> <div align="center"> 
        <input name="race_go" type="submit" id="race_go" value="Submit">
      </div></td>
  </tr>
</table>
<center>
<?php if ($slots->owner == "0"){ echo "This Race track is not owned"; }else{ echo "This Race track is owned by <a href='profile.php?viewuser=$race->owner'><b>$race->owner</b></a>"; } ?>
<?php echo "<br>The max bet is set at £".makecomma($race->max).""; ?>

<p><?php include_once"includes/footer.php"; ?>

</center>
