<?php
///// Anyone who resells this script IS BREAKING THE LAW \\\\
session_start();
include_once 'includes/db_connect.php';
$username = $_SESSION['username'];
$time = time();

echo "
<link href=includes/in.css rel=stylesheet type=text/css>
";


$username = $_SESSION['username'];
$self = "blackjack.php";


//***get info
$result = mysql_query("SELECT money, location, bj FROM users WHERE username='$username'");
while ($info = mysql_fetch_row($result)) {
	$pmoney = $info[0];
	$currentmoney = $info[0];
	$state = $info[1];
	$location = $info[1];
	$bj = $info[2];
}

/////
$penis=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$ding_dong=mysql_fetch_object(mysql_query("SELECT * FROM bj WHERE country='$penis->location'"));
$fat_shit=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$ding_dong->owner'"));
/////

if($fat_shit->status == 'Dead' || $fat_shit->status == 'Banned'){
mysql_query("UPDATE bj SET owner'0' WHERE country='$penis->location'");
print "This table has no owner";
exit();
}

if(!$_SESSION['con']){
	$_SESSION['con']=$state;
}elseif($_SESSION['con']!=$state){
	echo "You flew and lost your cards!<BR>";
	unset($_SESSION['deck'],$_SESSION['card1'],$_SESSION['color1'],$_SESSION['card2'],$_SESSION['card3'],$_SESSION['color3'],$_SESSION['card4'],$_SESSION['color4'],$_SESSION['card5'],$_SESSION['color5'],$_SESSION['card6'],$_SESSION['color6'],$_SESSION['dcard1'],$_SESSION['dcard2'],$_SESSION['dcard3'],$_SESSION['dcard4'],$_SESSION['con']);
}
$result = mysql_query("SELECT bjowner, bjmaxbet, bjminbet, bjearnings FROM  bj WHERE country='$state'");
while ($info = mysql_fetch_row($result)) {
	$owner = $info[0];
	$max = $info[1];
	$earn = $info[3];
	$bjmaxbet = $info[1];
	$bjminbid = $info[2];
	$totalearnings = $info[3];
}
$result = mysql_query("SELECT id, money FROM users WHERE username='$owner'");
while ($info = mysql_fetch_row($result)) {
	$oid = $info[0];
	$omoney = $info[1];
	$otmoney = $info[1];
}
if($owner == "None"){
	echo "no owner";
	exit();
}
$offer = $_POST['offer'];
$ownerstuff = mysql_query("SELECT money, id, status FROM users WHERE username='$bjowner'");
while($ownerstats = mysql_fetch_row($ownerstuff)){
	$ownerscurrentmoney = $ownerstats[0];
	$otmoney = $ownerstats[0];
	$ownerid = $ownerstats[1];
	$abd = $ownerstats[2];
}


if($offer != ""){
	if($offer < 0){ echo "You cant go below 0!"; }
	elseif($offer > 2147483647){ echo "Your offer is to high!"; }
	elseif(ereg("[^[:digit:]]", $offer)) { echo "Bad amount!"; }
	elseif($username == $bjowner){ echo "You cant make an offer to yourself!"; }
	elseif($offer > $currentmoney){ echo "You dont have that much money!"; } else {
		echo "You have made an offer to take over that blackjack!";
		mysql_query("INSERT INTO `offers` ( `id` , `username` , `owner` , `offer` , `casino`, `country` ) VALUES ('', '$username', '$owner', '$offer', 'Blackjack', '$location');");
	}
}
if($_POST['adeal']){
	$yid = $_POST['yes'];
	$nid = $_POST['no'];
	if($yid != ""){ 
		$ow = mysql_query("SELECT * FROM offers WHERE id='$yid'");
		while($o = mysql_fetch_row($ow)){
			$offerer = $o[1];
			$owner = $o[2];
			$moffer = $o[3];
			$country = $o[5];
			$casino = $o[4];
		}
		$cost = mysql_query("SELECT money FROM users WHERE username='$offerer'"); 
		while($money = mysql_fetch_row($cost)){
			$oumoney = $money[0];
		} 
		if($oumoney < $moffer){ echo "That user no longer has enough money!"; }
		elseif($offerer == $username){ echo "You cant accept your own offer!"; }
		elseif($owner != $username){ echo "Thats not your blackjack!"; } else {
			mysql_query("UPDATE bj SET bjowner='$offerer' WHERE country='$country'");
			$newownmoney = $currentmoney + $moffer;
			$newusemoney = $oumoney - $moffer;
			$message = "Your offer was <b>accepted</b> by <b>$owner</b> for the $country $casino for the price of $$moffer";
			mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `date`, `text`) VALUES ('', '$offerer', 'State Owned', NOW(), '$message');");
			mysql_query("UPDATE users SET money='$newownmoney' WHERE username='$username'");
			mysql_query("UPDATE users SET money='$newusemoney' WHERE username='$offerer'");
			mysql_query("DELETE FROM offers WHERE country='$country', bjmaxbet='100' AND casino='$casino'");
			echo "You have accepted that offer!";
		}
	} else {
		$ow = mysql_query("SELECT * FROM offers WHERE id='$nid'");
		while($o = mysql_fetch_row($ow)){
			$offerer = $o[1];
			$owner = $o[2];
			$moffer = $o[3];
			$country = $o[5];
			$casino = $o[4];
		}
		$message = "Your offer was <b>declined</b> by <b>$owner</b> for the $country $casino for the price of $$moffer";
		mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `date`, `text`) VALUES ('', '$offerer', 'State Owned', NOW(), '$message');");
		mysql_query("DELETE FROM offers WHERE id='$nid'");
		echo "You declined that offer!";
	}
}
//see if person owns table
if ($owner == $username){
	if ($_POST['maxbet']){ 
		$newmax = $_POST['maxbet'];
		if ($newmax < 100){
			echo "max must be atleast 100!";
			//in
			exit();
		}elseif ($newmax > 5000000){
			echo "max must be less then 5000000!";
			//in
			exit();
		}elseif(ereg("[^[:digit:]]", $newmax)){
			echo "Max bet can only contain numbers!";
			//in
			exit();
		}else{
			mysql_query("UPDATE bj SET bjmaxbet='$newmax' WHERE bjowner='$username' AND country='$state'");
			echo "Max was updated to $newmax";
		}
	}
	
	if ($_POST['minbid']){
		$newmin = $_POST['minbid'];
		if ($newmin < 100){
			echo "Min must be atleast 100!";
			//in
			exit();
		}
		if(ereg("[^[:digit:]]", $newmin)){
			echo "Min offer can only contain numbers!";
			//in
			exit();
		}
		mysql_query("UPDATE bj SET bjminoffer='$newmin' WHERE bjowner='$username' AND country='$state'");
		echo "Min was updated to $newmin";
	}
	if ($_POST['giveto']){
		$giveto = $_POST['giveto'];
		$checkgiveto = mysql_query("SELECT username FROM users WHERE username='$giveto'");
		$checkifexist = mysql_num_rows($checkgiveto);
		if($checkifexist <= 0){
			echo "That user does not exist";
			//in
			exit();
		}else{
		while($giver = mysql_fetch_row($checkgiveto)){
				$giveto = $giver[0];
			}
			mysql_query("UPDATE bj SET bjowner='$giveto', bjmaxbet='100' WHERE bjowner='$username' AND country='$state'");
			echo "The blackjack has been given away";
		}
	}
		
		
		echo "<form method=post action=$self>
		<table align=center width=300 cellspacing=0 cellpadding=0 border=1 bordercolor=black class=thinline>
		<tr>
		  <td colspan=4 class=header><div align=center>BlackJack</div></td>
		</tr>
		<tr class=text>
		  <td width=130>Total Earnings </td>
		  <td width=148 colspan=3>$"; echo number_format($totalearnings); echo "</td>
		</tr>
		<tr class=text>
		  <td>Max Bet: </td>
		  <td width=148 colspan=3><input name=maxbet type=text id=maxbet class=submit></td>
		</tr>
		<tr class=text>
		  <td>Current Max: </td>
		  <td colspan=3>$"; echo number_format($bjmaxbet); echo "</td>
		</tr>
		<tr class=text>
		  <td>Min Bid: </td>
		  <td colspan=3><input name=minbid type=text id=maxbid class=submit></td>
		</tr>
		<tr class=text>
		  <td>Current Min: </td>
		  <td colspan=3>$";echo number_format($bjminbid); echo "</td>
		</tr>
		<tr class=text>
		  <td>Give to: </td>
		  <td colspan=3><input name=giveto type=text id=giveto class=submit></td>
		</tr>
		<tr class=text>
		  <td>&nbsp;</td>
		  <td colspan=3><input type=submit name=Submit value=Submit class=submit></td>
		</tr> 
	<tr>
	<td class=header align=center colspan=4>Offers</td>
	</tr>
	<tr class=title align=center>
	<td>Username</td><td>Offer</td><td>Yes</td><td>No</td>
	</tr>";
$ow = mysql_query("SELECT * FROM offers WHERE country='$location' AND casino='Blackjack' AND owner='$username'");
while($o = mysql_fetch_row($ow)){
	echo "<tr align=center class=text><td>$o[1]</td><td>$$o[3]</td><td width=1%><input name=yes type=radio value=$o[0]></td><td width=1%><input name=no type=radio value=$o[0]></td>";
}
	echo "	<tr class=text>
	<td align=right colspan=4 class=text><input type=submit name=adeal value=Accept class=submit></td>
	</tr></table><br>
	</form>
";
	//in
	exit();
}

$suc = 1;
if (isset($_POST['bett'])){
	$bettt = $_POST['bett'];
	$now = $bj + 60;
	if(time() < $now){
		echo "You started a blackjack game and never finished you must wait a minuite to start another";
		exit();
	}elseif(ereg("[^[:digit:]]", $bettt)) {  
		echo "Bet amount can only contain numbers!";
		$suc = 2;
		unset($_SESSION['bet']);
	}elseif($bettt > $pmoney){
		echo "You dont have enough money!";
		$suc = 2;
		unset($_SESSION['bet']);
	}elseif($bettt > 1000000000){
		echo "Maximum is 1 billion!";
		exit();
	}elseif($bettt > $max) {
		echo "The current max is $max!";
		$suc = 2;
		unset($_SESSION['bet']);
	}else{
		$_SESSION['bet'] = $bettt;
		$money = $pmoney - $bettt;
		mysql_query("UPDATE users SET money='$money', bj='$time' WHERE username='$username'");
	$_SESSION['show'] = "show me";
	
	unset($_SESSION['deck'],$_SESSION['card1'],$_SESSION['color1'],$_SESSION['card2'],$_SESSION['card3'],$_SESSION['color3'],$_SESSION['card4'],$_SESSION['color4'],$_SESSION['card5'],$_SESSION['color5'],$_SESSION['card6'],$_SESSION['color6'],$_SESSION['dcard1'],$_SESSION['dcard2'],$_SESSION['dcard3'],$_SESSION['dcard4']);
	}
	
}
$bet = $_SESSION['bet'];
//****check if they want to hit
if ((isset($_POST['hit'])) && (isset($_SESSION['bet']))){
	$deckk = $_SESSION['deck'];
	if (isset($_SESSION['card6'])){
	}else{
		$ex = "6";
	}
	if (isset($_SESSION['card5'])){
	}else{
		$ex = "5";
	}
	if (isset($_SESSION['card4'])){
	}else{
		$ex = "4";
	}
	if (isset($_SESSION['card3'])){
	}else{
		$ex = "3";
	}
	if ($ex == 3){
		$card3 = explode("-", $deckk[2]);
		$color3 = $card3[1];
		$card3 =  $card3[0];
		if ($color3 == "h"){$color3 = 'heart';}
		if ($color3 == "d"){$color3 = 'diamond';}
		if ($color3 == "s"){$color3 = 'spade';}
		if ($color3 == "c"){$color3 = 'club';}
		$_SESSION['card3'] = $card3;
		$_SESSION['color3'] = $color3;
	}
	if ($ex == 4){
		$card4 = explode("-", $deckk[3]);
		$color4 = $card4[1];
		$card4 =  $card4[0];
		if ($color4 == "h"){$color4 = 'heart';}
		if ($color4 == "d"){$color4 = 'diamond';}
		if ($color4 == "c"){$color4 = 'club';}
		if ($color4 == "s"){$color4 = 'spade';}
		$_SESSION['card4'] = $card4;
		$_SESSION['color4'] = $color4;
	}
	if ($ex == 5){
		$card5 = explode("-", $deckk[4]);
		$color5 = $card5[1];
		$card5 =  $card5[0];
		if ($color5 == "h"){$color5 = 'heart';}
		if ($color5 == "d"){$color5 = 'diamond';}
		if ($color5 == "c"){$color5 = 'club';}
		if ($color5 == "s"){$color5 = 'spade';}
		$_SESSION['card5'] = $card5;
		$_SESSION['color5'] = $color5;
	}
	if ($ex == 6){
		$card6 = explode("-", $deckk[5]);
		$color6 = $card6[1];
		$card6 =  $card6[0];
		if ($color6 == "h"){$color6 = 'heart';}
		if ($color6 == "d"){$color6 = 'diamond';}
		if ($color6 == "c"){$color6 = 'club';}
		if ($color6 == "s"){$color6 = 'spade';}
		$_SESSION['card6'] = $card6;
		$_SESSION['color6'] = $color6;
	}
}
//*****see if they stand
if ((isset($_POST['stand'])) && (isset($_SESSION['bet']))){
	$bet = $_SESSION['bet'];
	$dcardd1 = $_SESSION['dcard1'];
	$dcardd2 = $_SESSION['dcard2'];
	if (($dcardd1 == 13) || ($dcardd1 == 12) || ($dcardd1 == 11)){
		$dcardd1 = 10;
	}
	if ($dcardd1 == 14){
		$dcardd1 = 11;
	}
	if (($dcardd2 == 13) || ($dcardd2 == 12) || ($dcardd2 == 11)){
		$dcardd2 = 10;
	}
	if ($dcardd2 == 14){
		$dcardd2 = 11;
	}
	$dtotal = $dcardd1 + $dcardd2;
	if (($dtotal > 21) && ($dcardd1 == 11)){
		$dcardd1 = 1;
		$dtotal = $dtotal - 11;
		$dtotal = $dtotal + $dcardd1;
	}
	if (($dtotal > 21) && ($dcardd2 == 11)){
		$dcardd2 = 1;
		$dtotal = $dtotal - 11;
		$dtotal = $dtotal + $dcardd2;
	}		
	$dtotal = $dcardd1 + $dcardd2;
	if ($dtotal <= 16){
		$deckk = $_SESSION['deck'];
		$dcard3 = explode("-", $deckk[49]);
		$dcolor3 =  $dcard3[1];
		$dcard3 = $dcard3[0];
		if ($dcolor3 == "h"){$dcolor3 = 'heart';}
		if ($dcolor3 == "d"){$dcolor3 = 'diamond';}
		if ($dcolor3 == "c"){$dcolor3 = 'club';}
		if ($dcolor3 == "s"){$dcolor3 = 'spade';}
		$_SESSION['dcard3'] = $dcard3;
		$_SESSION['dcolor3'] = $dcolor3;
		$dcardd3 = $dcard3;
		if (($dcardd3 == 13) OR ($dcardd3 == 12) OR ($dcardd3 == 11)){
			$dcardd3 = 10;
		}
		if ($dcardd3 == 14){
			$dcardd3 = 11;
		}
		$dtotal = $dtotal + $dcardd3;
		if (($dtotal > 21) && ($dcardd3 == 11)){
			$dcardd3 = 1;
			$dtotal = $dtotal - 11;
			$dtotal = $dtotal + $dcardd3;
		
		}	
	}
	if (($dtotal <= 16) && (isset($_SESSION['dcard3']))){
		$deckk = $_SESSION['deck'];
		$dcard4 = explode("-", $deckk[48]);
		$dcolor4 =  $dcard4[1];
		$dcard4 = $dcard4[0];
		if ($dcolor4 == "h"){$dcolor4 = 'heart';}
		if ($dcolor4 == "d"){$dcolor4 = 'diamond';}
		if ($dcolor4 == "c"){$dcolor4 = 'club';}
		if ($dcolor4 == "s"){$dcolor4 = 'spade';}
		$_SESSION['dcard4'] = $dcard4;
		$_SESSION['dcolor4'] = $dcolor4;
		$dcardd4 = $dcard4;
		if (($dcardd4 == 13) OR ($dcardd4 == 12) OR ($dcardd4 == 11)){
			$dcardd4 = 10;
		}
		if ($dcardd4 == 14){
			$dcardd4 = 11;
		}
		$dtotal = $dtotal + $dcardd4;
		if (($dtotal > 21) && ($cardd4 == 11)){
			$dcardd4 = 1;
			$dtotal = $dtotal - 11;
			$dtotal = $dtotal + $dcardd4;
		}	
	}		
	$cardd1 = $_SESSION['card1'];
	$cardd2 = $_SESSION['card2'];
	$cardd3 = $_SESSION['card3'];
	$cardd4 = $_SESSION['card4'];
	$cardd5 = $_SESSION['card5'];
	$cardd6 = $_SESSION['card6'];
	if (($cardd1 == 13) || ($cardd1 == 12) || ($cardd1 == 11)){
		$cardd1 = 10;
	}
	if ($cardd1 == 14){
		$cardd1 = 11;
	}
	if (($cardd2 == 13) || ($cardd2 == 12) || ($cardd2 == 11)){
		$cardd2 = 10;
	}
	if ($cardd2 == 14){
		$cardd2 = 11;
	}
	if (isset($_SESSION['card3'])){
		if (($cardd3 == 13) || ($cardd3 == 12) || ($cardd3 == 11)){
			$cardd3 = 10;
		}
		if ($cardd3 == 14){
			$cardd3 = 11;
		}
	}
	if (isset($_SESSION['card4'])){
		if (($cardd4 == 13) || ($cardd4 == 12) || ($cardd4 == 11)){
			$cardd4 = 10;
		}
		if ($cardd4 == 14){
			$cardd4 = 11;
		}
	}
	if (isset($_SESSION['card5'])){
		if (($cardd5 == 13) || ($cardd5 == 12) || ($cardd5 == 11)){
			$cardd5 = 10;
		}
		if ($cardd5 == 14){
			$cardd5 = 11;
		}
	}
	if (isset($_SESSION['card6'])){
		if (($cardd6 == 13) || ($cardd6 == 12) || ($cardd6 == 11)){
			$cardd6 = 10;
		}
		if ($cardd6 == 14){
			$cardd6 = 11;
		}
	} 
	$total = $cardd1 + $cardd2;
	if (isset($_SESSION['card3'])){
		$total = $total + $cardd3;
	}
	if (isset($_SESSION['card4'])){
		$total = $total + $cardd4;
	}
	if (isset($_SESSION['card5'])){
		$total = $total + $cardd5;
	}
	if (isset($_SESSION['card6'])){
		$total = $total + $cardd6;
	}
	if (($total > 21) && ($cardd1 == 11)){
		$cardd1 = 1;
		$total = $total - 11;
		$total = $total + $cardd1;
	}
	if (($total > 21) && ($cardd2 == 11)){
		$cardd2 = 1;
		$total = $total - 11;
		$total = $total + $cardd2;
	}		
	if (($total > 21) && ($cardd3 == 11)){
		$cardd3 = 1;
		$total = $total - 11;
		$total = $total + $cardd3;
	}	
	if (($total > 21) && ($cardd4 == 11)){
		$cardd4 = 1;
		$total = $total - 11;
		$total = $total + $cardd4;
	}	
	if (($total > 21) && ($cardd5 == 11)){
		$cardd5 = 1;
		$total = $total - 11;
		$total = $total + $cardd5;
	}	
	if (($total > 21) && ($cardd6 == 11)){
		$cardd6 = 1;
		$total = $total - 11;
		$total = $total + $cardd6;
	}	
	if (($dtotal > 21) && (isset($_SESSION['bet']))){
	$hahahaha1=$bet*2;
		echo " The dealer has busted. You won $hahahaha1.";
		$won = $bet*2;
		$newmoney = $omoney - $won;
		$ws = "win";
		if($newmoney <= 0){
			mysql_query("INSERT INTO `betlogs` (`id`,  `user`, `owner`, `casino`, `bet`) VALUES ( '', '$username', '$owner', 'Blackjack', '$bettt');") or die (mysql_error());
			mysql_query("UPDATE bj SET bjowner='$username', bjearnings='0', bjmaxbet='2000' WHERE bjowner='$owner' AND country='$location'");
			mysql_query("UPDATE users SET money='$otmoney' WHERE username='$owner'");
			echo "You tookover the table";
		}else{
			$money = $won + $pmoney;
			mysql_query("UPDATE users SET money='$money' WHERE username='$username'");
			$total = $earn - $won;
			mysql_query("INSERT INTO `betlogs` (`id`, `username`, `money`, `end`, `owner`, `type`, `moneyuse`) VALUES ('', '$username', '$currentmoney', '$end', '$owner', 'bj', '$bettt');");
			mysql_query("UPDATE bj SET bjearnings='$total' WHERE bjowner='$owner'");	
			$newmoney = $omoney - $won;
			mysql_query("UPDATE users SET money='$newmoney' WHERE username='$owner'");
			mysql_query("UPDATE users SET bj='0' WHERE username='$username'");
			unset($_SESSION['deck'],$_SESSION['bet']);		
		}
		$_SESSION['show'] = "show them";
	}
	$phow = 21 - $total;
	$dhow = 21 - $dtotal;
	if (($phow > $dhow) && (isset($_SESSION['bet']))){
		echo " You had $total and the dealer had $dtotal you lost $bet . ";
		$total = $earn + $bet;
		$ws = "lost";
		mysql_query("UPDATE bj SET bjearnings='$total' WHERE bjowner='$owner'");	
		$newmoney = $omoney + $bet;
		mysql_query("UPDATE users SET money='$newmoney' WHERE username='$owner'");
		mysql_query("UPDATE users SET bj='0' WHERE username='$username'");
		unset($_SESSION['deck'],$_SESSION['bet']);	
		$_SESSION['show'] = "show them";	
	}
	if (($phow < $dhow) && (isset($_SESSION['bet']))){
	$eatshit=$bet*2;
		echo " You had $total and the dealer had $dtotal you won $eatshit. ";
		$won = $bet*2;
		$newmoney = $omoney - $won;
		$ws = "win";
		if($newmoney <= 0){
			mysql_query("UPDATE bj SET bjowner='$username',bjearnings='0',bjmaxbet='2000' WHERE bjowner='$owner' AND country='$location'");
			mysql_query("UPDATE users SET money='$otmoney' WHERE username='$owner'");
			echo "You tookover the table!!  ";
		}else{
			$money = ($won) + $pmoney;
			mysql_query("UPDATE users SET money='$money' WHERE username='$username'");
			$total = $earn - $won;
			mysql_query("UPDATE bj SET bjearnings='$total' WHERE bjowner='$owner'");	
			$newmoney = $omoney - $won;
			mysql_query("UPDATE users SET money='$newmoney' WHERE username='$owner'");	
			mysql_query("UPDATE users SET bj='0' WHERE username='$username'");
			unset($_SESSION['deck'],$_SESSION['bet']);
		}
		$_SESSION['show'] = "show them";
	}
	if (($phow == $dhow) && ($bet)){
		echo " It was a push both you and dealer had same amount";
		mysql_query("UPDATE users SET bj='0' WHERE username='$username'");
		unset($_SESSION['deck'],$_SESSION['bet']);
		$_SESSION['show'] = "show them";
	}	
	
}

if ((!isset($_SESSION['card1'])) && (isset($_SESSION['bet']))){
$bet = $_SESSION['bet'];
//*********get cards
//make a deck
$cards = array("14-h", "14-c", "14-d", "14-s",
               "2-h", "2-c", "2-d", "2-s",
               "3-h", "3-c", "3-d", "3-s",
               "4-h", "4-c", "4-d", "4-s",
               "5-h", "5-c", "5-d", "5-s",
               "6-h", "6-c", "6-d", "6-s",
               "7-h", "7-c", "7-d", "7-s",
               "8-h", "8-c", "8-d", "8-s",
               "9-h", "9-c", "9-d", "9-s",
               "10-h", "10-c", "10-d", "10-s",
               "11-h", "11-c", "11-d", "11-s",
               "12-h", "12-c", "12-d", "12-s",
               "13-h", "13-c", "13-d", "13-s");
//shuffle
	for($i = 0; $i < 52; $i++){
		$count = count($cards);
		$random = (rand()%$count);
  	 if($cards[$random] == "") {
  		  $i--;
 	 } else{
  	   $deck[] = $cards[$random];
  	   $cards[$random] = "";
 	 }
	}
	$_SESSION['deck'] = $deck;
	$carrd1 = explode("-", $deck[0]);
	$card1 =  $carrd1[0];
	$color1 = $carrd1[1];
	$carrd2 = explode("-", $deck[1]);
	$card2 =  $carrd2[0];
	$color2 = $carrd2[1];
	
	if ($color1 == "h"){$color1 = 'heart';}
	if ($color1 == "d"){$color1 = 'diamond';}
	if ($color1 == "c"){$color1 = 'club';}
	if ($color1 == "s"){$color1 = 'spade';}
	$_SESSION['card1'] = $card1;	
	$_SESSION['color1'] = $color1;
//second card
	if ($color2 == "h"){$color2 = 'heart';}
	if ($color2 == "d"){$color2 = 'diamond';}
	if ($color2 == "c"){$color2 = 'club';}
	if ($color2 == "s"){$color2 = 'spade';}
	$_SESSION['card2'] = $card2;	
	$_SESSION['color2'] = $color2;
//get dealer cards
	$dcarrd1 = explode("-", $deck[50]);
	$dcard1 =  $dcarrd1[0];
	$dcolor1 = $dcarrd1[1];
	$dcarrd2 = explode("-", $deck[51]);
	$dcard2 =  $dcarrd2[0];
	$dcolor2 = $dcarrd2[1];

	if ($dcolor1 == "h"){$dcolor1 = 'heart';}
	if ($dcolor1 == "d"){$dcolor1 = 'diamond';}
	if ($dcolor1 == "c"){$dcolor1 = 'club';}
	if ($dcolor1 == "s"){$dcolor1 = 'spade';}
	$_SESSION['dcard1'] = $dcard1;	
	$_SESSION['dcolor1'] = $dcolor1;
//second card
	if ($dcolor2 == "h"){$dcolor2 = 'heart';}
	if ($dcolor2 == "d"){$dcolor2 = 'diamond';}
	if ($dcolor2 == "c"){$dcolor2 = 'club';}
	if ($dcolor2 == "s"){$dcolor2 = 'spade';}
	$_SESSION['dcard2'] = $dcard2;	
	$_SESSION['dcolor2'] = $dcolor2;
}

//calcualte cards total to see if they have Blackjack or have bust
if (isset($_SESSION['card1'])){
	$cardd1 = $_SESSION['card1'];
	$cardd2 = $_SESSION['card2'];
	$cardd3 = $_SESSION['card3'];
	$cardd4 = $_SESSION['card4'];
	$cardd5 = $_SESSION['card5'];
	$cardd6 = $_SESSION['card6'];
	if (($cardd1 == 13) || ($cardd1 == 12) || ($cardd1 == 11)){
		$cardd1 = 10;
	}
	if ($cardd1 == 14){
		$cardd1 = 11;
	}
	if (($cardd2 == 13) OR ($cardd2 == 12) OR ($cardd2 == 11)){
		$cardd2 = 10;
	}
	if ($cardd2 == 14){
		$cardd2 = 11;
	}
	if (isset($_SESSION['card3'])){
		if (($cardd3 == 13) OR ($cardd3 == 12) OR ($cardd3 == 11)){
			$cardd3 = 10;
		}
		if ($cardd3 == 14){
			$cardd3 = 11;
		}
	}
	if (isset($_SESSION['card4'])){
		if (($cardd4 == 13) OR ($cardd4 == 12) OR ($cardd4 == 11)){
			$cardd4 = 10;
		}
		if ($cardd4 == 14){
			$cardd4 = 11;
		}
	}
	if (isset($_SESSION['card5'])){
		if (($cardd5 == 13) OR ($cardd5 == 12) OR ($cardd5 == 11)){
			$cardd5 = 10;
		}
		if ($cardd5 == 14){
			$cardd5 = 11;
		}
	}
	if (isset($_SESSION['card6'])){
		if (($cardd6 == 13) OR ($cardd6 == 12) OR ($cardd6 == 11)){
			$cardd6 = 10;
		}
		if ($cardd6 == 14){
			$cardd6 = 11;
		}
	} 
	$total = $cardd1 + $cardd2;
	if (isset($_SESSION['card3'])){
		$total = $total + $cardd3;
	}
	if (isset($_SESSION['card4'])){
		$total = $total + $cardd4;
	}
	if (isset($_SESSION['card5'])){
		$total = $total + $cardd5;
	}
	if (isset($_SESSION['card6'])){
		$total = $total + $cardd6;
	}
	if (($total > 21) && ($cardd1 == 11)){
		$cardd1 = 1;
		$total = $total - 11;
		$total = $total + $cardd1;
	}
	if (($total > 21) && ($cardd2 == 11)){
		$cardd2 = 1;
		$total = $total - 11;
		$total = $total + $cardd2;
	}		
	if (($total > 21) && ($cardd3 == 11)){
		$cardd3 = 1;
		$total = $total - 11;
		$total = $total + $cardd3;
	}	
	if (($total > 21) && ($cardd4 == 11)){
		$cardd4 = 1;
		$total = $total - 11;
		$total = $total + $cardd4;
	}	
	if (($total > 21) && ($cardd5 == 11)){
		$cardd5 = 1;
		$total = $total - 11;
		$total = $total + $cardd5;
	}	
	if (($total > 21) && ($cardd6 == 11)){
		$cardd6 = 1;
		$total = $total - 11;
		$total = $total + $cardd6;
	}
	if (($total == "21") && (!isset($_SESSION['card3'])) && (isset($_SESSION['bet']))){
		$bj = ($bet)/2;
		$won=$bet*2+$bj;
		$newmoney = $omoney - $won;
		$ws = "bj";
		if($newmoney <= 0){
			mysql_query("UPDATE bj SET bjowner='$username',bjearnings='0',bjmaxbet='2000' WHERE bjowner='$owner' AND country='$location'");
			mysql_query("UPDATE users SET money='$otmoney' WHERE username='$owner'");
			echo "You tookover the table";
		}else{
			echo "you got black jack and won $won ";
			$money = ($won) + $pmoney;
			mysql_query("UPDATE users SET money='$money' WHERE username='$username'");
			$total = $earn - $won;
			mysql_query("UPDATE bj SET bjearnings='$total' WHERE bjowner='$owner'");	
			$newmoney = $omoney - $won;
			mysql_query("UPDATE users SET money='$newmoney' WHERE username='$owner'");
			mysql_query("UPDATE users SET bj='0' WHERE username='$username'");
			$_SESSION['show'] = "show them";
			unset($_SESSION['deck'],$_SESSION['bet']);
		}
		$_SESSION['show'] = "show them";
	}
	if (($total > "21" ) && (isset($_SESSION['bet']))){
		$lost = $bet;
		$ws = "lost";
		echo " You had $total. You busted and lost $lost. ";		
		$total = $earn + $lost;
		mysql_query("UPDATE bj SET bjearnings='$total' WHERE bjowner='$owner'");	
		$newmoney = $omoney + $lost;
		mysql_query("UPDATE users SET money='$newmoney' WHERE username='$owner'");
		mysql_query("UPDATE users SET bj='0' WHERE username='$username'");
		$_SESSION['show'] = "show them";
		unset($_SESSION['deck'],$_SESSION['bet']);
		$_SESSION['show'] = "show them";
	}

}

if($ws == "lost"){
	$start = $pmoney;
	$end = $pmoney-$bet;
	 mysql_query("INSERT INTO `betlogs` (`id`, `username`, `money`, `end`, `owner`, `type`) VALUES ('', '$username', '$start', '$end', '$owner', 'bj');");
}elseif($ws == "win"){
	$start = $pmoney;
	$end = $pmoney+($bet*2);
	 mysql_query("INSERT INTO `betlogs` (`id`, `username`, `money`, `end`, `owner`, `type`) VALUES ('', '$username', '$start', '$end', '$owner', 'bj');");
}elseif($ws == "bj"){
	$start = $pmoney;
	$end = $pmoney+($bet*2)+($bet/2);
	 mysql_query("INSERT INTO `betlogs` (`id`, `username`, `money`, `end`, `owner`, `type`) VALUES ('', '$username', '$start', '$end', '$owner', 'bj');");
}
if (!isset($_SESSION['bet'])){
	

	
echo "
<center>
<form name=form3 method=post action=$self>
 <table width=55% border=1 cellspacing=0 cellpadding=0 bordercolor=black class=thinline>
    <tr>
      <td colspan=5 class=header align=center>Blackjack</td>
    </tr>
    <tr>
      <td colspan=3>Place Your Bet:</td>
      <td><input type=text name=bett class=submit maxlength=10></td>
    </tr>
    <tr>
      <td colspan=3>&nbsp;</td>
      <td align=right><input type=submit name=Submit value=Bet! ></td>
    </tr>
  
</form>
";
} else {
echo "
<center>
<table width=500 cellspacing=0 cellpadding=0 border=1 bordercolor=black class=thinline align=center>
";
}


?>
<link href="../New York Thugs/MAIN/New York Thugs (GAME)/includes/in.css" rel="stylesheet" type="text/css" />



<center>

  <tr>
  	<td colspan=30 align=center class=header>Table</td>
</tr>
	<tr  class=text>
    <td width="50%" valign=top>
    <center>
      <b>Dealers Cards:</b><br><br>
      <img src="images/cards/<?php if ((isset($_SESSION['dcard1'])) && (isset($_SESSION['show']))){
	  													echo $_SESSION['dcolor1'];
													}else{
														echo "cardback";}
													echo "/";
													if ((isset($_SESSION['dcard1'])) && (isset($_SESSION['show']))) {
														echo $_SESSION['dcard1'];
													}else{
														echo "cardback";}?>.gif" width="71" height="96">&nbsp;  <img src=images/cards/<?php if ((isset($_SESSION['dcard2'])) && (isset($_POST['stand'])) && (isset($_SESSION['show']))) {
																																					echo $_SESSION['dcolor2'];
																																				}else{
																																					echo "cardback";
																																				}
																																				echo "/";
																																				if ((isset($_SESSION['dcard2'])) && (isset($_POST['stand'])) && (isset($_SESSION['show']))) {
																																					echo $_SESSION['dcard2'];
																																				}else{
																																				echo "cardback";} ?>.gif width="71" height="96"> 
          <?php if ((isset($_SESSION['dcard3'])) && (isset($_POST['stand'])) && (isset($_SESSION['show']))) {
	echo "<img src=images/cards/";
	echo $_SESSION['dcolor3'];
	echo "/";
	echo $_SESSION['dcard3'];
	echo ".gif width=71 height=96>"; 
	echo "&nbsp;";
	}
	if ((isset($_SESSION['dcard4'])) && (isset($_POST['stand'])) && (isset($_SESSION['show']))) {
	echo "<img src=images/cards/";
	echo $_SESSION['dcolor4'];
	echo "/";
	echo $_SESSION['dcard4'];
	echo ".gif width=71 height=96>";
	echo "&nbsp;";
	}?></span>

    </div>
    </td>
    <td colspan=10 valign=top>
    <center>
      <b>Your Cards: <? if ($_SESSION['bet']){ echo "You have $total"; } ?></b><br>
      <br>
      
      <img src="images/cards/<?php if ((isset($_SESSION['card1'])) && (isset($_SESSION['show']))) {
	  											 echo $_SESSION['color1'];
												}else{
													echo "cardback";}
												echo "/";
												if ((isset($_SESSION['card1'])) && (isset($_SESSION['show']))) { 
													echo $_SESSION['card1']; 
												}else{
													echo "cardback";}?>.gif" width="71" height="96">&nbsp;
        <img src="images/cards/<?php if ((isset($_SESSION['card2'])) && (isset($_SESSION['show'])))  {
								echo $_SESSION['color2'];
								}else{
								echo "cardback";} ?>/<?php if ((isset($_SESSION['card2'])) && (isset($_SESSION['show']))){
																echo $_SESSION['card2'];
															}else{
															 echo "cardback"; }?>.gif" width="71" height="96">&nbsp;
        <?php if ((isset($_SESSION['card3'])) && (isset($_SESSION['show']))) {
	echo "<img src=images/cards/";
	echo $_SESSION['color3'];
	echo "/";
	echo $_SESSION['card3'];
	echo ".gif width=71 height=96>"; 
	echo "&nbsp;";
	}
	if (isset($_SESSION['card4'])) {
	echo "<img src=images/cards/";
	echo $_SESSION['color4'];
	echo "/";
	echo $_SESSION['card4'];
	echo ".gif width=71 height=96>";
	echo "&nbsp;";
	}
	if (isset($_SESSION['card5'])) {
	echo "<img src=images/cards/";
	echo $_SESSION['color5'];
	echo "/";
	echo $_SESSION['card5'];
	echo ".gif width=71 height=96>";
	echo "&nbsp;";
	}
	if (isset($_SESSION['card6'])) {
	echo "<img src=images/cards/";
	echo $_SESSION['color6'];
	echo "/";
	echo $_SESSION['card6'];
	echo ".gif width=71 height=96></div></td>";
	echo "&nbsp;";
	}?>
      

    </div></td>
  </tr>
 <tr  class=text>
  
  <td  width=50% align=center>
  <form name="form2" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">


            <div align="right">
              <input name="submit" type="submit" class="submit" value="      Hit      ">
              <input name="hit" type="hidden" value="you hit">&nbsp;&nbsp;&nbsp;&nbsp;</div>
  </form></td><td width=50% colspan=10>
<form name="form4" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">&nbsp;&nbsp;&nbsp;&nbsp; <input name="submit2" type="submit" class="submit" value="   Stand   " />
  <input name="stand" type="hidden" value="you stand" />

</form>
<?php
if (!isset($_SESSION['bet'])){
	echo"
		<SCRIPT LANGUAGE=JavaScript>
		 document.form2.submit.disabled=true;
		 document.form4.submit2.disabled=true;
		</script>";
}?>
    
   </td> 
</tr>  
</table>
</table>

<?php

echo "
<form method='post' action='blackjack.php'>
  <center><table cellspacing=0 cellpadding=0 align=center border=1 bordercolor=black class=thinline><tr><td class=header align=center>Owned</td></tr><tr class=text align=center><td>This blackjack is owned by <a href=\"view.php?user=$oid\"><b>$owner</b></a></td></tr><tr class=text align=center><td>The max bet is currently <b>$bjmaxbet</b></td></tr><tr class=text><td>Make An Offer To Take This Blackjack Over: <input name=offer type=text class=submit size=10 maxlength=10><br></td></tr><tr class=text>
	<td align=right colspan=4><input type=submit name=o value=Offer class=submit></td>
	</tr></table>
  </center></form>";
?>

</body>
</html>

