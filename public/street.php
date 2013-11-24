<?php
session_start();
include_once"includes/functions.php";
include_once"includes/db_connect.php";
echo "Thanks for your patience, street races will be up in the next 2hours.";
exit();


$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
echo "$style"; 
if ($fetch->last_race >  time()){
echo "Youve done a Street race recently you need to wait ".maketime($fetch->last_race)." untill you can do another one.";
exit();
}
echo "<form action='' method=POST>";
if ($fetch->street_race == "0"){
if (strip_tags($_POST['start'])){
$price = "1000000";
if ($fetch->money < $price){
echo "You dont have the money needed to start a street race.";
}elseif ($fetch->money >= $price){
mysql_query("INSERT INTO `street` (`id`, `started`, `starter_car`, `starter_bet`, `racer1`, `racer1_car`, `racer1_status`, `racer1_bet`, `racer2`, `racer2_car`, `racer2_status`, `racer2_bet`, `racer3`, `racer3_status`, `racer3_car`, `racer3_bet`, `racer4`, `racer4_status`, `racer4_car`, `racer4_bet`, `racer5`, `racer5_status`, `racer5_car`, `racer5_bet`, `racer6`, `racer6_status`, `racer6_car`, `racer6_bet`, `racer7`, `racer7_status`, `racer7_car`, `racer7_bet`, `racer8`, `racer8_status`, `racer8_car`, `racer8_bet`, `racer9`, `racer9_status`, `racer9_car`, `racer9_bet`, `racer10`, `racer10_status`, `racer10_car`, `racer10_bet`,`location`) VALUES ('', '$username', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0','$fetch->location')");
$new_mun = $fetch->money - $price; mysql_query("UPDATE users SET street_race='1', money='$new_mun' WHERE username='$username'");

echo "Street race created";


}


}


?>

<form action="" method=POST>
<table width="67%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">
        <strong>Street racing</strong> </center></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td>Street racing is a great way to earn money, you can invite 10 people 
            to race in the streets of <?php echo "$fetch->location"; ?></td>
        </tr>
        <tr> 
          <td><div align="center">
              <input name="start" type="submit" id="start" value="Start a street race!">
            </div></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
<? }elseif ($fetch->street_race == "1"){


$street=mysql_fetch_object(mysql_query("SELECT * FROM street WHERE started='$username' OR racer1='$username' OR racer2='$username' OR racer3='$username' OR racer4='$username' OR racer5='$username' OR racer6='$username' OR racer7='$username' OR racer8='$username' OR racer9='$username' OR racer10='$username'"));

if (strtolower($street->started) == strtolower($username)){

if ($fetch->location != $street->location){
echo "You need to be in $street->location for the street race to start";
exit();
}

if (strip_tags($_GET['kick1'])){
mysql_query("UPDATE street SET racer1='0' WHERE id='$street->id'");
mysql_query("UPDATE users SET street_race='0' WHERE username='$street->racer1'");
echo "Racer 1 has been kicked";
}elseif (strip_tags($_GET['kick2'])){
mysql_query("UPDATE street SET racer2='0' WHERE id='$street->id'");
mysql_query("UPDATE users SET street_race='0' WHERE username='$street->racer2'");
echo "Racer 2 has been kicked";
}elseif (strip_tags($_GET['kick3'])){
mysql_query("UPDATE street SET racer3='0' WHERE id='$street->id'");
mysql_query("UPDATE users SET street_race='0' WHERE username='$street->racer3'");
echo "Racer 3 has been kicked";
}elseif (strip_tags($_GET['kick4'])){
mysql_query("UPDATE street SET racer4='0' WHERE id='$street->id'");
mysql_query("UPDATE users SET street_race='0' WHERE username='$street->racer4'");
echo "Racer 4 has been kicked";
}elseif (strip_tags($_GET['kick5'])){
mysql_query("UPDATE street SET racer5='0' WHERE id='$street->id'");
mysql_query("UPDATE users SET street_race='0' WHERE username='$street->racer5'");
echo "Racer 5 has been kicked";
}elseif (strip_tags($_GET['kick6'])){
mysql_query("UPDATE street SET racer6='0' WHERE id='$street->id'");
mysql_query("UPDATE users SET street_race='0' WHERE username='$street->racer6'");
echo "Racer 6 has been kicked";
}elseif (strip_tags($_GET['kick7'])){
mysql_query("UPDATE street SET racer7='0' WHERE id='$street->id'");
mysql_query("UPDATE users SET street_race='0' WHERE username='$street->racer7'");
echo "Racer 7 has been kicked";
}elseif (strip_tags($_GET['kick8'])){
mysql_query("UPDATE street SET racer8='0' WHERE id='$street->id'");
mysql_query("UPDATE users SET street_race='0' WHERE username='$street->racer8'");
echo "Racer 8 has been kicked";
}elseif (strip_tags($_GET['kick9'])){
mysql_query("UPDATE street SET racer9='0' WHERE id='$street->id'");
mysql_query("UPDATE users SET street_race='0' WHERE username='$street->racer9'");
echo "Racer 9 has been kicked";
}elseif (strip_tags($_GET['kick9'])){
mysql_query("UPDATE street SET racer10='0' WHERE id='$street->id'");
mysql_query("UPDATE users SET street_race='0' WHERE username='$street->racer10'");
echo "Racer 10 has been kicked";
}
/////?NEED TO ADDD TAKE AWAY CAR AND STATUS.
if (strip_tags($_POST['update'])){

if (strip_tags($_POST['your_car'])){
$your_car=strip_tags($_POST['your_car']);
$check=mysql_num_rows(mysql_query("SELECT * FROM garage WHERE id='$your_car' AND owner='$username'"));
if ($check == "0"){
echo "This is not your car.";
}else{
mysql_query("UPDATE street SET starter_car='$your_car' WHERE id='$street->id'");
echo "Your racing car is now updated.";
}}
if (strip_tags($_POST['your_bet'])){

$your_bet=intval(strip_tags($_POST['your_bet']));

		if ($your_bet == 0 || !$your_bet || ereg('[^0-9]',$your_bet)){
	print "You cant bet that amount";
	
}elseif ($your_bet != 0 && $your_bet && !ereg('[^0-9]',$your_bet)){

if ($your_bet > $fetch->money){
echo "You cannot bet more money than you have.";
}elseif ($your_bet <= $fetch->money){
$new_pot=$street->starter_bet + $your_bet;

$new_money=$fetch->money - $your_bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");


mysql_query("UPDATE street SET starter_bet='$new_pot' WHERE id='$street->id'");
echo "Your pot has been updated.";

}}}

}
$racer1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$street->racer1'"));
$racer2=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$street->racer2'"));
$racer3=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$street->racer3'"));
$racer4=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$street->racer4'"));
$racer5=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$street->racer5'"));
$racer6=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$street->racer6'"));
$racer7=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$street->racer7'"));
$racer8=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$street->racer8'"));
$racer9=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$street->racer9'"));
$racer10=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$street->racer10'"));


if (strip_tags($_POST['GO']) && $racer1->location == $street->location && $racer2->location == $street->location && $racer3->location == $street->location && $racer4->location == $street->location && $racer5->location == $street->location && $racer6->location == $street->location && $racer7->location == $street->location && $racer8->location == $street->location && $racer9->location == $street->location && $racer10->location == $street->location && $street->racer1_status=="Ready" && $street->racer2_status=="Ready" && $street->racer3_status=="Ready" && $street->racer4_status=="Ready" &&  $street->racer5_status=="Ready" && $street->racer6_status=="Ready" && $street->racer7_status=="Ready" && $street->racer8_status=="Ready" &&  $street->racer9_status=="Ready" &&  $street->racer10_status=="Ready"){

$car1=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->racer1_car'"));
$car2=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->racer2_car'"));
$car3=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->racer3_car'"));
$car4=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->racer4_car'"));
$car5=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->racer5_car'"));
$car6=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->racer6_car'"));
$car7=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->racer7_car'"));
$car8=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->racer8_car'"));
$car9=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->racer9_car'"));
$car10=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->racer10_car'"));


if ($car1->car == "Renault Clio Sport"){ $car_plus="1"; }
elseif ($car1->car == "Audi A3"){ $car_plus="2"; }
elseif ($car1->car == "Bmw m3"){ $car_plus="3";  }
elseif ($car1->car == "Cadilac Escelade"){ $car_plus="4";}
elseif ($car1->car == "Nissan Skyline"){ $car_plus="5"; }
elseif ($car1->car == "Porsche 911"){ $car_plus="6"; }
elseif ($car1->car == "GT 40"){ $car_plus="7"; }
elseif ($car1->car == "Lamborghini Murcielago"){ $car_plus="8"; }
elseif ($car1->car == "Ferrari Enzo"){ $car_plus="9"; }
elseif ($car1->car == "TVR Speed 12"){ $car_plus="10"; }
elseif ($car1->car == "Mclaren f1"){ $car_plus="11"; }
elseif ($car1->car == "Bugatti Veyron"){$car_plus="12"; }


if ($car2->car == "Renault Clio Sport"){ $car_plus_first="1"; }
elseif ($car2->car == "Audi A3"){ $car_plus_first="2"; }
elseif ($car2->car == "Bmw m3"){ $car_plus_first="3";  }
elseif ($car2->car == "Cadilac Escelade"){ $car_plus_first="4";}
elseif ($car2->car == "Nissan Skyline"){ $car_plus_first="5"; }
elseif ($car2->car == "Porsche 911"){ $car_plus_first="6"; }
elseif ($car2->car == "GT 40"){ $car_plus_first="7"; }
elseif ($car2->car == "Lamborghini Murcielago"){ $car_plus_first="8"; }
elseif ($car2->car == "Ferrari Enzo"){ $car_plus_first="9"; }
elseif ($car2->car == "TVR Speed 12"){ $car_plus_first="10"; }
elseif ($car2->car == "Mclaren f1"){ $car_plus_first="11"; }
elseif ($car2->car == "Bugatti Veyron"){$car_plus_first="12"; }





}









?><form action="" method=POST>
<table width="77%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">
        <strong>Street racing</strong> </center></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="4"><div align="center">Welcome to the leader control panel.</div></td>
        </tr>
        <tr> 
          <td width="13%"><div align="center">Position </div></td>
          <td width="31%"><div align="center">Username</div></td>
          <td width="21%"><div align="center">Status</div></td>
          <td width="35%"> <div align="center">Location</div></td>
        </tr>
        <tr> 
          <td>1(<a href="?kick1=ye">x</a>)</td>
          <td> 
            <?php if ($street->racer1 == "0"){ echo "None"; }else{ echo "$street->racer1"; }?>
            &nbsp;</td>
          <td> 
            <?php if ($street->racer1_status == "0"){ echo "Busy"; }else{ echo "Ready"; } ?>
          </td>
          <td> 
            <?php if ($street->racer1 == "0"){ echo "N/A"; }else{ echo "$racer1->location"; } ?>
          </td>
        </tr>
        
            <?php if ($street->racer4 == "0"){ echo "None"; }else{ echo "$street->racer4"; }?>
          </td>
          <td> 
            <?php if ($street->racer4_status == "0"){ echo "Busy"; }else{ echo "Ready"; } ?>
          </td>
          <td> 
            <?php if ($street->racer4 == "0"){ echo "N/A"; }else{ echo "$racer4->location"; } ?>
          </td>
        </tr>
        <tr> 
          <td height="20">5(<a href="?kick5=ye">x</a>)</td>
          <td> 
            <?php if ($street->racer5 == "0"){ echo "None"; }else{ echo "$street->racer5"; }?>
          </td>
          <td> 
            <?php if ($street->racer5_status == "0"){ echo "Busy"; }else{ echo "Ready"; } ?>
          </td>
          <td> 
            <?php if ($street->racer5 == "0"){ echo "N/A"; }else{ echo "$racer5->location"; } ?>
          </td>
        </tr>
        <tr> 
          <td>6(<a href="?kick6=ye">x</a>)</td>
          <td> 
            <?php if ($street->racer6 == "0"){ echo "None"; }else{ echo "$street->racer6"; }?>
          </td>
          <td> 
            <?php if ($street->racer6_status == "0"){ echo "Busy"; }else{ echo "Ready"; } ?>
          </td>
          <td> 
            <?php if ($street->racer6 == "0"){ echo "N/A"; }else{ echo "$racer6->location"; } ?>
          </td>
        </tr>
        <tr> 
          <td>7(<a href="?kick7=ye">x</a>)</td>
          <td> 
            <?php if ($street->racer7 == "0"){ echo "None"; }else{ echo "$street->racer7"; }?>
          </td>
          <td> 
            <?php if ($street->racer7_status == "0"){ echo "Busy"; }else{ echo "Ready"; } ?>
          </td>
          <td> 
            <?php if ($street->racer7 == "0"){ echo "N/A"; }else{ echo "$racer7->location"; } ?>
          </td>
        </tr>
        <tr> 
          <td>8(<a href="?kick8=ye">x</a>)</td>
          <td> 
            <?php if ($street->racer8 == "0"){ echo "None"; }else{ echo "$street->racer8"; }?>
          </td>
          <td> 
            <?php if ($street->racer8_status == "0"){ echo "Busy"; }else{ echo "Ready"; } ?>
          </td>
          <td> 
            <?php if ($street->racer8 == "0"){ echo "N/A"; }else{ echo "$racer8->location"; } ?>
          </td>
        </tr>
        <tr> 
          <td>9(<a href="?kick9=ye">x</a>)</td>
          <td> 
            <?php if ($street->racer9 == "0"){ echo "None"; }else{ echo "$street->racer9"; }?>
          </td>
          <td> 
            <?php if ($street->racer9_status == "0"){ echo "Busy"; }else{ echo "Ready"; } ?>
          </td>
          <td> 
            <?php if ($street->racer9 == "0"){ echo "N/A"; }else{ echo "$racer9->location"; } ?>
          </td>
        </tr>
        <tr> 
          <td>10(<a href="?kick10=ye">x</a>)</td>
          <td> 
            <?php if ($street->racer10 == "0"){ echo "None"; }else{ echo "$street->racer10"; }?>
          </td>
          <td> 
            <?php if ($street->racer10_status == "0"){ echo "Busy"; }else{ echo "Ready"; } ?>
          </td>
          <td> 
            <?php if ($street->racer10 == "0"){ echo "N/A"; }else{ echo "$racer10->location"; } ?>
          </td>
        </tr>
        <tr> 
          <td colspan="4"><div align="center">Your info:</div></td>
        </tr>
        <tr> 
          <td colspan="4"><div align="center">Your car: 
              <input name="your_car" type="text" id="your_car">
            </div></td>
        </tr>
        <tr> 
          <td colspan="4"><div align="center">Your bet: 
              <input name="your_bet" type="text" id="your_bet">
            </div></td>
        </tr>
        <tr> 
          <td colspan="4"> <div align="center"> 
                <input name="update" type="submit" id="update" value="Update">
            </div></td>
        </tr>
        <tr> 
          <td colspan="4">Pot: <?php $sum= $street->starter_bet +$street->racer1_bet+$street->racer2_bet+$street->racer3_bet+$street->racer4_bet+$street->racer5_bet+$street->racer6_bet+$street->racer7_bet+$street->racer8_bet+$street->racer9_bet+$street->racer10_bet; echo "£".makecomma($sum).""; ?>
		  </td>
        </tr>
        <tr> 
          <td colspan="4">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table><? }elseif (strtolower($username) == strtolower($street->racer1)){
if ($fetch->location != $street->location){
echo "You need to be in $street->location for the street race to start!";
exit();
}

if ($street->racer1_status == "Ready"){
echo "You are ready";
exit();
}
if (strip_tags($_POST['Leave'])){
mysql_query("UPDATE street SET racer1_car='0', racer1_status='0', racer1_bet='0' WHERE id='$street->id'");
mysql_query("UPDATE users set street_race='0' WHERE username='$username'");
echo "You left the street race";
exit();
}
if (strip_tags($_POST['Ready'])){
mysql_query("UPDATE street set racer1_status='Ready' WHERE id='$street->id'");
echo "You are now ready";
exit();
}

if (strip_tags($_POST['update'])){

if (strip_tags($_POST['your_car'])){
$your_car=strip_tags($_POST['your_car']);
$check=mysql_num_rows(mysql_query("SELECT * FROM garage WHERE id='$your_car' AND owner='$username'"));
if ($check == "0"){
echo "This is not your car.";
}else{
mysql_query("UPDATE street SET racer1_car='$your_car' WHERE id='$street->id'");
echo "Your racing car is now updated.";
}}
if (strip_tags($_POST['your_bet'])){

$your_bet=intval(strip_tags($_POST['your_bet']));

		if ($your_bet == 0 || !$your_bet || ereg('[^0-9]',$your_bet)){
	print "You cant bet that amount";
	
}elseif ($your_bet != 0 && $your_bet && !ereg('[^0-9]',$your_bet)){

if ($your_bet > $fetch->money){
echo "You cannot bet more money than you have.";
}elseif ($your_bet <= $fetch->money){
$new_pot=$street->racer1_bet + $your_bet;

$new_money=$fetch->money - $your_bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");


mysql_query("UPDATE street SET racer1_bet='$new_pot' WHERE id='$street->id'");
echo "Your pot has been updated.";

}}}

}





?>

<table width="62%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">
        <strong>Street racing</strong> </center></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2"><div align="center">Welcome to the racer control panel.</div></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td width="43%"><div align="left">Your car:</div></td>
          <td width="57%"><input name="your_car" type="text" id="your_car"></td>
        </tr>
        <tr> 
          <td>Your bet:</td>
          <td><input name="your_bet" type="text" id="your_bet"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="update" type="submit" id="update" value="Change"></td>
        </tr>
        <tr> 
          <td colspan="2"><div align="center">Other:</div></td>
        </tr>0
        <tr> 
          <td> <div align="left"> 
              <input name="Leave" type="submit" id="Leave" value="Leave">
            </div></td>
          <td><input name="Ready" type="submit" id="Ready" value="Ready"></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table><?
}elseif (strtolower($username) == strtolower($street->racer2)){
if ($fetch->location != $street->location){
echo "You need to be in $street->location for the street race to start!";
exit();
}
if ($street->racer2_status == "Ready"){
echo "You are ready";
exit();
}
if (strip_tags($_POST['Leave'])){
mysql_query("UPDATE street SET racer2_car='0', racer2_status='0', racer2_bet='0' WHERE id='$street->id'");
mysql_query("UPDATE users set street_race='0' WHERE username='$username'");
echo "You left the street race";
exit();
}
if (strip_tags($_POST['Ready'])){
mysql_query("UPDATE street set racer2_status='Ready' WHERE id='$street->id'");
echo "You are now ready";
exit();
}

if (strip_tags($_POST['update'])){

if (strip_tags($_POST['your_car'])){
$your_car=strip_tags($_POST['your_car']);
$check=mysql_num_rows(mysql_query("SELECT * FROM garage WHERE id='$your_car' AND owner='$username'"));
if ($check == "0"){
echo "This is not your car.";
}else{
mysql_query("UPDATE street SET racer2_car='$your_car' WHERE id='$street->id'");
echo "Your racing car is now updated.";
}}
if (strip_tags($_POST['your_bet'])){

$your_bet=intval(strip_tags($_POST['your_bet']));

		if ($your_bet == 0 || !$your_bet || ereg('[^0-9]',$your_bet)){
	print "You cant bet that amount";
	
}elseif ($your_bet != 0 && $your_bet && !ereg('[^0-9]',$your_bet)){

if ($your_bet > $fetch->money){
echo "You cannot bet more money than you have.";
}elseif ($your_bet <= $fetch->money){
$new_pot=$street->racer2_bet + $your_bet;
$new_money=$fetch->money - $your_bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");




mysql_query("UPDATE street SET racer2_bet='$new_pot' WHERE id='$street->id'");
echo "Your pot has been updated.";

}}}

}





?>

<table width="62%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">
        <strong>Street racing</strong> </center></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2"><div align="center">Welcome to the racer control panel.</div></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td width="43%"><div align="left">Your car:</div></td>
          <td width="57%"><input name="your_car" type="text" id="your_car"></td>
        </tr>
        <tr> 
          <td>Your bet:</td>
          <td><input name="your_bet" type="text" id="your_bet"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="update" type="submit" id="update" value="Change"></td>
        </tr>
        <tr> 
          <td colspan="2"><div align="center">Other:</div></td>
        </tr>
        <tr> 
          <td> <div align="left"> 
              <input name="Leave" type="submit" id="Leave" value="Leave">
            </div></td>
          <td><input name="Ready" type="submit" id="Ready" value="Ready"></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table><?
}elseif (strtolower($username) == strtolower($street->racer3)){
if ($fetch->location != $street->location){
echo "You need to be in $street->location for the street race to start!";
exit();
}

if ($street->racer3_status == "Ready"){
echo "You are ready";
exit();
}
if (strip_tags($_POST['Leave'])){
mysql_query("UPDATE street SET racer3_car='0', racer3_status='0', racer3_bet='0' WHERE id='$street->id'");
mysql_query("UPDATE users set street_race='0' WHERE username='$username'");
echo "You left the street race";
exit();
}
if (strip_tags($_POST['Ready'])){
mysql_query("UPDATE street set racer3_status='Ready' WHERE id='$street->id'");
echo "You are now ready";
exit();
}

if (strip_tags($_POST['update'])){

if (strip_tags($_POST['your_car'])){
$your_car=strip_tags($_POST['your_car']);
$check=mysql_num_rows(mysql_query("SELECT * FROM garage WHERE id='$your_car' AND owner='$username'"));
if ($check == "0"){
echo "This is not your car.";
}else{
mysql_query("UPDATE street SET racer1_car='$your_car' WHERE id='$street->id'");
echo "Your racing car is now updated.";
}}
if (strip_tags($_POST['your_bet'])){

$your_bet=intval(strip_tags($_POST['your_bet']));

		if ($your_bet == 0 || !$your_bet || ereg('[^0-9]',$your_bet)){
	print "You cant bet that amount";
	
}elseif ($your_bet != 0 && $your_bet && !ereg('[^0-9]',$your_bet)){

if ($your_bet > $fetch->money){
echo "You cannot bet more money than you have.";
}elseif ($your_bet <= $fetch->money){
$new_pot=$street->racer3_bet + $your_bet;

$new_money=$fetch->money - $your_bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");


mysql_query("UPDATE street SET racer3_bet='$new_pot' WHERE id='$street->id'");
echo "Your pot has been updated.";

}}}

}





?>

<table width="62%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">
        <strong>Street racing</strong> </center></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2"><div align="center">Welcome to the racer control panel.</div></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td width="43%"><div align="left">Your car:</div></td>
          <td width="57%"><input name="your_car" type="text" id="your_car"></td>
        </tr>
        <tr> 
          <td>Your bet:</td>
          <td><input name="your_bet" type="text" id="your_bet"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="update" type="submit" id="update" value="Change"></td>
        </tr>
        <tr> 
          <td colspan="2"><div align="center">Other:</div></td>
        </tr>
        <tr> 
          <td> <div align="left"> 
              <input name="Leave" type="submit" id="Leave" value="Leave">
            </div></td>
          <td><input name="Ready" type="submit" id="Ready" value="Ready"></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table><?
}elseif (strtolower($username) == strtolower($street->racer4)){
if ($fetch->location != $street->location){
echo "You need to be in $street->location for the street race to start!";
exit();
}

if ($street->racer4_status == "Ready"){
echo "You are ready";
exit();
}
if (strip_tags($_POST['Leave'])){
mysql_query("UPDATE street SET racer4_car='0', racer4_status='0', racer4_bet='0' WHERE id='$street->id'");
mysql_query("UPDATE users set street_race='0' WHERE username='$username'");
echo "You left the street race";
exit();
}
if (strip_tags($_POST['Ready'])){
mysql_query("UPDATE street set racer4_status='Ready' WHERE id='$street->id'");
echo "You are now ready";
exit();
}

if (strip_tags($_POST['update'])){

if (strip_tags($_POST['your_car'])){
$your_car=strip_tags($_POST['your_car']);
$check=mysql_num_rows(mysql_query("SELECT * FROM garage WHERE id='$your_car' AND owner='$username'"));
if ($check == "0"){
echo "This is not your car.";
}else{
mysql_query("UPDATE street SET racer4_car='$your_car' WHERE id='$street->id'");
echo "Your racing car is now updated.";
}}
if (strip_tags($_POST['your_bet'])){

$your_bet=intval(strip_tags($_POST['your_bet']));

		if ($your_bet == 0 || !$your_bet || ereg('[^0-9]',$your_bet)){
	print "You cant bet that amount";
	
}elseif ($your_bet != 0 && $your_bet && !ereg('[^0-9]',$your_bet)){

if ($your_bet > $fetch->money){
echo "You cannot bet more money than you have.";
}elseif ($your_bet <= $fetch->money){
$new_pot=$street->racer4_bet + $your_bet;

$new_money=$fetch->money - $your_bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");


mysql_query("UPDATE street SET racer4_bet='$new_pot' WHERE id='$street->id'");
echo "Your pot has been updated.";

}}}

}





?>

<table width="62%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">
        <strong>Street racing</strong> </center></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2"><div align="center">Welcome to the racer control panel.</div></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td width="43%"><div align="left">Your car:</div></td>
          <td width="57%"><input name="your_car" type="text" id="your_car"></td>
        </tr>
        <tr> 
          <td>Your bet:</td>
          <td><input name="your_bet" type="text" id="your_bet"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="update" type="submit" id="update" value="Change"></td>
        </tr>
        <tr> 
          <td colspan="2"><div align="center">Other:</div></td>
        </tr>
        <tr> 
          <td> <div align="left"> 
              <input name="Leave" type="submit" id="Leave" value="Leave">
            </div></td>
          <td><input name="Ready" type="submit" id="Ready" value="Ready"></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table><?
}elseif (strtolower($username) == strtolower($street->racer5)){
if ($fetch->location != $street->location){
echo "You need to be in $street->location for the street race to start!";
exit();
}

if ($street->racer5_status == "Ready"){
echo "You are ready";
exit();
}
if (strip_tags($_POST['Leave'])){
mysql_query("UPDATE street SET racer5_car='0', racer5_status='0', racer5_bet='0' WHERE id='$street->id'");
mysql_query("UPDATE users set street_race='0' WHERE username='$username'");
echo "You left the street race";
exit();
}
if (strip_tags($_POST['Ready'])){
mysql_query("UPDATE street set racer5_status='Ready' WHERE id='$street->id'");
echo "You are now ready";
exit();
}

if (strip_tags($_POST['update'])){

if (strip_tags($_POST['your_car'])){
$your_car=strip_tags($_POST['your_car']);
$check=mysql_num_rows(mysql_query("SELECT * FROM garage WHERE id='$your_car' AND owner='$username'"));
if ($check == "0"){
echo "This is not your car.";
}else{
mysql_query("UPDATE street SET racer5_car='$your_car' WHERE id='$street->id'");
echo "Your racing car is now updated.";
}}
if (strip_tags($_POST['your_bet'])){

$your_bet=intval(strip_tags($_POST['your_bet']));

		if ($your_bet == 0 || !$your_bet || ereg('[^0-9]',$your_bet)){
	print "You cant bet that amount";
	
}elseif ($your_bet != 0 && $your_bet && !ereg('[^0-9]',$your_bet)){

if ($your_bet > $fetch->money){
echo "You cannot bet more money than you have.";
}elseif ($your_bet <= $fetch->money){
$new_pot=$street->racer5_bet + $your_bet;

$new_money=$fetch->money - $your_bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");


mysql_query("UPDATE street SET racer5_bet='$new_pot' WHERE id='$street->id'");
echo "Your pot has been updated.";

}}}

}





?>

<table width="62%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">
        <strong>Street racing</strong> </center></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2"><div align="center">Welcome to the racer control panel.</div></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td width="43%"><div align="left">Your car:</div></td>
          <td width="57%"><input name="your_car" type="text" id="your_car"></td>
        </tr>
        <tr> 
          <td>Your bet:</td>
          <td><input name="your_bet" type="text" id="your_bet"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="update" type="submit" id="update" value="Change"></td>
        </tr>
        <tr> 
          <td colspan="2"><div align="center">Other:</div></td>
        </tr>
        <tr> 
          <td> <div align="left"> 
              <input name="Leave" type="submit" id="Leave" value="Leave">
            </div></td>
          <td><input name="Ready" type="submit" id="Ready" value="Ready"></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table><?


/////////nty


}elseif (strtolower($username) == strtolower($street->racer6)){
if ($fetch->location != $street->location){
echo "You need to be in $street->location for the street race to start!";
exit();
}

if ($street->racer6_status == "Ready"){
echo "You are ready";
exit();
}
if (strip_tags($_POST['Leave'])){
mysql_query("UPDATE street SET racer6_car='0', racer6_status='0', racer6_bet='0' WHERE id='$street->id'");
mysql_query("UPDATE users set street_race='0' WHERE username='$username'");
echo "You left the street race";
exit();
}
if (strip_tags($_POST['Ready'])){
mysql_query("UPDATE street set racer6_status='Ready' WHERE id='$street->id'");
echo "You are now ready";
exit();
}

if (strip_tags($_POST['update'])){

if (strip_tags($_POST['your_car'])){
$your_car=strip_tags($_POST['your_car']);
$check=mysql_num_rows(mysql_query("SELECT * FROM garage WHERE id='$your_car' AND owner='$username'"));
if ($check == "0"){
echo "This is not your car.";
}else{
mysql_query("UPDATE street SET racer6_car='$your_car' WHERE id='$street->id'");
echo "Your racing car is now updated.";
}}
if (strip_tags($_POST['your_bet'])){

$your_bet=intval(strip_tags($_POST['your_bet']));

		if ($your_bet == 0 || !$your_bet || ereg('[^0-9]',$your_bet)){
	print "You cant bet that amount";
	
}elseif ($your_bet != 0 && $your_bet && !ereg('[^0-9]',$your_bet)){

if ($your_bet > $fetch->money){
echo "You cannot bet more money than you have.";
}elseif ($your_bet <= $fetch->money){
$new_pot=$street->racer6_bet + $your_bet;

$new_money=$fetch->money - $your_bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");


mysql_query("UPDATE street SET racer6_bet='$new_pot' WHERE id='$street->id'");
echo "Your pot has been updated.";

}}}

}





?>

<table width="62%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">
        <strong>Street racing</strong> </center></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2"><div align="center">Welcome to the racer control panel.</div></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td width="43%"><div align="left">Your car:</div></td>
          <td width="57%"><input name="your_car" type="text" id="your_car"></td>
        </tr>
        <tr> 
          <td>Your bet:</td>
          <td><input name="your_bet" type="text" id="your_bet"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="update" type="submit" id="update" value="Change"></td>
        </tr>
        <tr> 
          <td colspan="2"><div align="center">Other:</div></td>
        </tr>
        <tr> 
          <td> <div align="left"> 
              <input name="Leave" type="submit" id="Leave" value="Leave">
            </div></td>
          <td><input name="Ready" type="submit" id="Ready" value="Ready"></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table><?

/////pftee


}elseif (strtolower($username) == strtolower($street->racer7)){
if ($fetch->location != $street->location){
echo "You need to be in $street->location for the street race to start!";
exit();
}
if ($street->racer7_status == "Ready"){
echo "You are ready";
exit();
}
if (strip_tags($_POST['Leave'])){
mysql_query("UPDATE street SET racer7_car='0', racer7_status='0', racer7_bet='0' WHERE id='$street->id'");
mysql_query("UPDATE users set street_race='0' WHERE username='$username'");
echo "You left the street race";
exit();
}
if (strip_tags($_POST['Ready'])){
mysql_query("UPDATE street set racer7_status='Ready' WHERE id='$street->id'");
echo "You are now ready";
exit();
}

if (strip_tags($_POST['update'])){

if (strip_tags($_POST['your_car'])){
$your_car=strip_tags($_POST['your_car']);
$check=mysql_num_rows(mysql_query("SELECT * FROM garage WHERE id='$your_car' AND owner='$username'"));
if ($check == "0"){
echo "This is not your car.";
}else{
mysql_query("UPDATE street SET racer7_car='$your_car' WHERE id='$street->id'");
echo "Your racing car is now updated.";
}}
if (strip_tags($_POST['your_bet'])){

$your_bet=intval(strip_tags($_POST['your_bet']));

		if ($your_bet == 0 || !$your_bet || ereg('[^0-9]',$your_bet)){
	print "You cant bet that amount";
	
}elseif ($your_bet != 0 && $your_bet && !ereg('[^0-9]',$your_bet)){

if ($your_bet > $fetch->money){
echo "You cannot bet more money than you have.";
}elseif ($your_bet <= $fetch->money){
$new_pot=$street->racer7_bet + $your_bet;

$new_money=$fetch->money - $your_bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");


mysql_query("UPDATE street SET racer7_bet='$new_pot' WHERE id='$street->id'");
echo "Your pot has been updated.";

}}}

}





?>

<table width="62%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">
        <strong>Street racing</strong> </center></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2"><div align="center">Welcome to the racer control panel.</div></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td width="43%"><div align="left">Your car:</div></td>
          <td width="57%"><input name="your_car" type="text" id="your_car"></td>
        </tr>
        <tr> 
          <td>Your bet:</td>
          <td><input name="your_bet" type="text" id="your_bet"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="update" type="submit" id="update" value="Change"></td>
        </tr>
        <tr> 
          <td colspan="2"><div align="center">Other:</div></td>
        </tr>
        <tr> 
          <td> <div align="left"> 
              <input name="Leave" type="submit" id="Leave" value="Leave">
            </div></td>
          <td><input name="Ready" type="submit" id="Ready" value="Ready"></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table><?

}elseif (strtolower($username) == strtolower($street->racer8)){
if ($fetch->location != $street->location){
echo "You need to be in $street->location for the street race to start!";
exit();
}

if ($street->racer8_status == "Ready"){
echo "You are ready";
exit();
}
if (strip_tags($_POST['Leave'])){
mysql_query("UPDATE street SET racer8_car='0', racer8_status='0', racer8_bet='0' WHERE id='$street->id'");
mysql_query("UPDATE users set street_race='0' WHERE username='$username'");
echo "You left the street race";
exit();
}
if (strip_tags($_POST['Ready'])){
mysql_query("UPDATE street set racer8_status='Ready' WHERE id='$street->id'");
echo "You are now ready";
exit();
}

if (strip_tags($_POST['update'])){

if (strip_tags($_POST['your_car'])){
$your_car=strip_tags($_POST['your_car']);
$check=mysql_num_rows(mysql_query("SELECT * FROM garage WHERE id='$your_car' AND owner='$username'"));
if ($check == "0"){
echo "This is not your car.";
}else{
mysql_query("UPDATE street SET racer8_car='$your_car' WHERE id='$street->id'");
echo "Your racing car is now updated.";
}}
if (strip_tags($_POST['your_bet'])){

$your_bet=intval(strip_tags($_POST['your_bet']));

		if ($your_bet == 0 || !$your_bet || ereg('[^0-9]',$your_bet)){
	print "You cant bet that amount";
	
}elseif ($your_bet != 0 && $your_bet && !ereg('[^0-9]',$your_bet)){

if ($your_bet > $fetch->money){
echo "You cannot bet more money than you have.";
}elseif ($your_bet <= $fetch->money){
$new_pot=$street->racer8_bet + $your_bet;

$new_money=$fetch->money - $your_bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");


mysql_query("UPDATE street SET racer8_bet='$new_pot' WHERE id='$street->id'");
echo "Your pot has been updated.";

}}}

}





?>

<table width="62%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">
        <strong>Street racing</strong> </center></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2"><div align="center">Welcome to the racer control panel.</div></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td width="43%"><div align="left">Your car:</div></td>
          <td width="57%"><input name="your_car" type="text" id="your_car"></td>
        </tr>
        <tr> 
          <td>Your bet:</td>
          <td><input name="your_bet" type="text" id="your_bet"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="update" type="submit" id="update" value="Change"></td>
        </tr>
        <tr> 
          <td colspan="2"><div align="center">Other:</div></td>
        </tr>
        <tr> 
          <td> <div align="left"> 
              <input name="Leave" type="submit" id="Leave" value="Leave">
            </div></td>
          <td><input name="Ready" type="submit" id="Ready" value="Ready"></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table><?

}elseif (strtolower($username) == strtolower($street->racer9)){
if ($fetch->location != $street->location){
echo "You need to be in $street->location for the street race to start!";
exit();
}

if ($street->racer9_status == "Ready"){
echo "You are ready";
exit();
}
if (strip_tags($_POST['Leave'])){
mysql_query("UPDATE street SET racer9_car='0', racer9_status='0', racer9_bet='0' WHERE id='$street->id'");
mysql_query("UPDATE users set street_race='0' WHERE username='$username'");
echo "You left the street race";
exit();
}
if (strip_tags($_POST['Ready'])){
mysql_query("UPDATE street set racer9_status='Ready' WHERE id='$street->id'");
echo "You are now ready";
exit();
}

if (strip_tags($_POST['update'])){

if (strip_tags($_POST['your_car'])){
$your_car=strip_tags($_POST['your_car']);
$check=mysql_num_rows(mysql_query("SELECT * FROM garage WHERE id='$your_car' AND owner='$username'"));
if ($check == "0"){
echo "This is not your car.";
}else{
mysql_query("UPDATE street SET racer9_car='$your_car' WHERE id='$street->id'");
echo "Your racing car is now updated.";
}}
if (strip_tags($_POST['your_bet'])){

$your_bet=intval(strip_tags($_POST['your_bet']));

		if ($your_bet == 0 || !$your_bet || ereg('[^0-9]',$your_bet)){
	print "You cant bet that amount";
	
}elseif ($your_bet != 0 && $your_bet && !ereg('[^0-9]',$your_bet)){

if ($your_bet > $fetch->money){
echo "You cannot bet more money than you have.";
}elseif ($your_bet <= $fetch->money){
$new_pot=$street->racer9_bet + $your_bet;

$new_money=$fetch->money - $your_bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");


mysql_query("UPDATE street SET racer9_bet='$new_pot' WHERE id='$street->id'");
echo "Your pot has been updated.";

}}}

}





?>

<table width="62%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">
        <strong>Street racing</strong> </center></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2"><div align="center">Welcome to the racer control panel.</div></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td width="43%"><div align="left">Your car:</div></td>
          <td width="57%"><input name="your_car" type="text" id="your_car"></td>
        </tr>
        <tr> 
          <td>Your bet:</td>
          <td><input name="your_bet" type="text" id="your_bet"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="update" type="submit" id="update" value="Change"></td>
        </tr>
        <tr> 
          <td colspan="2"><div align="center">Other:</div></td>
        </tr>
        <tr> 
          <td> <div align="left"> 
              <input name="Leave" type="submit" id="Leave" value="Leave">
            </div></td>
          <td><input name="Ready" type="submit" id="Ready" value="Ready"></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table><?

}elseif (strtolower($username) == strtolower($street->racer10)){
if ($fetch->location != $street->location){
echo "You need to be in $street->location for the street race to start!";
exit();
}

if ($street->racer10_status == "Ready"){
echo "You are ready";
exit();
}
if (strip_tags($_POST['Leave'])){
mysql_query("UPDATE street SET racer10_car='0', racer10_status='0', racer10_bet='0' WHERE id='$street->id'");
mysql_query("UPDATE users set street_race='0' WHERE username='$username'");
echo "You left the street race";
exit();
}
if (strip_tags($_POST['Ready'])){
mysql_query("UPDATE street set racer10_status='Ready' WHERE id='$street->id'");
echo "You are now ready";
exit();
}

if (strip_tags($_POST['update'])){

if (strip_tags($_POST['your_car'])){
$your_car=strip_tags($_POST['your_car']);
$check=mysql_num_rows(mysql_query("SELECT * FROM garage WHERE id='$your_car' AND owner='$username'"));
if ($check == "0"){
echo "This is not your car.";
}else{
mysql_query("UPDATE street SET racer10_car='$your_car' WHERE id='$street->id'");
echo "Your racing car is now updated.";
}}
if (strip_tags($_POST['your_bet'])){

$your_bet=intval(strip_tags($_POST['your_bet']));

		if ($your_bet == 0 || !$your_bet || ereg('[^0-9]',$your_bet)){
	print "You cant bet that amount";
	
}elseif ($your_bet != 0 && $your_bet && !ereg('[^0-9]',$your_bet)){

if ($your_bet > $fetch->money){
echo "You cannot bet more money than you have.";
}elseif ($your_bet <= $fetch->money){
$new_pot=$street->racer10_bet + $your_bet;
$new_money=$fetch->money - $your_bet;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");



mysql_query("UPDATE street SET racer10_bet='$new_pot' WHERE id='$street->id'");
echo "Your pot has been updated.";

}}}

}





?>

<table width="62%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">
        <strong>Street racing</strong> </center></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td colspan="2"><div align="center">Welcome to the racer control panel.</div></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td width="43%"><div align="left">Your car:</div></td>
          <td width="57%"><input name="your_car" type="text" id="your_car"></td>
        </tr>
        <tr> 
          <td>Your bet:</td>
          <td><input name="your_bet" type="text" id="your_bet"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="update" type="submit" id="update" value="Change"></td>
        </tr>
        <tr> 
          <td colspan="2"><div align="center">Other:</div></td>
        </tr>
        <tr> 
          <td> <div align="left"> 
              <input name="Leave" type="submit" id="Leave" value="Leave">
            </div></td>
          <td><input name="Ready" type="submit" id="Ready" value="Ready"></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table><?
}


///////////////////IF THEY ARE IN 1
}
//////////////END








?>