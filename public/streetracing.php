<?
session_start();

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
$cost="1000";

if ($cost > $fetch->money){ 
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Failed</div></td>
    </tr>
    <tr>
      <td bgcolor="red"><div align="center"><font color="#000000"><? echo "You dont have enough money"; ?></font></div></td>
    </tr>
  </table>
</div><?
}else{
mysql_query("UPDATE users SET money=money-$cost WHERE username='$username'");
mysql_query("UPDATE users SET last_race=last_race=0 WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Success</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You can now race"; ?></font></div></td>
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
<link href="includes/test.css" rel="stylesheet" type="text/css">

</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<form name="form1" method="post" action="">
  <table width="52%" height="52" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
    <tr> 
      <td colspan="2"  background="includes/grad.jpg"> <center class="style1">
          <span class="style1">Street Race          </span>
      </center></td>
    </tr>
    <tr> 
      <td width="51%" bgcolor="#666666" ><span class="style1">
        <input type="radio" name="choice" value="5">
&pound;1,000 </span></td>
      <td width="49%" bgcolor="#666666" ><span class="style1">Bribe the cops so you can do another street race! </span></td>
    </tr>
    <tr> 
      <td bgcolor="#666666" ><a href="car_race.php">click here to continue to race </a></td>
      <td bgcolor="#666666" ><input name="Submit" type="submit" value="Submit"></td>
    </tr>
  </table>
  <div align="center"></form>
<div align="center">
  <p><br>
  </p>
</div>
<p>&nbsp;



<?php  ?>
 <?php echo"<p>"; include_once"includes/footer.php"; ?>

</p>
</form>
</body>
</html>

