<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/jail_check.php";
logincheck();



$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if (strip_tags($_GET['buyout'])){
$buyout=strip_tags($_GET['buyout']);

$buy=mysql_query("SELECT * FROM hitlist WHERE id='$buyout'");
if (mysql_num_rows($buy) != "0"){
$info=mysql_fetch_object($buy);

if ($info->amount > $fetch->money){
?>

<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="#FF0000"><div align="center"><font color="#000000"><? echo " You don't have enough money"; ?></font></div></td>
    </tr>
  </table>
</div><?
}elseif ($info->amount <= $fetch->money){
$new_money = $fetch->money - $info->amount;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
mysql_query("DELETE FROM hitlist WHERE id='$buyout'");
echo "User bought out!";


}}
}

if (strip_tags($_POST['Submit']) && strip_tags($_POST['target']) && strip_tags($_POST['an']) && strip_tags($_POST['amount']) && strip_tags($_POST['reason'])){
$target=strip_tags($_POST['target']);
$an=strip_tags($_POST['an']);
$amount=intval(strip_tags($_POST['amount']));
$reason=strip_tags($_POST['reason']);
if ($an == "1" || $an == "2"){

		if ($amount == 0 || !$amount || ereg('[^0-9]',$amount)){
		?>

<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="#FF0000"><div align="center"><font color="#000000"><? echo "Invalid Amount"; ?></font></div></td>
    </tr>
  </table>
</div><?
	
}elseif ($amount != 0 && $amount && !ereg('[^0-9]',$amount)){


if (strtolower($target) == strtolower($username)){
?>

<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="#FF0000"><div align="center"><font color="#000000"><? echo "You cannot hitlist yourself"; ?></font></div></td>
    </tr>
  </table>
</div><?
}elseif (strtolower($target) != strtolower($username)){
$check=mysql_query("SELECT * FROM users WHERE username='$target'");
$num=mysql_num_rows($check);
if ($num == "0"){
?>

<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="#FF0000"><div align="center"><font color="#000000"><? echo " No such user"; ?></font></div></td>
    </tr>
  </table>
</div><?
}elseif ($num != "0"){
if ($an == "2"){
$total_cost=$amount + 1000000;
}else{
$total_cost=$amount;
}
if ($total_cost > $fetch->money){
?>

<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="#FF0000"><div align="center"><font color="#000000"><? echo " You don't have that much money"; ?></font></div></td>
    </tr>
  </table>
</div><?
}elseif ($total_cost <= $fetch->money){

mysql_query("INSERT INTO `hitlist` ( `id` , `paid` , `target` , `reason` , `amount` , `anonymous` ) 
VALUES (
'', '$username', '$target', '$reason', '$amount', '$an'
)");

$new_money = $fetch->money - $total_cost;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Success</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "User Hitlisted"; ?></font></div></td>
    </tr>
  </table>
</div><?

}}
}
}}
}
?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/test.css" rel="stylesheet" type="text/css">

</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<table border="1" width="92%" cellspacing="0" align=center cellpadding="2" bordercolor="black" class="thinline">
  <tr> 
    <td colspan="5" background="includes/grad.jpg"><center>
        Hitlist</center></td>
  </tr>

  <tr bgcolor=#666666> 
    <td width="18%" class=tip><div align="center" class="style1">Target</div></td>
    <td width="18%" class=tip><div align="center" class="style1">Paid by:</div></td>
    <td width="19%" class=tip><div align="center" class="style1">Reward</div></td>
    <td width="24%" class=tip ><div align="center" class="style1">Reason</div></td>
    <td width="21%" class=tip ><div align="center" class="style1">Buyout!</div></td>
  </tr>
  
  <? $query=mysql_query("SELECT * FROM hitlist ORDER by amount DESC");
  $nums =mysql_num_rows($query);
  if ($nums == "0"){
  echo "<tr><td colspan=5><center>There is no one on the hitlist.</center></td></tr>";
  }
  
  
  while($i = mysql_fetch_object($query)){
  if ($i->anonymous == "2"){
  echo "
  <tr>
    <td width=18%><a href='profile.php?viewuser=$i->target'>$i->target</a></td>
    <td width=23%>Anonymous</td>
    <td width=20%>£".makecomma($i->amount)."</td>
    <td width=22%>$i->reason</td>
    <td><a href='?buyout=$i->id'>buyout</a></td>
  </tr>"; 
  }else{
  echo "
  <tr>
    <td width=18%><a href='profile.php?viewuser=$i->target'>$i->target</a></td>
    <td width=23%><a href='profile.php?viewuser=$i->paid'>$i->paid</a></td>
    <td width=20%>£".makecomma($i->amount)."</td>
    <td width=22%>$i->reason</td>
    <td><a href='?buyout=$i->id'>buyout</a></td>
  </tr>"; }
  
  }
  ?>
</table>
<p>&nbsp;</p>
<form name="form1" method="post" action="">
  <table width="54%" border="1" align=center cellpadding="2" cellspacing="0" bordercolor="black" bgcolor="#666666" class="thinline">
  <tr> 
    <td colspan="2" background="includes/grad.jpg"><center>
        Hitlist someone </center></td>
  </tr>
  <tr>
    <td colspan="2"><span class="style1">It costs &pound;1,000,000 To hitlist someone + the amount </span></td>
    </tr>
  <tr> 
    <td> <p class="style1">Username</p></td>
    <td><input name="target" type="text" id="target2"></td>
  </tr>
  <tr> 
    <td><span class="style1">Anonymous</span></td>
    <td><span class="style1">
      <input name="an" type="radio" value="1" checked>
      No 
      <input type="radio" name="an" value="2">
      Yes</span></td>
  </tr>
  <tr> 
    <td><span class="style1">Amount</span></td>
    <td><input name="amount" type="text" id="amount2"></td>
  </tr>
  <tr> 
    <td><span class="style1">Reason</span></td>
    <td><span class="style1">
      <textarea name="reason" id="textarea"></textarea>
    </span></td>
  </tr>
  <tr>
    <td><span class="style1"></span></td>
    <td><input name="Submit" type="submit" value="Submit"></td>
  </tr>
</table>

</form>
</body>
</html>
<?php require_once "includes/footer.php"; ?>