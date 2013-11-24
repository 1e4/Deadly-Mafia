<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$kill_username=strip_tags($_POST['kill_username']);
$revive=$_POST['revive'];
$Submit=strip_tags($_POST['Submit']);
$choice=strip_tags($_POST['choice']);

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));



if ($Submit && $choice){
if ($choice == "1"){
$cost="1";

if ($cost > $fetch->points){
echo "You don't have enough Points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET money=money+1000000 WHERE username='$username'");
?><div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" height="19">
    <tr>
      <td background="includes/grad.jpg" height="15"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33" height="2"><div align="center"><font color="#000000"><? echo "Money Purchased";
 ?></font></div></td>
    </tr>
  </table>
</div><?


}
}




}
if ($Submit && $choice){
if ($choice == "50"){
$cost="7";

if ($cost > $fetch->points){
echo "You don't have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET weapon=Browning M2HB WHERE username='$username'");

echo "You bought the browning";

}
}



}
if ($Submit && $choice){
if ($choice == "96"){
$cost="7";

if ($cost > $fetch->points){
echo "You don't have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET last_kill=last_kill=0 WHERE username='$username'");

echo "Timer Reset...";

}
}



}
if ($Submit && $choice){
if ($choice == "4"){
$cost="7";

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
$cost="7";

if ($cost > $fetch->points){
echo "You don't have enough points";
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
$cost="15";

if ($cost > $fetch->points){
echo "You don't have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET health=100 WHERE username='$username'");
?><div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your 
		purchase</div></td>
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
echo "You don't have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET energy=+100 WHERE username='$username'");

echo "You have 100% energy";

}
}



}
if ($Submit && $choice){
if ($choice == "10"){
$cost="1";

if ($cost > $fetch->points){
echo "You don't have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");


mysql_query("UPDATE users SET bullets=bullets+1000 WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You got 1,000 bullets";
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
$cost="10";

if ($cost > $fetch->points){
echo "You don't have enough points";
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
echo "You don't have enough points";
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
if ($choice == "32"){
$cost="500";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET status='Alive' WHERE username='$kill_username'");
mysql_query("UPDATE users SET status='Alive' WHERE username='$revive'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "User Revived!";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?

}
}





}
if ($Submit && $choice){
if ($choice == "1225"){
$cost="350";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET rankpoints=75000 WHERE username='$username'");
mysql_query("UPDATE users SET rank='Assassin' WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You Ranked To Godafther!";
 ?></font></div></td>
    </tr>
  </table>
</div>
<?

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
$cost="70";

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
if ($choice == "145"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET rankpoints=rankpoints+10000 WHERE username='$username'");

echo "You gained 10,000 rankpoints";

}
}




}

?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel=stylesheet href=includes/test.css type=text/css>


</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
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
&pound;1,000,000 </td>
              <td width="49%" bgcolor="#999999" >1</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="10">
        1,000 Bullets</td>
              <td bgcolor="999999" >1</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="5">
        Race Now</td>
              <td bgcolor="999999" >5</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><div align="left">
                  <input type="radio" name="choice" value="21">
          Order from the Bar</div></td>
              <td bgcolor="999999" >5</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="4">
        Oc now</td>
              <td bgcolor="999999" >7</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="96">
        Reset Kill Timer</td>
              <td bgcolor="999999" >7</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="3">
        Fly now</td>
              <td bgcolor="999999" >10</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="6">
        100% health</td>
              <td bgcolor="999999" >30</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="11"> 
              M16 </td>
              <td bgcolor="999999" >50</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="145">
              Get 10,000 Rank Points </td>
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
              <td bgcolor="999999" >70</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><input type="radio" name="choice" value="1225"> 
				Rank to Godfather</td>
              <td bgcolor="999999" >350</td>
            </tr>
            <tr>
              <td bgcolor="999999" ><div align="left">
                  <input type="radio" name="choice" value="32">
                   Revive User:</td></div></td>
              <td bgcolor="999999" ><input name="kill_username" type="text" id="kill_username3">500</td></td>
          </tr>
          </div></td>
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
      <td width="189"><div align="center"><a href="bank2.php">Click Here to Send Points </a></div></td>
    </tr>
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
          <td width="49%" ><div align="center">Price (Green Light SMS/Credit/Debit Card Service)</div></td>
        </tr>
        
        <tr>
          <td ><div align="center">15 (SMS)</div></td>
          <td ><div align="center">£1.50       <a href="">Buy</a>
</div></td>
        </tr>
        <tr>
          <td ><div align="center">30 (SMS)</div></td>
          <td ><div align="center">£3.00  <a href="">Buy</a>
</div></td>
</div></td>
        </tr>
        <tr>
          <td ><div align="center">50 (SMS)</div></td>
          <td ><div align="center">£4.50  <a href="http://www.glpayid=5058">Buy</a></div></td>
        </tr>
</div></td>
        </tr>
        <tr>
          <td ><div align="center">85 (SMS/Credit/Debit Card)</div></td>
          <td ><div align="center">£7.50  <a href="http://www.glpayddi_id=5059">Buy</a></div></td>
        </tr>
</div></td>
        </tr>
        <tr>
          <td ><div align="center">105 (Credit/Debit Card)</div></td>
          <td ><div align="center">£10.00  <a href="http://www.gld=5060">Buy</a></div></td>
        </tr>
        <tr>
          <td ><div align="center">160 (Credit/Debit Card)</div></td>
          <td ><div align="center">£15.00  <a href="http://www.g061">Buy</a></div></td>
        </tr>
        <tr>
          <td ><div align="center">275 (Credit/Debit Card)</div></td>
          <td ><div align="center">£25.00  <a href="http://www_id=5062">Buy</a></div></td>
        </tr>


        
      </table>
    
              <p align="center">
          <p></p></td>
        </tr>
      </table></td>
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


