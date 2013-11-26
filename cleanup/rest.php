<?php
include "includes/db_connect.php";
include "includes/functions.php";
include_once"restrauntcp.php.txt";
logincheck();
echo "$style"; 
$mysql=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($mysql);
$rest=mysql_fetch_object(mysql_query("SELECT * FROM rest WHERE location='$fetch->location'"));
$fetch_owner=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$rest->owner'"));
$prices=explode("-", $rest->prices);

if (strip_tags($_POST['Submit'])){
$food=strip_tags($_POST['food']);
if ($food == "1"){
$type_food="Kebab";
$price=$prices[0];
$new_energy="10";

}elseif ($food == "2"){
$type_food="Spaghetti";
$price=$prices[1];
$new_energy="30";

}elseif ($food == "3"){
$type_food="Lasagna";
$price=$prices[2];
$new_energy="35";


}elseif ($food == "4"){
$type_food="Walkers crisps";
$price=$prices[3];
$new_energy="2";

}elseif ($food == "5"){
$type_food="Chicken tika";
$price=$prices[4];
$new_energy="40";


}elseif ($food == "6"){
$type_food="Beans on toast";
$price=$prices[5];
$new_energy="25";

}elseif ($food == "7"){
$type_food="Chocolate bar";
$price=$prices[6];
$new_energy="10";

}elseif ($food == "8"){
$type_food="Cream cake";
$price=$prices[7];
$new_energy="15";

}elseif ($food == "9"){
$type_food="Chips";
$price=$prices[8];
$new_energy="25";
}

if ($price > $fetch->money){
echo "You dont have enough money!";
}elseif ($price <= $fetch->money){
if ($rest->owner == "0"){
$check = $fetch->energy + $new_energy;

if ($check >= 100){
 $your_energy="100";
 }elseif ($check < 100){
 $your_energy=$fetch->energy + $new_energy;
 }


 $minus_money = $fetch->money - $price;
mysql_query("UPDATE users SET money='$minus_money', energy='$your_energy'");
/////IF THERE IS A OWNER

}elseif ($rest->owner != "0"){

$check = $fetch->energy + $new_energy;

if ($check >= 100){
 $your_energy="100";
 }elseif ($check < 100){
 $your_energy=$fetch->energy + $new_energy;
 }
 $minus_money = $fetch->money - $price;
 $plus_money=$price;
 $plus_owner_money=$fetch_owner->money + $price;
 mysql_query("UPDATE rest SET profit=profit+$plus_money WHERE location='$fetch->location'");
mysql_query("UPDATE users SET money='$minus_money', energy='$your_energy' WHERE username='$username'");
mysql_query("UPDATE users SET money='$plus_owner_money' WHERE username='$rest->owner'");


}
echo "You bought the $type_food for £".makecomma($price)."";
}}




?>
<link href="includes/in.css" rel="stylesheet" type="text/css">
<form action="" method="post">
  
  <table width=79% border=1 align="center" cellpadding=1 cellspacing=0 class=thinline rules=none>
    <tr> 
      <td colspan="5" class=header> <center>
          Restaurant</center></td>
    </tr>
    <tr bgcolor=black> 
      <td height=1 colspan=7></td>
    </tr>
    <tr> 
      <td height=19 colspan="2" >Food </td>
      <td width="113" >Price</td>
      <td colspan="2" >Energy</td>
    </tr>
    <tr> 
      <td width="20" height=19><input type="radio" name="food" value="1" checked onClick="this.document.img.src='images/food/kebab.jpg'"></td>
      <td width="124" >Kebab</td>
      <td height=19 ><?php echo "£".makecomma($prices[0]).""; ?> <div align="left"></div></td>
      <td width="120" height=19 >10%</td>
      <td width="202" rowspan="9" ><img src="images/food/food.jpg" width="200" height="200" border="1" name="img"></td>
    </tr>
    <tr> 
      <td height=19 ><div align="left"> 
          <input type="radio" name="food" value="2" onClick="this.document.img.src='images/food/spag.jpg'">
        </div></td>
      <td height=19 >Spaghetti</td>
      <td height=19 ><div align="left"><?php echo "£".makecomma($prices[1]).""; ?> 
        </div></td>
      <td height=19 >30%</td>
    </tr>
    <tr> 
      <td height=9 ><div align="left"> 
          <input type="radio" name="food" value="3" onClick="this.document.img.src='images/food/las.jpg'">
        </div></td>
      <td height=9 >Lasagna</td>
      <td height=9 ><div align="left"><?php echo "£".makecomma($prices[2]).""; ?> 
        </div></td>
      <td height=9 >35%</td>
    </tr>
    <tr> 
      <td height=10 ><input type="radio" name="food" value="4" onClick="this.document.img.src='images/food/crisps.jpg'"></td>
      <td height=10 >Walkers crisps</td>
      <td height=10 ><?php echo "£".makecomma($prices[3]).""; ?></td>
      <td height=10 >2%</td>
    </tr>
    <tr> 
      <td height=19 ><input type="radio" name="food" value="5" onClick="this.document.img.src='images/food/chicken.jpg'"></td>
      <td height=19 >Chicken tikka</td>
      <td height=19 ><?php echo "£".makecomma($prices[4]).""; ?></td>
      <td height=19 >40%</td>
    </tr>
    <tr> 
      <td height=19 ><input type="radio" name="food" value="6" onClick="this.document.img.src='images/food/bot.jpg'"></td>
      <td height=19 >Beans on toast</td>
      <td height=19 ><?php echo "£".makecomma($prices[5]).""; ?></td>
      <td height=19 >25%</td>
    </tr>
    <tr> 
      <td height=9 ><input type="radio" name="food" value="7" onClick="this.document.img.src='images/food/choc.jpg'"></td>
      <td height=9 >Chocolate bar</td>
      <td height=9 ><?php echo "£".makecomma($prices[6]).""; ?></td>
      <td height=9 >10%</td>
    </tr>
    <tr> 
      <td height=5 ><input type="radio" name="food" value="8" onClick="this.document.img.src='images/food/cream.jpg'"></td>
      <td height=5 >Cream cake</td>
      <td height=5 ><?php echo "£".makecomma($prices[7]).""; ?></td>
      <td height=5 >15%</td>
    </tr>
    <tr> 
      <td height=2 ><input type="radio" name="food" value="9" onClick="this.document.img.src='images/food/chips.jpg'"></td>
      <td height=2 >Chips</td>
      <td height=2 ><?php echo "£".makecomma($prices[8]).""; ?></td>
      <td height=2 >25%</td>
    </tr>
    <tr> 
      <td height=3 >&nbsp;</td>
      <td height=3 >&nbsp;</td>
      <td height=3 >&nbsp;</td>
      <td height=3 colspan="2" ><input type="submit" name="Submit" value="Submit"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<p>



<br>
  <br>
  <table width="691" border="1" align="center" cellspacing="0" class="background">
  <tr background="includes/grad.jpg">
    <th height="19" scope="col"><font color="black">Energy Bar</th>
  </tr>
  <tr>
    <th height="47" class="background" scope="col"><div align="left">
    <table width="<?php echo "$info->energy"; ?>%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="green"><h3><font color="black"><center><?php echo "$info->energy%"; ?><br><br><br></td>
        </tr>
        </tr>
      </table>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">