<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/jail_check.php";
include_once"probe.php";
logincheck();
$page="crime.php";
script_check($page);



$username=$_SESSION['username'];
$radiobutton=$_POST['radiobutton'];
$above = mysql_query("SELECT * FROM users WHERE username='$username'");
$info = mysql_fetch_object($above);
$chance = explode("-", $info->crimechance);


if ($info->lastcrime > time()){
$left = $info->lastcrime - time();
echo "You can only do 1 crime every 2 mins you must wait $left seconds!";
exit();
}



if ($_POST['submit']){

$suc = $chance[$radiobutton];
$ran = rand(1,100);

	
	if ($ran <= $suc){
	

if ($radiobutton == "0"){
  $win = rand(10,20);
  $success = $chance[0];
  $quote="You succeeded in stealing from a post office";
}elseif ($radiobutton == "1"){
  $win = rand(20,40);
  $success = $chance[1];
  $quote="You succeeded in stealing from a vending machine";
  
}elseif ($radiobutton == "2"){
  $win = rand(50,100);
  $success = $chance[2];
  $quote="You succeeded in stealing from a rich person";
}elseif ($radiobutton == "3"){
  $win = rand(147,468);
  $success = $chance[3];
  $quote="You succeeded in stealing from a department store";
}elseif ($radiobutton == "4"){
  $win = rand(500,788);
  $success = $chance[4];
  $quote="You succeeded in killing the target";
}elseif ($radiobutton == "5"){
  $win = rand(1000,2100);
  $success = $chance[5];
  $quote="The government pays up for the ransom";
}elseif ($radiobutton == "6"){
  $win = rand(2500,3500);
  $success = $chance[6];
  $quote="You robbed the bank!";  
}
$item_rand = rand(1,100);

$new_item = array('Mobile phone','Trainers','PC Games','Jewelry','Headphones','Laptop','A moped','Energy Bar','Books','Stamps','Xbox','TV','Food');
$rand_item = rand(0,12);
$item_get=$new_item[$rand_item];
if ($item_rand >= "90"){

if ($item_get == "Mobile phone"){
$value="4000";
}elseif ($item_get == "Trainers"){
$value="500";
}elseif ($item_get == "PC Games"){
$value="300";
}elseif ($item_get == "Jewelry"){
$value="3000";
}elseif ($item_get == "Headphones"){
$value="300";
}elseif ($item_get == "Laptop"){
$value="10000";
}elseif ($item_get == "A moped"){
$value="20000";
}elseif ($item_get == "Energy Bar"){
$value="200";
}elseif ($item_get == "Books"){
$value="110";
}elseif ($item_get == "Stamps"){
$value="180";
}elseif ($item_get == "Xbox"){
$value="1000";
}elseif ($item_get == "TV"){
$value="500";
}elseif ($item_get == "Food"){
$value="250";
}




echo "Congratulations you got away with $item_get";
mysql_query("INSERT INTO `items` ( `id` , `item` , `value`,`owner` ) 
VALUES (
'', '$item_get', '$value','$username'
)");

}else{
echo "$quote well done! you got away with �$win!!";
rankcheck();
$time= time() + 120;
$newrank=rand(1,10);
 
loose_energy();

$n_money=$info->money+$win;

$new_rank=$info->rankpoints + rand(2,10);
mysql_query("UPDATE users SET money='$n_money', rankpoints='$new_rank' WHERE username='$username'");
mysql_query("UPDATE user_info SET crimes=crimes+1 WHERE username='$username'");
}



  }else{
  if ($radiobutton == "0"){
  $quote="";
}elseif ($radiobutton == "1"){
$quote="You failed in stealing from a vending machine";
}elseif ($radiobutton == "2"){

  $quote="You failed in stealing from a rich person";
}elseif ($radiobutton == "3"){

  $quote="You failed in stealing from a department store";
}elseif ($radiobutton == "4"){

  $quote="Your bullets missed the target";
}elseif ($radiobutton == "5"){

  $quote="You Hijacked the wrong person";
}
elseif ($radiobutton == "6"){

  $quote="You got caught";
}
rankcheck();


loose_energy();

echo "$quote Bad Luck!";
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

//echo
	if($chance[0] == 1){$chance[6] = 0;}
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
	if($chance[6] > 100){
		$chance[6] = 100;
	}	
	

	
	$chance[0]++;
	if ($chance[0] > 110){
		$chance[0] = 110;
	}

$arrayrates = array($chance[0], $chance[1], $chance[2], $chance[3], $chance[4], $chance[5], $chance[6]);
	$newrates = implode("-", $arrayrates);
	$tim = time() + rand(120,121);
	mysql_query("UPDATE users SET crimechance='$newrates',lastcrime='$tim' WHERE username='$username'");
		exit;



}

?><!--MMDW 1 -->






<html><head>
<title>Empire2010</title>
<meta mmdw=0 http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link mmdw=1 rel=stylesheet href=includes/in.css type=text/css>
<!--MMDW 2 --><style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style><!--MMDW 3 -->
</head>


<center> <body> 
<form mmdw=2 name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table mmdw=3 width="53%" height="127" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
    <!--DWLayoutTable-->
    <tr> 
      <td mmdw=4 colspan="3" background="includes/grad.jpg"><center>
          <strong>Crimes</strong> </center></td>
    </tr>
    <tr mmdw=5 bgcolor="#cccccc"> 
      <td mmdw=6 height="8" colspan="2" valign="top" > <div mmdw=7 align="center"> <img mmdw=8 src="images/crimes/main.jpg" name="img" width="150" height="150" border="0" id="img"> 
        </div></td>
    </tr>
    <tr mmdw=9 bgcolor="#999999"> 
      <td mmdw=10 width="67%" height="9" valign="top"  > <input mmdw=11 type="radio" name="radiobutton" value="0" onClick="this.document.img.src='images/crimes/main.jpg'">
        Rob a post office </td>
      <td mmdw=12 width="33%" valign="top" ><!--MMDW 4 --><?php echo "$chance[0]"; ?><!--MMDW 5 -->&nbsp;%</td>
    </tr>
    <tr mmdw=13 bgcolor="#cccccc"> 
      <td mmdw=14 height="17" valign="top" ><input mmdw=15 type="radio" name="radiobutton" value="1" onClick="this.document.img.src='images/crimes/main.jpg'">
        Break open a vending machine</td>
      <td mmdw=16 width="33%" valign="top"><!--MMDW 6 --><?php echo "$chance[1]"; ?><!--MMDW 7 -->%</td>
    </tr>
    <tr mmdw=17 bgcolor="#999999"> 
      <td mmdw=18 height="4" valign="top"  > <input mmdw=19 type="radio" name="radiobutton" value="2" onClick="this.document.img.src='images/crimes/main.jpg'">
        Steal from a rich person </td>
      <td mmdw=20 width="33%" valign="top" ><!--MMDW 8 --><?php echo "$chance[2]"; ?><!--MMDW 9 -->%</td>
    </tr>
    <tr mmdw=21 bgcolor="#cccccc"> 
      <td mmdw=22 height="4" valign="top"  > <input mmdw=23 type="radio" name="radiobutton" value="3" onClick="this.document.img.src='images/crimes/main.jpg'">
        Raid a department store </td>
      <td mmdw=24 width="33%" valign="top" ><!--MMDW 10 --><?php echo "$chance[3]"; ?><!--MMDW 11 -->%</td>
    </tr>
    <tr mmdw=25 bgcolor="#999999"> 
      <td mmdw=26 height="4" valign="top"  ><input mmdw=27 type="radio" name="radiobutton" value="4" onClick="this.document.img.src='images/crimes/main.jpg'">
        Kill for cash </td>
      <td mmdw=28 width="33%" valign="top" ><!--MMDW 12 --><?php echo "$chance[4]"; ?><!--MMDW 13 -->%</td>
    </tr>
    <tr mmdw=29 bgcolor="#cccccc">
      <td mmdw=30 height="4" valign="top"  ><input mmdw=31 type="radio" name="radiobutton" value="5" onClick="this.document.img.src='images/crimes/main.jpg'">
  Hijack a government official </td>
      <td mmdw=32 valign="top" ><!--MMDW 14 --><?php echo "$chance[5]"; ?><!--MMDW 15 -->%</td>
    </tr>
    <tr mmdw=33 bgcolor="#999999"> 
      <td mmdw=34 height="29" valign="top" ><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td mmdw=35 width="33%" valign="top"> <input mmdw=36 name="submit" type="submit" id="submit" value="Lets do it."> 
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div mmdw=37 align="center"></div>
  <div mmdw=38 align="center"></div>
  <p mmdw=39 align="center">&nbsp;</p>
</form>
</html>
<!--MMDW 16 --><?php require_once "includes/footer.php"; ?><!--MMDW 17 -->
<!-- MMDW:success -->