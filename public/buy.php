<?php
session_start();
 include_once "includes/db_connect.php"; include_once "includes/functions.php"; logincheck();
$username=$_SESSION['username'];

$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$fetch=mysql_fetch_object($query);

$shop=mysql_fetch_object(mysql_query("SELECT * FROM shop WHERE location='$fetch->location'"));
$owner=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$shop->owner'"));

if (strtolower($shop->owner) == strtolower($username)){
include_once"shopCP.php";
exit();
}


if (strip_tags($_POST['weapon_button']) && strip_tags($_POST['choose_weapon'])){
$choose_weapon = strip_tags($_POST['choose_weapon']);

if ($choose_weapon == "1"){
$price="100000";
$weapon="FiveSeven";
}elseif ($choose_weapon == "2"){
$price="250000";
$weapon="Shotgun";
}elseif ($choose_weapon == "3"){
$price="300000";
$weapon="PSG1";


}elseif ($choose_weapon == "4"){
$price="500000";
$weapon="M82A1";




}

if ($price > $fetch->money){ ?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Sorry</div></td>
    </tr>
    <tr>
      <td bgcolor="#FF0000"><div align="center"><font color="#000000"><? echo "You do not have enough money";

?></font></div></td>
    </tr>
  </table>
</div> <?
}elseif ($price <= $fetch->money){

$newmoney=$fetch->money-$price;
if ($shop->owner != "0"){
$per=round($price / 3);
$owner_money = $owner->money + $per;
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$shop->owner'");
mysql_query("UPDATE shop SET profit=profit+$per WHERE location='$fetch->location'");
}

mysql_query("UPDATE users SET money='$newmoney', weapon='$weapon' WHERE username='$username'"); ?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You successfully bought the $weapon"; ?></font></div></td>
    </tr>
  </table>
</div>
<?
}}

if (strip_tags($_POST['pro_button']) && strip_tags($_POST['buy_pro'])){
$buy_pro = strip_tags($_POST['buy_pro']);

if ($buy_pro == "1"){
$price="10000";
$protection="Knife";
}elseif ($buy_pro == "2"){
$price="500000";
$protection="Bullet Vest";

}elseif ($buy_pro == "3"){
$price="1000000";
$protection="Armoured Car";

}elseif ($buy_pro == "4"){
$price="2000000";
$protection="Body Double";



}

if ($price > $fetch->money){ ?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Sorry</div></td>
    </tr>
    <tr>
      <td bgcolor="#FF0000"><div align="center"><font color="#000000"><? echo "You do not have enough money";
?></font></div></td>
    </tr>
  </table>
</div>
<? }elseif ($price <= $fetch->money){
if ($shop->owner != "0"){
$per=round($price / 3);
$owner_money = $owner->money + $per;
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$shop->owner'");
mysql_query("UPDATE shop SET profit=profit+$per WHERE location='$fetch->location'");
}
$newmoney=$fetch->money-$price;
mysql_query("UPDATE users SET money='$newmoney', protection='$protection' WHERE username='$username'"); ?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You successfully bought the $protection"; ?></font></div></td>
    </tr>
  </table>
</div>
<?
}}
if (strip_tags($_POST['plane_button']) && strip_tags($_POST['buy_plane'])){
$buy_plane = strip_tags($_POST['buy_plane']);

if ($buy_plane == "1"){
$price="1000000";
$plane="Microlight";
}elseif ($buy_plane == "2"){
$price="2500000";
$plane="Small Plane";

}elseif ($buy_plane == "3"){
$price="5000000";
$plane="Boeing 747";

}elseif ($buy_plane == "4"){
$price="10000000";
$plane="Concord";


}elseif ($buy_plane == "5"){
$price="15000000";
$plane="F-HSUN";
}

if ($price > $fetch->money){ ?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Sorry</div></td>
    </tr>
    <tr>
      <td bgcolor="#FF0000"><div align="center"><font color="#000000"><? echo "You do not have enough money"; ?></font></div></td>
    </tr>
  </table>
</div>
<?
}elseif ($price <= $fetch->money){
if ($shop->owner != "0"){
$per=round($price / 3);
$owner_money = $owner->money + $per;
mysql_query("UPDATE users SET money='$owner_money' WHERE username='$shop->owner'");
mysql_query("UPDATE shop SET profit=profit+$per WHERE location='$fetch->location'");
}

$newmoney=$fetch->money-$price;
mysql_query("UPDATE users SET money='$newmoney', plane='$plane' WHERE username='$username'"); ?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Thanks for your purchase</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "You successfully bought the $plane"; ?></font></div></td>
    </tr>
  </table>
</div>
<?
}}




?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/test.css" rel="stylesheet" type="text/css">

</head>


<body><form name="form1" method="post" action="">
  <table width="76%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr> 
      <td valign="top"> <table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline rules=none>
          <tr> 
            <td colspan="2" class="header" background="includes/grad.jpg"><center>
                Weapons</center></td>
          </tr>
          <tr bgcolor=black>
            <td height=1 colspan=4></td>
          </tr>
          <tr bgcolor=#999999> 
            <td width="299" bgcolor="#666666" class=tip><div align="center" class="style1">Weapon</div></td>
            <td width="270" bgcolor="#666666" class=tip style1>Price</td>
          </tr>
          <tr bgcolor=black> 
            <td height=1 colspan=4></td>
          </tr>
          <tr> 
            <td height="101" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td width="20" height="10" bgcolor="#666666"><input name="choose_weapon" type="radio" value="1" checked onClick="this.document.img.src='images/under/pic1.bmp'"></td>
                  <td width="228" bgcolor="#666666"><a href="weapons/index.php?view_info=1" class="style1">FiveSeven</a></td>
                  <td bgcolor="#666666"><span class="style1">&pound;100,000</span></td>
                  <td width="100" rowspan="5" bgcolor="#666666">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="21" bgcolor="#666666"><input type="radio" name="choose_weapon" value="2" onClick="this.document.img.src='images/under/pic2.bmp'"></td>
                  <td height="21" bgcolor="#666666"><span class="style1">Shotgun</span></td>
                  <td height="21" bgcolor="#666666"><span class="style1">&pound;250,000</span></td>
                </tr>
                <tr> 
                  <td height="21" bgcolor="#666666"><input type="radio" name="choose_weapon" value="3" onClick="this.document.img.src='images/under/pic3.bmp'"></td>
                  <td height="21" bgcolor="#666666"><a href="weapons/index.php?view_info=3" class="style1">PSG1</a></td>
                  <td height="21" bgcolor="#666666"><span class="style1">&pound;300,000</span></td>
                </tr>
                <tr> 
                  <td height="20" bgcolor="#666666"><input type="radio" name="choose_weapon" value="4" onClick="this.document.img.src='images/under/pic4.bmp'"></td>
                  <td height="20" bgcolor="#666666"><a href="weapons/index.php?view_info=4" class="style1">M82A1 </a></td>
                  <td height="20" bgcolor="#666666"><span class="style1">&pound;500,000</span></td>
                </tr>
                <tr> 
                  <td height="8" bgcolor="#666666">&nbsp; </td>
                  <td height="8" bgcolor="#666666"><span class="style1"></span></td>
                  <td width="122" height="8" bgcolor="#666666"><span class="style1"></span></td>
                </tr>
                <tr> 
                  <td height="8" bgcolor="#666666">&nbsp;</td>
                  <td height="8" bgcolor="#666666">&nbsp;</td>
                  <td height="8" colspan="2" bgcolor="#666666"><input name="weapon_button" type="submit" id="weapon_button" value="Submit"></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline rules=none>
          <tr> 
            <td colspan="2" class="header" background="includes/grad.jpg"><center>
                Protection </center></td>
          </tr>
          <tr bgcolor=black>
            <td height=1 colspan=4></td>
          </tr>
          <tr bgcolor=#999999> 
            <td width="297" bgcolor="#666666" class=tip><div align="center" class="style1">Protection</div></td>
            <td width="272" bgcolor="#666666" class=tip><div align="left" class="style1">Price</div></td>
          </tr>
          <tr bgcolor=black> 
            <td height=1 colspan=4></td>
          </tr>
          <tr> 
            <td height="101" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td width="20" height="10" bgcolor="#666666"><input name="buy_pro" type="radio" value="1" checked onClick="this.document.img1.src='images/under/pic6.bmp'"></td>
                  <td width="228" bgcolor="#666666"><span class="style1">Knife</span></td>
                  <td bgcolor="#666666"><span class="style1">&pound;10,000</span></td>
                  <td width="100" rowspan="5" bgcolor="#666666">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="21" bgcolor="#666666"><input type="radio" name="buy_pro" value="2" onClick="this.document.img1.src='images/under/pic7.bmp'"></td>
                  <td height="21" bgcolor="#666666"><span class="style1">Bullet Vest </span></td>
                  <td height="21" bgcolor="#666666"><span class="style1">&pound;500,000</span></td>
                </tr>
                <tr> 
                  <td height="21" bgcolor="#666666"><input type="radio" name="buy_pro" value="3" onClick="this.document.img1.src='images/under/pic8.bmp'"></td>
                  <td height="21" bgcolor="#666666"><span class="style1">Armoured Car</span></td>
                  <td height="21" bgcolor="#666666"><span class="style1">&pound;1,000,000</span></td>
                </tr>
                <tr> 
                  <td height="20" bgcolor="#666666"><input type="radio" name="buy_pro" value="4" onClick="this.document.img1.src='images/under/pic9.bmp'"></td>
                  <td height="20" bgcolor="#666666"><span class="style1">Body Double </span></td>
                  <td height="20" bgcolor="#666666"><span class="style1">&pound;2,000,000</span></td>
                </tr>
                <tr> 
                  <td height="8" bgcolor="#666666">&nbsp; </td>
                  <td height="8" bgcolor="#666666">&nbsp;</td>
                  <td width="122" height="8" bgcolor="#666666">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="8" bgcolor="#666666">&nbsp;</td>
                  <td height="8" bgcolor="#666666">&nbsp;</td>
                  <td height="8" colspan="2" bgcolor="#666666"><input name="pro_button" type="submit" id="pro_button3" value="Submit"></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline rules=none>
          <tr> 
            <td colspan="2" class="header" background="includes/grad.jpg"><center>
                Planes </center></td>
          </tr>
          <tr bgcolor=black>
            <td height=1 colspan=4></td>
          </tr>
          <tr bgcolor=#999999> 
            <td width="296" bgcolor="#666666" class=tip><div align="center" class="style1">Plane</div></td>
            <td width="273" bgcolor="#666666" class=tip><div align="left" class="style1">Price</div></td>
          </tr>
          <tr bgcolor=black> 
            <td height=1 colspan=4></td>
          </tr>
          <tr> 
            <td height="101" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td width="20" bgcolor="#666666"><input name="buy_plane" type="radio" value="1" checked onClick="this.document.img2.src='images/under/pic11.bmp'"></td>
                  <td width="228" height="10" bgcolor="#666666"><span class="style1">Microlight</span></td>
                  <td bgcolor="#666666"><span class="style1">&pound;1,000,000</span></td>
                  <td width="100" rowspan="5" bgcolor="#666666">&nbsp;</td>
                </tr>
                <tr> 
                  <td bgcolor="#666666"><input type="radio" name="buy_plane" value="2" onClick="this.document.img2.src='images/under/pic12.bmp'"></td>
                  <td height="21" bgcolor="#666666"><span class="style1">Small Plane </span></td>
                  <td height="21" bgcolor="#666666"><span class="style1">&pound;2,500,000</span></td>
                </tr>
                <tr> 
                  <td bgcolor="#666666"> <input type="radio" name="buy_plane" value="3" onClick="this.document.img2.src='images/under/pic13.bmp'"></td>
                  <td height="21" bgcolor="#666666"><span class="style1">Boeing 747 </span></td>
                  <td height="21" bgcolor="#666666"><span class="style1">&pound;5,000,000</span></td>
                </tr>
                <tr> 
                  <td bgcolor="#666666"><input type="radio" name="buy_plane" value="4" onClick="this.document.img2.src='images/under/pic14.bmp'"></td>
                  <td height="20" bgcolor="#666666"><span class="style1">Concord</span></td>
                  <td height="20" bgcolor="#666666"><span class="style1">&pound;10,000,000</span></td>
                </tr>
                <tr> 
                  <td bgcolor="#666666">&nbsp;</td>
                  <td height="8" bgcolor="#666666">&nbsp;</td>
                  <td width="122" height="8" bgcolor="#666666">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="8" bgcolor="#666666">&nbsp;</td>
                  <td height="8" bgcolor="#666666">&nbsp;</td>
                  <td height="8" colspan="2" bgcolor="#666666"><input name="plane_button" type="submit" id="plane_button" value="Submit"></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </table>
<br>

</form>
</body>
</html><p><center>
<br>

<?php include_once"includes/footer.php";?>
</center>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">