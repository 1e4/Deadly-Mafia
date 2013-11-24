<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";

$size=strip_tags($_POST['size']);
$name=strip_tags($_POST['name']);
if (strip_tags($_POST['submit']) && $size == "1" || $size=="2" || $size=="3" || $size=="4" || $size=="5" && strip_tags($_POST['name'])){
if (!$name){
echo "<font color=#FFFFFF>Fill in a crew name</font>";
exit();
}
$user=mysql_fetch_object(mysql_query("SELECT username,crew FROM users WHERE username='$username'"));

$crew=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$user->crew'"));

$optionz=mysql_query("SELECT name FROM crews WHERE recruiting='1' ORDER by id DESC");

$count=mysql_num_rows(mysql_query("SELECT * FROM crews"));

if ($count >= "16"){
echo "<font color=red><b>* No more crews can be created!</b></font>";

}else{

if ($size == "1"){
$price="1500000";
$size_p="15";
}elseif ($size == "2"){
$price="2500000";
$size_p="50";
}elseif($size == "3"){
$price="5000000";
$size_p="100";
}elseif($size == "4"){
$price="6500000";
$size_p="150";
}elseif($size == "5"){
$price="10000000";
$size_p="200";
}
if(($apply) && $user->crew == "0"){
mysql_query("UPDATE users SET apply='$apply' WHERE username='$username'");
print "Application submitted";

if ($fetch->rank == "Homeless" ||$fetch->rank == "Civilian" ||$fetch->rank == "Unemployable" ||$fetch->rank == "Employable" ||$fetch->rank == "Worker" ||$fetch->rank == "Apprentice" ||$fetch->rank == "Associate" ||$fetch->rank == "Big Earner"){
echo "<font color=white>You need to be atleast Wise Guy to create a crew.</font>";
}else{


if ($price > $fetch->money){
echo "You dont have enough money";
}elseif ($price <= $fetch->money){


$he = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE name='$name'"));
if ($he !="0"){
echo "<font color=#FFFFFF>Name is taken</font>";
}elseif($he =="0"){

$nmoney = $fetch->money-$price;
mysql_query("UPDATE users SET money='$nmoney',crew='$name' WHERE username='$username'");
mysql_query("INSERT INTO `crews` ( `id` , `owner` , `size`,`name`,`message` ) 
VALUES (
'', '$username', '$size_p','$name','$WelcomeMessage!'
)");
echo "Your crew has been created";
}
}}}}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel=stylesheet href=css.css type=text/css>
<style type="text/css">
<!--
.style3 {color: #FFFFFF}
-->
</style>
</head>

<body>
<form name="form1" method="post" action="">
  <table width="30%" border="1" align="left" cellpadding="2" cellspacing="0" bordercolor=black>
    <tr>
      <td height=18 background=img.gif colspan=2><center>
          <font color=white>Create a Gang</center></td>
    </tr>
    <tr>
      <td bgcolor=#333333><font color=#FFFFFF><b>Gang name: </b></font></td>
      <td bgcolor=#333333><center><input name="name" style="background-color: #222222; bottom; background-repeat: repeat; border: none; color: #FFFFFF; cursor: pointer; height: 17px;border-left: 1px solid #000000; border-right: 1px solid #000000; border-top: 1px solid #000000; border-bottom: 1px solid #000000; font-size: 7.5pt; font-weight: bold; font-family: Verdana;" type="text" id="name" size="20" maxlength="60"></center></td>
    </tr>
    <tr>
      <td bgcolor=#333333 colspan=2 width="30%" height="21"> <input name="size" type="radio" value="1" checked>
        <font color=#FFFFFF>15</font><input type="radio" name="size" value="2">
        <font color=#FFFFFF>50</font><input type="radio" name="size" value="3">
        <font color=#FFFFFF>100</font><input type="radio" name="size" value="4">
        <font color=#FFFFFF>150</font><input type="radio" name="size" value="5">
        <font color=#FFFFFF>200</font></td>
    </tr>
    <tr>
      <td bgcolor=#333333 colspan=2 align=right><input name="submit" style="background-color: #222222; bottom; background-repeat: repeat; border: none; color: #FFFFFF; cursor: pointer; height: 20px;border-left: 1px solid #000000; border-right: 1px solid #000000; border-top: 1px solid #000000; border-bottom: 1px solid #000000; font-size: 7.5pt; font-weight: bold; font-family: Verdana;" type="submit" id="submit3" value="Make!"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="30%" border="1" align="right" cellpadding="2" cellspacing="0" bordercolor=black>
<tr>
      <td height=18 background=img.gif colspan=2><font color=white><center>Gang Prices</center></td>
    </tr>
<tr>
       <td bgcolor=#333333>15 members</td>
      <td bgcolor=#333333><font color=white>$1,500,000</td>
    </tr>
    <tr>
      <td bgcolor=#333333>50 members</td>
      <td bgcolor=#333333><font color=white>$2,500,000</td>
    </tr>
    <tr>
      <td bgcolor=#333333>100 members</td>
      <td bgcolor=#333333><font color=white>$5,000,000</td>
    </tr>
    <tr>
      <td bgcolor=#333333>150 members</td>
      <td bgcolor=#333333><font color=white>$6,500,000</td>
    </tr>
    <tr>
      <td bgcolor=#333333>200 members</td>
      <td bgcolor=#333333><font color=white>$10,000,000</td>
    </tr>
</table>
</form>
<table width="300" border="1" align="center" cellspacing="0" bordercolor="#000000" bgcolor="#333333" class="background">
  <tr class="header">
    <th background="includes/grad.jpg" scope="col"><span class="style3">Crew Applications </span></th>
  </tr>
  <tr>
    <th bgcolor="333333" scope="row"><span class="style3">
      <select name="select" class="button">
            <? while($option = mysql_fetch_object($optionz)){ ?>
            <option value="<? print"$option->name"; ?>"><? print"$option->name"; ?></option>
            <? } ?>
          </select>
    </span></th>
  </tr>
  <tr>
    <th bgcolor="333333" scope="row"><input name="Submit" type="submit" class="button " value="Apply" /></th>
  </tr>
</table>
</body>
</html>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form action="crew.php" method="post">
<table width="30%" border="1" align="left" cellpadding="2" cellspacing="0" bordercolor=black>
    <tr>
      <td height=18 background=img.gif colspan="2"><center>
          <font color=white>Join a Gang</center></td>
    </tr>
    <tr>
      <td bgcolor=#333333><select name="jmob">
<option value="<?php echo"$name"; ?>"><?php echo "$name"; ?></option>
</select></td>
      </tr>
      <tr>
      <td bgcolor=#333333><center><input type="submit" style="background-color: #222222; bottom; background-repeat: repeat; border: none; color: #FFFFFF; cursor: pointer; height: 17px;border-left: 1px solid #000000; border-right: 1px solid #000000; border-top: 1px solid #000000; border-bottom: 1px solid #000000; font-size: 7.5pt; font-weight: bold; font-family: Verdana;" name="apply" value="Apply" /></center></td>
    </tr>
</table>
</form>
<br>

<table width="30%" border="1" align="right" cellpadding="2" cellspacing="0" bordercolor=black>
    <tr>
      <td height=18 background=img.gif colspan="2"><center>
          <font color=white>Current application!</center></td>
    </tr>
<tr>
<td bgcolor=#333333>Your current application: <b><?php echo "$app"; ?><b></td>
</tr>


<?



}elseif($fetch->crew != "0"){


include_once "crew_front.php";

exit();
}
?>
