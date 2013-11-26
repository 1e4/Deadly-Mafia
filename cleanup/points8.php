<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$Submit=strip_tags($_POST['Submit']);
$choice=strip_tags($_POST['choice']);

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));



if ($Submit && $choice){
if ($choice == "1"){
$cost="10";

if ($cost > $fetch->points){
echo "You dont have enough Points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET money=money+10000 WHERE username='$username'");
?><div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "Money Purchased";
 ?></font></div></td>
    </tr>
  </table>
</div><?


}
}




}
if ($Submit && $choice){
if ($choice == "9"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET weapon=Browning M2HB WHERE username='$username'");

echo "You bought the browning";

}
}




}
if ($Submit && $choice){
if ($choice == "4"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET octime=octime=0 WHERE username='$username'");
?><div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You can now OC";
 ?></font></div></td>
    </tr>
  </table>
</div><?


}
}




}
if ($Submit && $choice){
if ($choice == "5"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET last_race=last_race=0 WHERE username='$username'");
?><div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You can now race";
 ?></font></div></td>
    </tr>
  </table>
</div><?

}
}




}
if ($Submit && $choice){
if ($choice == "6"){
$cost="80";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET health=100 WHERE username='$username'");
?><div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You have 100% Health";
 ?></font></div></td>
    </tr>
  </table>
</div><?

}
}




}
if ($Submit && $choice){
if ($choice == "7"){
$cost="10";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET energy=+100 WHERE username='$username'");

echo "You have 100% energy";

}
}



}
if ($Submit && $choice){
if ($choice == "10"){
$cost="10";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");


mysql_query("UPDATE users SET bullets=bullets+750 WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You got 750 bullets";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?
}
}




}
if ($Submit && $choice){
if ($choice == "3"){
$cost="5";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET lasttravel=lasttravel=0 WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "Now you can fly";
 ?></font></div></td>
    </tr>
  </table>
</div>

<?
}
}




}
if ($Submit && $choice){
if ($choice == "21"){
$cost="5";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET last_order=last_order=0 WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You can now order from the bar";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?

}
}




}
if ($Submit && $choice){
if ($choice == "21"){
$cost="5";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET protection=Doberman WHERE username='$username'");

echo "You can now order from the bar";

}
}




}
if ($Submit && $choice){
if ($choice == "25"){
$cost="10";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET rankpoints=rankpoints+10 WHERE username='$username'");

echo "You gained 10 rankpoints";

}
}




}
if ($Submit && $choice){
if ($choice == "11"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET weapon='M16' WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You got the M16";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?

}
}




}
if ($Submit && $choice){
if ($choice == "12"){
$cost="60";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET plane='Private Jet' WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You got the Private Jet";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?
}
}




}
if ($Submit && $choice){
if ($choice == "13"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET protection='Bunker' WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You got the Bunker";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?
}
}




}
if ($Submit && $choice){
if ($choice == "1882"){
$cost="1";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET last_ext=0 WHERE username='$username'");

echo "You gained 1000 rankpoints";

}
}




}

?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #FF0000}
body {
	background-color: #000000;
}
-->
</style>
</head>

<body>
<form name="form1" method="post" action="">
  <div align="right"></div>
  <div align="left">
    <table width="753" height="200" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td><table width="75%" height="250" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor=000000 class=thinline>
            <tr>
              <td height="20" colspan="2"  background="includes/grad.jpg"><center>
          Points
              </center></td>
            </tr>
            <tr>
              <td width="51%" bgcolor="#999999" ><input type="radio" name="choice" value="1">
&pound;10,000 </td>
              <td width="49%" bgcolor="#999999" >10</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="3">
        Fly now</td>
              <td bgcolor="999999" >5</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="4">
        Oc now</td>
              <td bgcolor="999999" >50</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="6">
        100% health</td>
              <td bgcolor="999999" >30</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="10">
        750 Bullets</td>
              <td bgcolor="999999" >10</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="11"> 
              M16 </td>
              <td bgcolor="999999" >50</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="12">
              Private Jet </td>
              <td bgcolor="999999" >60</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="13"> 
              Protection Bunker 6 </td>
              <td bgcolor="999999" >50</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><div align="left">
                  <input type="radio" name="choice" value="21">
          Order from the Bar</div></td>
              <td bgcolor="999999" >10</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><span  style="FONT-WEIGHT:bold">Points:</span><?php echo "".makecomma($fetch->points).""; ?> <span  ></span>&nbsp;</td>
              <td bgcolor="999999" ><input name="Submit" type="submit" id="Submit" value="Submit"></td>
            </tr>
        </table></td>
      </tr>
    </table>
  </div>
  <div align="center">
</form>
<table width="753" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <td height="40"><tr>
      <table width="93%" bgcolor="#666666" height="192" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
        <tr>
          <td height="25" colspan="2"  background="includes/grad.jpg"><center>
        Points prices
          </center></td>
        </tr>
        <tr bgcolor="#666666">
          <td width="51%" ><div align="center">Points</div></td>
          <td width="49%" ><div align="center">Price (Paypal)</div></td>
        </tr>
        
        <tr>
          <td ><div align="center">200</div></td>
          <td ><div align="center">$20</div></td>
        </tr>
        <tr>
          <td ><div align="center">500</div></td>
          <td ><div align="center">$40</div></td>
        </tr>
        <tr>
          <td ><div align="center">1200</div></td>
          <td ><div align="center">$100</div></td>
        </tr>
        
      </table>
    
      <td width="524"><table width="79%"  border="1" align="center" cellPadding="0" cellSpacing="0" class="thinline" bordercolor=0000000>
        <tr >
          <td height="20" background="includes/grad.jpg"><center class=bold>
        Payment methods
          </center></td>
        </tr>
        <tr>
          <td bgcolor="999999"><p align="center">You can buy points for The Mafia in different ways
              <p align="center">1) <span class="style1">Paypal payment</span>
              <P><div align="center"><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but23.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
</form>
			  <p>
            <p align="center">2) <span class="style1">SMS text msg payment </span>
            <p align="center"><a href="pointstestsms.php">Click here to buy 30 Points for &pound;1.50 (UK Only)</a></p>
             
              <p align="center">&nbsp;</p>
              <p align="center">&nbsp;</p>
              <p align="center">
          <p></p></td>
        </tr>
      </table></td>
      <td width="189"><div align="center"><a href="bank2.php">Click Here to Send Points </a></div></td>
    </tr>
</table>  
  <div align="center"><p>&nbsp; </p>
    <p>&nbsp;</p>
  </div>
  <p>&nbsp;</p>
</form>
</body>
</html>

  <div align="center">
    <p></p>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
  </form>
  <p>&nbsp;</p>
</div>
<p>


