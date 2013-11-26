<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once"includes/jail_check.php";
logincheck();
echo "$style";

$username=$_SESSION['username'];
$radiobutton=$_POST['radiobutton'];
$above = mysql_query("SELECT * FROM users WHERE username='$username'");
$info = mysql_fetch_object($above);
$chance = explode("-", $info->gtachance);


if ($info->lastgta > time()){
$left = $info->lastgta - time();
echo "You have done a car jack recently you have to wait for $left seconds!";
exit();
}



if ($_POST['submit']){

$suc = $chance[$radiobutton];
$ran = rand(1,100);
	if ($ran <= $suc){
	

if ($radiobutton == "0"){
  $success = $chance[0];
     $cars = array('Renault Clio Sport','Audi A3','Bmw m3','Cadilac Escelade','Nissan Skyline','Porsche 911','GT 40','Lamborghini Murcielago','Ferrari Enzo','TVR Speed 12','Mclaren f1','Bugatti Veyron');

 $quote="The old man, trys to chase the car, but fails.";
 ////NEXT RADIO
}elseif ($radiobutton == "1"){
  $success = $chance[1];
         $cars = array('Renault Clio Sport','Audi A3','Bmw m3','Cadilac Escelade','Nissan Skyline','Porsche 911','GT 40','Lamborghini Murcielago','Ferrari Enzo','TVR Speed 12','Mclaren f1','Bugatti Veyron');

$quote="You got away with the car";
  ////NExT RADIO
}elseif ($radiobutton == "2"){
  $success = $chance[2];
         $cars = array('Renault Clio Sport','Audi A3','Bmw m3','Cadilac Escelade','Nissan Skyline','Porsche 911','GT 40','Lamborghini Murcielago','Ferrari Enzo','TVR Speed 12','Mclaren f1','Bugatti Veyron');

  $quote="The salesperson just sits there and laughs";


}
if ($cars[$win] == "Renault Clio Sport"){ $img = "images/cars/renaultcliosport.jpg"; }
elseif ($cars[$win] == "Audi A3"){ $img = "images/cars/audia3.jpg"; }
elseif ($cars[$win] == "Bmw m3"){ $img = "images/cars/bmw-m3.jpg"; }
elseif ($cars[$win] == "Cadilac Escelade"){ $img = "images/cars/esacallade.gif"; }
elseif ($cars[$win] == "Nissan Skyline"){ $img = "images/cars/-----"; }
elseif ($cars[$win] == "Porsche 911"){ $img = "images/cars/porsche.jpg"; }
elseif ($cars[$win] == "GT 40"){ $img = "images/cars/fordgt40.jpg"; }
elseif ($cars[$win] == "Lamborghini Murcielago"){ $img = "images/cars/-----.jpg"; }
elseif ($cars[$win] == "Ferrari Enzo"){ $img = "images/cars/ferrarienzo.jpg"; }
elseif ($cars[$win] == "TVR Speed 12"){ $img = "images/cars/tvr12.jpg"; }
elseif ($cars[$win] == "Mclaren f1"){ $img = "images/cars/mcf1.jpg"; }
elseif ($cars[$win] == "Bugatti Veyron"){ $img = "images/cars/BugattiVeyron.jpg"; }


$win=rand(0,5);
echo "$quote well done! you got away with <a href='$img'>$cars[$win]</a> !!";
mysql_query("UPDATE user_info SET gtas=gtas+1 WHERE username='$username'");

$time= time() + (60*5);
$newrank=rand(1,20);
$damage=rand(0,50);
mysql_query("INSERT INTO `garage` ( `id` , `owner` , `car` , `damage`,`origion`,`location`) 
VALUES (
'', '$username', '$cars[$win]', '$damage','$info->location','$info->location'
)");

loose_energy();
mysql_query("UPDATE users SET rankpoints=rankpoints+$newrank WHERE username='$username'");


  }else{
  if ($radiobutton == "0"){
  $quote="The old man scared you away with his walking stick!";
}elseif ($radiobutton == "1"){
$quote="The police were everywhere";
}elseif ($radiobutton == "2"){
$quote="The cars were locked";
}

echo "You got away with jack all because $quote";
mysql_query("UPDATE user_info SET gtas=gtas+1 WHERE username='$username'");

loose_energy();
$reason = "GTA";
require_once"includes/failed.php";
}
if($chance[0] == 1){$chance[1] = 1;}
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
	$tim = time() + (60*5);
	mysql_query("UPDATE users SET gtachance='$newrates',lastgta='$tim'  WHERE username='$username'");
		exit;

}

?>






<html><head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>


<center> <body> 
<form name="form1" method="post" action="">
  <table width="67%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
    <tr>
      <td height="22" background="<?php echo"$gradient"; ?>"><center class="TableHeading">
          <strong>Choose a Gta:</strong> 
        </center></td>
    </tr>
    <tr>
      <td height="113"> 
        <table width="88%" border="0" align="center" cellpadding="0" cellspacing="3" bordercolor="#CCCCCC">
          <tr> 
            <td height="2"> <input type="radio" name="radiobutton" value="0">
              Steal from a rich mans house</td>
            <td width="34%"><?php echo "$chance[0]"; ?>&nbsp;%</td>
          </tr>
          <tr> 
            <td width="66%" height="3"> <input type="radio" name="radiobutton" value="1">
              Jack from streets</td>
            <td><?php echo "$chance[1]"; ?>%</td>
          </tr>
          <tr> 
            <td width="66%" height="19"><input type="radio" name="radiobutton" value="2">
              Jack from a dealership</td>
            <td><?php echo "$chance[2]"; ?>%</td>
          </tr>
          <tr> 
            <td width="66%" height="23">&nbsp;</td>
            <td><input name="submit" type="submit" id="submit" value="Lets do it."></td>
          </tr>
        </table></td>
    </tr>
  </table>
  </form>
</html>
<?php require_once "includes/footer.php"; ?>
