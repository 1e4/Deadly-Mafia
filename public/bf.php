<?php session_start(); 
include_once"includes/db_connect.php";
include_once"includes/functions.php"; 
include_once "includes/jail_check.php";
logincheck(); 
$username=$_SESSION['username'];
$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);

$query_bf=mysql_query("SELECT * FROM bf WHERE location='$fetch->location'");
$fetch_bf=mysql_fetch_object($query_bf);
$lastbuy=60*1;

if (strtolower($fetch_bf->owner) == (strtolower($fetch->username))){
require_once"bulletCP.php";
exit();
}
$new_time=time()+3600;

$up=mysql_fetch_object(mysql_query("SELECT * FROM site_stats WHERE id='1'"));
$a=mysql_query("SELECT * FROM bf");
while($b=mysql_fetch_object($a)){
$user=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$b->owner'"));
$minus=$user->money - 10000;

if ($user->money <= $minus){
mysql_query("UPDATE bf SET owner='0', producing='yes' WHERE id='$b->id'");
$crap=1;
}


if ($up->bullets < time() && $b->producing == "Yes" && $crap != "1"){

mysql_query("UPDATE bf SET stock=stock+100 WHERE id='$b->id'");
mysql_query("UPDATE site_stats SET bullets='$new_time' WHERE id='1'");
mysql_query("UPDATE users SET money='$minus' WHERE username='$b->owner'");

}

}


if ($info->lastbuy > time()){
$left = $info->lastbuy - time(); ?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Patience Please</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFCC00"><div align="center"><font color="#000000"><? echo "You can buy bullets again in about $left seconds!"; ?></font></div></td>
    </tr>
  </table>
</div>
<?
exit();
}


if (strip_tags($_POST['check']) && (strip_tags($_POST['amount']))){
$amount=intval(strip_tags($_POST['amount']));
if ($amount == 0 || !$amount || ereg('[^0-9]',$amount)){
	print "<font color=white>You cant buy that amount.";
	
}elseif ($amount != 0 || $amount || !ereg('[^0-9]',$amount)){

	$costs = $fetch_bf->price * $amount;
	if ($costs > $fetch->money){
	echo "<font color=white>You do not have enough money";
} elseif ($costs <= $fetch->money){
	$nmoney=$fetch->money - $costs;
	if ($fetch_bf->stock < $amount){
		echo "<font color=white>Not that many bullets in the store.";
	} elseif ($amount <= $fetch_bf->stock){
		$nbullets=$fetch->bullets + $amount;
		$nstock = $fetch_bf->stock - $amount;

///IF THERE IS NOOOOO OWNER
if ($fetch_bf->owner == "0"){
		mysql_query("UPDATE users SET bullets='$nbullets', money='$nmoney' WHERE username='$username'");
		
	
		mysql_query("UPDATE bf SET stock='$nstock', profit='$costs' WHERE location='$fetch->location'");
		echo "<font color=white>Bullets successfully bought.";
////IF THERE IS A OWNER

}elseif ($fetch_bf->owner != "0"){
$fetch_owner=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$fetch_bf->owner'"));
		$new_owner=$fetch_owner->money + $costs;

		mysql_query("UPDATE users SET bullets='$nbullets', money='$nmoney' , lastbuy='$lastbuy' WHERE username='$username'");
		
		mysql_query("UPDATE users SET money='$new_owner' WHERE username='$fetch_bf->owner'");
		
		mysql_query("UPDATE bf SET stock='$nstock', profit='$costs' WHERE location='$fetch->location'");
		echo "<font color=white>Bullets successfully bought.";

}


	}}
}








}



?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
.style1 {color: #FFFFFF}
body {
	background-color: #000000;
}
-->
</style>
</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<form action="" method=POST>
  <table width="70%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline bg color="#CCCCCC">
    <tr> 
      <td colspan="2" background="includes/grad.jpg"><div align="center"><font color=white>Bullet 
          factory</div></td>
    </tr>

    <tr> 
      <td width="47%" bgcolor="#666666" height="26"><span class="style1">Bullets in factory: </span></td>
      <td width="53%" bgcolor="#666666" height="26"><span class="style1"><?php echo "".makecomma($fetch_bf->stock).""; ?></span></td>
    </tr>
    <tr> 
      <td bgcolor="#666666"><span class="style1">Producing status:</span></td>
      <td bgcolor="#666666"><span class="style1"><?php echo "".makecomma($fetch_bf->producing).""; ?></span></td>
    </tr>
   
<tr bgcolor=#656565>
      <td colspan="2" bgcolor="#666666"  class=tip><div align="center" class="style1"><?php echo "".maketime($up->bullets).""; ?> Untill 
      restock. </div></td>
    </tr>
<tr> 
      <td bgcolor="#666666"><span class="style1">Owner:</span></td>
      <td bgcolor="#666666"><span class="style1"><?php echo ($fetch_bf->owner).""; ?></span></td>
    </tr>

 <tr> 
      <td bgcolor="#666666"><span class="style1">Price per bullet:</span></td>
      <td bgcolor="#666666"><span class="style1"><?php echo "£".makecomma($fetch_bf->price).""; ?></span></td>
    </tr>
    <tr> 
      <td bgcolor="#666666"><span class="style1">Purchase Bullets:</span></td>
      <td bgcolor="#666666"><span class="style1">
        <input name="amount" value=100 type="text" id="amount"> 
        <input name="check" type="submit" id="check2" value="Purchase">
      </span></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php require_once"includes/footer.php"; ?>