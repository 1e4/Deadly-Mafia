<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once"casinoCP.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if (strip_tags($_POST['buy_button']) && strip_tags($_POST['buy_item'])){
$buy_item=strip_tags($_POST['buy_item']);
if ($buy_item == "1" || $buy_item == "2" || $buy_item == "36" || $buy_item == "4"){
if ($buy_item == "1"){
$cost="2";
$num="1";
}elseif ($buy_item == "2"){
$cost="6";
$num="2";
}elseif ($buy_item == "36"){
$cost="5";
$num="36";
}elseif ($buy_item == "4"){
$cost="8";
$num="4";
}
if ($fetch->referral < $cost){
echo "You dont have enough referral points to purchase this item.";
}elseif ($fetch->referral >= $cost){
if ($num == "1"){
$new_ref=$fetch->referral-$cost;
$new_money=$fetch->money+8000;
mysql_query("UPDATE users SET money='$new_money',referral='$new_ref' WHERE username='$username'");
echo "You successfully excahnged for money!";
}elseif ($num == "2"){
$new_ref=$fetch->referral-$cost;
$new_bullets=$fetch->rankpoints+25;
mysql_query("UPDATE users SET rankpoints='$new_bullets',referral='$new_ref' WHERE username='$username'");
echo "You successfully excahnged for rank points!";
}
}elseif ($num == "36"){
$new_ref=$fetch->referral-$cost;
$new_rankpoints=$fetch->bullets+100;
mysql_query("UPDATE users SET bullets='$new_rankpoints',referral='$new_ref' WHERE username='$username'");
echo "You successfully excahnged for bullets!";
}


}
}
?>




<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel=stylesheet href=includes/test.css type=text/css>

</head><form action="" method=POST>

<body>

<SCRIPT TYPE="text/javascript">
<!--
function copyCLink()
{
	window.clipboardData.setData('Text', 'Refferall Dosnt Work Lol echo "$username"; ?>');
}
//-->
</SCRIPT>
<br>
<table width="81%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
  <tr> 
    <td colspan="2" background="includes/grad.jpg"><center class=bold>
        Referral programme </center></td>
  </tr>
  <tr bgcolor=#999999> 
    <td height="10" colspan="2" class=tip><div align="center">You currently have <?php echo "$fetch->referral"; ?> 
        referral points. </div>
    <div align="center"> </div></td>
  </tr>
  <tr> 
    <td height="5" colspan="2" bgcolor="666666">By referring your friends or family to The Mafia 
      you can help us get larger! Every time you refer someone you will get a 
      referral point, which can buy game stuff!</td>
  </tr>
  <tr> 
    <td width="52%" height="6" bgcolor="666666"><a href="javascript:copyCLink()">Your referral link</a></td>
    <td width="48%" bgcolor="666666"><?php echo "Refferal Currently not working"; ?></td>
  </tr>
</table>
<p>&nbsp;</p><table width="81%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
  <tr> 
    <td colspan="2" background="includes/grad.jpg"><center class=bold>
        Referral shop </center></td>
  </tr>
  <tr bgcolor=#999999> 
    <td height="10" colspan="2" class=tip><div align="center">You currently have <?php echo "$fetch->referral"; ?> 
        referral points to spend. </div>
    <div align="center"> </div></td>
  </tr>
  <tr> 
    <td width="24%" bgcolor="666666"><input name="buy_item" type="radio" value="1" checked>
    &pound;8,000</td>
    <td width="24%" bgcolor="666666">2</td>
  </tr>
  <tr> 
    <td bgcolor="666666"><input type="radio" name="buy_item" value="2">
    100 bUllets </td>
    <td bgcolor="666666">6</td>
  </tr>
  <tr>
    <td bgcolor="666666">&nbsp;</td>
    <td bgcolor="666666"><input type="submit" name="buy_button" value="Submit"></td>
  </tr>
</table>
<p>&nbsp;</p> <? include_once"includes/footer.php"; ?>