<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once"includes/jail_check.php";
include_once"probe.php";
logincheck();
$page="crime.php";
script_check($page);
?><html><head> <link rel=stylesheet href=includes/test.css type=text/css></head>
<?


$username=$_SESSION['username'];
$radiobutton=$_POST['radiobutton'];
$above = mysql_query("SELECT * FROM users WHERE username='$username'");
$info = mysql_fetch_object($above);
$chance = explode("-", $info->crimechance); 


if ($info->lastcrime > time()){
$left = $info->lastcrime - time(); ?>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Patience Please</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFCC00"><div align="center"><font color="#000000"><? echo "You have done a crime recently you have to keep low for $left seconds!"; ?></font></div></td>
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
  $win = rand(12,99);
  $success = $chance[0];
  $quote="The person hands over their wallet";
}elseif ($radiobutton == "1"){
  $win = rand(98,250);
  $success = $chance[1];
  $quote="You break into the till";
  
}elseif ($radiobutton == "2"){
  $win = rand(700,5000);
  $success = $chance[2];
  $quote="You rob the post office";
}elseif ($radiobutton == "3"){
  $win = rand(1000,3000);
  $success = $chance[3];
  $quote="The Bank hands over the cash";
}elseif ($radiobutton == "4"){
  $win = rand(4000,9000);
  $success = $chance[4];
  $quote="You killed the guy and get your reward";
}elseif ($radiobutton == "5"){
  $win = rand(8000,10980);
  $success = $chance[5];
  $quote="The ransom is paid.";
}
$item_rand = rand(1,100);

$new_item = array('Weed seeds','Bandanna','Black boots','Bling','Chain','Yellow Pages','Tracking Device','Cheese Burger','Fries','Chicken Nuggets','Crisps','Curry','Fish');
$rand_item = rand(0,12);
$item_get=$new_item[$rand_item];
if ($item_rand >= "90"){

if ($item_get == "Weed seeds"){
$value="400000";
}elseif ($item_get == "Bandanna"){
$value="500";
}elseif ($item_get == "Black boots"){
$value="3000";
}elseif ($item_get == "Bling"){
$value="300000";
}elseif ($item_get == "Chain"){
$value="3000";
}elseif ($item_get == "Yellow Pages"){
$value="10000";
}elseif ($item_get == "Tracking Device"){
$value="200000";
}elseif ($item_get == "Cheese Burger"){
$value="200";
}elseif ($item_get == "Fries"){
$value="110";
}elseif ($item_get == "Chicken Nuggets"){
$value="180";
}elseif ($item_get == "Crisps"){
$value="100";
}elseif ($item_get == "Curry"){
$value="500";
}elseif ($item_get == "Fish"){
$value="250";
} 

?>

<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">OutCome</div></td>
    </tr>
    <tr>
      <td bgcolor="#FF0000"><div align="center"><font color="#000000"><? echo " Bad luck, you got away with nothing!"; ?>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg"></font></div></td>
    </tr>
  </table>
</div><?

mysql_query("INSERT INTO `items` ( `id` , `item` , `value`,`owner` ) 
VALUES (
'', '$item_get', '$value','$username'
)");

}else{ ?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">OutCome</div></td>
    </tr>
    <tr>
      <td bgcolor="#00FF33"><div align="center"><font color="#000000"><? echo "$quote Well done! you got away with £$win!!"; ?>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg"></font></div></td>
    </tr>
  </table>
</div><?

rankcheck();
$time= time() + 120;
$newrank=rand(1,10);
 


$n_money=$info->money+$win;

$new_rank=$info->rankpoints + rand(2,18);
mysql_query("UPDATE users SET money='$n_money', rankpoints='$new_rank' WHERE username='$username'");
mysql_query("UPDATE user_info SET crimes=crimes+1 WHERE username='$username'");
}



  }else{
  if ($radiobutton == "0"){
  $quote="You get beaten off";
}elseif ($radiobutton == "1"){
$quote="The shopkeeper gets out a gun";
}elseif ($radiobutton == "2"){

  $quote="The Post office sounds the alarm";
}elseif ($radiobutton == "3"){

  $quote="The bank closes the shutters";
}elseif ($radiobutton == "4"){

  $quote="You killed the wrong guy";
}elseif ($radiobutton == "5"){

  $quote="SAS find out where you are and you get arrested";
}
rankcheck(); ?>


<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">OutCome</div></td>
    </tr>
    <tr>
      <td bgcolor="#FF0000"><div align="center"><font color="#000000"><? echo "$quote Bad luck, you got away with nothing!"; ?>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg"></font></div></td>
    </tr>
  </table>
</div><?


$new_rank = $info->rankpoints + rand(1,5);
mysql_query("UPDATE users SET rankpoints='$new_rank' WHERE username='$username'");
 mysql_query("UPDATE user_info SET crimes=crimes+1 WHERE username='$username'"); 
$reason = "Crime";
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

	if($chance[0] == 1){$chance[3] = 0;}
	elseif(($chance[0] >= 1) && ($chance[0] <= 2)){$chance[3] = rand(0,$chance[0]);}
	elseif(($chance[0] >= 3) && ($chance[0] <= 9)){$chance[3] = rand(7,$chance[0]);}
	elseif(($chance[0] >= 10) && ($chance[0] <= 17)){$chance[3] = rand(14,$chance[0]);}
	elseif(($chance[0] >= 18) && ($chance[0] <= 37)){$chance[3] = rand(35,$chance[0]);}
	elseif(($chance[0] >= 38) && ($chance[0] <= 76)){$chance[3] = rand(60,$chance[0]);}
	elseif($chance[0] >= 77){$chance[3] = rand(70,$chance[0]);}
//echo
	if($chance[0] == 1){$chance[4] = 0;}
	elseif(($chance[0] >= 1) && ($chance[0] <= 3)){$chance[4] = rand(0,$chance[0]);}
	elseif(($chance[0] >= 4) && ($chance[0] <= 11)){$chance[4] = rand(9,$chance[0]);}
	elseif(($chance[0] >= 12) && ($chance[0] <= 19)){$chance[4] = rand(16,$chance[0])-14;}
	elseif(($chance[0] >= 20) && ($chance[0] <= 39)){$chance[4] = rand(28,$chance[0])-14;}
	elseif(($chance[0] >= 40) && ($chance[0] <= 79)){$chance[4] = rand(69,$chance[0])-14;}
	elseif($chance[0] >= 80){$chance[4] = rand(75,$chance[0])-14;}
		
	
//echo
	if($chance[0] == 1){$chance[5] = 0;}
	elseif(($chance[0] >= 1) && ($chance[0] <= 3)){$chance[5] = rand(0,$chance[0]);}
	elseif(($chance[0] >= 4) && ($chance[0] <= 11)){$chance[5] = rand(9,$chance[0]);}
	elseif(($chance[0] >= 12) && ($chance[0] <= 19)){$chance[5] = rand(16,$chance[0])-14;}
	elseif(($chance[0] >= 20) && ($chance[0] <= 39)){$chance[5] = rand(28,$chance[0])-14;}
	elseif(($chance[0] >= 40) && ($chance[0] <= 79)){$chance[5] = rand(69,$chance[0])-14;}
	elseif($chance[0] >= 80){$chance[5] = rand(75,$chance[0])-14;}
		
	
if($chance[0] > 100){
		$chance[0] = 100;
	}	
	if($chance[1] > 100){
		$chance[1] = 100;
	}	
	if($chance[2] > 100){
		$chance[2] = 100;
	}	
	if($chance[3] > 100){
		$chance[3] = 100;
	}
	if($chance[4] > 100){
		$chance[4] = 100;
	}	
	if($chance[5] > 100){
		$chance[5] = 100;
	}	
	

	
	$chance[0]++;
	if ($chance[0] > 110){
		$chance[0] = 110;
	}

$arrayrates = array($chance[0], $chance[1], $chance[2], $chance[3], $chance[4], $chance[5]);
	$newrates = implode("-", $arrayrates);
	$tim = time() + rand(120,122);
	mysql_query("UPDATE users SET crimechance='$newrates',lastcrime='$tim' WHERE username='$username'");
		exit;



}

?>






<html><head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel=stylesheet href=includes/test.css type=text/css>

</head>


<center> <body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg"> 
<form name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="53%" height="127" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
    <!--DWLayoutTable-->
    <tr> 
      <td colspan="3" background="includes/grad.jpg"><center>
          <strong>Crimes</strong> </center></td>
    </tr>
    <tr bgcolor="#999999"> 
      <td width="67%" height="9" valign="top" bgcolor="#666666"  > <span class="style2">
        <input type="radio" name="radiobutton" value="0" onClick="this.document.img.src='images/crimes/phone_boy.jpg'">
        Mug someone </span></td>
      <td width="33%" valign="top" bgcolor="#666666" ><span class="style2"><?php echo "$chance[0]"; ?>%</span></td>
    </tr>
    <tr bgcolor="#999999"> 
      <td height="17" valign="top" bgcolor="#666666" ><span class="style2">
        <input type="radio" name="radiobutton" value="1" onClick="this.document.img.src='images/crimes/coffee.jpg'">
        Break into a till </span></td>
      <td width="33%" valign="top" bgcolor="#666666"><span class="style2"><?php echo "$chance[1]"; ?>%</span></td>
    </tr>
    <tr bgcolor="#999999"> 
      <td height="4" valign="top" bgcolor="#666666"  > <span class="style2">
        <input type="radio" name="radiobutton" value="2" onClick="this.document.img.src='images/crimes/old_lady.jpg'">
        Rob a post office </span></td>
      <td width="33%" valign="top" bgcolor="#666666" ><span class="style2"><?php echo "$chance[2]"; ?>%</span></td>
    </tr>
    <tr bgcolor="#999999"> 
      <td height="4" valign="top" bgcolor="#666666"  > <span class="style2">
        <input type="radio" name="radiobutton" value="3" onClick="this.document.img.src='images/crimes/tesco.jpg'">
        Rob a bank </span></td>
      <td width="33%" valign="top" bgcolor="#666666" ><span class="style2"><?php echo "$chance[3]"; ?>%</span></td>
    </tr>
    <tr bgcolor="#999999"> 
      <td height="4" valign="top" bgcolor="#666666"  ><span class="style2">
        <input type="radio" name="radiobutton" value="4" onClick="this.document.img.src='images/crimes/ass.jpg'">
        Assassinate someone </span></td>
      <td width="33%" valign="top" bgcolor="#666666" ><span class="style2"><?php echo "$chance[4]"; ?>%</span></td>
    </tr>
    <tr bgcolor="#999999"> 
      <td height="4" valign="top" bgcolor="#666666"  > <span class="style2">
        <input type="radio" name="radiobutton" value="5" onClick="this.document.img.src='images/crimes/bank_vault.jpg'">
        Take someone hostage </span></td>
      <td width="33%" valign="top" bgcolor="#666666" ><span class="style2"><?php echo "$chance[5]"; ?>%</span></td>
    </tr>
    <tr bgcolor="#999999"> 
      <td height="29" valign="top" bgcolor="#666666" >&nbsp;</td>
      <td width="33%" valign="top" bgcolor="#666666"> <input name="submit" type="submit" id="submit" value="Lets do it.">      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</html>
<?php require_once "includes/footer.php"; ?>