<?php
session_start();

include_once "includes/functions.php";
include_once "includes/jail_check.php";
logincheck();

if($info->helper=='0'){

die("<center><h3>You are not Authorized to View This Page</h3></center>");

}


echo "$style";
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
if (strip_tags($_POST['Submit']) && strip_tags($_POST['units'])){
$units=intval(strip_tags($_POST['units']));


		if ($units == 0 || !$units || ereg('[^0-9]',$units)){
	print "Invalid amount.";
	
}elseif ($units != 0 && $units && !ereg('[^0-9]',$units)){

$price = $units * 1000;
if ($price > $fetch->money){
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You don't have enough cash"; ?></font></div></td>
    </tr>
  </table>
</div><?
}elseif ($price <= $fetch->money){
$new_money=$fetch->money - $price;
$new_health=$fetch->health + $units;
if ($fetch->health == "200"){ 
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Error</div></td>
    </tr>
    <tr>
      <td bgcolor="red"><div align="center"><font color="#000000"><? echo "You have full health"; ?></font></div></td>
    </tr>
  </table>
</div><?
}else{
if ($new_health >= "200"){
$new_health="200";
}

mysql_query("UPDATE users SET money='$new_money', health='$new_health' WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Success</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "Health Bought"; ?></font></div></td>
    </tr>
  </table>
</div><?


}}}}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/test.css" rel="stylesheet" type="text/css">
</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<form name="form1" method="post" action="">
  <table width="36%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
    <tr> 
      <td background="includes/grad.jpg" class=header><center>
      Hospital
      </center></td>
    </tr>
	<tr bgcolor=black><td height=1></td></tr>
	<tr bgcolor=#FFFFFF> 
            <td bgcolor="#666666"  class=tip ><div align="center">Welcome to staff hospital.</div></td>
    </tr>
    <tr> 
      <td bgcolor="#666666"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          
		  
          <tr> 
            <td colspan="2" bgcolor="#666666"><div align="center">It will cost &pound;1000 for every 
            unit of health</div></td>
          </tr>
          <tr> 
            <td width="52%" bgcolor="#666666"><div align="center">Units: </div></td>
            <td width="48%" bgcolor="#666666"><input name="units" type="text" id="units" size="10" maxlength="3"></td>
          </tr>
          <tr> 
            <td bgcolor="#666666">&nbsp;</td>
            <td bgcolor="#666666"><input type="submit" name="Submit" value="Submit"></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php require_once "includes/footer.php"; ?>