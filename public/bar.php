<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/jail_check.php";
logincheck();
$date = gmdate('Y-m-d h:i:s');
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$bar =mysql_fetch_object(mysql_query("SELECT * FROM bar WHERE location='$fetch->location'"));
$fetch_owner=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$bar->owner'"));

?><link href="includes/test.css" rel="stylesheet" type="text/css"><?
if ($fetch->last_order > time()){
?>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Patience Please</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFCC00"><div align="center"><font color="#000000"><? echo "You have ordered recently you need to wait for ".maketime($fetch->last_order)." untill you can order again";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?
exit();
}

if ($fetch->rank == "Scum" || $fetch->rank == "Tramp" || $fetch->rank == "Chav" || $fetch->rank == "Vandal"){
?>
<div align="center">
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg"> 
   <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Patience Please</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFCC00"><div align="center"><font color="#000000"><? echo "You need to be atleast Buisness Man to order."; ?></font></div></td>
    </tr>
  </table>
</div>
<?
exit();
}else{


if (strip_tags($_POST['Submit']) && strip_tags($_POST['for'])){
$for=strip_tags($_POST['for']);
$item=strip_tags($_POST['item']);
$check = mysql_query("SELECT * FROM users WHERE username='$for'");
$check_num =mysql_num_rows($check);
if ($check_num == "0"){
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Patience Please</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFCC00"><div align="center"><font color="#000000"><? echo "No such user"; ?></font></div></td>
    </tr>
  </table>
</div>
<?
}elseif ($check_num != "0"){

$per=mysql_fetch_object($check);
if (strtolower($for) == strtolower($username)){
echo "You cannot order for yourself";
}elseif (strtolower($for) != strtolower($username)){


if ($item == "1"){
$price="50000";
$now=time() + (3600 * 14);

if ($price > $fetch->money){
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="red"><div align="center"><font color="#000000"><? echo "You do not have enough money"; ?></font></div></td>
    </tr>
  </table>
</div><?
}elseif ($price <= $fetch->money){
$new_rank = $per->rankpoints + rand(400,500);
$new_money = $fetch->money - $price;
$new_money_owner = $fetch_owner->money + round(($price / 3));

mysql_query("UPDATE users SET rankpoints='$new_rank' WHERE username='$for'");
mysql_query("UPDATE users SET money='$new_money',last_order='$now' WHERE username='$username'");
mysql_query("UPDATE users SET money='$new_money_owner' WHERE username='$bar->owner'");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$for', '$for', '$username bought you a Cold beer.', '$date', '0', '0', '0'
)");

?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Success</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You bought someone a Cold Beer"; ?></font></div></td>
    </tr>
  </table>
</div><?

}
}elseif ($item == "2"){
$now=time() + (3600 * 14);

$price="20000";
if ($price > $fetch->money){
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="red"><div align="center"><font color="#000000"><? echo "You do not have enough money"; ?></font></div></td>
    </tr>
  </table>
</div><?
}elseif ($price <= $fetch->money){
$new_rank = $per->rankpoints + rand(100,300);
$new_money = $fetch->money - $price;
$new_money_owner = $fetch_owner->money + round(($price / 3));

mysql_query("UPDATE users SET rankpoints='$new_rank' WHERE username='$for'");
mysql_query("UPDATE users SET money='$new_money', last_order='$now' WHERE username='$username'");
mysql_query("UPDATE users SET money='$new_money_owner' WHERE username='$bar->owner'");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$for', '$for', '$username bought you a Coke an Ice.', '$date', '0', '0', '0'
)");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Success</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You bought someone a Coke and Ice"; ?></font></div></td>
    </tr>
  </table>
</div><?


}}elseif ($item == "3"){
$now=time() + (3600 * 14);

$price="2000";
if ($price > $fetch->money){
echo "You dont have enough money.";
}elseif ($price <= $fetch->money){
$new_eng = $per->energy + rand(10,30);
$new_money = $fetch->money - $price;
$new_money_owner = $fetch_owner->money + round(($price / 3));
mysql_query("UPDATE users SET energy='$new_eng' WHERE username='$for'");
mysql_query("UPDATE users SET money='$new_money', last_order='$now' WHERE username='$username'");
mysql_query("UPDATE users SET money='$new_money_owner' WHERE username='$bar->owner'");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$for', '$for', '$username bought you a lucozade', '$date', '0', '0', '0'
)");

echo "Energy drink bought";


}}elseif ($item == "4"){
$now=time() + (3600 * 14);

$price="2000";
if ($price > $fetch->money){
echo "You dont have enough money.";
}elseif ($price <= $fetch->money){
$new_hel = $per->health + rand(5,20);
$new_money = $fetch->money - $price;
$new_money_owner = $fetch_owner->money + round(($price / 3));
mysql_query("UPDATE users SET health='$new_hel' WHERE username='$for'");
mysql_query("UPDATE users SET money='$new_money', last_order='$now'  WHERE username='$username'");
mysql_query("UPDATE users SET money='$new_money_owner' WHERE username='$bar->owner'");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$for', '$for', '$username bought you a Cream cake.', '$date', '0', '0', '0'
)");
echo "Cake bought.";


}}elseif ($item == "5"){
$now=time() + (3600 * 14);

$price="5000";
if ($price > $fetch->money){
echo "You dont have enough money.";
}elseif ($price <= $fetch->money){
$new_eng = $per->energy - rand(5,10);
$new_money = $fetch->money - $price;
$new_money_owner = $fetch_owner->money + round(($price / 3));
mysql_query("UPDATE users SET energy='$new_eng' WHERE username='$for'");
mysql_query("UPDATE users SET money='$new_money', last_order='$now' WHERE username='$username'");
mysql_query("UPDATE users SET money='$new_money_owner' WHERE username='$bar->owner'");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$for', '$for', '$username bought you a spkied Vodka, and it took off some of your energy.', '$date', '0', '0', '0'
)");

echo "Vodka bought.";
}}



}}}

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

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<form name="form1" method="post" action="">
  <table width="74%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#666666" rules=none class=thinline>
    <tr> 
      <td class=header><center>
          The bar </center></td>
    </tr>
	<tr bgcolor=black><td height=1 colspan=3></td></tr>
    <tr> 
      <td height="290"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <!--DWLayoutTable-->
          <tr> 
            <td height="19" colspan="3"><!--DWLayoutEmptyCell-->&nbsp;</td>
            <td width="12" rowspan="7" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
          <tr> 
            <td height="22" colspan="2"><span class="style1">For:</span></td>
            <td width="260"><input name="for" type="text" id="for"></td>
          </tr>
          
          
          <tr> 
            <td width="25" height="23"><input name="item" type="radio" value="1" checked></td>
            <td width="259"><span class="style1">Cold beer</span></td>
            <td><span class="style1">&pound;50,000</span></td>
          </tr>
          <tr> 
            <td height="25">&nbsp;</td>
            <td><span class="style1">Will improve your friends rank alot.</span></td>
            <td><span class="style1"></span></td>
          </tr>
          <tr> 
            <td height="22"><input type="radio" name="item" value="2"></td>
            <td><span class="style1">Coke and Ice </span></td>
            <td><span class="style1">&pound;20,000</span></td>
          </tr>
          <tr> 
            <td height="27">&nbsp;</td>
            <td valign="top"><span class="style1">Will improve your friends rank a bit.</span></td>
            <td><span class="style1"></span></td>
          </tr>
          <tr>
            <td height="20" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
            <td colspan="2" valign="top"><div align="center">
              <input type="submit" name="Submit" value="Submit">
            </div></td>
          </tr>
          
      </table></td>
    </tr>
  </table>
</form>
</body>
</html><p><center>
<p>
<?php include_once"includes/footer.php"; ?></center>
<?php } ?>
