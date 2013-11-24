<?php session_start();
include_once"includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);
$crew=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch->crew'"));

$crewtest=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE boss='$username'"));
if ($fetch->owner != "$crewtest")

if ($fetch->crew == $crew->name){

$bus=explode("-", $crew->income);
$first = $bus[0] * 10000;
$second = $bus[1] * 50000;
$third=$bus[2] * 100000;
$total_in = $first+$second+$third;

if ($crew->payout <= time()){
$bus=explode("-", $crew->income);
$first = $bus[0] * 10000;
$second = $bus[1] * 50000;
$third=$bus[2] * 100000;
$total = $first+$second+$third;
$total_users = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crew='$crew->name'"));


$per_user=round($total / $total_users);
$add=mysql_query("SELECT * FROM users WHERE crew='$crew->name'");
while($it = mysql_fetch_object($add)){
$new_money = $it->money + $per_user;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$it->username'");
$new_payout = time() + (3600*24);
mysql_query("UPDATE crews SET payout='$new_payout' WHERE name='$crew->name'");
}}




////////////////////////////////////////////////////////////////////
if (strip_tags($_POST['donate_button']) && strip_tags($_POST['donate_amount'])){
$donate_amount=intval(strip_tags($_POST['donate_amount']));

		if ($donate_amount == 0 || !$donate_amount || ereg('[^0-9]',$donate_amount)){
	print "You cant deposit that amount.";
	
}elseif ($donate_amount != 0 && $donate_amount && !ereg('[^0-9]',$donate_amount)){



	if ($donate_amount > $fetch->money){
	echo "You do not have that much money";
	}elseif ($donate_amount <= $fetch->money){
	$user_loose = $fetch->money - $donate_amount;
	$new_bank = $crew->bank + $donate_amount;

	mysql_query("UPDATE users SET money = '$user_loose' WHERE username='$username'");
	mysql_query("UPDATE crews SET bank = '$new_bank' WHERE name='$crew->name'");

echo "Money successfully donated!";

}
}}
$totalincrew=mysql_num_rows(mysql_query("SELECT * FROM users WHERE crew='$crew->name'"));
$totalmoney = mysql_fetch_object(mysql_query("SELECT SUM(money)AS crap FROM users WHERE crew='$crew->name' GROUP BY money"));

$in = explode("-",$crew->income);
if (strip_tags($_POST['bus_button'])){
$type=strip_tags($_POST['type']);

if ($type == "1"){
$price = "100000";
$bit=$in[0]+1;
$new_income="$bit-$in[1]-$in[2]";

}elseif ($type == "2"){
$price = "500000";
$bit=$in[1]+1;
$new_income="$in[0]-$bit-$in[2]";

}elseif ($type == "3"){
$price = "1000000";
$bit=$in[2]+1;
$new_income="$in[0]-$in[1]-$bit";
}else{
echo "Error";
exit();
}
if ($price > $fetch->money){
echo "You dont have enough money";
}elseif ($price <= $fetch->money){

$user_money = $fetch->money - $price;

mysql_query("UPDATE users SET money='$user_money' WHERE username='$username'");
mysql_query("UPDATE crews SET income='$new_income' WHERE name='$crew->name'");
echo "Buisness bought";
}}

if (strip_tags($_POST['leave'])){
if ($fetch->money < "3500"){
echo "You dont have eough money to leave this crew.";
}elseif ($fetch->money >= "3500"){
$new_money = $fetch->money - 3500;
mysql_query("UPDATE users SET crew='0', money='$new_money' WHERE username='$username'");
echo "You left that crew.";
}
}
if (strip_tags($_POST['bullet_button']) && strip_tags($_POST['bullet_amount'])){
$bullet_amount=intval(strip_tags($_POST['bullet_amount']));

		if ($bullet_amount == 0 || !$bullet_amount || ereg('[^0-9]',$bullet_amount)){
	print "You cant deposit that amount.";
	
}elseif ($bullet_amount != 0 && $bullet_amount && !ereg('[^0-9]',$bullet_amount)){



	if ($bullet_amount > $fetch->bullets){
	echo "You do not have that much bullets";
	}elseif ($bullet_amount <= $fetch->bullets){
	$user_loose = $fetch->bullets - $bullet_amount;
	$new_bank = $crew->bullets + $bullet_amount;

	mysql_query("UPDATE users SET bullets = '$user_loose' WHERE username='$username'");
	mysql_query("UPDATE crews SET bullets = '$new_bank' WHERE name='$crew->name'");

echo "Bullets successfully donated!";

}
}}

if (strip_tags($_POST['withdraw_button']) && strip_tags($_POST['bullet_amount'])){
$withdraw_amount=intval(strip_tags($_POST['bullet_amount']));

	
 if ($withdraw_amount > $crew->bullets){
	echo "You cant get that much";
	}elseif ($withdraw_amount <= $crew->bullets){

	$user_gain = $fetch->bullets + $withdraw_amount;
	$new_bank = $crew->bullets - $withdraw_amount;

	mysql_query("UPDATE users SET bullets = '$user_gain' WHERE username='$username'");
	mysql_query("UPDATE crews SET bullets = '$new_bank' WHERE name='$crew->name'");

echo "Bullets successfully withdrawn!";


}}

if (strip_tags($_POST['takecash_button']) && strip_tags($_POST['donate_amount'])){
$take_amount=intval(strip_tags($_POST['donate_amount']));

		if ($take_amount == 0 || !$take_amount || ereg('[^0-9]',$take_amount)){
	print "You cant take that amount.";
	
}elseif ($take_amount != 0 && $take_amount && !ereg('[^0-9]',$take_amount)){



	if ($take_amount > $crew->bank){
	echo "You do not have that much money";
	}elseif ($donate_amount <= $crew->bank){
	$owner_gain = $fetch->money + $take_amount;
	$new_bank = $crew->bank - $take_amount;

	mysql_query("UPDATE users SET money = '$owner_gain' WHERE username='$username'");
	mysql_query("UPDATE crews SET bank = '$new_bank' WHERE name='$crew->name'");

echo "Money successfully withdrawn!";

}
}}
if (strip_tags($_POST['takepoints_button']) && strip_tags($_POST['takepoints_amount'])){
$takepoints_amount=intval(strip_tags($_POST['takepoints_amount']));

		if ($takepoints_amount == 0 || !$takepoints_amount || ereg('[^0-9]',$takepoints_amount)){
	print "You cant take that amount.";
	
}elseif ($takepoints_amount != 0 && $takepoints_amount && !ereg('[^0-9]',$takepoints_amount)){



	if ($takepoints_amount > $crew->points){
	echo "Crew Doesn't have that many points";
	}elseif ($takepoints_amount <= $crew->bank){
	$owner_gain = $fetch->points + $takepoints_amount;
	$new_bank = $crew->points - $takepoints_amount;

	mysql_query("UPDATE users SET points = '$owner_gain' WHERE username='$username'");
	mysql_query("UPDATE crews SET points = '$new_bank' WHERE name='$crew->name'");

echo "Points successfully withdrawn!";

}
}}

else{
echo "a";
}
?><!--MMDW 1 -->
<link mmdw=0 rel=stylesheet href=includes/in.css type=text/css>
<form mmdw=1 name="form1" method="post" action="">


  <table mmdw=2 width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr> 
      <td mmdw=3 width="53%"><table mmdw=4 width="100%" border="1" cellspacing="0" cellpadding="0" class=thinline rules=none >
          <tr> 
            <td mmdw=5 class="header"><center>
                Crew bank account </center></td>
          </tr>
          <tr> 
            <td><table mmdw=6 width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr> 
                  <td mmdw=7 colspan="2"> <div mmdw=8 align="center"><strong>Donate:</strong></div></td>
                </tr>
                <tr> 
                  <td mmdw=9 width="50%">Current balance:</td>
                  <td mmdw=10 width="50%"><!--MMDW 2 --><?php echo "£".makecomma($crew->bank).""; ?><!--MMDW 3 --></td>
                </tr>
                <tr> 
                  <td>Amount</td>
                  <td mmdw=11 width="50%"><input mmdw=12 name="donate_amount" type="text" id="donate_amount"></td>
                </tr>
                <tr> 
                  <td mmdw=13 colspan="2"><div mmdw=14 align="right"> 
                      <input mmdw=15 name="takecash_button" type="submit" id="takecash_button" value="Withdraw money">
                      <input mmdw=16 name="donate_button" type="submit" id="donate_button" value="Donate money">
                    </div></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
      <td mmdw=17 width="47%"><table mmdw=18 width="100%" border="1" cellspacing="0" cellpadding="0" class=thinline rules=none>
          <tr> 
            <td mmdw=19 class="header"><center>
                Crew bullet bank </center></td>
          </tr>
          <tr> 
            <td><table mmdw=20 width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr> 
                  <td mmdw=21 colspan="2"> <div mmdw=22 align="center"><strong>Donate:</strong></div></td>
                </tr>
                <tr> 
                  <td mmdw=23 width="50%">Current bullets in bank:</td>
                  <td mmdw=24 width="50%"><!--MMDW 4 --><?php echo "£".makecomma($crew->bullets).""; ?><!--MMDW 5 --></td>
                </tr>
                <tr> 
                  <td>Amount</td>
                  <td mmdw=25 width="50%"><input mmdw=26 name="bullet_amount" type="text" id="donate_amount3"></td>
                </tr>
                <tr> 
                  <td mmdw=27 colspan="2"><div mmdw=28 align="right"> 
                      <input mmdw=29 name="withdraw_button" type="submit" id="donate_button4" value="Withdraw Bullets">
                      <input mmdw=30 name="bullet_button" type="submit" id="donate_button3" value="Donate Bullets">
                    </div></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td mmdw=31 colspan="2">&nbsp; </td>
    </tr>
    <tr> 
      <td><table mmdw=32 width="100%" border="1" cellspacing="0" cellpadding="0" class=thinline rules=none >
        <tr>
          <td mmdw=33 class="header"><center>
        Crew Points account
          </center></td>
        </tr>
        <tr>
          <td><table mmdw=34 width="100%" border="0" cellspacing="3" cellpadding="0">
              <tr>
                <td mmdw=35 colspan="2"><div mmdw=36 align="center"><strong>Donate:</strong></div></td>
              </tr>
              <tr>
                <td mmdw=37 width="50%">Current balance:</td>
                <td mmdw=38 width="50%"><!--MMDW 6 --><?php echo "".makecomma($crew->points).""; ?><!--MMDW 7 --></td>
              </tr>
              <tr>
                <td>Amount</td>
                <td mmdw=39 width="50%"><input mmdw=40 name="takepoints_amount" type="text" id="takepoints_amount"></td>
              </tr>
              <tr>
                <td mmdw=41 colspan="2"><div mmdw=42 align="right">
                    <input mmdw=43 name="takepoints_button" type="submit" id="takepoints_button" value="Withdraw Points">
                </div></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
<!--MMDW 8 --><?php
///////TO CHECK IF THERE IN THE CREW AND THERE RHM
}
/////// 
?><!--MMDW 9 -->

</form>
<!--MMDW 10 --><? include 'includes/footer.php'; ?><!--MMDW 11 --><!-- MMDW:success -->