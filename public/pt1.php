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

echo "Money purchased";

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
mysql_query("UPDATE users SET last_oc=last_oc=0 WHERE username='$username'");

echo "Now you can OC";

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

echo "Now you can race";

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
mysql_query("UPDATE users SET health=+100 WHERE username='$username'");

echo "You have 100% health";

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
mysql_query("UPDATE users SET bullets=bullets+1000 WHERE username='$username'");

echo "You have 1000 bullets";

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

echo "Now you can fly";

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

echo "You can now order from the bar";

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
if ($choice == "35"){
$cost="85";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET rankpoints=rankpoints+100 WHERE username='$username'");

echo "You gained 100 rankpoints";

}
}




}
if ($Submit && $choice){
if ($choice == "45"){
$cost="200";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET rankpoints=rankpoints+250 WHERE username='$username'");

echo "You gained 250 rankpoints";

}
}




}
if ($Submit && $choice){
if ($choice == "55"){
$cost="750";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET rankpoints=rankpoints+1000 WHERE username='$username'");

echo "You gained 1000 rankpoints";

}
}




}
?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="right"></div>
<div align="center">
  <table width="36%" height="250" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
    <tr>
      <td colspan="2"  background="includes/grad.jpg"><center>
        Points
      </center></td>
    </tr>
    <tr>
      <td width="51%" ><input type="radio" name="choice" value="1">
&pound;10,000 </td>
      <td width="49%" >10</td>
    </tr>
    <tr>
      <td ><input type="radio" name="choice" value="3">
      Fly now</td>
      <td >5</td>
    </tr>
    <tr>
      <td ><input type="radio" name="choice" value="4">
      Oc now</td>
      <td >50</td>
    </tr>
    <tr>
      <td ><input type="radio" name="choice" value="5">
      Race now</td>
      <td >5</td>
    </tr>
    <tr>
      <td ><input type="radio" name="choice" value="6">
      100% health</td>
      <td >80</td>
    </tr>
    <tr>
      <td ><input type="radio" name="choice" value="10">
      1000 Bullets</td>
      <td >10</td>
    </tr>
    <tr>
      <td ><input type="radio" name="choice" value="7">
      100% energy</td>
      <td >10</td>
    </tr>
    <tr>
      <td ><div align="left">
          <input type="radio" name="choice" value="21">
        Order from the Bar</div></td>
      <td >10</td>
    </tr>
    <tr>
      <td ><input type="radio" name="choice" value="25">
      10 Rank Points </td>
      <td >10</td>
    </tr>
    <tr>
      <td ><input type="radio" name="choice" value="35">
      100 Rank Points </td>
      <td >85</td>
    </tr>
    <tr>
      <td ><input type="radio" name="choice" value="45">
      250 Rank Points </td>
      <td >200</td>
    </tr>
    <tr>
      <td ><input type="radio" name="choice" value="55">
      1000 Rank Points </td>
      <td >750</td>
    </tr>
    <tr>
      <td ><span  style="FONT-WEIGHT:bold">Points:</span><?php echo "".makecomma($fetch->points).""; ?> <span  ></span>&nbsp;</td>
      <td ><input type="submit" name="Submit" value="Submit"></td>
    </tr>
  </table>