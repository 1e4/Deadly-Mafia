<?
session_start();
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
include "includes/db_connect.php";
$username=$_SESSION['username'];

$Submit=strip_tags($_POST['Submit']);
$choice=strip_tags($_POST['choice']);

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));


if ($Submit && $choice){
if ($choice == "1"){
$cost="100";

if ($cost > $fetch->points){
echo "You dont have enough cash";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET money=money+10000 WHERE username='$username'");

echo "Money purchased";

}
}




}
$username=$_SESSION['username'];

$Submit=strip_tags($_POST['Submit']);
$choice=strip_tags($_POST['choice']);

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));


if ($Submit && $choice){
if ($choice == "1"){
$cost="100";

if ($cost > $fetch->points){
echo "You dont have enough cash";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET money=money+10000 WHERE username='$username'");

echo "Money purchased";

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
<form name="form1" method="post" action="">
  <table width="52%" height="52" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
    <tr> 
      <td colspan="2"  background="file:///C|/DOCUME%7E1/J/LOCALS%7E1/Temp/Rar$DI02.499/includes/grad.jpg"> <center>
          Points </center></td>
    </tr>
    <tr> 
      <td width="51%" ><input type="radio" name="choice" value="1">
        &pound;10,000 </td>
      <td width="49%" >10</td>
    </tr>
    <tr> 
      <td ><input type="radio" name="choice" value="2"> &pound;1000</td>
      <td >10</td>
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
      <td >10</td>
    </tr>
    <tr> 
      <td ><input type="radio" name="choice" value="7">
        100% energy</td>
      <td >10</td>
    </tr>
    <tr> 
      <td ><input type="radio" name="choice" value="8">
        Rename Crew</td>
      <td >100</td>
    </tr>
    <tr> 
      <td ><input type="radio" name="choice" value="9">
        Double M16 </td>
      <td >100</td>
    </tr>
    <tr> 
      <td ><input type="radio" name="choice" value="10">
        Safehouse</td>
      <td >100</td>
    </tr>
    <tr> 
      <td ><input type="radio" name="choice" value="11">
        Airbus A380 </td>
      <td >100</td>
    </tr>
    <tr> 
      <td >&nbsp;</td>
      <td ><input type="submit" name="Submit" value="Submit"></td>
    </tr>
  </table>
  <div align="center"></form>
<div align="center"><br>
  <br>
  </div>
<p>&nbsp;</p>
</form>
</body>
</html>
