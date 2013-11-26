<?php include_once"includes/db_connect.php"; include_once"includes/functions.php"; logincheck();
$username=$_SESSION['username'];
$mysql=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($mysql);

if (strip_tags($_POST['sell_car_id']) && intval(strip_tags($_POST['sell_car_price']))){
$sell_car_id=strip_tags($_POST['sell_car_id']);
$sell_car_price=intval(strip_tags($_POST['sell_car_price']));
	if ($sell_car_price == 0 || !$sell_car_price || ereg('[^0-9]',$sell_car_price)){
	print "Invalid input.";
	
}elseif ($sell_car_price != 0 || $sell_car_price || !ereg('[^0-9]',$sell_car_price)){

$a_ready=mysql_num_rows(mysql_query("SELECT * FROM car_sell WHERE car_id='$sell_car_id'"));
if ($a_ready != "0"){
echo "This car is already up for sale.";
}elseif ($a_ready == "0"){

$check_if_yours = mysql_query("SELECT * FROM garage WHERE owner='$username' AND id='$sell_car_id'");
$num_check_rows=mysql_num_rows($check_if_yours);
$fetch_info=mysql_fetch_object($check_if_yours);
if ($num_check_rows != "0"){
mysql_query("INSERT INTO `car_sell` ( `id` , `owner` , `car_id` , `price` , `date` , `car_type`,`location` ) 
VALUES (
'', '$username', '$sell_car_id', '$sell_car_price', '$dtime', '$fetch_info->car','$fetch->location'
)");
echo "Car has been added";

}}}}



 ?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?php echo "$style"; ?>

<body>
<table width="109%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 colspan="8" background="<?php echo "$gradient"; ?>"><center class="TableHeading">
        <strong>Your cars:</strong> </center></td>
  </tr>
  <tr> 
    <td width="17%">Type:</td>
    <td width="13%">Damage</td>
    <td width="13%">Value</td>
    <td width="16%">Origion: </td>
    <td width="19%">Location</td>
    
  </tr>
  
  <? 
  $gather = mysql_query("SELECT * FROM garage WHERE owner='$username'");
  while($object=mysql_fetch_object($gather)){
  ////WHEN KIRsTY THINKS OF CARS I WILL NEED TO REPEWAT THIS FOR EaCH CAR!!!
 if ($object->car == "Renault Clio Sport"){
  $max="5000";
  if ($object->damage == "0"){
  $for=$max;
  }elseif ($object->damage == "50"){
  $for = "0";
  }else{
$for = $max / $object->damage *2;
  }
  }

//////////////////////////////////////


 if ($object->car == "Audi A3"){
  $max="10000";
  if ($object->damage == "0"){
  $for=$max;
  }elseif ($object->damage == "50"){
  $for = "0";
  }else{
$for = $max / $object->damage *2;
  }
  }

/////////////////////////////////////////



 if ($object->car == "Bmw m3"){
  $max="20000";
  if ($object->damage == "0"){
  $for=$max;
  }elseif ($object->damage == "50"){
  $for = "0";
  }else{
$for = $max / $object->damage *2;
  }
  }



////////////////////////////////////




 if ($object->car == "Cadilac Escelade"){
  $max="30000";
  if ($object->damage == "0"){
  $for=$max;
  }elseif ($object->damage == "50"){
  $for = "0";
  }else{
$for = $max / $object->damage *2;
  }
  }

//////////////////////////////////




 if ($object->car == "Nissan Skyline"){
  $max="40000";
  if ($object->damage == "0"){
  $for=$max;
  }elseif ($object->damage == "50"){
  $for = "0";
  }else{
$for = $max / $object->damage *2;
  }
  }


/////////////////////////////////////
if ($object->car == "Porsche 911"){
  $max="50000";
  if ($object->damage == "0"){
  $for=$max;
  }elseif ($object->damage == "50"){
  $for = "0";
  }else{
$for = $max / $object->damage *2;
  }
  }


/////////////////////////////////////
if ($object->car == "GT 40"){
  $max="60000";
  if ($object->damage == "0"){
  $for=$max;
  }elseif ($object->damage == "50"){
  $for = "0";
  }else{
$for = $max / $object->damage *2;
  }
  }


/////////////////////////////////////
if ($object->car == "Lamborghini Murcielago"){
  $max="70000";
  if ($object->damage == "0"){
  $for=$max;
  }elseif ($object->damage == "50"){
  $for = "0";
  }else{
$for = $max / $object->damage *2;
  }
  }


/////////////////////////////////////
if ($object->car == "Ferrari Enzo"){
  $max="80000";
  if ($object->damage == "0"){
  $for=$max;
  }elseif ($object->damage == "50"){
  $for = "0";
  }else{
$for = $max / $object->damage *2;
  }
  }


/////////////////////////////////////
if ($object->car == "TVR Speed 12"){
  $max="90000";
  if ($object->damage == "0"){
  $for=$max;
  }elseif ($object->damage == "50"){
  $for = "0";
  }else{
$for = $max / $object->damage *2;
  }
  }


/////////////////////////////////////
if ($object->car == "Mclaren f1"){
  $max="100000";
  if ($object->damage == "0"){
  $for=$max;
  }elseif ($object->damage == "50"){
  $for = "0";
  }else{
$for = $max / $object->damage *2;
  }
  }


/////////////////////////////////////
if ($object->car == "Bugatti Veyron"){
  $max="200000";
  if ($object->damage == "0"){
  $for=$max;
  }elseif ($object->damage == "50"){
  $for = "0";
  }else{
$for = $max / $object->damage *2;
  }
  }
/////////////////////////////////////


$for=round($for);





  ####////END########/////No mroe car thingying////####
  
  echo 
  "  <tr> 
    <td><a href=?type=$object->id>$object->car</a></td>
    <td width=13%>$object->damage%</td>
    <td width=13%>£".makecomma($for)."</td>
    <td width=16%>$object->origion</td>
    <td width=19%>$object->location</td>

  </tr>"; 
  }
  ?>
</table>


<?
if (strip_tags($_GET['type'])){
$type=$_GET['type'];
$dog_go_fetch = mysql_query("SELECT * FROM garage WHERE id='$type'");
$car_stuf = mysql_fetch_object($dog_go_fetch);


if ($car_stuf->car == "Renault Clio Sport"){ $img = "images/cars/renaultcliosport.jpg"; }
elseif ($car_stuf->car == "Audi A3"){ $img = "images/cars/audia3.jpg"; }
elseif ($car_stuf->car == "Bmw m3"){ $img = "images/cars/bmw-m3.jpg"; }
elseif ($car_stuf->car == "Cadilac Escelade"){ $img = "images/cars/esacallade.gif"; }
elseif ($car_stuf->car == "Nissan Skyline"){ $img = "images/cars/-----"; }
elseif ($car_stuf->car == "Porsche 911"){ $img = "images/cars/porsche.jpg"; }
elseif ($car_stuf->car == "GT 40"){ $img = "images/cars/fordgt40.jpg"; }
elseif ($car_stuf->car == "Lamborghini Murcielago"){ $img = "images/cars/-----.jpg"; }
elseif ($car_stuf->car == "Ferrari Enzo"){ $img = "images/cars/ferrarienzo.jpg"; }
elseif ($car_stuf->car == "TVR Speed 12"){ $img = "images/cars/tvr12.jpg"; }
elseif ($car_stuf->car == "Mclaren f1"){ $img = "images/cars/mcf1.jpg"; }
elseif ($car_stuf->car == "Bugatti Veyron"){ $img = "images/cars/BugattiVeyron.jpg"; }

if ($car_stuf->status == "0"){
$status_car="Stationary";
}elseif ($car_stuf->status == "1"){
$status_car="Shipping";
}elseif ($car_stuf->status == "2"){
$status_car="Auctions";
}

if (strip_tags($_GET['sell'])){
////HERE CLSS CARS////
 

$sell=strip_tags($_GET['sell']);

$yours=mysql_num_rows(mysql_query("SELECT * FROM garage WHERE owner='$username' AND id='$sell'"));
if ($yours != "0"){

if ($car_stuf->status == "1" || $car_stuf->status == "2"){
echo "This car is currently being shipped or is in a auction";
}elseif ($car_stuf->status != "1" || $car_stuf->status != "2"){
$n_money = $fetch->money + $for;
mysql_query("UPDATE users SET money='$n_money' WHERE username='$username'");
mysql_query("DELETE FROM garage WHERE id='$sell'");

echo "Car sold!";
exit();

}}}

echo "
<p>
<table width=55% border=1 align=center cellpadding=0 cellspacing=0 bordercolor=$td_border bgcolor=$td_bg>
  <tr>
    <td height=22 background=$gradient><center class=TableHeading>Car information:</center></td>
  </tr>
  <tr>
    <td><table width=100% border=0 cellspacing=3 cellpadding=0>
        <tr> 
          <td><div align=center>Image: </div>
            <div align=left></div></td>
        </tr>
        <tr> 
          <td><div align=center><img src=$img></div></td>
        </tr>
        <tr> 
          <td><div align=center>Information:</div></td>
        </tr>
        <tr> 
          <td>Car: $car_stuf->car</td>
        </tr>
        <tr> 
          <td>Price: £".makecomma($for)."</td>
        </tr>
	<tr> 
          <td>Status: $status_car</td>
        </tr>
<tr> 
          <td>Sell: <a href='?sell=$type&type=$type'>Sell</a></td>
        </tr>

        <tr>
";  ?>
          <td><b>Upgrades: </b><?php $mysql_de = mysql_query("SELECT * FROM depot WHERE car_id='$car_stuf->id'"); 

while($upgrades=mysql_fetch_object($mysql_de)){
 if ($swithcer == 0) {


echo "<font color=red>$upgrades->upgrade |   </font>"; 
$swithcer=1;
}
else
{
echo "<font color=blue>$upgrades->upgrade |   </font>"; 
$swithcer=0;
}
}


?>

</td>
 
        </tr>
</table></td> </tr> </table> 
<?php } ?></tr>
</table> 
<p><br>
<p>&nbsp;</p>
<form action="" method=POST>
<table width="56%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 colspan="4" background="<?php echo "$gradient"; ?>"><center class="TableHeading">
        <strong>Sell car at dealership</strong> 
      </center></td>
  </tr>
  <tr> 
    <td width="17%"><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td width="47%">Car id: </td>
          <td width="53%"><input name="sell_car_id" type="text" id="sell_car_id"></td>
        </tr>
        <tr> 
          <td>Sell for:</td>
          <td>&pound;
<input name="sell_car_price" type="text" id="sell_car_price"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Submit"></td>
        </tr>
      </table></td></table></form>
<p>
</body>
</html>
<?php require_once"includes/footer.php"; ?>
