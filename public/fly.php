<?php session_start(); include_once "includes/db_connect.php";  include_once "includes/functions.php"; logincheck(); 
$username=$_SESSION['username'];
include"includes/jail_check.php";
$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$fetch=mysql_fetch_object($query);
$query2=mysql_query("SELECT * FROM user_info WHERE username='$username'");
$fly_skill=mysql_fetch_object($query2); ?><link href="includes/test.css" rel="stylesheet" type="text/css">
<?

$query1=mysql_query("SELECT * FROM airport WHERE location='$fetch->location' LIMIT 1");
$fetch1=mysql_fetch_object($query1);
$price=explode("-", $fetch1->travel_prices);
$prof=explode("-",$fetch1->profit);

if (strtolower($fetch1->owner) == strtolower($fetch->username)){
$cpanel=$_GET['cpanel'];
if ($cpanel == "yes"){ echo "<a href=fly.php>Back to airport</a>"; }else{  echo "<a href=?cpanel=yes>Airport control panel</a>"; } 

if ($cpanel == "yes"){ include_once"airportCP.php"; exit(); }

}
 

if ($fetch->lasttravel > time()){
?>
<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg"
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Next Departure</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFCC00"><div align="center"><font color="#000000"><? echo "You have recently travelled, the next departure is in ".maketime($fetch->lasttravel).".";  ?></font></div></td>
    </tr>
  </table>
</div>
<?
exit();
}

if ($_POST['radio']){
$radio=strip_tags($_POST['radio']);

if (!ereg('[^0-9]',$radio)){

if ($radio == "1"){
$costs = $price[0];
$to = "London";


$new0=$prof[0]+$costs;
$update="$new0-$prof[1]-$prof[2]-$prof[3]-$prof[4]-$prof[5]";
/////DRUG PRICES///
$uk[0] = rand(512,10423);
$uk[1] = rand(24452,43225);
$uk[2] = rand(3932,5963);
$uk[3] = rand(4000,6000);
$uk[4] = rand(50000,70000);
/////END DRUGS
$implodething = implode("-", $uk);

}elseif ($radio == "2"){
$costs = $price[1];
$to = "New York";

$new1=$prof[1]+$costs;
$update="$prof[0]-$new1-$prof[2]-$prof[3]-$prof[4]-$prof[5]";

/////DRUGS
$china[0] = rand(149,23459);
$china[1] = rand(11332,58223);
$china[2] = rand(1263,7438);
$china[3] = rand(3999,7000);
$china[4] = rand(30000,70000);
///Russia///
$implodething = implode("-", $china);
/////DRUGS


}elseif ($radio == "3"){
$costs = $price[2];
$to = "Beijing";

$new2=$prof[2]+$costs;
$update="$prof[0]-$prof[1]-$new2-$prof[3]-$prof[4]-$prof[5]";
///////DRUGS
$Russia[0] = rand(351,30431);
$Russia[1] = rand(50645,69647);
$Russia[2] = rand(2345,11458);
$Russia[3] = rand(9058,12453);
$Russia[4] = rand(80000,120000);

$implodething = implode("-", $Russia);
//////DRUGS

}elseif ($radio == "4"){
$costs = $price[3];
$to = "Rome";

$new3=$prof[3]+$costs;
$update="$prof[0]-$prof[1]-$prof[2]-$new3-$prof[4]-$prof[5]";

//////DRUGS
$usa[0] = rand(516,14704);
$usa[1] = rand(20343,44212);
$usa[2] = rand(6045,19234);
$usa[3] = rand(9834,11536);
$usa[4] = rand(60000,80000);
///saudi arabia////
$implodething = implode("-", $usa);
//////DERUGS

}elseif ($radio == "5"){
$costs = $price[4];
$to = "Moscow";

$new4=$prof[4]+$costs;
$update="$prof[0]-$prof[1]-$prof[2]-$prof[3]-$new4-$prof[5]";
///////DRUGDS
$saudiarabia[0] = rand(784,11245);
$saudiarabia[1] = rand(17450,19354);
$saudiarabia[2] = rand(1128,34532);
$saudiarabia[3] = rand(1120,53206);
$saudiarabia[4] = rand(45000,55003);

$implodething = implode("-", $saudiarabia);
//////DRUGS

}elseif ($radio == "6"){
$costs = $price[5];
$to = "Bogota";
$new5=$prof[5]+$costs;
$update="$prof[0]-$prof[1]-$prof[2]-$prof[3]-$prof[4]-$new5";

///////DRUGS
$panama[0] = rand(703,15359);
$panama[1] = rand(33456,48456);
$panama[2] = rand(1103,19123);
$panama[3] = rand(1223,59245);
$panama[4] = rand(52001,63028);
$implodething = implode("-", $panama);
//////DRUGS


}
if ($costs > $fetch->money){
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Error</div></td>
    </tr>
    <tr>
      <td bgcolor="red"><div align="center"><font color="#000000"><? echo "You dont have enough cash";
  ?></font></div></td>
    </tr>
  </table>
</div>
<?

}elseif ($costs <= $fetch->money){
if ($to == $fetch->location){
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">Error</div></td>
    </tr>
    <tr>
      <td bgcolor="red"><div align="center"><font color="#000000"><? echo "You are already in this location";
  ?></font></div></td>
    </tr>
  </table>
</div>
<?
}elseif ($to != $fetch->location){

if ($fetch1->owner == "0"){
$nmoney = $fetch->money - $costs;
$now=time() + 3600;
mysql_query("UPDATE users SET money='$nmoney',location='$to', lasttravel='$now' WHERE username='$username'");
?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">End Of Journey</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFCC00"><div align="center"><font color="#000000"><? echo "Welcome to $to";  ?></font></div></td>
    </tr>
  </table>
</div>
<?
mysql_query("UPDATE airport SET profit='$update' WHERE location='$fetch->location'");


}elseif ($fetch1->owner != "0"){

$nmoney = $fetch->money - $costs;
$ow = mysql_query("SELECT * FROM users WHERE username='$fetch1->owner'");
$ad = mysql_fetch_object($ow);

$good=$ad->money + $costs;
if ($fetch->plane == "None"){
$now = time() + 6000;
}elseif ($fetch->plane == "Microlight"){
$now = time() + 5000;
}elseif ($fetch->plane == "Small Plane"){
$now = time() + 3000;
}elseif ($fetch->plane == "Boeing 747"){
$now = time() + 2000;
}elseif ($fetch->plane == "Concord"){
$now = time() + 1000;
}elseif ($fetch->plane == "Private Jet"){
$now = time() + 0;
}


$druggy=explode("-",$fetch->drugs);
if ($druggy[0] > "0"){ $drug_name="Hash";  $a = "1"; }
elseif ($druggy[1] > "0"){ $drug_name="Ectasy";  $a = "1"; }
elseif ($druggy[2] > "0"){ $drug_name="Cocaine"; $a = "1"; }
elseif ($druggy[3] > "0"){ $drug_name="Phencyclidine";  $a = "1"; }
elseif ($druggy[4] > "0"){ $drug_name="Amitriptyline"; $a = "1"; }

$event=rand(1,10);

if ($event == "5" && $a == "1"){
 echo "Sh** you got found and put in jail for carying $drug_name";
$length=rand(60,140);
$length=time() + $length;
mysql_query("INSERT INTO `jail` (`id`,`username`, `time_left`,`reason`,`location`) VALUES ('', '$username', '$length', 'Carrying $drug_name', '$fetch->location');") or die (mysql_error());
exit();
}

////////////FIX THIS
$as=explode("-",$fetch->drugs);
if ($as[0] > "0"){ $new=rand(1,5); }
elseif ($as[1] > "0"){ $new=rand(1,5); }
elseif ($as[2] > "0"){ $new=rand(1,6); }
elseif ($as[3] > "0"){ $new=rand(1,7); }
elseif ($as[4] > "0"){ $new=rand(1,20); }
if ($fly_info->dealing > "0"){
if ($as[0] > "0" && $as[0] == "0" && $as[1] == "0" && $as[2] == "0" && $as[3] == "0" && $as[4] == "0" ){ 
$old=rand(1,5); 

$old=$fly_info->dealing - $old;
mysql_query("UPDATE user_info SET dealing='$old' WHERE username='$username'");
 }
}



$new_d=$fly_info->dealing + $new;
if ($new_d >= "100"){
$new_d=100;
}

mysql_query("UPDATE user_info SET dealing='$new_d' WHERE username='$username'");
///////////FIX THIS

mysql_query("UPDATE users SET money='$nmoney',location='$to', lasttravel='$now', drugprices='$implodething' WHERE username='$username'");
mysql_query("UPDATE users SET money='$good' WHERE username='$fetch1->owner'");



?>
<div align="center">
    <table width="350" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center">End Of Journey</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFCC00"><div align="center"><font color="#000000"><? echo "Welcome to $to";  ?></font></div></td>
    </tr>
  </table>
</div>
<?
mysql_query("UPDATE airport SET profit='$update' WHERE location='$fetch->location'");

}}}}}


?>
 



<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
  <form name="form1" method="post" action="">
  <table width=348 border=1 align=center cellpadding="2" cellspacing=0 bordercolor="black"  class=thinline>
    <tr> 
      <td colspan=3 background="includes/grad.jpg"><center class=bold>
          Fly to another Country</center></td>
    </tr>
    <tr class=title> 
      <td height="209" colspan=3><div align=center><img src="images/fly.jpeg" width="345" height="220"></div></td>
    </tr>
  
    <tr bgcolor=#FFFFFF> 
      <td width="169" bgcolor="#666666" class=tip><div align=center><font color="#FFFFFF">City</font></div></td>
      <td bgcolor="#666666" class=tip><div align=center><font color="#FFFFFF">Price</font></div></td>
      <td bgcolor="#666666" class=tip><div align="center"><font color="#FFFFFF">Country</font></div></td>
    </tr>
    <tr class=text> 
      <th height="32" bgcolor="#666666"><div align="left"> 
          <font color="#FFFFFF">
          <input name=radio type=radio value="1" id=radio10>
          <label id=label1 for=radio10>London</label>
          </font></div></th>
      <td width="123" bgcolor="#666666"> <font color="#FFFFFF"><?php echo "£$price[0]"; ?></font></td>
      <td width="50" bgcolor="#666666"><font color="#FFFFFF"><img src="images/Flags/uk_flag.gif" width="50" height="33"></font></td>
    </tr>
    <tr class=text> 
      <th height="34" bgcolor="#666666"><div align="left"> 
          <font color="#FFFFFF">
          <input name=radio type=radio value="2" id=radio9>
          <label id=label2 for=radio9>New York </label>
          </font></div></th>
      <td bgcolor="#666666"> <font color="#FFFFFF"><?php echo "£$price[1]"; ?></font></td>
      <td bgcolor="#666666"><font color="#FFFFFF"><img src="images/Flags/OldGlory.gif" width="49" height="39"></font></td>
    </tr>
    <tr class=text> 
      <th height="33" bgcolor="#666666"><div align="left"> 
          <font color="#FFFFFF">
          <input name=radio type=radio value="3" id=radio8>
          <label id=label3 for=radio8>Beijing</label>
          </font></div></th>
      <td bgcolor="#666666"><font color="#FFFFFF"><?php echo "£$price[2]"; ?> </font></td>
      <td bgcolor="#666666"><font color="#FFFFFF"><img src="Flag.jpeg" width="49" height="39"></font></td>
    </tr>
    <tr class=text> 
      <th bgcolor="#666666"><div align="left"> 
          <font color="#FFFFFF">
          <input name=radio type=radio value="4" id=radio7>
          <label id=label4 for=radio7>Rome</label>
          </font></div></th>
      <td bgcolor="#666666"> <font color="#FFFFFF"><?php echo "£$price[3]"; ?></font></td>
      <td bgcolor="#666666"><img src="italy_flag.jpg" width="49" height="39" /></td>
    </tr>
    <tr class=text> 
      <th bgcolor="#666666"><div align="left"> 
          <font color="#FFFFFF">
          <input name=radio type=radio value="5" id=radio6>
          <label id=label5 for=radio6>Moscow</label>
          </font></div></th>
      <td bgcolor="#666666"> <font color="#FFFFFF"><?php echo "£$price[4]"; ?></font></td>
      <td bgcolor="#666666"><font color="#FFFFFF"><img src="Russia_flag_large.png" width="49" height="39"></font></td>
    </tr>
    <tr class=text> 
      <th bgcolor="#666666"><div align="left"> 
          <font color="#FFFFFF">
          <input name=radio type=radio value="6" id=radio>
          <label id=label6 for=radio>Bogota</label>
          </font></div></th>
      <td bgcolor="#666666"> <font color="#FFFFFF"><?php echo "£$price[5]"; ?></font></td>
      <td bgcolor="#666666"><img src="columbia_flag.gif" width="49" height="39" /></td>
    </tr>
    <tr class=title> 
      <td bgcolor="#666666"><font color="#FFFFFF">
        <input name=travel_button type=submit class=submit id="travel_button" value=Submit>
      </font></td>
      <td colspan="2" bgcolor="#666666"><font color="#FFFFFF">&nbsp;</font></td>
    </tr>
  </table>
</form>
</form><BR><BR><BR>
<table width=411 cellspacing=1 cellpadding=1 border=0 bordercolor=black class=black align=center>
  <tr class=text>
    <td><div align=center></div></td>
  </tr>
</table>
<div align="center">
<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td background="includes/grad.jpg"><div align="center"><font color="#FFFFFF">Plane</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#999999"><div align="center">
      <?php if ($fetch->plane == "None"){ echo "You do not own a plane "; }else{ echo "You own a $fetch->plane"; } ?>
    </div></td>
  </tr>
</table></div>
<p>&nbsp;</p>
<div align="center">
  <table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td background="includes/grad.jpg"><div align="center"><font color="#FFFFFF">Owner</font></div></td>
    </tr>
    <tr>
      <td bgcolor="#999999"><div align="center">The Airport is owned by 
        <?php if ($fetch1->owner == "0"){ echo "This airport is not owned."; }else{ echo "This airport is owned by $fetch1->owner"; } ?>
        . </div></td>
    </tr>
  </table></div>
  <p align="center">&nbsp;</p>
  <center>
    <br>
  </center>

<?php include_once"includes/footer.php"; ?>