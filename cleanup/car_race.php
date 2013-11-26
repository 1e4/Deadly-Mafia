<?php
include_once"includes/db_connect.php";
include_once"includes/functions.php"; 
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
if ($fetch->last_race > time()){
echo "You must wait ".maketime($fetch->last_race)." untill you can race again.";
exit();
}


 if ($fetch->street == "0"){
 if (strip_tags($_POST['Create']) && strip_tags($_POST['race_win']) == "1" || strip_tags($_POST['race_win']) == "2" && strip_tags($_POST['race_username']) && strip_tags($_POST['race_car'])){
 $race_username=strip_tags($_POST['race_username']);
 $race_win=strip_tags($_POST['race_win']);
 $race_car=strip_tags($_POST['race_car']);
 $race_cash=intval(strip_tags($_POST['race_cash']));
 if ($race_win == "2"){
 if ($race_cash == 0 || !$race_cash || ereg('[^0-9]',$race_cash)){
	print "Invalid amount.";
exit();
}
}

 if ($fetch->money < "1000"){
 echo "You do not have the required £1,000 to make the street race.";
 }elseif ($fetch->money >= "1000"){
 $check_car=mysql_query("SELECT * FROM garage WHERE id='$race_car' AND owner='$username'");
 $nums=mysql_num_rows($check_car);
 $fetch_car=mysql_fetch_object($check_car);

 if ($nums == "0"){ echo "This is not your car."; }elseif($nums != "0"){
if ($fetch_car->status != "0"){ echo "This car is in use."; }elseif ($fetch_car->status == "0"){
if ($fetch->money < $race_cash){
 echo "You don't have the money to put the bet up that high.";
 }elseif  ($fetch->money >= $race_cash){
 
 $check_username=mysql_query("SELECT * FROM users WHERE username='$race_username'");
 $user_check=mysql_num_rows($check_username);
 $fetch_check=mysql_fetch_object($check_username);
 
 if ($user_check == "0"){ echo  "No such user"; }elseif ($user_check != "0"){ 
 if($race_win == "1"){
 $type="Car";
 }elseif ($race_win == "2"){
 $type="Money";
 $race_beta=$race_cash;
 }
 
mysql_query(" INSERT INTO `street` ( `id` , `leader` , `leader_car` , `prize` , `prize_win` , `op_car` , `op_ready` , `op_username` , `op_invite`,`location` ) 
VALUES (
'', '$username', '$race_car', '$type', '$race_beta', '0', '0', '0', '$race_username','$fetch->location'
)");


echo "Street race created.";
$gaybar=mysql_insert_id();
mysql_query("UPDATE garage SET status='3' WHERE id='$race_car'");
if ($type=="Car"){ $winner="the loosers car"; }else{ $winner="£$race_cash"; }
$invite_text="
  <div align=center>$username has challanged you to a street race.<br>The winner will get: $winner

 <br> You gunna accept?<br>
    choose one of the following options:<br>
    <input name=Yes_street type=submit id=yes value=Yes>
    | 
    <input name=No_street type=submit value=No>
  </div><input type=hidden name=race_id value=$gaybar>
";


mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$race_username', '$race_username', '$invite_text', '$date', '0', '0', '0'
)");

$new_money=$fetch->money - (1000 + $race_beta);
mysql_query("UPDATE users SET money='$new_money', street='1' WHERE username='$username'");



 }}}}}}



?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/test.css" rel="stylesheet" type="text/css">
</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<form name="form1" method="post" action="">
  <table width="49%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
    <tr> 
      <td colspan="2" background="includes/grad.jpg"><center class=bold>
          <span class="style1">Street races</span>
      </center></td>
    </tr>
    <tr bgcolor=#666666> 
      <td colspan="2" bgcolor="#666666" class=tip><div align="center" class="style1">The prize for the winning 
      user</div></td>
    </tr>
    <tr> 
      <td colspan="2" bgcolor="#666666"><span class="style1">
        <input name="race_win" type="radio" value="1" checked>
        Opponents car</span></td>
    </tr>
    <tr> 
      <td colspan="2" bgcolor="#666666"><span class="style1">
        <input type="radio" name="race_win" value="2">
        Cash: &pound;  
        <input name="race_cash" type="text" id="race_cash">
      </span></td>
    </tr>
    <tr bgcolor=#666666> 
      <td colspan="2" bgcolor="#666666" class=tip><div align="center" class="style1">Who do you want to race with?</div></td>
    </tr>
    <tr> 
      <td colspan="2" bgcolor="#666666" ><div align="left" class="style1">I want to race with: 
          <input name="race_username" type="text" id="race_username">
        </div></td>
    </tr>
    <tr bgcolor=#666666> 
      <td colspan="2" bgcolor="#666666" class=tip><div align="center" class="style1">What car do you wish to use?</div></td>
    </tr>
    <tr > 
      <td colspan="2" bgcolor="#666666" ><span class="style1">My: 
          <select name="race_car" id="select3">
            <option selected>Choose car</option>
            <?php $get=mysql_query("SELECT * FROM garage WHERE owner='$username'");
while($it=mysql_fetch_object($get)){


echo "<option value=$it->id>$it->car, $it->damage%</option>";
}
?>
            </select>
      </span></td>
    </tr>
    <tr > 
      <td width="85%" bgcolor="#666666" ><span class="style1"></span></td>
      <td width="15%" bgcolor="#666666" ><input name="Create" type="submit" value="Submit"></td>
    </tr>
  </table>
</form>

</body>
</html>



<? }elseif ($fetch->street == "1"){ 

$street=mysql_fetch_object(mysql_query("SELECT * FROM street WHERE op_username='$username'"));


if (strtolower($street->op_username) == strtolower($username)){
if ($fetch->location != $street->location){
echo "You need to be in $street->location for the street race to start.";
exit();
}
if (strip_tags($_POST['Leave'])){
echo "You left the race.";
mysql_query("UPDATE street SET op_ready='0', op_username='0', op_car='0' WHERE id='$street->id'");
mysql_query("UPDATE users SET street='0' WHERE username='$username'");
exit();
}
if (strip_tags($_POST['Ready']) && $street->car != "0"){
echo "You are now ready.";
mysql_query("UPDATE street SET op_ready='Ready' WHERE id='$street->id'");
exit();
}
if ($street->op_ready=="Ready"){
echo "You are ready.";
exit();
}
if (strip_tags($_POST['choose_car']) && strip_tags($_POST['car'])){
if ($street->op_car != "0"){
echo "Youve already chosen your car."; }elseif ($street->op_car == "0"){
$choose_car=strip_tags($_POST['choose_car']);
$check = mysql_query("SELECT * FROM garage WHERE id='$choose_car' AND owner='$username'");
$nums=mysql_num_rows($check);
$ha_car=mysql_fetch_object($check);
if ($nums == "0"){
echo "This is not your car.";
}elseif ($nums != "0"){
if ($ha_car->status != "0"){ echo "This car is in use."; }elseif ($ha_car->status == "0"){

mysql_query("UPDATE street SET op_car='$choose_car' WHERE id='$street->id'");
mysql_query("UPDATE garage SET status='3' WHERE id='$choose_car'");

echo "Car selected";
}}}


}

?>




<form name="form2" method="post" action="">
  <table width="56%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
    <tr> 
      <td colspan="2" class=header><div align="center">Street race</div></td>
    </tr>
    <tr bgcolor=white> 
      <td colspan="2" class=tip><div align="center">Select your car:</div></td>
    </tr>
    <tr bgcolor=black> </tr>
    <tr> 
      <td colspan="2"><div align="center"> 
          <select name="choose_car" id="select">
            <option selected>Choose car</option>
            <?php $get=mysql_query("SELECT * FROM garage WHERE owner='$username'");
while($it=mysql_fetch_object($get)){


echo "<option value=$it->id>$it->car, $it->damage%</option>";
}
?>
          </select>
          <input type="submit" name="car" value="Select car">
        </div></td>
    </tr>
    <tr> 
      <td width="50%"> <div align="center">
          <input type="submit" name="Ready" value="Im ready">
        </div></td>
      <td width="50%"><div align="center">
          <input name="Leave" type="submit" id="Leave" value="Leave this race">
        </div></td>
    </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
  </form>

<? }
$street=mysql_fetch_object(mysql_query("SELECT * FROM street WHERE leader='$username'"));
if (strtolower($street->leader) == strtolower($username)){ 
$op=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$street->op_username'"));

if ($fetch->location != $street->location){
echo "You need to be in $street->location for the street race to start.";
exit();
}
if (strip_tags($_GET['kick']) == "true"){
mysql_query("UPDATE users SET street='0' WHERE username='$street->op_username'");
mysql_query("UPDATE garage SET status='0' WHERE id='$street->op_car'");
mysql_query("UPDATE street SET op_username='0', op_ready='0', op_car='0' WHERE id='$street->id'");

echo "Racer been kicked.";
}
if (strip_tags($_POST['Disband'])){
mysql_query("UPDATE garage SET status='0' WHERE id='$street->op_car'");
mysql_query("UPDATE garage SET status='0' WHERE id='$street->leader_car'");

mysql_query("UPDATE users SET street='0' WHERE username='$username'");
mysql_query("UPDATE users SET street='0' WHERE username='$street->op_username'");
mysql_query("DELETE FROM street WHERE id='$street->id'");
echo "Street race disbanded.";
exit();

}
if (strip_tags($_POST['inv_username']) && strip_tags($_POST['inv_button'])){
 $check_username=mysql_query("SELECT * FROM users WHERE username='$inv_username'");
 $user_check=mysql_num_rows($check_username);
 $fetch_check=mysql_fetch_object($check_username);
 
 if ($user_check == "0"){ echo  "No such user"; }elseif ($user_check != "0"){ 
 
 
if ($street->prize =="Car"){ $winner="the loosers car"; }else{ $winner="£$street->prize_win"; }
$invite_text="
  <div align=center>$username has challanged you to a street race.<br>The winner will get: $winner

 <br> You gunna accept?<br>
    choose one of the following options:<br>
    <input name=Yes_street type=submit id=yes value=Yes>
    | 
    <input name=No_street type=submit value=No>
  </div><input type=hidden name=race_id value=$street->id>
";
mysql_query("UPDATE street SET op_invite='$inv_username' WHERE id='$street->id'");


mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$inv_username', '$inv_username', '$invite_text', '$date', '0', '0', '0'
)");
echo "Invite sent.";
}}


if (strip_tags($_POST['GO_FOR']) && $op->location == $street->location && $street->op_ready=="Ready" && $street->op_car != "0"){
$car_leader=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->leader_car'"));
$car_op=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->op_car'"));
if ($car_leader->car == "Renault Clio Sport"){ $car_plus="1"; }
elseif ($car_leader->car == "Audi A3"){ $car_plus="2"; }
elseif ($car_leader->car == "Bmw m3"){ $car_plus="3";  }
elseif ($car_leader->car == "Cadilac Escelade"){ $car_plus="4";}
elseif ($car_leader->car == "Nissan Skyline"){ $car_plus="5"; }
elseif ($car_leader->car == "Porsche 911"){ $car_plus="6"; }
elseif ($car_leader->car == "GT 40"){ $car_plus="7"; }
elseif ($car_leader->car == "Lamborghini Murcielago"){ $car_plus="8"; }
elseif ($car_leader->car == "Ferrari Enzo"){ $car_plus="9"; }
elseif ($car_leader->car == "TVR Speed 12"){ $car_plus="10"; }
elseif ($car_leader->car == "Mclaren f1"){ $car_plus="11"; }
elseif ($car_leader->car == "Bugatti Veyron"){$car_plus="12"; }
$a=explode("-",$car_leader->upgrades);
$aa=$a[0]*2;
$ab=$a[1]*2;
$ac=$a[2]*2;
$ad=$a[3]*2;
$ae=$a[4]*2;
$af=$a[5]*2;
$ag=$a[6]*2;
$ah=$a[7]*2;
///////////////DRIVER2


if ($car_op->car == "Renault Clio Sport"){ $car_plus1="1"; }
elseif ($car_op->car == "Audi A3"){ $car_plus1="2"; }
elseif ($car_op->car == "Bmw m3"){ $car_plus1="3";  }
elseif ($car_op->car == "Cadilac Escelade"){ $car_plus1="4";}
elseif ($car_op->car == "Nissan Skyline"){ $car_plus1="5"; }
elseif ($car_op->car == "Porsche 911"){ $car_plus1="6"; }
elseif ($car_op->car == "GT 40"){ $car_plus1="7"; }
elseif ($car_op->car == "Lamborghini Murcielago"){ $car_plus1="8"; }
elseif ($car_op->car == "Ferrari Enzo"){ $car_plus1="9"; }
elseif ($car_op->car == "TVR Speed 12"){ $car_plus1="10"; }
elseif ($car_op->car == "Mclaren f1"){ $car_plus1="11"; }
elseif ($car_op->car == "Bugatti Veyron"){$car_plus1="12"; }
$b=explode("-",$car_op->upgrades);
$ba=$b[0]*2;
$bb=$b[1]*2;
$bc=$b[2]*2;
$bd=$b[3]*2;
$be=$b[4]*2;
$bf=$b[5]*2;
$bg=$b[6]*2;
$bh=$b[7]*2;
$total_leader=$aa+$ab+$ac+$ad+$ae+$af+$ag+$ah + $car_plus;
$total_op=$ba+$bb+$bc+$bd+$be+$bf+bg+$bh + $car_plus1;


if ($total_leader >= $total_op){

if ($street->prize == "Car"){
$car_win=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->op_car'"));
mysql_query("UPDATE garage SET owner='$username', status='0' WHERE id='$street->op_car'");
////GOT TO HERE



}elseif($street->prize == "Money"){
$new_money=$fetch->money + ($street->prize_win * 2);
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
}
///FINSH GIVING OUT FIRST WINNERS PRIZES


$last=time()+3600;
$new_rank=$fetch->rankpoints + rand(5,10);
$new_rank1=$op->rankpoints + rand(5,10);
mysql_query("UPDATE users SET rankpoints='$new_rank', street='0', last_race='$last'  WHERE username='$username'");
$last=time()+3600;
mysql_query("UPDATE users SET rankpoints='$new_rank1', street='0', last_race='$last'  WHERE username='$street->op_username'");
mysql_query("UPDATE garage SET status='0' WHERE id='$street->leader_car'");
mysql_query("UPDATE garage SET status='0' WHERE id='$street->op_car'");

echo "<font size=5>You pass the finish line miles in front!</font>";
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$username', '$username', 'Congratulations, You won the race!', '$date', '0', '0', '0'
)");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$op->username', '$op->username', 'Bad Luck, You lost the race.', '$date', '0', '0', '0'
)");
mysql_query("DELETE FROM street WHERE id='$street->id'");

}elseif ($total_leader < $total_op){

if ($street->prize == "Car"){
$car_win=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$street->leader_car'"));
mysql_query("UPDATE garage SET owner='$street->op_username', status='0' WHERE id='$street->leader_car'");
////GOT TO HERE



}elseif($street->prize == "Money"){
$new_money=$op->money + ($street->prize_win * 2);
mysql_query("UPDATE users SET money='$new_money' WHERE username='$street->op_username'");
}
///FINSH GIVING OUT FIRST WINNERS PRIZES


$last=time()+3600;
$new_rank=$op->rankpoints + rand(5,10);
$new_rank1=$fetch->rankpoints + rand(5,10);
mysql_query("UPDATE garage SET status='0' WHERE id='$street->op_car'");
mysql_query("UPDATE users SET rankpoints='$new_rank', street='0', last_race='$last'  WHERE username='$street->op_username'");
$last=time()+3600;
mysql_query("UPDATE users SET rankpoints='$new_rank1', street='0', last_race='$last'  WHERE username='$username'");
echo "<font size=5>You trail past the finish line You've LOST!</font>";
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$username', '$username', 'Bad Luck, You lost the race.', '$date', '0', '0', '0'
)");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$op->username', '$op->username', 'Congratulations, You won the race! ', '$date', '0', '0', '0'
)");
mysql_query("DELETE FROM street WHERE id='$street->id'");
}

























}





?>
<form name="form1" method="post" action="">

<table width="49%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
  <tr> 
    <td colspan="4" background="includes/grad.jpg"><center class=bold>
        Street races</center></td>
  </tr>
  <tr bgcolor=white> 
    <td colspan="4" class=tip><div align="center">Invite a user</div></td>
  </tr>
  <tr> 
    <td colspan="4"> <div align="center">Username: 
        <input name="inv_username" type="text" id="inv_username">
        <input name="inv_button" type="submit" id="inv_button" value="Submit">
      </div></td>
  </tr>
  <tr bgcolor=white> 
    <td colspan="4" class=tip><div align="center">Current status</div></td>
  </tr>
  <tr> 
    <td width="34%" ><div align="left">Username</div></td>
    <td width="28%" >Location</td>
    <td width="19%" >Status</td>
    <td width="19%" >Kick</td>
  </tr>
  <tr> 
    <td > 
      <?php if ($street->op_username == "0"){ echo "None"; }else{ echo "$street->op_username"; } ?>
    </td>
    <td width="28%" > 
      <?php if ($street->op_username == "0"){ echo "N/A"; }else{ echo "$op->location"; } ?>
    </td>
    <td width="19%" > 
      <?php if ($street->op_ready == "0"){ echo "Not Ready"; }else{ echo "Ready"; } ?>
    </td>
    <td ><a href=?kick=true>Kick</a></td>
  </tr>
  <tr bgcolor=white> 
    <td colspan="4" class=tip><div align="center">Other options</div></td>
  </tr>
  <tr > 
    <td colspan="4" ><div align="center"> 
        <input name="Disband" type="submit" id="Disband" value="Disband">
      </div></td>
  </tr>
 <?php if ($op->location == $street->location && $street->op_ready=="Ready" && $street->op_car != "0"){ 
 echo "<tr >
    <td colspan=4 ><input name=GO_FOR type=submit id=GO_FOR value='5 4 3 2 1 Go!'></td>
  </tr>";
  }
  ?>
</table></form>














<? }} ?>
