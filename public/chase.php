<?
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/jail_check.php";
logincheck();
$username=$_SESSION['username'];

?><link href="includes/test.css" rel="stylesheet" type="text/css"><?


$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if ($fetch->last_chase > time()){
$left = $fetch->last_chase - time(); ?><body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Patience Please</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFCC00"><div align="center"><font color="#000000"><? echo "You can only do 1 chase every 7 mins you must wait $left seconds!"; ?></font></div></td>
    </tr>
  </table>
</div>
<?

}


else{
if($turn){
$luck = rand(1,4);
if($luck == 1 OR $luck == 3){
?>
<link href="/includes/in.css" rel="stylesheet" type="text/css" />
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<center><font color="#00ff00">You turned around and kept going.</font>
<?
}
elseif($luck == 2){
$new_rp = $fetch->rankpoints+5;
mysql_query("UPDATE users SET rankpoints='$new_rp' WHERE username='$username'");
$tijd = time()+(7*60);
mysql_query("UPDATE users SET last_chase='$tijd' WHERE username='$username'");
?>

<center><font color="#ff0000">You turned around and crashed.</font>
<?
}
elseif($luck == 4){
$money = rand(988,4499);
$new_money = $fetch->money+$money;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
$tijd = time()+(7*60);
mysql_query("UPDATE users SET last_chase='$tijd' WHERE username='$username'");
?>
<font color="#00ff00"><center>You turned around and got away with <b>£<?=number_format($money); ?></b>.</font>
<?
}
}
elseif($left){
$luck = rand(1,4);
if($luck == 1 OR $luck == 3){
?>
<font color="#00ff00"><center>You turned left and kept going.</font>
<?
}
elseif($luck == 2){
$new_rp = $fetch->rankpoints+3;
mysql_query("UPDATE users SET rankpoints='$new_rp' WHERE username='$username'");
$tijd = time()+(7*60);
mysql_query("UPDATE users SET last_chase='$tijd' WHERE username='$username'");
?>
<font color="#00ff00"><center>You turned left and crashed.</font>
<?
}
elseif($luck == 4){
$money = rand(888,4555);
$new_money = $fetch->money+$money;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
$new_rp = $fetch->rankpoints+18;
mysql_query("UPDATE users SET rankpoints='$new_rp' WHERE username='$username'");
$tijd = time()+(7*60);
mysql_query("UPDATE users SET last_chase='$tijd' WHERE username='$username'");
?>
<font color="#00ff00"><center>You turned left and got away with <b>£<?=number_format($money); ?></b>.</font>
<?
}
}
elseif($right){
$luck = rand(1,4);
if($luck == 1 OR $luck == 3){
?><font color="#00ff00"><center>You turned right and kept going.</font>
<?
}
elseif($luck == 2){
$new_rp = $fetch->rankpoints+3;
mysql_query("UPDATE users SET rankpoints='$new_rp' WHERE username='$username'");
$tijd = time()+(7*60);
mysql_query("UPDATE users SET last_chase='$tijd' WHERE username='$username'");
?>
<font color="#00ff00"><center>You turned right and crashed.</font>
<?
}
elseif($luck == 4){
$money = rand(898,455);
$new_money = $fetch->money+$money;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
$new_rp = $fetch->rankpoints+18;
mysql_query("UPDATE users SET rankpoints='$new_rp' WHERE username='$username'");
$tijd = time()+(7*60);
mysql_query("UPDATE users SET last_chase='$tijd' WHERE username='$username'");
?>
<font color="#00ff00"><center>You turned right and made <b>&pound;<?=number_format($money); ?></b>.</font>
<?
}
}
elseif($straight){
$luck = rand(1,4);
if($luck == 1 OR $luck == 3){
?>
<font color="#00ff00"><center>You went straight ahead and kept going.</font>
<?
}
elseif($luck == 2){
$new_rp = $fetch->rankpoints+3;
mysql_query("UPDATE users SET rankpoints='$new_rp' WHERE username='$username'");
$tijd = time()+(7*60);
mysql_query("UPDATE users SET last_chase='$tijd' WHERE username='$username'");
?>
<font color="#00ff00"><center>You went straight ahead and crashed.</font>
<?
}
elseif($luck == 4){
$money = rand(5000,50000);
$new_money = $fetch->money+$money;
$new_rp = $fetch->rankpoints+18;
mysql_query("UPDATE users SET rankpoints='$new_rp' WHERE username='$username'");

mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
$tijd = time()+(7*60);
mysql_query("UPDATE users SET last_chase='$tijd' WHERE username='$username'");
?>
<font color="##00ff00"><center>You went straight and got away. You made <b>£<?=number_format($money); ?></b>.</font>
<?
}
}
?>
<center>
<link href="includes/test.css" rel="stylesheet" type="text/css">
<form action="chase.php">
<table width="33%" border=0 align="center" cellpadding=0 cellspacing=0 bordercolor=black class="thinline">
<td background="includes/grad.jpg" colspan="5" height="19"><div align="center">Getaway</div></td>
<tr><td class="sub"> </td><td> </td><td align="center"><input name="straight" type="submit" class="submit" value="Straight ahead"></td><td colspan="2"></td></tr>
<tr><td class="sub"> </td><td><input name="left" type="submit" class="submit" value="Turn Left"></td><td> </td>
  <td colspan="2"><input name="right" type="submit" class="submit" value="Turn Right" /></td>
</tr>
<tr><Td class="sub"> </td><Td> </td><td align="center"><input name="turn" type="submit" class="submit" value="Turn around"></td>
  <td colspan="2"></td>
</tr>
</table>
</form>
<?
}
?>


<br />
<br />

<?php require_once "includes/footer.php"; ?><body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">