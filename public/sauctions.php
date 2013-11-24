<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/jail_check.php";
include_once"probe.php";
logincheck();
$username=$_SESSION['username'];
$page="auctions.php";
script_check($page);
function pp($events_time){
 $time_left = $events_time - time();
$time_left =  gmdate("z\d G\h i\m s\s", $time_left);
return $time_left;
}
$time_now=time();

$check_time_out=mysql_query("SELECT * FROM auctions WHERE time < '$time_now'");
while($lets_check = mysql_fetch_object($check_time_out)){
$highest_bid=mysql_fetch_object(mysql_query("SELECT * FROM bidders WHERE auction_id='$lets_check->id' ORDER BY amount DESC LIMIT 1"));
$curr_owner=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$lets_check->username'"));
$can_afford=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$highest_bid->bidder'"));

$nums_fag=mysql_num_rows(mysql_query("SELECT * FROM bidders WHERE auction_id='$lets_check->id'"));
if ($nums_fag == "0"){
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$lets_check->username', '$lets_check->username', 'Your $lets_check->item_type #$lets_check->item_id <br> Was not sold.', '$date', '0', '0', '0'
)");
if ($lets_check->item_type == "Bullets"){
$re_apply=$curr_owner->bullets + $lets_check->item_id;
mysql_query("UPDATE users SET bullets='$re_apply' WHERE username='$curr_owner->username'");
}elseif ($lets_check->item_type == "Car"){

mysql_query("UPDATE `garage` SET `status`='0' WHERE `id`='$lets_check->item_id'");
}elseif ($lets_check->item_type == "Witness Statement"){

mysql_query("UPDATE `inbox` SET `to`='$lets_check->username' WHERE `id`='$lets_check->item_id'");
}


mysql_query("DELETE FROM auctions WHERE id='$lets_check->id'");
}elseif ($nums_fag != "0"){




if ($lets_check->item_type == "Bullet Factory"){
$run_q="UPDATE bf SET owner='$highest_bid->bidder' WHERE location='$lets_check->item_id'";

}elseif($lets_check->item_type == "Witness Statement"){
$run_q="UPDATE `inbox` SET `to`='$highest_bid->bidder', `from`='$highest_bid->bidder' WHERE `id`='$lets_check->item_id'";
}elseif($lets_check->item_type == "Bullets"){

$new_bullets=$can_afford->bullets + $lets_check->item_id;

mysql_query("UPDATE users SET bullets='$new_bullets' WHERE username='$highest_bid->bidder'");

}elseif($lets_check->item_type == "RPS"){
$run_q="UPDATE casinos SET owner='$highest_bid->bidder' WHERE location='$lets_check->item_id' AND casino='RPS'";


}elseif($lets_check->item_type == "Slots"){
$run_q="UPDATE casinos SET owner='$highest_bid->bidder' WHERE location='$lets_check->item_id' AND casino='Slots'";

}elseif($lets_check->item_type == "Race Track"){
$run_q="UPDATE race SET owner='$highest_bid->bidder' WHERE location='$lets_check->item_id'";

}elseif($lets_check->item_type == "Keno"){
$run_q="UPDATE casinos SET owner='$highest_bid->bidder' WHERE location='$lets_check->item_id' AND casino='Keno'";

}elseif($lets_check->item_type == "Roulette"){
$run_q="UPDATE casinos SET owner='$highest_bid->bidder' WHERE location='$lets_check->item_id' AND casino='Roulette'";

}elseif($lets_check->item_type == "Bank"){
$run_q="UPDATE bank SET owner='$highest_bid->bidder' WHERE location='$lets_check->item_id'";

}elseif($lets_check->item_type == "Airport"){
$run_q="UPDATE airport SET owner='$highest_bid->bidder' WHERE location='$lets_check->item_id'";



}elseif($lets_check->item_type == "bj"){
$run_q="UPDATE bj SET bjowner='$highest_bid->bidder' WHERE country='$lets_check->item_id'";




}elseif($lets_check->item_type == "Car"){
$run_q="UPDATE garage SET owner='$highest_bid->bidder' WHERE id='$lets_check->item_id'";

}
if ($lets_check->item_type != "Bullets"){
mysql_query("$run_q");
}
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$lets_check->username', '$lets_check->username', 'Your $lets_check->item_type #$lets_check->item_id <br> Has been sold for<br> £".makecomma($highest_bid->amount)."!', '$date', '0', '0', '0'
)");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$highest_bid->bidder', '$highest_bid->bidder', 'You won $lets_check->item_type #$lets_check->item_id <br> For<br> £".makecomma($highest_bid->amount)."!', '$date', '0', '0', '0'
)");
$own = $curr_owner->money + $highest_bid->amount;
mysql_query("UPDATE users SET money='$own' WHERE username='$curr_owner->username'");

if ($lets_check->item_type == "Car"){

mysql_query("UPDATE `garage` SET `status`='0' WHERE `id`='$lets_check->item_id'");
}

////NOW GIVE OTHER USERS MONEY BACK.

mysql_query("DELETE FROM bidders WHERE auction_id='$lets_check->id'");

mysql_query("DELETE FROM auctions WHERE id='$lets_check->id'");

}}

$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);



$type=strip_tags($_GET['type']);
if ($type == "1" || $type == "2" || $type == "3" || $type == "4" || $type == "5" || $type == "6" || $type == "7" || $type == "8" || $type == "9" || $type == "10" || $type == "11" || $type == "13" || $type == "14"){

if ($type == "1"){
$max_time = 86400;
$min_time= 3600;
$max_op=100000000000;
$item_type = "Bullet Factory";
$query="SELECT * FROM bf WHERE location='$item_location' AND owner='$username'";
$casino="1";
}elseif ($type == "2"){
$max_time = 86400;
$min_time= 3600;
$max_op=10000000;

$item_type = "Witness Statement";
$query="SELECT * FROM `inbox` WHERE `id`='$item_id' AND `to`='$username' AND `witness`='1'";

}elseif ($type == "3"){
$max_time = 86400;
$min_time= 3600;
$max_op=10000000;
$item_type = "Bullets";


}elseif ($type == "4"){
$max_time = 86400;
$min_time= 3600;
$max_op=10000000;
$item_type = "RPS";
$casino="1";
$query="SELECT * FROM casinos WHERE location='$item_location' AND owner='$username' AND casino='RPS'";

}elseif ($type == "5"){
$max_time = 86400;
$min_time= 3600;
$max_op=10000000;
$item_type = "Slots";
$casino="1";
$query="SELECT * FROM casinos WHERE location='$item_location' AND owner='$username' AND casino='Slots'";
}elseif ($type == "6"){
$max_time = 86400;
$min_time= 3600;
$max_op=100000000;
$casino="1";
$item_type = "Race Track";
$query="SELECT * FROM race WHERE location='$item_location' AND owner='$username'";
}elseif ($type == "7"){
$max_time = 86400;
$min_time= 3600;
$max_op=100000000;
$casino="1";
$item_type = "Keno";
$query="SELECT * FROM casinos WHERE location='$item_location' AND owner='$username' AND casino='Keno'";
}elseif ($type == "8"){
$max_time = 86400;
$min_time= 3600;
$max_op=100000000;
$item_type = "Bank";
$casino="1";
$query="SELECT * FROM bank WHERE location='$item_location' AND owner='$username'";
}elseif ($type == "9"){
$max_time = 86400;
$min_time= 3600;
$max_op=10000000;
$item_type = "Airport";
$casino="1";
$query="SELECT * FROM airport WHERE location='$item_location' AND owner='$username'";
}elseif ($type == "10"){
$max_time = 86400;
$min_time= 3600;
$max_op=1000000000;
$item_type = "Roulette";
$query="SELECT * FROM shop WHERE location='$item_location' AND owner='$username' AND casino='Roulette'";
$casino="1";
}elseif ($type == "11"){
$max_time = 86400;
$min_time= 3600;
$max_op=10000000;
$item_type = "bj";
$query="SELECT * FROM bj WHERE country='$item_location' AND bjowner='$username' ";
}elseif ($type == "12"){
$max_time = 86400;
$min_time= 3600;
$max_op=10000000000;
$item_type = "Donaters code";
///queryhere
}elseif ($type == "13"){
$max_time = 86400;
$min_time= 3600;
$max_op=10000000;
$item_type = "Item";
$query="SELECT * FROM items WHERE id='$item_id' AND owner='$username'";
}elseif ($type == "14"){
$max_time = 86400;
$min_time= 3600;
$max_op=10000000;
$item_type = "Car";
$query="SELECT * FROM garage WHERE id='$item_id' AND owner='$username' AND status='0'";
}



if (strip_tags($_POST['con']) && strip_tags($_POST['item_id']) || strip_tags($_POST['item_location']) && strip_tags($_POST['time']) == "1" ||strip_tags($_POST['time']) == "2" || strip_tags($_POST['time']) == "3" ||  strip_tags($_POST['time']) == "4" ){

if ($item_type == "Bullets"){
$item_id=intval(strip_tags($_POST['item_id']));
}else{
$item_id=strip_tags($_POST['item_id']);
}
$starting_price=intval(strip_tags($_POST['starting_price']));
$time=(strip_tags($_POST['time']) * 3600) + time();
$item_location=strip_tags($_POST['item_location']);
$fr=strip_tags($_POST['fr']);

$an=strip_tags($_POST['an']);
if ($item_location){ $query_item_check="SELECT * FROM auctions WHERE item_id='$item_location' AND item_type='$item_type'";
$item_num=$item_location;
}else{
$query_item_check="SELECT * FROM auctions WHERE item_id='$item_id' AND item_type='$item_type'";
$item_num=$item_id;
}

if ($item_type == "Bullets"){

if ($item_id > $fetch->bullets){ echo "You dont have this many bullets."; exit(); }
if ($item_id == 0 || !$item_id || ereg('[^0-9]',$item_id)){
	print "Invalid amount of bullets";
	exit();
}
		

}else{

$check=mysql_num_rows(mysql_query($query));
}
		if ($starting_price == 0 || !$starting_price || ereg('[^0-9]',$starting_price)){
	print "Invalid starting price.";
	
}elseif ($starting_price != 0 && $starting_price && !ereg('[^0-9]',$starting_price)){
		



if ($check == "0"){
echo "You do not own this. Or there has been an error.";
}elseif($check != "0"){

if ($min_bid > $max_op){
echo "The maximum starting price for this item has to be smaller then ".makecomma($max_op)."";
}elseif ($min_bid <= $max_op){
if ($total_time > $max_time){
echo "You cannot put this type of item up for auction for longer than ".puttime_days($max_time)."";
}elseif($total_time <= $max_time){
if ($item_type != "Bullets"){

$he=mysql_num_rows(mysql_query($query_item_check));
if ($he != "0"){
echo "You've already got this item up for bid!";
exit();
}
}

if ($an == "Yes"){
$an_an="1";
}elseif ($an == "No"){
$an_an="0";
}
if ($fr == "1"){
$pvt_pvt="0";
}elseif($fr == "2"){
$pvt_pvt="1";
}
if ($item_type == "Bullets"){
$nn_bul=$fetch->bullets - $item_num;
mysql_query("UPDATE users SET bullets='$nn_bul' WHERE username='$username'");
}elseif ($item_type == "Car"){

mysql_query("UPDATE garage SET status='4' WHERE id='$item_num'");
}elseif ($item_type == "Witness Statement"){

mysql_query("UPDATE `inbox` SET `to`='0' WHERE `id`='$item_num'");
}




mysql_query("INSERT INTO `auctions` ( `id` , `username` , `min_starting` , `current_bid` , `winning` , `winning_bid` , `item_type` , `time` , `item_id`,`an`,`pvt` ) 
VALUES (
'', '$username', '$starting_price', '0', '0', '0', '$item_type', '$time', '$item_num','$an_an','$pvt_pvt'
)");
echo "That item is now up for bid.<br>";

}}}}}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="64%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
  <tr> 
    <td colspan="3" background="includes/grad.jpg"><center class=bold>
        Place a <?php echo "$item_type"; ?> in the auctions </center></td>
  </tr>
  <tr> 
    <td width="33%" rowspan="2"><div align="center"><img src="images/auction_hammer.jpg" width="152" height="100"></div></td>
    <td width="43%">Type of item:</td>
    <td width="24%"><?php echo "$item_type"; ?></td>
  </tr>
  <tr> 
    <td>Maximum opening bid:</td>
    <td><?php echo "£".makecomma($max_op).""; ?></td>
  </tr>
  <tr> 
    <?php if ($casino == "1"){ echo "<td>$item_type location</td>
          <td colspan=2><select name=item_location>
          <option value=London>London</option>
          <option value=New York>New York</option>
          <option value=Beijing>Beijing</option>
          <option value=Rome>Rome </option>
          <option value=Moscow>Moscow </option>
		            <option value=Bogota>Bogota </option>

           </select></td>
        </tr>"; 
		}else{ 
		if ($item_type == "Car"){
		echo "<td>Select car:</td><td colspan=2><select name=\"item_id\" id=\"select3\">
          <option selected>Choose car</option>";
   $get=mysql_query("SELECT * FROM garage WHERE owner='$username'");
while($it=mysql_fetch_object($get)){
echo "<option value=$it->id>$it->car, $it->damage%</option>";
}
echo "</select></td>"; 
}elseif ($item_type != "Car"){
		
		echo "<td>$item_type"; if ($item_type != "Bullets"){ echo "ID"; } echo "</td>
          <td colspan=2><input type=text name=item_id></td>
        </tr>";
		}}
		?>
  <tr> 
    <td>Anonimity:</td>
    <td colspan="2"><input type="radio" name="an" value="Yes">
      Annoymous 
      <input name="an" type="radio" value="No" checked>
      Not Annoymous</td>
  </tr>
  <tr>
    <td>Friends only?</td>
    <td colspan="2"><input name="fr" type="radio" value="1" checked>
      No
      <input name="fr" type="radio" value="2">
      Yes</td>
  </tr>
  <tr> 
    <td>Starting Price:</td>
    <td colspan="2"><input name="starting_price" type="text" id="starting_price"></td>
  </tr>
  <tr> 
    <td>Auction should last:</td>
    <td colspan="2"><select name="time" id="time">
        <option value="1">1 Hour</option>
        <option value="2">2 Hours</option>
        <option value="3">3 Hours</option>
        <option value="4">4 Hours</option>
      </select></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td colspan="2"><input name="con" type="submit" id="con22" value="Continue"></td>
  </tr>
</table>
<p>&nbsp;</p>

</body>
</html>
</form>

<? exit();  } 

if (strip_tags($_GET['bid'])){
$bid=strip_tags($_GET['bid']);
$infor=mysql_query("SELECT * FROM auctions WHERE id='$bid'");
if (mysql_num_rows($infor) == "0"){
echo "Error. No such item.";
exit();
}
$k=mysql_fetch_object($infor);
if ($k->pvt == "1"){
$starter_friends=mysql_num_rows(mysql_query("SELECT * FROM friends WHERE person='$username' AND type='Friend' AND username='$k->username'"));
if ($starter_friends == "0" && strtolower($username) != strtolower($k->username)){
echo "<b><i>This is a private auction</b></i>";
exit();
}
}
$highest=mysql_fetch_object(mysql_query("SELECT * FROM bidders WHERE auction_id='$k->id' ORDER BY amount DESC LIMIT 1"));

$ending_on=gmdate('Y-m-d h:i:s', $k->time);

if (strip_tags($_POST['item_bid']) && strip_tags($_POST['button_bid']) && strip_tags($_POST['an']) == "0" || strip_tags($_POST['an']) == "1"){
$item_bid=strip_tags(intval($_POST['item_bid']));
$an=strip_tags($_POST['an']);

if ($item_bid == 0 || !$item_bid || ereg('[^0-9]',$item_bid)){
	print "Invalid bid.";
exit();
}
if ($fetch->money < $item_bid){ echo "You dont have that much to bid with."; }elseif ($fetch->money >= $item_bid){

if (!$highest->amount){

$top=$k->min_starting + 100;
}elseif ($highest->amount){

$top=$highest->amount + 100;
}
$date=gmdate('Y-m-d h:i:s');
if ($an == "0"){ $an_end="0"; }else{ $an_end == "1"; }
if ($item_bid < $top){
echo "You must bid 100 higher than the current bid.";
}elseif ($item_bid >= $top){
if ($fetch->money < $top){
echo "You dont have enough money to place this bid.";

}elseif($fetch->money >= $top){
if (strtolower($username) == strtolower($k->username)){
echo"You may not bid on your own item.";
}elseif(strtolower($username) != strtolower($k->username)){



$new_m = $fetch->money - $item_bid;
mysql_query("UPDATE users SET money='$new_m' WHERE username='$username'");

$kect=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$highest->bidder'"));

$old_bid=$kect->money + $highest->amount;
mysql_query("UPDATE users SET money='$old_bid' WHERE username='$highest->bidder'");

mysql_query("INSERT INTO `bidders` ( `id` , `bidder` , `amount` , `auction_id` , `time` , `an` ) 
VALUES (
'', '$username', '$item_bid', '$k->id', '$date', '$an_end'
)");
echo "You are now bidding for this item.";
}}}}}

?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body><form action="" method="post">
  <table width="64%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
    <tr> 
      <td colspan="2" background="includes/grad.jpg"><center class=bold>
          Information for lot #<?php echo "$k->id"; ?></center></td>
    </tr>
    <tr> 
      <td width="51%">Type:</td>
      <td width="49%"><?php echo "$k->item_type"; ?></td>
    </tr>
    <tr> 
      <td>Ending on:</td>
      <td><?php echo "$ending_on"; ?></td>
    </tr>
    <tr> 
      <td>Minimum:</td>
      <td><?php echo "£".makecomma($k->min_starting).""; ?></td>
    </tr>
    <tr> 
      <td>Current bid:</td>
      <td> 
        <?php  if (!$highest->amount){ echo "£".makecomma($k->min_starting).""; }else{ echo "£".makecomma($highest->amount).""; }  ?>
      </td>
    </tr>
    <?php if ($k->item_type == "Car"){
	$car_shit=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$k->item_id'"));
	$up=explode("-",$car_shit->upgrades);
	?>
	<tr> 
      <td colspan="2"><div align="center">
        <div align="center"><strong>Car information:</strong><br>
          Type: <?php echo "$car_shit->car"; ?><br>
          Damage: <?php echo "$car_shit->damage%"; ?><br>
          <strong>Upgrades:</strong> 
          <table width="32%" border="0" cellspacing="3" cellpadding="0">
            <tr> 
              <td>Tyres:</td>
              <td>Level <?php echo "$up[0]"; ?></td>
            </tr>
            <tr> 
              <td>Engine</td>
              <td>Level <?php echo "$up[1]"; ?> </td>
            </tr>
            <tr> 
              <td>Interior</td>
              <td>Level <?php echo "$up[2]"; ?></td>
            </tr>
            <tr> 
              <td>Exhaust</td>
              <td>Level <?php echo "$up[3]"; ?></td>
            </tr>
            <tr> 
              <td>NOS </td>
              <td>Level <?php echo "$up[4]"; ?></td>
            </tr>
            <tr> 
              <td>Rims</td>
              <td>Level <?php echo "$up[5]"; ?></td>
            </tr>
            <tr> 
              <td>Brakes</td>
              <td>Level <?php echo "$up[6]"; ?></td>
            </tr>
            <tr> 
              <td>Body kit</td>
              <td>Level <?php echo "$up[7]"; ?></td>
            </tr>
          </table>
          <br>
        </div></td>
    </tr>
	<? } ?>
  </table>
<br>
<table width="64%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
  <tr> 
    <td colspan="2" background="includes/grad.jpg"><center class=bold>
        Bid on this item </center></td>
  </tr>
  <tr> 
    <td width="51%">Bid:</td>
    <td width="49%"><input name="item_bid" type="text" id="item_bid"></td>
  </tr>
  <tr> 
    <td>Annominity:</td>
    <td><input type="radio" name="an" value="1">
      Anonymous 
      <input name="an" type="radio" value="0" checked>
      Not anonymous </td>
  </tr>
  <tr> 
    <td colspan="2"><div align="center">Your bid must be &pound;100 bigger than 
        the highest bid, if there is not one set then it must be &pound;100 bigger 
        than the minimum bid.<p><b>Note: When you bid, the amount you bid is taken away from you. If you loose the bid your money will be refunded.</b></p></div></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td><input name="button_bid" type="submit" id="item_biee" value="Proceed"></td>
  </tr>
</table>
<br>
<table width="64%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
  <tr> 
    <td colspan="3" background="includes/grad.jpg"><center class=bold>
        Last 10 bids </center></td>
  </tr>
  <tr bgcolor=white> 
    <td class=tip>Username</td>
    <td class=tip>Time</td>
    <td class=tip>Amount</td>
  </tr>
<?
$l=mysql_query("SELECT * FROM bidders WHERE auction_id='$k->id' ORDER BY amount DESC LIMIT 10");
if (mysql_num_rows($l) == "0"){ echo "<tr><td colspan=3><center><b>None yet.</b></center></td></tr>"; }

while($b=mysql_fetch_object($l)){
 if ($b->an == "0"){
echo " <tr > 
    <td>$b->bidder</td>
    <td>$b->time</td>
    <td>£".makecomma($b->amount)."</td>
  </tr>";
}else{
echo " <tr > 
    <td>Anonymous</td>
    <td>$b->time</td>
    <td>£".makecomma($b->amount)."</td>
  </tr>";
}


}
?>
</table></form>
</body>
</html>

<?


exit();
}


?>





<?php
if (strip_tags($_GET['remove'])){
$remove=strip_tags($_GET['remove']);
$abcfuckme=mysql_query("SELECT * FROM auctions WHERE username='$username' AND id='$remove'");
$abchaveme=mysql_fetch_object($abcfuckme);
$tty_check=mysql_num_rows($abcfuckme);
if ($tty_check != "0"){
$highest=mysql_fetch_object(mysql_query("SELECT * FROM bidders WHERE auction_id='$remove' ORDER BY amount DESC LIMIT 1"));

$bidders_mone=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$highest->bidder'"));

$new_rest = $bidders_mone->money + $total_refund->amount;
mysql_query("UPDATE users SET money='$new_rest' WHERE username='$bidders_mone->username'");
mysql_query("DELETE FROM bidders WHERE bidder='$bidders_mone->username'");
}
if ($abchaveme->item_type == "Car"){
mysql_query("UPDATE garage SET status='0' WHERE id='$abchaveme->item_id'");
}
if ($abchaveme->item_type == "Bullets"){
$ff_bul=$fetch->bullets + $abchaveme->item_id;
mysql_query("UPDATE users SET bullets='$ff_bul' WHERE username='$username'");
}
if ($item_type == "Witness Statement"){

mysql_query("UPDATE `inbox` SET `to`='$username' WHERE `id`='$abchaveme->item_id'");
}

mysql_query("DELETE FROM auctions WHERE id='$remove'");
mysql_query("DELETE FROM bidders WHERE auctions_id='$remove'");
echo "Auction removed.";

}
if (strip_tags($_GET['close'])){
$close=strip_tags($_GET['close']);
$tty_check=mysql_num_rows(mysql_query("SELECT * FROM auctions WHERE username='$username' AND id='$close'"));
if ($tty_check != "0"){
mysql_query("UPDATE auctions SET time='0' WHERE id='$close'");

echo "Bidding now closed.";
}}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<script language=javascript>function go_to (req){ var loc="auctions.php?bid=" + req; window.location=loc; } function show(typei){ var loc="auctions.php?type=" + typei;	window.location=loc; } </script>
</head>

<body>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="3">
  <tr> 
    <td colspan="2"><table width="58%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline>
        <tr> 
          <td background="includes/grad.jpg"><center class=bold>
              <strong>Your bids</strong> </center></td>
        </tr>
        <tr> 
          <td><img src="images/auction_hammer.jpg" width="100" height="100" hspace="2" vspace="2" border="1" align="left">Here you can safely buy and sell casinos and properties
           </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td colspan="2"><table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline>
        <tr> 
          <td colspan="6" background="includes/grad.jpg"><center class=bold>
              Auctions your participating in </center></td>
        </tr>
        <tr bgcolor=white> 
          <td width="18%" class=tip>Type</td>
          <td width="17%" class=tip>Owner</td>
          <td width="16%" class=tip>Current bid</td>
          <td width="27%" class=tip>Ending</td>
          <td width="8%" class=tip>Go!</td>
          <td width="14%" class=tip>Status</td>
        </tr>
        <?php $shaven=mysql_query("SELECT * FROM bidders WHERE bidder='$username'");
       	   	   $we_shave=mysql_num_rows($shaven);
	   if ($we_shave == "0"){ echo "<tr><td colspan=6><center>No auctions</center></td></tr>"; }

	   while($banger=mysql_fetch_object($shaven)){
$item_inf=mysql_fetch_object(mysql_query("SELECT * FROM auctions WHERE id='$banger->auction_id'"));
$stifler2=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$banger->item_id'"));
if ($banger->item_type == "Car"){ $banger->item_id = $stifler2->car; }
	   $will3=mysql_fetch_object(mysql_query("SELECT `witness_per` FROM `inbox` WHERE id='$banger->item_id'"));
	   if ($banger->item_type == "Witness Statement"){ $banger->item_id = $will3->witness_per; }


$end_fuck=gmdate('Y-m-d h:i:s', $item_inf->time);
$win=mysql_fetch_object(mysql_query("SELECT * FROM bidders WHERE auction_id='$banger->auction_id' ORDER BY amount DESC LIMIT 1"));
if (strtolower($win->bidder) == strtolower($username)){
$win_bid="<font color=green>^</font>";
}else{
$win_bid="<font color=red><></font>";
}
echo"
 <tr onclick=\"go_to('$item_inf->id')\" onmouseover=\"this.style.background='#000099';this.style.cursor='hand';\" onmouseout=\"this.style.background='';\"> 
          <td>"; if ($item_inf->pvt == "1"){ echo"<font color=yellow>*</font>"; } echo "$item_inf->item_type($item_inf->item_type)</td>
          <td>$item_inf->username</td>
          <td>£".makecomma($win->amount)."</td>
          <td>$end_fuck</td>
          <td>Go</td>
          <td>$win_bid</td>
        </tr>";
}
?>
      <tr > 
          <td colspan="6" ><div align="center">Next&gt;&gt;</div></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline>
        <tr> 
          <td colspan="6" background="includes/grad.jpg"><center class=bold>
              Your auctions </center></td>
        </tr>
        <tr bgcolor=white> 
          <td width="14%" class=tip>Type</td>
          <td width="20%" class=tip>Minimum</td>
          <td width="20%" class=tip>Ending</td>
          <td width="13%" class=tip>Remove</td>
          <td width="10%" class=tip>Close</td>
        </tr>
        <?php $all_you=mysql_query("SELECT * FROM auctions WHERE username='$username' ORDER BY id DESC LIMIT 10");
	   	   $we_you=mysql_num_rows($all_you);
	   if ($we_you == "0"){ echo "<tr><td colspan=6><center>No auctions</center></td></tr>"; }
	   while($owww_you=mysql_fetch_object($all_you)){
	   $will=mysql_fetch_object(mysql_query("SELECT `witness_per` FROM `inbox` WHERE id='$owww_you->item_id'"));
	   if ($owww_you->item_type == "Witness Statement"){ $owww_you->item_id = $will->witness_per; }
$stifler=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$owww_you->item_id'"));
if ($owww_you->item_type == "Car"){ $owww_you->item_id = $stifler->car; }
	   
	   echo "
	    <tr onclick=\"go_to('$owww_you->id')\" onmouseover=\"this.style.background='#000099';this.style.cursor='hand';\" onmouseout=\"this.style.background='';\">
          <td>"; if ($owww_you->pvt == "1"){ echo"<font color=yellow>*</font>"; } echo "$owww_you->item_type($owww_you->item_id)</td>
          <td>£".makecomma($owww_you->min_starting)."</td>
          <td>".pp($owww_you->time)."</td>
          <td><a href='?remove=$owww_you->id'>Remove</a></td>
		  <td><a href='?close=$owww_you->id'>Close</a></td>
        </tr>";
	
		}
		?>
        <tr > 
          <td height="25" colspan="6" > <div align="center">
              <?php
$look_1=$_GET['look_1'];
$look=$_GET['look'];

if ($look_1 != "0" || $we_you == $look_1){ echo "<a href='?filter=$filter&look_1=".($look_1 - 10)."&by=$by&look=$look'><< Last 10 </a>"; }


if ($we_you == "10" && $we_you != $look_1){ echo "<a href='?filter=$filter&look_1=".($look_1 + 10)."&by=$by&look=$look'> Next 10 >></a>"; }

?>
            </div></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td colspan="2"><table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline>
        <tr> 
          <td colspan="6" background="includes/grad.jpg"><center class=bold>
              Auctions </center></td>
        </tr>
        <tr bgcolor=white> 
          <td width="15%" class=tip>Type</td>
          <td width="17%" class=tip>Owner</td>
          <td width="19%" class=tip>Minimum</td>
          <td width="15%" class=tip>Winning bid</td>
           <? if (!$_GET['by']){ $by="DESC"; }else{  $by=$_GET['by']; } 
		   if (!$_GET['look']){ $look=0; }else{ $look=$_GET['look']; }
		    if ($by == "ASC"){
		   
         echo " <td class=tip><a href='?filter=1&look=$look&by=DESC'><font color=#FF0000>-</font></a>Ending</td>";
		 }elseif ($by == "DESC" || !$by){
		 echo " <td class=tip><a href='?filter=1&look=$look&by=ASC'><font color=#FF0000>+</font></a>Ending</td>";
		 } ?>
          <td width="11%" class=tip>Go!</td>
        </tr>
        <?php
if (!$_GET['by']){ $by="DESC"; }else{ $by=$_GET['by']; } if (!$_GET['look']){ $look = "0"; }else{ $look=$_GET['look']; }
		if (strip_tags($_GET['by']) == "DESC" || strip_tags($_GET['by']) == "ASC" && strip_tags($_GET['look'])){
		 $order_by=strip_tags(addslashes($_GET['by']));
		$look=strip_tags($_GET['look']);
		
		}
if ($filter == "1"){
$filter="Bullet Factory";
}elseif ($filter == "2"){
$filter="Witness Statement";
}elseif ($filter == "3"){
$filter="Bullets";
}elseif ($filter == "4"){
$filter="RPS";
}elseif ($filter == "5"){
$filter="Slots";
}elseif ($filter == "6"){
$filter="Race Track";
}elseif ($filter == "7"){
$filter="Keno";
}elseif ($filter == "8"){
$filter="Bank";
}elseif ($filter == "9"){
$filter="Airport";
}elseif ($filter == "10"){
$filter="Roulette";
}elseif ($filter == "11"){
$filter="bj";
}elseif ($filter == "12"){
$filter="Donaters code";
}elseif ($filter == "13"){
$filter="Item";
}



if ($filter){
		 $all=mysql_query("SELECT * FROM `auctions` WHERE `item_type`='$filter' ORDER BY `time` $by LIMIT $look, 10");
}else{
		 $all=mysql_query("SELECT * FROM auctions ORDER BY time $by LIMIT $look, 10");
}

	   $we=mysql_num_rows($all);
	   if ($we == "0"){ echo "<tr><td colspan=6><center>No auctions</center></td></tr>"; }
	   while($owww=mysql_fetch_object($all)){
	   	   $willa=mysql_fetch_object(mysql_query("SELECT `witness_per` FROM `inbox` WHERE id='$owww->item_id'"));
if ($owww->item_type == "Witness Statement"){ $owww->item_id = $willa->witness_per; }
$stifler1=mysql_fetch_object(mysql_query("SELECT * FROM garage WHERE id='$owww->item_id'"));
if ($owww->item_type == "Car"){ $owww->item_id = $stifler1->car; }

$wina=mysql_fetch_object(mysql_query("SELECT * FROM bidders WHERE auction_id='$owww->id' ORDER BY amount DESC LIMIT 1"));
	   echo "
	    <tr onclick=\"go_to('$owww->id')\" onmouseover=\"this.style.background='#000099';this.style.cursor='hand';\" onmouseout=\"this.style.background='';\">
          <td>"; if ($owww->pvt == "1"){ echo"<font color=yellow>*</font>"; } echo "$owww->item_type($owww->item_id)</td>";
		  if ($owww->an == "1"){ echo "<td>Anonymous</td>"; }else{ echo "
          <td>$owww->username</td>";
		  }
		  echo "
          <td>£".makecomma($owww->min_starting)."</td>";
		  if (!$wina->amount){ echo "<td>None Yet</td>"; }elseif ($wina->amount){ echo " <td>£".makecomma($wina->amount)."</td>"; } 		  echo "
          <td>".pp($owww->time)."</td>
          <td>Go</td>
        </tr>";

		}
		?>
        <tr > 
          <td colspan="6" ><div align="center">
<?php
$look=$_GET['look'];

if ($look != "0" || $we == $look){ echo "<a href='?filter=$filter&look=".($look - 10)."&by=$by'><< Last 10 </a>"; }


if ($we == "10" && $we != $look){ echo "<a href='?filter=$filter&look=".($look + 10)."&by=$by'> Next 10 >></a>"; }

?> 


</div></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="50%"><table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline>
        <tr> 
          <td background="includes/grad.jpg"><center class=bold>
              Place a item </center></td>
        </tr>
        <tr> 
          <td> <form name="form1">
              <div align="center"> 
                <select name="select" onChange="MM_jumpMenu('this',this,0)">
                  <option selected>----Select------</option>
                  <option value="?type=1">Bullet Factory</option>
                  <option value="?type=2">Witness statement</option>
                  <option value="?type=5">Slots</option>
                  <option value="?type=6">Race Track</option>
                  <option value="?type=7">Keno</option>
                  <option value="?type=9">Airport</option>
                  <option value="?type=10">Roulette</option>
				                    <option value="?type=11">Black Jack</option>

                </select>
              </div>
            </form></td> 
        </tr>
      </table></td>
    <td width="50%"><table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="black" class=thinline>
        <tr> 
          <td background="includes/grad.jpg"><center class=bold>
              Filter by: 
            </center></td>
        </tr><?php if(!$_GET['look']){ $look=0; } ?>
        <tr> 
          <td> <form name="form1">
              <div align="center"> 
                <select name="select2" onChange="MM_jumpMenu('this',this,0)">
                  <option selected>----Select------</option>
                  <option value="?filter=1&look=<?php echo "$look"; ?>&by=<?php echo "$by"; ?>">Bullet Factory</option>
                  <option value="?filter=2&look=<?php echo "$look"; ?>&by=<?php echo "$by"; ?>">Witness statement</option>
                  <option value="?filter=5&look=<?php echo "$look"; ?>&by=<?php echo "$by"; ?>">Slots</option>
                  <option value="?filter=6&look=<?php echo "$look"; ?>&by=<?php echo "$by"; ?>">Race Track</option>
                  <option value="?filter=9&look=<?php echo "$look"; ?>&by=<?php echo "$by"; ?>">Airport</option>
                  <option value="?filter=10&look=<?php echo "$look"; ?>&by=<?php echo "$by"; ?>">Roulette</option>
                  <option value="?filter=11&look=<?php echo "$look"; ?>&by=<?php echo "$by"; ?>">Black Jack</option>
                                   <option value="?filter=7&look=<?php echo "$look"; ?>&by=<?php echo "$by"; ?>">Keno</option>

                </select>
              </div>
            </form></td>
        </tr>
      </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php require_once "includes/footer.php"; ?>