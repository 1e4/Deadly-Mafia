<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$buy=$_POST['buy'];

$sql=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($sql);

$card1 = rand(1,5);
$card2 = rand(1,5);


$disp1="default";
$disp2="default";


if($go){
///// check if they have enought to play
if($fetch->money >= "7500"){
$new=$fetch->money-7500;
mysql_query("UPDATE users SET money='$new' WHERE username='$username'");
}else{
print "You dont have enough money to buy a scratch card.";
exit();
}
//// end money check
//// start card display

if($card1 == "1"){
$disp1="car";
}elseif($card1 == "2"){
$disp1="money";
}elseif($card1 == "3"){
$disp1="bullets";
}elseif($card1 == "4"){
$disp1="rank";
}elseif($card1 == "5"){
$disp1="boob";
}

if($card2 == "1"){
$disp2="car";
}elseif($card2 == "2"){
$disp2="money";
}elseif($card2 == "3"){
$disp2="bullets";
}elseif($card2 == "4"){
$disp2="rank";
}elseif($card2 == "5"){
$disp2="boob";
}


/// end settin dispaly

//// begin checkin if they have won a prize and if so give it out

//// check if won a car

$message="Sorry you won nothing."; ///DEFAULT MSG
///// check car win ////////
if($card1 == "1" && $card2 == "1" ){
$message="You won a car. You will find it in your garage";

mysql_query("INSERT INTO `garage` ( `id` , `owner` , `car` , `damage` , `origion` , `location` , `upgrades` , `status` , `worth` , `shiptime` ) 
VALUES ('', '$username', 'Jaguar XK', '0', 'New York', 'Beijing', '0-0-0-0-0-0-0-0', '0', '22000', '0')");
}

///// check money win ////////
if($card1 == "2" && $card2 == "2"){
$message="You won £35,000.";
$win_money=$fetch->money+35000;
mysql_query("UPDATE users SET money='$win_money' WHERE username='$username'");
}

///// check bullets win ////////
if($card1 == "3" && $card2 == "3"){
$message="You won 5 bullets.";
$win_bul=$fetch->bullets+5;
mysql_query("UPDATE users SET bullets='$win_bul' WHERE username='$username'");
}

///// check rp win ////////
if($card1 == "4" && $card2 == "4"){
$message="You won 20 Rankpoints.";
$winrp=$fetch->rankpoints+50;
mysql_query("UPDATE users SET rankpoints='$winrp' WHERE username='$username'");
}

///// check boobie win ////////
if($card1 == "5" && $card2 == "5"){
$message="You won the fake prize -5% health.";
$winh=$fetch->health-5;
mysql_query("UPDATE users SET health='$winh' WHERE username='$username'");
}


}///// for the first if




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="includes/test.css" rel="stylesheet" type="text/css">
</head>

<body>
  <table width="400" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" class="thinline">
    <tr>
      <td class="header"><div align="center">Scratch Card </div></td>
    </tr>
    <tr>
      <td><div align="center"></div>        <div align="center"></div>        
        <div align="center" class="style1">Lottery odds to big? Buy a The Mafia Scratchcard </div></td>
    </tr>
    
    <tr>
      <td height="131"><div align="center">
        <p><img src="images/scratch1.jpeg" width="250" height="150" /></p>
        <p class="style1">Prizes :</p>
        <ul class="style1">
          <li>5 Bullets</li>
          <li>&pound;35,000</li>
          <li>Jaguar XK </li>
          <li>20 Rank Points</li>
          <li>-5% Health!!  </li>
        </ul>
        <p class="style1"><font color="#00FF33"><? print"$message"; ?></p></font>
        <p>
<form method="post" action="">
<input type="hidden" value="go" name="go">
<input type="submit" class="submit" value="Buy Scratch Card For &pound;7500">
</form>
          </p>
</div></td>
    </tr>
    
</table>
</body>
</html>
<br>
<?php require_once "statsbar.php"; ?>