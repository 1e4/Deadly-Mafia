<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once"includes/jail_check.php";
include_once"probe.php";
logincheck();
$page="jack.php";
script_check($page);
echo "$style";

$username=$_SESSION['username'];
$radiobutton=$_POST['radiobutton'];
$above = mysql_query("SELECT * FROM users WHERE username='$username'");
$info = mysql_fetch_object($above);
$chance = explode("-", $info->gtachance);



if ($info->lastgta> time()){
$left = $info->lastgta - time(); ?>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Patience Please</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFCC00"><div align="center"><font color="#000000"><? echo "You have done a GTA recently you have to wait for $left seconds!"; ?></font></div></td>
    </tr>
  </table>
</div>
<?
exit();
}




if ($_POST['submit']){

$suc = $chance[$radiobutton];
$ran = rand(1,100);
	if ($ran <= $suc){
	

if ($radiobutton == "0"){
  $success = $chance[0];
     $cars = array('Black Cab','Black Cab','Ford Fiesta','Ford Fiesta','Black Cab','Honda Jazz','Honda Jazz','Honda Jazz','Jaguar XK','Ford Fiesta','Mercedes SLK','Range Rover Sport','Ferrari F430');

 $quote="You get away!.";
 ////NEXT RADIO
}elseif ($radiobutton == "1"){
  $success = $chance[1];
         $cars = array('Ford Fiesta','Ford Fiesta','Honda Jazz','Renault Clio','Range Rover Sport','Mercedes SLK','BMW 5 series','Mercedes SLK','Renault Clio','TVR Speed 12','Lamborghini Gallardo','BMW 5 series');

$quote="You get away!";
  ////NExT RADIO
}elseif ($radiobutton == "2"){
  $success = $chance[2];
         $cars = array('Black Cab','Ford Fiesta','Renault Clio','Renault Clio','Range Rover Sport','Mercedes SLK','BMW 5 series','Alfa Romeo','Renault Clio','Alfa Romeo','Lamborghini Gallardo','Ferrari F430','Mercedes SLK','BMW 5 series','Range Rover Sport');

  $quote="You get away!";


}
$win=rand(0,11);
if ($cars[$win] == "Black Cab"){ $img = "images/cars/bc.jpg"; }
elseif ($cars[$win] == "Ford Fiesta"){ $img = "images/cars/ff.jpg"; }
elseif ($cars[$win] == "Honda Jazz"){ $img = "images/cars/hj.jpg"; }
elseif ($cars[$win] == "Renault Clio"){ $img = "images/cars/ren.jpg"; }
elseif ($cars[$win] == "Range Rover Sport"){ $img = "images/cars/rrs.jpg"; }
elseif ($cars[$win] == "Mercedes SLK"){ $img = "images/cars/mer.jpg"; }
elseif ($cars[$win] == "BMW 5 series"){ $img = "images/cars/bmw1.jpg"; }
elseif ($cars[$win] == "Alfa Romeo"){ $img = "images/cars/ar.jpg"; }
elseif ($cars[$win] == "Jaguar XK"){ $img = "images/cars/jag.jpg"; }
elseif ($cars[$win] == "TVR Speed 12"){ $img = "images/cars/tvr12.jpg"; }
elseif ($cars[$win] == "Lamborghini Gallardo"){ $img = "images/cars/lam.jpg"; }
elseif ($cars[$win] == "Ferrari F430"){ $img = "images/cars/fer.jpg"; } ?>


<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="images/bg3.bmp"><div align="center"><? echo "$quote well done! you got away with a $cars[$win] "; ?>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg"></div></td>
    </tr>
    <tr>
      <td bgcolor="#454545"><div align="center"><font color="#000000"><? echo "<img src='$img'>" ; ?></font></div></td>
    </tr>
  </table>
</div><?

mysql_query("UPDATE user_info SET gtas=gtas+1 WHERE username='$username'");

$time= time() + (60*5);
$newrank=rand(10,20);
$damage=rand(1,50);

 if ($cars[$win] == "Black Cab"){
  $max="3000";
  if ($damage == "0"){
  $for=$max;
  }elseif ($damage == "50"){
  $for = "0";
  }else{
$for = $max / $damage *2;
  }
  }

//////////////////////////////////////


 if ($cars[$win] == "Ford Fiesta"){
  $max="5000";
  if ($damage == "0"){
  $for=$max;
  }elseif ($damage == "50"){
  $for = "0";
  }else{
$for = $max / $damage *2;
  }
  }

/////////////////////////////////////////



 if ($cars[$win] == "Honda Jazz"){
  $max="9000";
  if ($damage == "0"){
  $for=$max;
  }elseif ($damage == "50"){
  $for = "0";
  }else{
$for = $max / $damage *2;
  }
  }



////////////////////////////////////




 if ($cars[$win] == "Renault Clio"){
  $max="11000";
  if ($damage == "0"){
  $for=$max;
  }elseif ($damage == "50"){
  $for = "0";
  }else{
$for = $max / $damage *2;
  }
  }

//////////////////////////////////




 if ($cars[$win] == "Range Rover Sport"){
  $max="16000";
  if ($damage == "0"){
  $for=$max;
  }elseif ($damage == "50"){
  $for = "0";
  }else{
$for = $max / $damage *2;
  }
  }


/////////////////////////////////////
if ($cars[$win] == "Mercedes SLK"){
  $max="18000";
  if ($damage == "0"){
  $for=$max;
  }elseif ($damage == "50"){
  $for = "0";
  }else{
$for = $max / $damage *2;
  }
  }


/////////////////////////////////////
if ($cars[$win] == "BMW 5 series"){
  $max="20000";
  if ($damage == "0"){
  $for=$max;
  }elseif ($damage == "50"){
  $for = "0";
  }else{
$for = $max / $damage *2;
  }
  }


/////////////////////////////////////
if ($cars[$win] == "Alfa Romeo"){
  $max="25000";
  if ($damage == "0"){
  $for=$max;
  }elseif ($damage == "50"){
  $for = "0";
  }else{
$for = $max / $damage *2;
  }
  }


/////////////////////////////////////
if ($cars[$win] == "Jaguar XK"){
  $max="28000";
  if ($damage == "0"){
  $for=$max;
  }elseif ($damage == "50"){
  $for = "0";
  }else{
$for = $max / $damage *2;
  }
  }


/////////////////////////////////////
if ($cars[$win] == "TVR Speed 12"){
  $max="31000";
  if ($damage == "0"){
  $for=$max;
  }elseif ($damage == "50"){
  $for = "0";
  }else{
$for = $max / $damage *2;
  }
  }


/////////////////////////////////////
if ($cars[$win] == "Lamborghini Gallardo"){
  $max="36000";
  if ($damage == "0"){
  $for=$max;
  }elseif ($damage == "50"){
  $for = "0";
  }else{
$for = $max / $damage *2;
  }
  }


/////////////////////////////////////
if ($cars[$win] == "Ferrari F430"){
  $max="40000";
  if ($damage == "0"){
  $for=$max;
  }elseif ($damage == "50"){
  $for = "0";
  }else{
$for = $max / $damage *2;
  }
  }
/////////////////////////////////////


$for=round($for);
//print "$for!!";
mysql_query("INSERT INTO `garage` ( `id` , `owner` , `car` , `damage`,`origion`,`location`,`worth`) 
VALUES (
'', '$username', '$cars[$win]', '$damage','$info->location','$info->location','$for'
)");


mysql_query("UPDATE users SET rankpoints=rankpoints+$newrank WHERE username='$username'");


  }else{
  if ($radiobutton == "0"){
  $quote="CCTV Catches you in the act";
}elseif ($radiobutton == "1"){
$quote="Ever heard of a car alarm";
}elseif ($radiobutton == "2"){
$quote="You failed to break the door to enter showroom";
}
$reason = "GTA";
require_once"includes/failed.php"; ?>

<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Outcome</div></td>
    </tr>
    <tr>
      <td bgcolor="#FF3333"><div align="center"><font color="#000000"><? echo "You failed because $quote"; ?><body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg"></font></div></td>
    </tr>
  </table>
</div><?


mysql_query("UPDATE user_info SET gtas=gtas+1 WHERE username='$username'");



}
if($chance[0] == 1){$chance[0] = 1;}
	elseif(($chance[0] >= 1) && ($chance[0] <= 2)){$chance[0] = rand(1,$chance[0]);}
	elseif(($chance[0] >= 2) && ($chance[0] <= 10)){$chance[0] = rand(10,$chance[0]);}
	elseif(($chance[0] >= 5) && ($chance[0] <= 25)){$chance[0] = rand(25,$chance[0]);}
	elseif(($chance[0] >= 18) && ($chance[0] <= 36)){$chance[0] = rand(36,$chance[0]);}
	elseif(($chance[0] >= 25) && ($chance[0] <= 49)){$chance[0] = rand(49,$chance[0]);}
        elseif(($chance[0] >= 36) && ($chance[0] <= 58)){$chance[0] = rand(58,$chance[0]);}
        elseif(($chance[0] >= 49) && ($chance[0] <= 55)){$chance[0] = rand(55,$chance[0]);}
	elseif($chance[0] >= 55){$chance[0] = rand(55,$chance[0]);}
	

	if($chance[0] == 1){$chance[1] = 0;}
	elseif(($chance[0] >= 1) && ($chance[0] <= 2)){$chance[1] = rand(0,$chance[0]);}
	elseif(($chance[0] >= 3) && ($chance[0] <= 8)){$chance[1] = rand(7,$chance[0]);}
	elseif(($chance[0] >= 9) && ($chance[0] <= 15)){$chance[1] = rand(14,$chance[0]);}
	elseif(($chance[0] >= 16) && ($chance[0] <= 34)){$chance[1] = rand(33,$chance[0]);}
	elseif(($chance[0] >= 35) && ($chance[0] <= 74)){$chance[1] = rand(45,$chance[0]);}
	elseif($chance[0] >= 75){$chance[1] = rand(50,$chance[0]);}

	if($chance[0] == 1){$chance[2] = 0;}
	elseif(($chance[0] >= 1) && ($chance[0] <= 2)){$chance[2] = rand(0,$chance[0]);}
	elseif(($chance[0] >= 3) && ($chance[0] <= 8)){$chance[2] = rand(6,$chance[0]);}
	elseif(($chance[0] >= 9) && ($chance[0] <= 15)){$chance[2] = rand(13,$chance[0]);}
	elseif(($chance[0] >= 16) && ($chance[0] <= 34)){$chance[2] = rand(32,$chance[0]);}
	elseif(($chance[0] >= 35) && ($chance[0] <= 74)){$chance[2] = rand(60,$chance[0]);}
	elseif($chance[0] >= 75){$chance[2] = rand(85,$chance[0]);}

	
if($chance[0] > 50){
		$chance[0] = 40;
	}	
	if($chance[1] > 49){
		$chance[1] = 40;
	}	
	if($chance[2] > 48){
		$chance[2] = 40;
	}	


	

	
	$chance[0]++;
	if ($chance[0] > 50){
		$chance[0] = 40;
	}

$arrayrates = array($chance[0], $chance[1], $chance[2]);
	$newrates = implode("-", $arrayrates);
	$tim = time() + (60*4);
	mysql_query("UPDATE users SET gtachance='$newrates',lastgta='$tim'  WHERE username='$username'");
		exit;

}

?>






<html><head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
body {
	background-color: #555555;
}
-->
</style></head>


<center> <body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg"> 
<form name="form1" method="post" action="">
  <table width="53%" height="127" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
    <!--DWLayoutTable-->
    <tr> 
      <td colspan="3" background="includes/grad.jpg"><center>
          <strong>Choose a Gta:</strong> </center></td>
    </tr>
    <tr bgcolor="#999999"> 
      <td width="67%" height="9" valign="top" ><input type="radio" name="radiobutton" value="0" onClick="this.document.img.src='images/jack/main.gif'">
        Steal from a car park </td>
      <td width="33%" valign="top"><?php echo "$chance[0]"; ?>%</td>
    </tr>
    <tr bgcolor="#999999"> 
      <td height="17" valign="top" > <input type="radio" name="radiobutton" value="1" onClick="this.document.img.src='images/jack/main.gif'">
        Steal from the streets</td>
      <td width="33%" valign="top"><?php echo "$chance[1]"; ?>%</td>
    </tr>
    <tr bgcolor="#999999"> 
      <td height="8" valign="top" > <input type="radio" name="radiobutton" value="2" onClick="this.document.img.src='images/jack/main.gif'">
        Steal from a private sports car showroom</td>
      <td width="33%" valign="top"><?php echo "$chance[2]"; ?>%</td>
    </tr>
    <tr bgcolor="#999999"> 
      <td height="29" valign="top" ><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td width="33%" valign="top"> <input name="submit" type="submit" id="submit" value="Lets do it."> 
      </td>
    </tr>
  </table>
  
  <p>&nbsp;</p>
</form>
</html>
<?php require_once "includes/footer.php"; ?>