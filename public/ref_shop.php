<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/jail_check.php";
include_once"probe.php";
logincheck();
$page="ref_shop.php";
script_check($page);
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if (strip_tags($_POST['buy_button']) && strip_tags($_POST['buy_item'])){
$buy_item=strip_tags($_POST['buy_item']);
if ($buy_item == "1" || $buy_item == "2" || $buy_item == "3" || $buy_item == "4"){
if ($buy_item == "1"){
$cost="2";
$num="1";
}elseif ($buy_item == "2"){
$cost="10";
$num="2";
}elseif ($buy_item == "3"){
$cost="5";
$num="3";
}elseif ($buy_item == "4"){
$cost="8";
$num="4";
}
if ($fetch->referral < $cost){
echo "You dont have enough referral points to purchase this item.";
}elseif ($fetch->referral >= $cost){
if ($num == "1"){
$new_ref=$fetch->referral-$cost;
$new_money=$fetch->money+10000;
mysql_query("UPDATE users SET money='$new_money',referral='$new_ref' WHERE username='$username'");
echo "You successfully excahnged for money!";
}elseif ($num == "2"){
$new_ref=$fetch->referral-$cost;
$new_bullets=$fetch->bullets+100;
mysql_query("UPDATE users SET bullets='$new_bullets',referral='$new_ref' WHERE username='$username'");
echo "You successfully excahnged for bullets!";
}


}
}}
?>



<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/in.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="form1" method="post" action="">
 <? echo "<font color=red>You currently have $fetch->referral Point(s) to spend<br></font>"; ?>
  <table width="68%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
    <tr> 
      <td class=header><center>
          Referral Shop </center></td>
    </tr>
	<tr bgcolor=black><td height=1 colspan=3></td></tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
          <tr> 
            <td colspan="2">Item</td>
            <td width="50%">Referral points cost</td>
          </tr>
          <tr> 
            <td width="5%"><input name="buy_item" type="radio" value="1" checked></td>
            <td width="45%">&pound;10,000</td>
            <td>2</td>
          </tr>
          <tr> 
            <td><input type="radio" name="buy_item" value="2"></td>
            <td>100 Bullets</td>
            <td>10</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td colspan="3"> <div align="right"> 
                <input type="submit" name="buy_button" value="Submit">
              </div></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<div align="center"><br>
  More coming soon! </div>
</body>
</html>
