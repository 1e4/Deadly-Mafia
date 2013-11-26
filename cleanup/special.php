<?php session_start();
include_once"includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);
$crew=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch->crew'"));

if ($fetch->crew == $crew->name &&  strtolower($crew->rhm) != strtolower($username) &&  strtolower($crew->owner) != strtolower($username)){
include_once "crew_front.php";
exit();
}elseif ($fetch->crew == $crew->name  && strtolower($crew->rhm) == strtolower($username) ||  strtolower($crew->owner) == strtolower($username)){
////////////////////////////////////////////////////////////////////
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

if($reset=="fampayout"){
$new_payout = time() + (3600*24);
mysql_query("UPDATE crews SET payout='$new_payout' WHERE name='$crew->name'");
echo"Reseted family payout time!";
}


if(strip_tags($_POST['withdraw_button']) && (strip_tags($_POST['withdraw_amount']))){
$with_amount=intval(strip_tags($_POST['withdraw_amount']));
	
		if ($withdraw_amount > "0"){
		if ($withdraw_amount == 0 || !withdraw_amount || ereg('[^0-9]',$withdraw_amount)){
	print "You cant withdraw that amount.";
	
}elseif ($withdraw_amount != 0 && $withdraw_amount && !ereg('[^0-9]',$withdraw_amount)){
	if ($withdraw_amount > $crew->bank){
	echo "You dont have that much in the bank.";
	}elseif ($withdraw_amount <= $crew->bank){
	$user_loose = $fetch->money - $withdraw_amount;
	$new_bank = $crew->bank + $withdraw_amount;

    mysql_query("UPDATE users SET money = '$user_loose' WHERE username='$username'");
	mysql_query("UPDATE crews SET bank = '$new_bank' WHERE name='$crew->name'");

echo "Money successfully donated!";

	}
echo "You withdrew £$with_amount";
echo "<meta http-equiv=\"refresh\" content=\"0;URL=special.php\">";
}}}}
///////////////////////////////////donate

if (strip_tags($_POST['donate_button']) && strip_tags($_POST['donate_amount'])){
$donate_amount=intval(strip_tags($_POST['donate_amount']));

		if ($donate_amount == 0 || !$donate_amount || ereg('[^0-9]',$donate_amount)){
	print "You cant deposit that amount.";
	
}elseif ($donate_amount != 0 && $donate_amount && !ereg('[^0-9]',$donate_amount)){



	if ($donate_amount > $fetch->money){
	echo "You do not have that much money";
	}elseif ($donate_amount <= $fetch->money){
	$user_add = $fetch->money - $donate_amount;
	$new_bank = $crew->bank + $donate_amount;

	mysql_query("UPDATE users SET money = '$user_loose' WHERE username='$username'");
	mysql_query("UPDATE crews SET bank = '$new_bank' WHERE name='$crew->name'");

echo "Money successfully donated!";

}
}}
$totalincrew=mysql_num_rows(mysql_query("SELECT * FROM users WHERE crew='$crew->name'"));
$totalmoney = mysql_fetch_object(mysql_query("SELECT SUM(money)AS crap FROM users WHERE crew='$crew->name' GROUP BY money"));
?><link rel=stylesheet href=includes/in.css type=text/css>
<form name="form1" method="post" action="">

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr> 
      <td><table width="100%" border="1" cellspacing="0" cellpadding="0" class=thinline rules=none>
          <tr> 
            <td class="header" colspan="4" > 
              <center>
                Crew members: </center></td>
          </tr>
          <tr bgcolor=white> 
            <td width="27%" height="21" class=tip>Username </td>
            <td width="36%" class=tip>Status</td>
            <td width="18%" class=tip>Money</td>
          </tr>
          <?php
		  $query=mysql_query("SELECT * FROM users WHERE crew='$crew->name'");
		  while($info_user=mysql_fetch_object($query)){
         echo"  <tr> 
            <td height=21><a href='profile.php?viewuser=$info_user->username'>$info_user->username</a></td>
            <td height=21>$info_user->status</td>
            <td height=21>£".makecomma($info_user->money)."</td>
          </tr>
        
    "; } echo "</tr>";
	?>
        </table></td>
    <tr> 
      <td>&nbsp;</td>
    <tr> 
      <td><table width="100%" border="1" cellspacing="0" cellpadding="0" class=thinline rules=none>
          <tr> 
            <td class="header" height="22"><center>
                Crew buisnesses </center></td>
          </tr>
          <tr> 
            <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr> 
                  <td> <div align="center"> </div></td>
                  <td width="23%"><em><strong>&nbsp;Buisness</strong></em></td>
                  <td width="20%"><em><strong>Price</strong></em></td>
                  <td width="25%"><em><strong>Makes per day</strong></em></td>
                  <td width="25%"><em><strong>Current amount</strong></em></td>
                </tr>
                <tr> 
                  <td><input type="radio" name="type" value="1"></td>
                  <td width="23%">Weapon factory </td>
                  <td>&pound;100,000</td>
                  <td>&pound;10,000</td>
                  <td><?php echo "$in[0]"; ?>&nbsp;</td>
                </tr>
                <tr> 
                  <td width="7%"><input type="radio" name="type" value="2"></td>
                  <td>&nbsp;Weed plantation</td>
                  <td>&pound;500,000</td>
                  <td>&pound;50,000</td>
                  <td><?php echo "$in[1]"; ?></td>
                </tr>
                <tr> 
                  <td> <input type="radio" name="type" value="3"></td>
                  <td>Hoe training facility</td>
                  <td>&pound;1,000,000</td>
                  <td>&pound;100,000</td>
                  <td><?php echo "$in[2]"; ?></td>
                </tr>
                <tr> 
                  <td><div align="right"> </div></td>
                  <td>&nbsp;</td>
                  <td colspan="3"><div align="right"> 
                      <input name="bus_button" type="submit" id="bus_button3" value="Purchase">
                    </div></td></tr>
		<tr>
                  <td colspan="6">Time untill family payout: <?php $tme=$crew->payout; $tme=$tme-time(); $tme=round($tme/60); echo"$tme minutes";?></td>
		  <a href=?reset=fampayout>Reset family payout(sets payout time current time+24 hours)</a><Br><br>

                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td ><tr> 
      <td width="53%"><table width="100%" border="1" cellspacing="0" cellpadding="0" class=thinline rules=none >
          <tr> 
            <td class="header"><center>
                Crew bank account </center></td>
          </tr>
          <tr> 
            <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr> 
                  <td colspan="2"> <div align="center"><strong>Donate:</strong></div></td>
                </tr>
                <tr> 
                  <td width="50%">Current balance:</td>
                  <td width="50%"><?php echo "£".makecomma($crew->bank).""; ?></td>
                </tr>
                <tr> 
                  <td>Withdraw</td>
                  <td width="50%"><input name="withdraw_amount" type="text" id="withdraw_amount"></td>
                </tr>
                <tr> 
				<td>Donate</td>
                  <td width="50%"><input name="donate_amount" type="text" id="donate_amount"></td>
              <tr></tr><td colspan="2"><div align="right"> 
                      <input name="withdraw_button" type="submit" id="withdraw_button" value="Withdraw money">
                      <input name="donate_button" type="submit" id="donate_button" value="Donate money">
                    </div></td>
                </tr>
              </table></td>
    </tr>
  </table>
        <p>&nbsp;</p>
      <tr> 
    <td><table width="100%" height="23" border="1" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
        <tr> 
          <td height="21"> 
            <div align="center"><a href="crew_index.php?page=3">User panel - you can use this option to acces the same information normal members have</a></div></td>
        </tr>
      </table></td>
  </tr>
<?php
///////TO CHECK IF THERE IN THE CREW AND THERE RHM
}
/////// 
?>

</form>
