<?php
session_start();
include_once "includes/db_connect.php";
include_once "functions.php";
include_once "jail_check.php";
include 'ck.php';
logincheck();




$username=$_SESSION['username'];
$above = mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch = mysql_fetch_object($above);
if ($fetch->rank == "Civilian" || $fetch->rank == "PeeWee"
|| $fetch->rank == "Wannabe" || $fetch->rank == "Thief"){
echo "<font color=red>*You need to be Thief+ to do a special crime!</font>";
exit();
}


$username=$_SESSION['username'];
$radiobutton=$_POST['radiobutton'];
$above = mysql_query("SELECT * FROM users WHERE username='$username'");
$info = mysql_fetch_object($above);
$chance = explode("-", $info->scchance);




if ($info->Lastsc  > time()){
$left = $info->Lastsc  - time();
echo "You have done a special crime lately. You have $left seconds before you can do another one!";
exit();


}




if ($_POST['submit']){




$suc = $chance[$radiobutton];
$ran = rand(1,100);


        if ($ran <= $suc){


if ($radiobutton == "0"){
  $win = rand(100,200);
  $success = $chance[0];
  $quote="You got the mayor hostage and his wife gave you some money to let him go";
}elseif ($radiobutton == "1"){
  $win = rand(20,40);
  $success = $chance[1];
  $quote="The alarms dont go of and you walk out with the goods";

}elseif ($radiobutton == "2"){
  $win = rand(500,1000);
  $success = $chance[2];
  $quote="Stupid person he falls for it";
}elseif ($radiobutton == "3"){
  $win = rand(1000,2000);
  $success = $chance[3];
  $quote="You get a panda";
}elseif ($radiobutton == "4"){
  $win = rand(2000,4000);
  $success = $chance[4];
  $quote="You crack the safe and you skimed the police";
}elseif ($radiobutton == "5"){
  $win = rand(4000,10000);
  $success = $chance[5];
  $quote="The bank owner wets his pants";
}
$item_rand = rand(50,100);

$new_item = array('Weed seeds','Bandanna','Black boots','Bling','Chain','Yellow Pages','Tracking Device','Cheese Burger','Fries','Chicken Nuggets','Crisps','Curry','Fish');
$rand_item = rand(0,12);
$item_get=$new_item[$rand_item];
if ($item_rand >= "90"){

if ($item_get == "Weed seeds"){
$value="4000";
}elseif ($item_get == "Bandanna"){
$value="500";
}elseif ($item_get == "Black boots"){
$value="300";
}elseif ($item_get == "Bling"){
$value="3000";
}elseif ($item_get == "Chain"){
$value="3000";
}elseif ($item_get == "Yellow Pages"){
$value="10000";
}elseif ($item_get == "Tracking Device"){
$value="20000";
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




echo "Congratulations you got away with $item_get";
mysql_query("INSERT INTO `items` ( `id` , `item` , `value`,`owner` )
VALUES (
'', '$item_get', '$value','$username'
)");

}else{
echo "$quote well done! you got away with £$win!!";
rankcheck();
$time= time() + 120;
$newrank=rand(1,10);


$n_money=$info->money+$win;

$new_rank=$info->rankpoints + rand(2,10);
mysql_query("UPDATE users SET money='$n_money', rankpoints='$new_rank' WHERE username='$username'");
mysql_query("UPDATE user_info SET crimes=crimes+1 WHERE username='$username'");
}



  }else{
  if ($radiobutton == "0"){
  $quote="You saw the house but you never botherd it was too gaurded";
}elseif ($radiobutton == "1"){
$quote="The alarms went of so you legged it out of the shop";
}elseif ($radiobutton == "2"){

  $quote="He falls for it but then his mate comes and hits you with his lunchbox";
}elseif ($radiobutton == "3"){

  $quote="You tryed getting a animal but you got shot with a sleeping dart";
}elseif ($radiobutton == "4"){

  $quote="The alarms go of so you leg it";
}elseif ($radiobutton == "5"){

  $quote="You couldnt crack the safe, before the police came";
}
rankcheck();


echo "$quote Bad luck, you got away with nothing!";
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
     



        $chance[0]++;
        if ($chance[0] > 110){
                $chance[0] = 110;
        }

$arrayrates = array($chance[0], $chance[1], $chance[2], $chance[3], $chance[4]);
        $newrates = implode("-", $arrayrates);
        $tim = time() + rand(60,200);
        mysql_query("UPDATE users SET scchance='$newrates',Lastsc='$tim' WHERE username='$username'");
                exit;



}





?>








<html><head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel=stylesheet href=file:///C|/Documents%20and%20Settings/J/My%20Documents/My%20Received%20Files/includes/in.css type=text/css>
<style type="text/css">
<!--
.style1 {color: #999999}
-->
</style>
</head>


<center> <body>
<form name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="53%" height="127" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
    <!--DWLayoutTable-->
    <tr>
      <td colspan="3" background="file:///C|/Documents%20and%20Settings/J/My%20Documents/My%20Received%20Files/includes/grad.jpg" class="header">        Special Crimes </td>
    </tr>

    <tr>
      <td width="67%" height="9" valign="top"  > <input type="radio" name="radiobutton" value="0" class="submit" >
      Rob the local mayor.</td>
      <td width="33%" valign="top"><?php echo "$chance[0]"; ?>&nbsp;%</td>
    </tr>
    <tr>
      <td height="17" valign="top"><input type="radio"  class="submit" name="radiobutton" value="1">
      Rob the gas station.</td>
      <td width="33%" valign="top"><?php echo "$chance[1]"; ?>%</td>
    </tr>
    <tr>
      <td height="4" valign="top"> <input type="radio" name="radiobutton" class="submit"  value="2">
      Bribe a builder.</td>
      <td width="33%" valign="top"><?php echo "$chance[2]"; ?>%</td>
    </tr>
    <tr>
      <td height="4" valign="top"> <input type="radio" name="radiobutton"  class="submit" value="3">
      Rob a rare animal and try sell it.</td>
      <td width="33%" valign="top"  ><?php echo "$chance[3]"; ?>%</td>
    </tr>
    <tr>
      <td height="4" valign="top"  ><input type="radio" name="radiobutton" class="submit"  value="4">
      Rob a bank</td>
      <td width="33%" valign="top"><?php echo "$chance[4]"; ?>%</td>
    </tr>
        <tr>
      <td height="29" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td width="33%" valign="top"> <input name="submit" type="submit" class="submit " id="submit" value="Attempt"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</html>
<?php require_once "includes/footer.php"; ?>

