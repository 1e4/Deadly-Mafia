<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$Submit=strip_tags($_POST['Submit']);
$choice=strip_tags($_POST['choice']);

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));



if ($Submit && $choice){
if ($choice == "1"){
$cost="10";

if ($cost > $fetch->points){
echo "You dont have enough Points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET money=money+10000 WHERE username='$username'");

echo "Money purchased";

}
}




}
if ($Submit && $choice){
if ($choice == "9"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET weapon=Browning M2HB WHERE username='$username'");

echo "You bought the browning";

}
}




}
if ($Submit && $choice){
if ($choice == "4"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET last_oc=last_oc=0 WHERE username='$username'");

echo "Now you can OC";

}
}




}
if ($Submit && $choice){
if ($choice == "5"){
$cost="50";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET last_race=last_race=0 WHERE username='$username'");

echo "Now you can race";

}
}




}
if ($Submit && $choice){
if ($choice == "6"){
$cost="80";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET health=+100 WHERE username='$username'");

echo "You have 100% health";

}
}




}
if ($Submit && $choice){
if ($choice == "7"){
$cost="10";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET energy=+100 WHERE username='$username'");

echo "You have 100% energy";

}
}



}
if ($Submit && $choice){
if ($choice == "10"){
$cost="10";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET bullets=bullets+1000 WHERE username='$username'");

echo "You have 1000 bullets";

}
}




}
if ($Submit && $choice){
if ($choice == "3"){
$cost="5";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET lasttravel=lasttravel=0 WHERE username='$username'");

echo "Now you can fly";

}
}




}
if ($Submit && $choice){
if ($choice == "21"){
$cost="5";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET last_order=last_order=0 WHERE username='$username'");

echo "You can now order from the bar";

}
}




}
if ($Submit && $choice){
if ($choice == "21"){
$cost="5";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET protection=Doberman WHERE username='$username'");

echo "You can now order from the bar";

}
}




}
if ($Submit && $choice){
if ($choice == "25"){
$cost="10";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET rankpoints=rankpoints+10 WHERE username='$username'");

echo "You gained 10 rankpoints";

}
}




}
if ($Submit && $choice){
if ($choice == "35"){
$cost="85";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET rankpoints=rankpoints+100 WHERE username='$username'");

echo "You gained 100 rankpoints";

}
}




}
if ($Submit && $choice){
if ($choice == "45"){
$cost="200";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET rankpoints=rankpoints+250 WHERE username='$username'");

echo "You gained 250 rankpoints";

}
}




}
if ($Submit && $choice){
if ($choice == "55"){
$cost="750";

if ($cost > $fetch->points){
echo "You dont have enough points";
}else{
mysql_query("UPDATE users SET points=points-$cost WHERE username='$username'");
mysql_query("UPDATE users SET rankpoints=rankpoints+1000 WHERE username='$username'");

echo "You gained 1000 rankpoints";

}
}




}

?>


<body>
<table width="500" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td height="8" colspan="3"><center class=Tableheading>
            <span  style="FONT-WEIGHT:bold">Points:</span><?php echo "".makecomma($fetch->points).""; ?> <span  ></span>&nbsp;
        </center></td>
      </tr>
      <tr>
        <td height="2" colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td height="3" colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td height="0" colspan="3"><center class=Tableheading>
        Send points:
        </center></td>
      </tr>
      <tr>
        <td width="44%" height="-1">To: </td>
        <td width="56%" height="-1" colspan="2"><input name="to_person" type="text" id="to_person"></td>
      </tr>
      <tr>
        <td height="-2">&nbsp;</td>
        <td height="-2" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="-3">Amount:</td>
        <td height="-3" colspan="2"><input name="send_amount" type="text" id="send_amount"></td>
      </tr>
      <tr>
        <td height="-3" colspan="3"><div align="right">
            <input name="Send_button" type="submit" id="Send_button" value="Send">
        </div></td>
      </tr>
    </table></td>
    <td rowspan="2"><table width="73%" height="382" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
      <tr>
        <td colspan="2"  background="includes/grad.jpg"><center>
        Points
        </center></td>
      </tr>
      <tr>
        <td width="51%" ><input type="radio" name="choice" value="1">
&pound;10,000 </td>
        <td width="49%" >10</td>
      </tr>
      <tr>
        <td ><input type="radio" name="choice" value="3">
      Fly now</td>
        <td >5</td>
      </tr>
      <tr>
        <td ><input type="radio" name="choice" value="4">
      Oc now</td>
        <td >50</td>
      </tr>
      <tr>
        <td ><input type="radio" name="choice" value="6">
      100% health</td>
        <td >80</td>
      </tr>
      <tr>
        <td ><input type="radio" name="choice" value="10">
      1000 Bullets</td>
        <td >10</td>
      </tr>
      <tr>
        <td ><input type="radio" name="choice" value="7">
      100% energy</td>
        <td >10</td>
      </tr>
      <tr>
        <td ><div align="left">
            <input type="radio" name="choice" value="21">
        Order from the Bar</div></td>
        <td >10</td>
      </tr>
      <tr>
        <td ><input type="radio" name="choice" value="25">
      10 Rank Points </td>
        <td >10</td>
      </tr>
      <tr>
        <td ><input type="radio" name="choice" value="35">
      100 Rank Points </td>
        <td >85</td>
      </tr>
      <tr>
        <td ><input type="radio" name="choice" value="45">
      250 Rank Points </td>
        <td >200</td>
      </tr>
      <tr>
        <td height="30" ><span  style="FONT-WEIGHT:bold">Points:</span><?php echo "".makecomma($fetch->points).""; ?> <span  ></span>&nbsp;</td>
        <td ><input type="submit" name="Submit" value="Submit"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="318">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php



$fetch= mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch_bank2= mysql_fetch_object(mysql_query("SELECT * FROM bank2 WHERE location='$fetch->location'"));

$bank2 = mysql_fetch_object(mysql_query("SELECT * FROM bank2 WHERE location='$fetch->location' LIMIT 1"));
if (strtolower($fetch_bank2->owner) == strtolower($fetch->username)){
include_once"bankCP.php";
exit();
}else{

$last = $fetch->bank2time - time();



/////CHECK IF INTREST TIME IS UP


/////CHECK IF INTREST TIME IS UP
////MOVE ONTO WITHDRAW

if((strip_tags($_POST['with_button'])) && (strip_tags($_POST['with_amount']))){
$with_amount=strip_tags($_POST['with_amount']);
	
		if ($with_amount > "0"){
		if ($with_amount == 0 || !$with_amount || ereg('[^0-9]',$with_amount)){
	print "You cant withdraw that amount.";
	
}elseif ($with_amount != 0 && $with_amount && !ereg('[^0-9]',$with_amount)){
	if ($with_amount > $fetch->bank2){
	echo "You dont have that much in the bank2.";
	}elseif ($with_amount <= $fetch->bank2){
	$points_plus = $fetch->points + $with_amount;
	$points_minus = $fetch->bank2 - $with_amount;
	if ($points_minus == "0"){

mysql_query("UPDATE users SET points = '$points_plus', bank2='0', bank2time='0' WHERE username='$username'");
}elseif($points_minus != "0"){

	mysql_query("UPDATE users SET points = '$points_plus', bank2='$points_minus' WHERE username='$username'");

	}
echo "You withdrew £$with_amount";
echo "<meta http-equiv=\"refresh\" content=\"0;URL=bank2.php\">";
}}}}
/////IF THEY DEPOSIT:




if((strip_tags($_POST['dep_amount'])) && (strip_tags($_POST['Dep_button']))){


	$dep_amount=strip_tags($_POST['dep_amount']);
	
		if ($dep_amount > "0"){
		if ($dep_amount == 0 || !$dep_amount || ereg('[^0-9]',$dep_amount)){
	print "You cant deposit that amount.";
	
}elseif ($dep_amount != 0 && $dep_amount && !ereg('[^0-9]',$dep_amount)){



	if ($dep_amount > $fetch->points){
	echo "You do not have that much points";
	}elseif ($dep_amount <= $fetch->points){
	$user_loose = $fetch->points - $dep_amount;
	$bank2_add = $dep_amount;


	$ha = 3600*24;
		$timewait=time()+ $ha;

	mysql_query("UPDATE users SET points = '$user_loose', bank2='$bank2_add', bank2time='$timewait' WHERE username='$username'");

echo "points deposited";
echo "<meta http-equiv=\"refresh\" content=\"0;URL=bank2.php\">";
}}}}


////SEND////


if($_POST['Send_button']){
$send_amount=strip_tags($_POST['send_amount']);

$to_person = strip_tags($_POST['to_person']);
	if (!$to_person){
	echo "Please enter a username.";
	}elseif ($to_person){

$num_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$to_person'"));

if ($num_true == 0){
echo "No such user."; 
}elseif ($num_true != 0){
	
	if ($send_amount > "0"){
		if ($send_amount == 0 || !$send_amount || ereg('[^0-9]',$send_amount)){
	print "You cant send that amount.";
	
}elseif ($send_amount != 0 || $send_amount || !ereg('[^0-9]',$send_amount)){



	if ($send_amount > $fetch->points){
	echo "You do not have that much points to send.";
	}elseif ($send_amount <= $fetch->points){
	

	if (strtolower($to_person) == strtolower($username)){
	echo "You cannot send the points to yourself";
	}elseif (strtolower($to_person) != strtolower($username)){
	
$to_user=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$to_person'"));

	
	$otheruser = $send_amount - round($send_amount * $fetch_bank2->send_intrest /100);
$bank2_owner_get=round($send_amount * $fetch_bank2->send_intrest /100);
$bank2gets = $send_amount - $otheruser;
$otheruser=$to_user->points + $otheruser;
	mysql_query("UPDATE users SET points = points-$send_amount WHERE username='$username'");
	mysql_query("UPDATE users SET points = '$otheruser' WHERE username='$to_person'");
	
	$bank2owner = $fetch_bank2->owner;
mysql_query("UPDATE users SET points = points+'$bank2gets' WHERE username='$bank2owner'");
mysql_query("UPDATE bank2 SET profit = profit+'$bank2gets' WHERE `location`='$fetch->location'");
$gmt_time = gmdate('Y-m-d h:i:s');
mysql_query("INSERT INTO `pointstransfers` ( `id` , `to` , `from` , `amount` , `date` ) 
VALUES (
'', '$to_person', '$username', '$send_amount', '$gmt_time'
);") or die (mysql_error());



echo "Successful transaction";
echo "<meta http-equiv=\"refresh\" content=\"0;URL=bank2.php\">";
}
}}}}}}





?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel=stylesheet href=file:///C|/Documents%20and%20Settings/J/My%20Documents/My%20Received%20Files/includes/in.css type=text/css>
</head>

<body>
<form action="" method=POST>
<table width="69%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr> 
    <td class="header"><center>
      Points
    </center></td>
  </tr>
 <tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr> 
    <td><div align="center">Welcome To The points Cpanel! </div></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td height="8" colspan="3"><center class=Tableheading>
            <span  style="FONT-WEIGHT:bold">Points:</span><?php echo "".makecomma($fetch->points).""; ?> <span  ></span>&nbsp;          </center></td>
        </tr>
        <tr> 
          <td height="2" colspan="3">&nbsp;</td>
        </tr>
        <tr> 
          <td height="3" colspan="3">&nbsp;</td>
        </tr>
        <tr> 
          <td height="0" colspan="3"><center class=Tableheading>
              Send points:</center></td>
        </tr>
        <tr> 
          <td width="44%" height="-1">To: </td>
          <td width="56%" height="-1" colspan="2"><input name="to_person" type="text" id="to_person"></td>
        </tr>
        <tr> 
          <td height="-2">&nbsp;</td>
          <td height="-2" colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td height="-3">Amount:</td>
          <td height="-3" colspan="2"><input name="send_amount" type="text" id="send_amount"></td>
        </tr>
        <tr> 
          <td height="-3" colspan="3"><div align="right">
              <input name="Send_button" type="submit" id="Send_button" value="Send">
            </div></td>
        </tr>
      </table></td>
  </tr>
</table>
<br>
<table width="69%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr>
    <td class="header" colspan=4><center>
        Last 10 recieved (Show all)
    </center></td>
  </tr>
  <tr>
    <td>
  <tr bgcolor=white>
    <td height="-3" class=tip>Tran ID#</td>
    <td class=tip>From</td>
    <td class=tip>Amount</td>
    <td class=tip>Date</td>
  </tr>
  <? $k=mysql_query("SELECT * FROM `pointstransfers` WHERE `to`='$username' ORDER BY id DESC LIMIT 10");
       while($p=mysql_fetch_object($k)){
	   echo "
	   <tr>
          <td>$p->id</td>
          <td><a href='profile.php?viewuser=$p->from'>$p->from</a></td>
          <td>&pound;".makecomma($p->amount)."</td>
          <td>$p->date</td>
        </tr>";
		}
		?>
</table>
<br>
<table width="69%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
  <tr>
    <td class="header" colspan=4><center>
        Last 10 sent (Show all)
    </center></td>
  </tr>
  <tr bgcolor=black>
    <td height=1 colspan=3></td>
  </tr>
  <tr bgcolor=white>
    <td height="-3" class=tip>Tran ID#</td>
    <td class=tip>To</td>
    <td class=tip>Amount</td>
    <td class=tip>Date</td>
  </tr>
  <? $ka=mysql_query("SELECT * FROM `pointstransfers` WHERE `from`='$username' ORDER BY id DESC LIMIT 10");
       while($pa=mysql_fetch_object($ka)){
	   echo "
	   <tr>
          <td>$pa->id</td>
          <td><a href='profile.php?viewuser=$pa->to'>$pa->to</a></td>
          <td>&pound;".makecomma($pa->amount)."</td>
          <td>$pa->date</td>
        </tr>";
		}
		?>
</table>
<p>&nbsp;</p>
</body>
</html>



<?php } ?>
 <?php echo"<p>"; include_once"includes/footer.php"; ?>

