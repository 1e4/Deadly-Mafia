<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once"includes/jail_check.php";
logincheck();
echo "$style";

$username=$_SESSION['username'];
echo "$style"; 




$fetch= mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if ($fetch->weapon == 'Pistol'){

$price = '240';

$the = 1;
}elseif ($fetch->weapon == 'Rifle'){
$price = '640';
$the = 1;
}elseif ($fetch->weapon == 'Shotgun'){
$price = '8754';
$the = 1;
}elseif ($fetch->weapon == 'Twin Uzi'){
$price = '22356';
$the = 1;
}elseif ($fetch->weapon == 'M16'){
$price = '100000';
$the = 1;
}
////above is the guns
if ($fetch->protection == 'Knife'){

$price2 = '920';

$the = 2;
}elseif ($fetch->protection == 'Bullet Vest'){

$price2 = '2008';

$the = 2;
}elseif ($fetch->protection == 'Armoured Car'){

$price2 = '8760';

$the = 2;
}elseif ($fetch->protection == 'Body Double'){

$price2 = '22422';

$the = 2;
}elseif ($fetch->protection == 'Bunker'){

$price2 = '200000';

$the = 2;
}
//////protection above
if ($fetch->plane == 'Microlight'){

$price3 = '16000';

$the = 3;
}elseif ($fetch->plane == 'Small Plane'){

$price3 = '120000';

$the = 3;
}elseif ($fetch->plane == 'Boeing 747'){

$price3 = '200000';

$the = 3;
}elseif ($fetch->plane == 'Concord'){

$price3 = '480000';

$the = 3;
}elseif ($fetch->plane == 'Private Jet'){
$price3 = '1600000';

$the = 3;
}
if ($the == "1"){
$do = 'weapon';
$do1 = $fetch->weapon;
}elseif ($the == "2"){
$do = 'protection';
$do1 = $fetch->protection;
}elseif ($the == "3"){
$do = 'plane';
$do1 = $fetch->plane;
}

$price = $price / 2;
$price2 = $price2 / 2;
$price3 = $price3 / 4;

$sell_pro=strip_tags($_POST['sell_pro']);
$sell_weapon=strip_tags($_POST['sell_weapon']);
$sell_plane=strip_tags($_POST['sell_plane']);

if (strip_tags($_POST['Submit'])){
if ($sell_pro == 'Yes' || $sell_weapon == 'Yes' || $sell_plane == 'Yes'){
if($sell_pro == "Yes"){
mysql_query("UPDATE users SET protection='None' WHERE username='$username'");
$bitty=$price2;
}
if($sell_weapon == "Yes"){
mysql_query("UPDATE users SET weapon='None' WHERE username='$username'");
$bitty2=$price;
}
if($sell_plane == "Yes"){
mysql_query("UPDATE users SET plane='None' WHERE username='$username'");
$bitty3=$price3;
}
$new_money1=$bitty+$bitty2+$bitty3;
$new_money = $fetch->money +$new_money1; ?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">OutCome</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You successfully sold the item(s) for $new_money1";
 ?></font></div></td>
    </tr>
  </table>
</div><?
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
}}

?>






<html><head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>


<center> <body> 
<form name="form1" method="post" action="">
  <table width="84%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
    <tr>
      <td class=header><center>
         Market 
        </center></td>
    </tr>
	<tr bgcolor=black><td height=1 colspan=3></td></tr>
    <tr>
      <td height="21">
<table width="100%" border="0" cellspacing="3" cellpadding="0">
          <tr> 
            <td width="100%"><center>
                Weapon </center></td>
          </tr>
          <tr> 
            <td> <center>
                <?php if ($fetch->weapon == "None"){ echo "You do not have a weapon"; }else{ echo "You currently have a $fetch->weapon, this is worth  $price "; }  ?>
              </center></td>
          </tr>
          <tr> 
            <td><div align="center"> 
                <input name="sell_weapon" type="radio" value="No" checked>
                No 
                <input type="radio" name="sell_weapon" value="Yes">
                Yes</div></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td ><center>
                Protection </center></td>
          </tr>
          <tr> 
            <td> <center>
              </center></td>
          </tr>
          <tr> 
            <td><center>
                <?php if ($fetch->protection == "None"){ echo "You do not have any protection"; }else{ echo "You currently have a $fetch->protection,this is worth $price2"; }  ?>
              </center></td>
          </tr>
          <tr> 
            <td><div align="center"> 
                <input name="sell_pro" type="radio" value="No" checked>
                No 
                <input type="radio" name="sell_pro" value="Yes">
                Yes</div></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td><center>
                Plane </center></td>
          </tr>
          <tr> 
            <td> <center>
              </center></td>
          </tr>
          <tr> 
            <td><center>
                <?php if ($fetch->plane == "None"){ echo "You do not have a plane"; }else{ echo "You currently have a $fetch->plane, it is worth $price3"; }  ?>
              </center></td>
          </tr>
          <tr> 
            <td><div align="center"> 
                <input name="sell_plane" type="radio" value="No" checked>
                No 
                <input type="radio" name="sell_plane" value="Yes">
                Yes</div></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><div align="right">
                <input type="submit" name="Submit" value="Submit">
              </div></td>
          </tr>
        </table> </td>
    </tr>
  </table>
  </form>
</html>
<?php require_once "includes/footer.php"; ?>
